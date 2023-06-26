<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia;
use App\Models\Atleta;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use Hashids\Hashids;
use App\Models\Categoria;
use App\Models\Control;
use App\Models\Entrenador;
use App\Models\Alumno;
use App\Models\Centro;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Exports\AsistenciaExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class AsistenciaController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entrenador = Entrenador::where('correo', auth()->user()->email)->get();
        $categoria = Categoria::all();
        if(count($entrenador)>0){
            $atletas = Atleta::where('estado', 'activo')->where('entrenador_id',$entrenador[0]->id)->get();
        }
        else{
            $atletas = Atleta::where('estado', 'activo')->where('entrenador_id',0)->get();
        }
        $hoy = Carbon::now();
        return view('Reportes.RepFor30.crear',compact("atletas","hoy","categoria"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function guardar(Request $request){
        $fecha = $request->fecha;
        $controlAsistencia = "false";
        $idEncriptado = $request->atleta_id;
        $hashid = new Hashids();
        $idDesencriptado = array();
        for($i = 0; $i < count($idEncriptado); $i++){
            $temporal = $hashid->decode($idEncriptado[$i]);
            array_push($idDesencriptado,$temporal[0]);
        }
        $obtenerAtleta = Asistencia::wherein('atleta_id',$idDesencriptado)->get('fecha');
        for($i=0;$i<count($obtenerAtleta);$i++){
            if($obtenerAtleta[$i]->fecha == $fecha[0]){
                $controlAsistencia = "true";
            }
        }
        if($controlAsistencia=="false"){
            $estado = $request->estado;
            for ($i=0;$i<count($idDesencriptado);$i++){
                $informacion = [
                    'fecha' => $fecha[$i],
                    'atleta_id' => $idDesencriptado[$i],
                    'estado' => $estado[$i],
                ];
                DB::table('asistencia')->insert($informacion);
            }

            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>3]);
            $control->save();
            return redirect()->action([AsistenciaController::class,'create'])->with('message', 'La asistencia del '.$fecha[0].' ha sido tomada exitosamente');
        }
        else{
            return redirect()->action([AsistenciaController::class,'create'])->with('warning', 'La asistencia del '.$fecha[0].' ya ha sido tomada');
        }
    }

    public function buscar(Request $request){
        //Obtiene el mes desde la solicitud de la búsqueda
        $m = $request->mes;

        //Almacena el año desde la solicitud de búsqueda y lo envía a la vista para generar PDF
        $y = $request->anio;

        $mes = 0;
        $anio = 0;
        if($m==12){
            $mes = 1;
            $anio = $y+1;
        }
        else{
            $mes = $m+1;
            $anio = $y;
        }
        //Obtiene una sola vez la fecha de la asistencia
        $fechas= array();

        $fechasInicio= Asistencia::groupBy('fecha')->whereMonth('fecha',$m)
        ->whereYear('fecha',$y)->get('fecha');

        for($i=0;$i<count($fechasInicio);$i++){
            if(date("d",strtotime($fechasInicio[$i]->fecha))>=16 &&  date("d",strtotime($fechasInicio[$i]->fecha))<=31){
                array_push($fechas,$fechasInicio[$i]);
            }
        }

        $fechasFin= Asistencia::groupBy('fecha')->whereMonth('fecha',$mes)
        ->whereYear('fecha',$anio)->get('fecha');

        for($i=0;$i<count($fechasFin);$i++){
            if(date("d",strtotime($fechasFin[$i]->fecha))>=1 &&  date("d",strtotime($fechasFin[$i]->fecha))<=15){
                array_push($fechas,$fechasFin[$i]);
            }
        }

        //Muestra el año en el reporte y lo envía a la vista para generar PDF
        $mostrarAnioReporte = $y;

        if(count($fechas)>0){
            $datos =  $this->mostrarAsistencia($m,$y);
            $atleta = $datos['atleta'];
            $fechas = $datos['fechas'];
            $estado = $datos['estado'];
            $contarDias = $datos['contarDias'];
            $promedio = $datos['promedio'];
            $obtenerMes = $datos['obtenerMes'];
            $obtenerAnio = $datos['obtenerAnio'];
            $mostrarMes = $datos['mostrarMes'];
            $entrenador = Entrenador::where('estado','activo')->get(['nombre1','nombre2','nombre3','apellido1','apellido2','apellido_casada']);
            $centro_entrenamiento = Centro::where('estado','activo')->get('nombre');
            $departamento = Departamento::where('estado','activo')->get(['id','nombre']);
            $municipio = Municipio::where('estado','activo')->where('departamento_id',13)->get(['id','nombre','departamento_id']);
            return view('Reportes.RepFor30.index',compact('atleta','fechas','estado','contarDias','promedio','obtenerMes','obtenerAnio','mostrarMes','entrenador','centro_entrenamiento','departamento','municipio'));
        }
        else{
            $mostrarMes = $this->mesLetras($m);
            return view('Reportes.RepFor30.sinresultados',compact('mostrarAnioReporte','mostrarMes'));
        }
    }

    public function filtroCategoria(Request $request){
        $entrenador = Entrenador::where('correo', auth()->user()->email)->get();
        $categoria = Categoria::all();
        $categoria_id = $request->categorias;
        if(count($entrenador)>0){
            $atletas = Atleta::where('estado', 'activo')->where('entrenador_id',$entrenador[0]->id)->where('categoria_id',$categoria_id)->get();
        }
        else{
            $atletas = Atleta::where('estado', 'activo')->where('entrenador_id',0)->where('categoria_id',$categoria_id)->get();
        }
        $hoy = Carbon::now();
        return view('Reportes.RepFor30.crear',compact("atletas","hoy","categoria"));
    }

    public function generarPDF(Request $request)
    {
        $aprobacion = $request->fechaAprobacion;
        $obtenerMes = $request->meses;
        $obtenerAnio = $request->anios;
        $datos =  $this->mostrarAsistencia($obtenerMes,$obtenerAnio);
        $atleta = $datos['atleta'];
        $fechas = $datos['fechas'];
        $estado = $datos['estado'];
        $contarDias = $datos['contarDias'];
        $promedio = $datos['promedio'];
        $obtenerAnio = $datos['obtenerAnio'];
        $mostrarMes = $datos['mostrarMes'];
        $departamento = "";
        switch(decrypt($request->departamento_id)){
            case 1:
                $departamento = "Alta Verapaz";
                break;
                case 2:
                    $departamento = "Baja Verapaz";
                    break;
                case 3:
                    $departamento = "Chimaltenango";
                    break;
                case 4:
                    $departamento = "Chiquimula";
                    break;
                case 5:
                    $departamento = "El Progreso";
                    break;
                case 6:
                    $departamento = "Escuintla";
                    break;
                case 7:
                    $departamento = "Guatemala";
                    break;
                case 8:
                    $departamento = "Huehuetenango";
                    break;
                case 9:
                    $departamento = "Izabal";
                    break;
                case 10:
                    $departamento = "Jalapa";
                     break;
                case 11:
                    $departamento = "Jutiapa";
                    break;
                case 12:
                    $departamento = "Petén";
                    break;
                case 13:
                    $departamento = "Quetzaltenango";
                    break;
                case 14:
                    $departamento = "Quiché";
                    break;
                case 15:
                    $departamento = "Retalhuleu";
                    break;
                case 16:
                    $departamento = "Sacatepequéz";
                    break;
                case 17:
                    $departamento = "San Marcos";
                    break;
                case 18:
                    $departamento = "Santa Rosa";
                    break;
                case 19:
                    $departamento = "Sololá";
                    break;
                case 20:
                    $departamento = "Suchitepéquez";
                    break;
                case 21:
                    $departamento = "Totonicapán";
                    break;
                case 22:
                    $departamento = "Zacapa";
                    break;

        }
        $municipio = $request->municipio_id;
        $centro = $request->centro_entrenamiento;
        $entrenador = $request->entrenador;
        $dias = $request->dias;
        $horario = $request->horario;
        $control = new Control(['usuario_id' => auth()->user()->id,'Descripcion'=>'PDF', 'tabla_accion_id'=>3]);
        $control->save();
        return PDF::setOptions(['enable_remote' => true,
        'chroot'  => public_path('storage/uploads'),])
        ->loadView('Reportes.RepFor30.pdf',compact('dias','horario','entrenador','centro','municipio','atleta','fechas','estado','contarDias','promedio','obtenerAnio','mostrarMes','aprobacion','departamento'))
        ->setPaper('8.5x11', 'landscape')
        ->stream();
    }

    private function mesLetras($m){
        switch ($m){
            case 1:
                $mostrarMes = "Enero";
                break;
            case 2:
                $mostrarMes = "Febrero";
                break;
            case 3:
                $mostrarMes = "Marzo";
                break;
            case 4:
                $mostrarMes = "Abril";
                break;
            case 5:
                $mostrarMes = "Mayo";
                break;
            case 6:
                $mostrarMes = "Junio";
                break;
            case 7:
                $mostrarMes = "Julio";
                break;
            case 8:
                $mostrarMes = "Agosto";
                break;
            case 9:
                $mostrarMes = "Septiembre";
                break;
            case 10:
                $mostrarMes = "Octubre";
                break;
            case 11:
                $mostrarMes = "Noviembre";
                break;
            case 12:
                $mostrarMes = "Diciembre";
                break;
        }
        return $mostrarMes;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Obtiene la fecha del sistema
        $ms = Carbon::now();

        //Muestra el año en el reporte
        $mostrarAnioReporte = $ms->year;

        //Obtiene la data de la base de datos
        $fechas = Asistencia::
        whereMonth('fecha',$ms->month)
        ->whereYear('fecha',$ms->year)
        ->get();

        if(count($fechas)>0){
            $datos =  $this->mostrarAsistencia($ms->month,$ms->year);
            //return $datos;
            $atleta = $datos['atleta'];
            $fechas = $datos['fechas'];
            $estado = $datos['estado'];
            $contarDias = $datos['contarDias'];
            $promedio = $datos['promedio'];
            $obtenerMes = $datos['obtenerMes'];
            $obtenerAnio = $datos['obtenerAnio'];
            $mostrarMes = $datos['mostrarMes'];
            $entrenador = Entrenador::where('estado','activo')->get(['nombre1','nombre2','nombre3','apellido1','apellido2','apellido_casada']);
            $centro_entrenamiento = Centro::where('estado','activo')->get('nombre');
            $departamento = Departamento::where('estado','activo')->get(['id','nombre']);
            $municipio = Municipio::where('estado','activo')->where('departamento_id',13)->get(['id','nombre','departamento_id']);
            return view('Reportes.RepFor30.index',compact('departamento','atleta','fechas','estado','contarDias','promedio','obtenerMes','obtenerAnio','mostrarMes','entrenador','centro_entrenamiento','municipio'));
        }else{
            $mostrarMes = $this->mesLetras($ms->month);
            return view('Reportes.RepFor30.sinresultadosactual',compact('mostrarAnioReporte','mostrarMes'));
        }
    }

    public function mostrarAsistencia($obtenerMes,$obtenerAnio)
    {
        $mostrarMes = $this->mesLetras($obtenerMes);
        $mes = 0;
        $anio = 0;
        $diaActual = 15;
        $diaSiguiente = 15;
        if($obtenerMes == 12){
            $mes = 1;
            $anio = $obtenerAnio+1;
        }        
        else{
            $mes = $obtenerMes+1;
            $anio = $obtenerAnio;
        }

        $fechaActual = $obtenerAnio.'-'.$obtenerMes.'-'.$diaActual;
        $fechaSiguiente = $anio.'-'.$mes.'-'.$diaSiguiente;

        $fechaInicial = Carbon::createFromFormat('Y-m-d',$fechaActual);
        $fechaFinal = Carbon::createFromFormat('Y-m-d',$fechaSiguiente);
        $alumno = Alumno::where('correo',auth()->user()->email)->get();

        if(count($alumno)==1){
            $atleta = Atleta::where('alumno_id',$alumno[0]->id)->get();
            $asistencia = DB::table('asistencia')->whereBetween('fecha',[$fechaInicial,$fechaFinal])->where('atleta_id',$atleta[0]->id)->orderBy('fecha','asc')->get();
        }
        else{
            $asistencia = DB::table('asistencia')->whereBetween('fecha',[$fechaInicial,$fechaFinal])->orderBy('fecha','asc')->get();
        }

        $fecha = array();

        foreach($asistencia as $asis){
            if(in_array($asis->fecha,$fecha)==false){
                array_push($fecha,$asis->fecha);
            }
        }

        $atletas = array();

        if(count($alumno)==1){
            array_push($atletas,$atleta[0]->id);
        }
        else{
            foreach($asistencia as $asis){
                if(in_array($asis->atleta_id,$atletas)==false){
                    array_push($atletas,$asis->atleta_id);
                }
            }
            sort($atletas);
        }
        
        $mostrarAtletas = array();
        foreach($atletas as $atl){
            array_push($mostrarAtletas,$atl);
        }
        $estado = array();
        $asistenciaOrdenada = array();
        
        $asistencia = $asistencia->sortBy(function ($item) {
            return $item->fecha;
        })->sortBy(function ($item) {
            return $item->atleta_id;
        });

        foreach($asistencia as $asis){
            array_push($asistenciaOrdenada,$asis);
        }

        $controlDatos=0;
        $controlAtletas = 0;

        //return $asistenciaOrdenada;
        while(count($estado) !=count($fecha)*count($mostrarAtletas)){
            for($i=0;$i<count($fecha);$i++){
                if($asistenciaOrdenada[$controlDatos]->atleta_id == $mostrarAtletas[$controlAtletas] && $asistenciaOrdenada[$controlDatos]->fecha == $fecha[$i]){
                    array_push($estado,$asistenciaOrdenada[$controlDatos]->estado);
                    if($controlDatos<count($asistenciaOrdenada)-1){
                        $controlDatos++;
                    }
                }
                else{
                    array_push($estado,"");
                }
            }
            $controlAtletas++;
        }
        $atleta = Atleta::wherein('id',$mostrarAtletas)->with('alumno')->get();
        //Array que almacena la cantidad de días entrenados del Atleta
        $contarDias = array();

        //Array que almacena el promedio de días entrenados del Atleta
        $promedio = array();
        
        for($i=0;$i<count($mostrarAtletas);$i++){
            $dias = 0;
            $avg = 0;
            $diasEntrenados = 0;
            for($j=$i*count($fecha);$j<($i+1)*count($fecha);$j++){
                if($estado[$j]!=""){
                    if($estado[$j]=="X" || $estado[$j]=="L" || $estado[$j]=="C"){
                        $diasEntrenados++;
                    }
                    $dias++;
                }
            }
            $avg = round(($diasEntrenados/$dias)*100,2);
            array_push($contarDias,$diasEntrenados);
            array_push($promedio,$avg);
        }

        $fechas = [];

        foreach($fecha as $fch){
            $fc = Carbon::createFromFormat('Y-m-d',$fch);
            $fechas[] = $fc;
        }
        
        $datos = array(
            'atleta' => $atleta,
            'fechas' => $fechas,
            'estado' => $estado,
            'contarDias' => $contarDias,
            'promedio' => $promedio,
            'obtenerMes' => $obtenerMes,
            'obtenerAnio' => $obtenerAnio,
            'mostrarMes' => $mostrarMes,
            'alumno' => $alumno
        );
        return $datos;
    }
    
    public function asistenciaIndividual(){
        $hoy = Carbon::now();
        $mes = $hoy->month;
        $obtenerAnio = $hoy->year;
        $datos =  $this->mostrarAsistencia($mes,$obtenerAnio);
        $fechas = $datos['fechas'];
        $estado = $datos['estado'];
        $contarDias = $datos['contarDias'];
        $promedio = $datos['promedio'];
        $obtenerAnio = $datos['obtenerAnio'];
        $mostrarMes = $datos['mostrarMes'];
        if (count($datos['alumno'])==1){
            return view('Atletas.asistencia',compact('fechas','mostrarMes','obtenerAnio','estado','promedio','contarDias'));
        }
        else{
            return redirect('home');
        }
    }

    public function acciones(){
        $control = Control::where('tabla_accion_id',3)->with('usuario')->paginate(5);
        return view('Reportes.RepFor30.control',compact('control'));
    }

    public function exportar(Request $request){
        return Excel::download(new AsistenciaExport($request->meses,$request->anios),'asistencia.xlsx');
    }

    public function editarAsistencia(){
        return view('Reportes/RepFor30/fecha');
    }

    public function modificarAsistencia(Request $request){
        $entrenador = Entrenador::where('correo', auth()->user()->email)->get();
        $categoria = Categoria::all();
        $asistencia = array();
        $idAtletas = array();
        if(count($entrenador)>0){
            $asistencia = DB::table('asistencia')
            ->select('asistencia.id', 'asistencia.atleta_id', 'asistencia.fecha', 'asistencia.estado')
            ->join('atleta', 'asistencia.atleta_id', '=', 'atleta.id')
            ->where('fecha', $request->fecha)
            ->where('atleta.entrenador_id', $entrenador[0]->id)
            ->orderBy('atleta_id','asc')
            ->get();
            foreach($asistencia as $asis){
                array_push($idAtletas,$asis->atleta_id);
            }
            $atletas = Atleta::wherein('id',$idAtletas)->get();
        }
        else{
            $atletas = Atleta::where('entrenador_id',0)->get();
        }
        $hoy = $request->fecha;
        $dia = Str::substr($hoy, 8, 2);
        $mes = Str::substr($hoy, 5, 2);
        $anio = Str::substr($hoy, 0, 4);
        $fechaAsistencia = $dia."-".$mes."-".$anio;
        return view('Reportes/RepFor30/editar',compact('atletas','categoria','hoy','asistencia','fechaAsistencia'));
    }

    public function actualizarAsistencia(Request $request){
        $fecha = $request->fecha;
        $idEncriptado = $request->asistenciaId;
        $idDesencriptado = array();
        for($i = 0; $i < count($idEncriptado); $i++){
            $temporal = decrypt($idEncriptado[$i]);
            array_push($idDesencriptado,$temporal);
        }
        $estado = $request->estado;
        for ($i=0;$i<count($idDesencriptado);$i++){
            $informacion = [
                'estado' => $estado[$i],
            ];
            DB::table('asistencia')->where('id', $idDesencriptado[$i])->update($informacion);
        }
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>3]);
        $control->save();
        return redirect()->action([AsistenciaController::class,'editarAsistencia'])->with('message', 'La asistencia del '.$fecha[0].' ha sido actualizada exitosamente');
    }
}