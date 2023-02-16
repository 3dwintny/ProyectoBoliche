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
            switch ($ms->month){
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
        $categoria = Categoria::all();
        $atletas = Atleta::where('estado', 'activo')->get();
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
            $estado = $request-> estado;
            for ($i=0;$i<count($atleta_id);$i++){
                $informacion = [
                    'fecha' => $fecha[$i],
                    'atleta_id' => $atleta_id[$i],
                    'estado' => $estado[$i],
                ];
                DB::table('asistencia')->insert($informacion);
                $fecha = Carbon::now()->format('Y-m-d');
                $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR','Fecha'=>$fecha, 'tabla_accion_id'=>1]);
                $control->save();
            }
            $fecha = Carbon::now()->format('Y-m-d');
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR','Fecha'=>$fecha, 'tabla_accion_id'=>3]);
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
            return view('Reportes.RepFor30.sinresultados',compact('mostrarAnioReporte','mostrarMes'));
        }
    }

    public function filtroCategoria(Request $request){
        $categoria = Categoria::all();
        $categoria_id = $request->categorias;
        $atletas = Atleta::where('categoria_id',$categoria_id)->where('estado','activo')->get();
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
        switch ($obtenerMes){
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
                ->orWhere('estado','P')
                ->orWhere('estado','L')
                ->orWhere('estado','E')
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
        return PDF::setOptions(['enable_remote' => true,
        'chroot'  => public_path('storage/uploads'),])
        ->loadView('Reportes.RepFor30.pdf',compact('atleta','fechas','estado','contarDias','promedio','obtenerAnio','mostrarMes','aprobacion'))
        ->setPaper('8.5x14', 'landscape')
        ->stream();
    }

    public static function mostrarAsistencia($obtenerMes,$obtenerAnio)
    {
        $hoy = Carbon::now();
        $antiguos = "false";
        //Muestra el mes de la asistencia en el reporte
        switch ($obtenerMes){
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
            $diasEntrenados = Asistencia::where('atleta_id',$item->id)
            ->whereMonth('fecha',$obtenerMes)
            ->whereYear('fecha',$obtenerAnio)
            ->where( function ($query)
            {
                $query->where('estado','X')
                ->orWhere('estado','P')
                ->orWhere('estado','L')
                ->orWhere('estado','E')
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
            $atleta = Atleta::wherein('id',$mostrarAtletas)->with('alumno')->paginate(5);
        }
        return view('Reportes.RepFor30.index',compact('atleta','fechas','estado','contarDias','promedio','obtenerMes','obtenerAnio','mostrarMes'));
    }
}

