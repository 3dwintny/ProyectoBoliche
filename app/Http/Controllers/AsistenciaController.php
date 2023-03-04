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

class AsistenciaController extends Controller
{
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
        $fechaAsistencia = Asistencia::
        whereMonth('fecha',$ms->month)
        ->whereYear('fecha',$ms->year)
        ->get();

        if(count($fechaAsistencia)>0){
            return $this->mostrarAsistencia($ms->month,$ms->year);  
        }else{
            $mostrarMes = $this->mesLetras($ms->month);
            return view('Reportes.RepFor30.sinresultadosactual',compact('mostrarAnioReporte','mostrarMes'));
        }
    }

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
        $categoria_id = 0;
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
        $obtenerAtleta = Asistencia::wherein('atleta_id',$request->atleta_id)->get('fecha');
        for($i=0;$i<count($obtenerAtleta);$i++){
            if($obtenerAtleta[$i]->fecha == $fecha[0]){
                $controlAsistencia = "true";
            }
        }
        if($controlAsistencia=="false"){
            $atleta_id = $request->atleta_id;
            $estado = $request->estado;
            for ($i=0;$i<count($atleta_id);$i++){
                $informacion = [
                    'fecha' => $fecha[$i],
                    'atleta_id' => $atleta_id[$i],
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

        //Obtine data de la base de datos
        $fechaAsistencia = Asistencia::
        whereMonth('fecha',$m)
        ->whereYear('fecha',$y)
        ->get();

        //Muestra el año en el reporte y lo envía a la vista para generar PDF
        $mostrarAnioReporte = $y;

        if(count($fechaAsistencia)>0){
            return $this->mostrarAsistencia($m,$y);
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
        $hoy = Carbon::now();
        $antiguos = "false";
        //Muestra el mes de la asistencia en el reporte
        $mostrarMes = $this->mesLetras($obtenerMes);

        //Obtiene una sola vez la fecha de la asistencia
        $fechas= Asistencia::groupBy('fecha')->whereMonth('fecha',$obtenerMes)
        ->whereYear('fecha',$obtenerAnio)->get('fecha');

        //Obtiene información de los atletas
        if($hoy->year==$obtenerAnio && $hoy->month==$obtenerMes){
            $atleta = Atleta::where('estado','activo')->with('alumno')->get();
        }
        else{
            $antiguos = "true";
            $atleta = Atleta::with('alumno')->get();
        }

        //Array en el que se almacena el estado de la asistencia de cada atleta
        $estado = array();

        //Array que almacena la cantidad de días entrenados del Atleta
        $contarDias = array();

        //Array que almacena el promedio de días entrenados del Atleta
        $promedio = array();

        $mostrarAtletas = array();

        //Recorre el array de atletas
        for($i=0;$i<count($atleta);$i++){
            //Recorre el array de la asistencia
            for($j=0;$j<count($fechas);$j++){
                $obtenerEstado =  DB::table('asistencia')
                ->where('atleta_id',$atleta[$i]->id)
                ->where('fecha',$fechas[$j]->fecha)
                ->get('estado');
                if(count($obtenerEstado)>0){
                    array_push($estado,$obtenerEstado[0]->estado);
                    array_push($mostrarAtletas,$atleta[$i]->id);
                }
                else{
                    array_push($estado,"");
                }
            }
        }
        //Obtiene el estado de los atletas para calcular el promedio de días entrenados
        //así como también la cantidad de días entrenados FUNCIONANDO PARA ENTREGA FINAL
        foreach ($atleta as $item){
            $diasEntrenados = Asistencia::where('atleta_id',$item->id)
            ->whereMonth('fecha',$obtenerMes)
            ->whereYear('fecha',$obtenerAnio)
            ->where( function ($query)
            {
                $query->where('estado','X')
                ->orWhere('estado','L')
                ->orWhere('estado','C');
            })->get();

            if(count($diasEntrenados)>0){
                array_push($contarDias,count($diasEntrenados));
                array_push($promedio,round((count($diasEntrenados)/count($fechas))*100,2));
            }
            else{
                array_push($contarDias,0);
                array_push($promedio,round((count($diasEntrenados)/count($fechas))*100,2));
            }
        }
        if($antiguos == "true"){
            $atleta = Atleta::wherein('id',$mostrarAtletas)->with('alumno')->get();
        }
            $control = new Control(['usuario_id' => auth()->user()->id,'Descripcion'=>'PDF', 'tabla_accion_id'=>3]);
            $control->save();
        return PDF::setOptions(['enable_remote' => true,
        'chroot'  => public_path('storage/uploads'),])
        ->loadView('Reportes.RepFor30.pdf',compact('atleta','fechas','estado','contarDias','promedio','obtenerAnio','mostrarMes','aprobacion'))
        ->setPaper('8.5x14', 'landscape')
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

    private function mostrarAsistencia($obtenerMes,$obtenerAnio)
    {
        $hoy = Carbon::now();
        $antiguos = "false";
        //Muestra el mes de la asistencia en el reporte
        $mostrarMes = $this->mesLetras($obtenerMes);
        //Obtiene una sola vez la fecha de la asistencia
        $fechas= Asistencia::groupBy('fecha')->whereMonth('fecha',$obtenerMes)
        ->whereYear('fecha',$obtenerAnio)->get('fecha');

        //Obtiene información de los atletas
        if($hoy->year==$obtenerAnio && $hoy->month==$obtenerMes){
            $atleta = Atleta::where('estado','activo')->with('alumno')->paginate(5);
        }
        else{
            $antiguos = "true";
            $atleta = Atleta::with('alumno')->get();
        }

        //Array en el que se almacena el estado de la asistencia de cada atleta
        $estado = array();

        //Array que almacena la cantidad de días entrenados del Atleta
        $contarDias = array();

        //Array que almacena el promedio de días entrenados del Atleta
        $promedio = array();

        $mostrarAtletas = array();

        //Recorre el array de atletas
        for($i=0;$i<count($atleta);$i++){
            //Recorre el array de la asistencia
            for($j=0;$j<count($fechas);$j++){
                $obtenerEstado =  DB::table('asistencia')
                ->where('atleta_id',$atleta[$i]->id)
                ->where('fecha',$fechas[$j]->fecha)
                ->get('estado');
                if(count($obtenerEstado)>0){
                    array_push($estado,$obtenerEstado[0]->estado);
                    array_push($mostrarAtletas,$atleta[$i]->id);
                }
                else{
                    array_push($estado,"");
                }
            }
        }
        //Obtiene el estado de los atletas para calcular el promedio de días entrenados
        //así como también la cantidad de días entrenados FUNCIONANDO PARA ENTREGA FINAL
        foreach ($atleta as $item){
            $totalFechas = 0;
            $diasEntrenados = Asistencia::where('atleta_id',$item->id)
            ->whereMonth('fecha',$obtenerMes)
            ->whereYear('fecha',$obtenerAnio)
            ->where( function ($query)
            {
                $query->where('estado','X')
                ->orWhere('estado','L')
                ->orWhere('estado','C');
            })->get();
            for($i=0;$i<count($mostrarAtletas);$i++){
                if($mostrarAtletas[$i]==$item->id){
                    $totalFechas++;
                }
            }
            if(count($diasEntrenados)>0){
                array_push($contarDias,count($diasEntrenados));
                array_push($promedio,round((count($diasEntrenados)/$totalFechas)*100,2));
            }
            else{
                array_push($contarDias,0);
                array_push($promedio,round(0*100,2));
            }
        }
        if($antiguos == "true"){
            $atleta = Atleta::wherein('id',$mostrarAtletas)->with('alumno')->paginate(5);
        }
        //return $atleta;
        return view('Reportes.RepFor30.index',compact('atleta','fechas','estado','contarDias','promedio','obtenerMes','obtenerAnio','mostrarMes'));
    }
    
    public function asistenciaIndividual(){
        $hoy = Carbon::now();
        $mes = $hoy->month;
        $obtenerAnio = $hoy->year;
        $mostrarMes = $this->mesLetras($mes);
        $fechas= Asistencia::groupBy('fecha')->whereMonth('fecha',$mes)
        ->whereYear('fecha',$obtenerAnio)->get('fecha');
        $alumno = Alumno::where('correo',auth()->user()->email)->get();
        if(count($alumno)>0){
            $atleta = Atleta::where('alumno_id',$alumno[0]->id)->get();
        }
        else{
            $atleta = Atleta::where('alumno_id',0)->get();
        }
        $estado = array();
        $contarDias = array();
        $promedio = array();
        for($i=0;$i<count($atleta);$i++){
            //Recorre el array de la asistencia
            for($j=0;$j<count($fechas);$j++){
                $obtenerEstado =  DB::table('asistencia')
                ->where('atleta_id',$atleta[$i]->id)
                ->where('fecha',$fechas[$j]->fecha)
                ->get('estado');
                if(count($obtenerEstado)>0){
                    array_push($estado,$obtenerEstado[0]->estado);
                }
                else{
                    array_push($estado,"");
                }
            }
        }
        foreach ($atleta as $item){
            $diasEntrenados = Asistencia::where('atleta_id',$item->id)
            ->whereMonth('fecha',$mes)
            ->whereYear('fecha',$obtenerAnio)
            ->where( function ($query)
            {
                $query->where('estado','X')
                ->orWhere('estado','L')
                ->orWhere('estado','C');
            })->get();

            if(count($diasEntrenados)>0){
                array_push($contarDias,count($diasEntrenados));
                array_push($promedio,round((count($diasEntrenados)/count($fechas))*100,2));
            }
            else{
                array_push($contarDias,0);
                array_push($promedio,round(0*100,2));
            }
        }
        return view('Atletas.asistencia',compact('fechas','mostrarMes','obtenerAnio','estado','promedio','contarDias'));
    }

    public function acciones(){
        $control = Control::where('tabla_accion_id',3)->with('usuario')->paginate(5);
        return view('Reportes.RepFor30.control',compact('control'));
    }
}

