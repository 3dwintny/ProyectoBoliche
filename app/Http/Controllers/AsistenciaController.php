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

        //Muestra el mes en el reporte
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

        //Muestra el año en el reporte
        $mostrarAnioReporte = $ms->year;

        //Obtiene la data de la base de datos
        $fechaAsistencia = Asistencia::
        whereMonth('fecha',$ms->month)
        ->whereYear('fecha',$ms->year)
        ->get();

        //Utilizados para generar el reporte en PDF, se envía una cadena vacía ya que es utilizada solo para los PDF´s de las búsquedas
        $m="";
        $y="";

        if(count($fechaAsistencia)>0){
            return $this->mostrarAsistencia($ms->month,$ms->year,$fechaAsistencia,$m,$y,$mostrarAnioReporte,$mostrarMes);  
        }else{
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
        $atletas = Atleta::all();
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
        $buscar=Asistencia::where('fecha', $fecha[0])->get();
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
            }
            return redirect()->action([AsistenciaController::class,'create'])->with('message', 'La asistencia del '.$fecha[0].' ha sido tomada exitosamente');
        }
        else{
            return redirect()->action([AsistenciaController::class,'create'])->with('warning', 'La asistencia del '.$fecha[0].' ya ha sido tomada');
        }
    }

    public function buscar(Request $request){

        //Obtiene el mes desde la solicitud de la búsqueda
        $m = $request->mes;

        //Muestra el mes en el reporte
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

        //Almacena el año desde la solicitud de búsqueda y lo envía a la vista para generar PDF
        $y = $request->anio;
        $ms = "";

        //Obtine data de la base de datos
        $fechaAsistencia = Asistencia::
        whereMonth('fecha',$m)
        ->whereYear('fecha',$y)
        ->get();

        //Muestra el año en el reporte y lo envía a la vista para generar PDF
        $mostrarAnioReporte = $y;

        if(count($fechaAsistencia)>0){
            return $this->mostrarAsistencia($request->mes,$request->anio,$fechaAsistencia,$m,$y,$mostrarAnioReporte,$mostrarMes);
        }
        else{
            return view('Reportes.RepFor30.sinresultados',compact('mostrarAnioReporte','mostrarMes'));
        }
    }

    public function filtroCategoria(Request $request){
        $categoria = Categoria::all();
        $categoria_id = $request->categorias;
        $atletas = Atleta::where('categoria_id',$categoria_id)->get();
        $hoy = Carbon::now();
        return view('Reportes.RepFor30.crear',compact("atletas","hoy","categoria"));
    }

    public function generarPDF(Request $request)
    {
        $m = $request->meses;
        $y = $request->anios;
        if($m!="" && $y!=""){
            $mes = Asistencia::
            whereMonth('fecha',$m)
            ->whereYear('fecha',$y)
            ->get();
            $ads = Asistencia::whereMonth('fecha',$m)
            ->whereYear('fecha',$y)
            ->get()
            ->sortBy('atleta_id');
        }
        else{
            $ms = Carbon::now();
            $mes = Asistencia::
            whereMonth('fecha',$ms->month)
            ->whereYear('fecha',$ms->year)
            ->get();
            $ads = Asistencia::whereMonth('fecha',$ms->month)
            ->whereYear('fecha',$ms->year)
            ->get()
            ->sortBy('atleta_id');
            $m=$ms->month;
            $y=$ms->year;
        }
        $atletas = Asistencia::whereMonth('fecha',$m)
        ->whereYear('fecha',$y)
        ->get('atleta_id');
        $ast = Asistencia::all('fecha');
        //Array en el que se almacenan las fechas una sola vez
        $fechas = array();

        //Array en el que se almacenan los atletas una sola vez
        $atleta = array();

        //Array en el que se almacena el estado de la asistencia de cada atleta
        $estado = array();

        $atl = array();

        $atls = array();

        $f = array();

        $fs = array();

        //Array que almacena la cantidad de días entrenados del Atleta
        $contarDias = array();

        //Array que almacena el promedio de días entrenados del Atleta
        $promedio = array();

        //Array que almacena la cantidad de atletas nuevos en la asociación
        $noRepetidos = array();

        //Array que almacena la cantidad de atletas que ya se encontraban en la asociación
        $repetidos = array();

        //Inserta una sola vez inofrmación de la fecha
        for($i=0;$i<count($mes);$i++){
            if(count($fechas)==0){
                array_push($fechas,$mes[$i]->fecha);
            }
            else{
                if(in_array($mes[$i]->fecha,$fechas)==false){
                    array_push($fechas,$mes[$i]->fecha);
                }
            }
        }

        //Inserta una sola vez información del atleta
        for($i=0;$i<count($atletas);$i++){
            if(count($atleta)==0){
                array_push($atleta,$atletas[$i]);
            }
            else{
                if(in_array($atletas[$i],$atleta,)==false){
                    array_push($atleta,$atletas[$i]);
                }
            }
        }

        foreach(array_count_values($atl) as $item){
            array_push($atls,$item->value);
        }

        //Ingresa el estado de asistencia de cada atleta, orndenado y listo para mostrarse en la vista
        foreach($ads as $item){
            array_push($estado,$item->estado);
            array_push($atl,$item->atleta_id);
        }
        asort($atleta);
        asort($fechas);

        //Obtiene el patrón para verificar los atletas antiguos
        foreach(array_count_values($atl) as $item){
            array_push($atls,$item);
        }
        arsort($atls);
        $antiguos = $atls[0];
        for($i=0;$i<count($atls);$i++) {
            if($atls[$i]!=$antiguos){
                array_push($noRepetidos,$atls[$i]);
            }
            else{
                array_push($repetidos,$atls[$i]);
            }
        }

        //Variable Controladora
        $contador=0;

        //Variable controladora de alumnos que se encontraban dentro de la asociación
        $cAntiguos = count($repetidos)*count($fechas);

        //Verifica si se ha ingresado uno o varios nuevos atletas
        if(count($atleta)*count($fechas)!=count($estado)){

            //Recorre el array contenedor de los nuevos atletas
            for($j=0;$j<count($noRepetidos);$j++){

                //Ingresa cadenas vacías a aquellos días en los que el atleta no formaba
                //parte de la asociación
                for($i=$cAntiguos+$contador;$i<$cAntiguos+$antiguos-$noRepetidos[$j]+$contador;$i++){
                    array_splice($estado,$i,0,"");
                }
                $contador=$contador+$antiguos;
            }
        }

        foreach ($fechas as $da)
        {
            array_push($fs,substr($da,8,2));
        }

        foreach ($atleta as $item){
            $dias = Asistencia::where('atleta_id',$item->atleta_id)
            ->whereMonth('fecha',$m)
            ->whereYear('fecha',$y)
            ->where( function ($query)
            {
                $query->where('estado','X')
                ->orWhere('estado','P')
                ->orWhere('estado','L')
                ->orWhere('estado','E')
                ->orWhere('estado','C');
            })->get();

            if(count($dias)>0){
                array_push($contarDias,count($dias));
                array_push($promedio,round((count($dias)/count($fs))*100,2));
            }
            else{
                array_push($contarDias,0);
                array_push($promedio,round((count($dias)/count($fs))*100,2));
            }
        }
        return PDF::setOptions(['enable_remote' => true,
        'chroot'  => public_path('storage/uploads'),])
        ->loadView('Reportes.RepFor30.pdf',compact('atleta','fs','estado','contarDias','promedio'))
        ->setPaper('8.5x14', 'landscape')
        ->stream();
    }

    public static function mostrarAsistencia($obtenerMes,$obtenerAnio,$obtenerFecha,$m,$y,$mostrarAnioReporte,$mostrarMes)
    {
        $ads = Asistencia::whereMonth('fecha',$obtenerMes)
        ->whereYear('fecha',$obtenerAnio)
        ->get()
        ->sortBy('atleta_id');

        $estados = DB::table('asistencia')
        -> whereMonth('fecha',$obtenerMes)
        ->whereYear('fecha',$obtenerAnio)->orderBy('fecha')
        ->get();

        $atletas = Asistencia::whereMonth('fecha',$obtenerMes)
        ->whereYear('fecha',$obtenerAnio)
        ->get('atleta_id');
        //Array en el que se almacenan las fechas una sola vez
        $fechas = array();

        //Array en el que se almacenan los atletas una sola vez
        $atleta = array();

        //Array en el que se almacena el estado de la asistencia de cada atleta
        $estado = array();

        $atl = array();

        $atls = array();

        //$f = array();

        $fs = array();

        //Array que almacena la cantidad de días entrenados del Atleta
        $contarDias = array();

        //Array que almacena el promedio de días entrenados del Atleta
        $promedio = array();

        //Array que almacena la cantidad de atletas nuevos en la asociación
        $noRepetidos = array();

        //Array que almacena la cantidad de atletas que ya se encontraban en la asociación
        $repetidos = array();

        //Inserta una sola vez inofrmación de la fecha
        for($i=0;$i<count($obtenerFecha);$i++){
            if(count($fechas)==0){
                array_push($fechas,$obtenerFecha[$i]->fecha);
            }
            else{
                if(in_array($obtenerFecha[$i]->fecha,$fechas)==false){
                    array_push($fechas,$obtenerFecha[$i]->fecha);
                }
            }
        }

        //Ingresa una sola vez la información del atleta
        for($i=0;$i<count($atletas);$i++){
            if(count($atleta)==0){
                array_push($atleta,$atletas[$i]);
            }
            else{
                if(in_array($atletas[$i],$atleta,)==false){
                    array_push($atleta,$atletas[$i]);
                }
            }
        }

        foreach(array_count_values($atl) as $item){
            array_push($atls,$item->value);
        }

        //Ingresa el estado de asistencia de cada atleta, orndenado y listo para mostrarse en la vista
        foreach($ads as $item){
            array_push($atl,$item->atleta_id);
        }
        
        for($i=0;$i<count($atleta);$i++){
            for($j=0;$j<count($estados);$j++){
                if($estados[$j]->atleta_id==$atleta[$i]->atleta_id){
                    array_push($estado ,$estados[$j]->estado);
                }
            }
        }

        asort($atleta);
        asort($fechas);

        //Obtiene el patrón para verificar los atletas antiguos
        foreach(array_count_values($atl) as $item){
            array_push($atls,$item);
        }
        arsort($atls);
        $antiguos = $atls[0];
        for($i=0;$i<count($atls);$i++) {
            if($atls[$i]!=$antiguos){
                array_push($noRepetidos,$atls[$i]);
            }
            else{
                array_push($repetidos,$atls[$i]);
            }
        }

        //Variable Controladora
        $contador=0;

        //Variable controladora de alumnos que se encontraban dentro de la asociación
        $cAntiguos = count($repetidos)*count($fechas);

        //Verifica si se ha ingresado uno o varios nuevos atletas
        if(count($atleta)*count($fechas)!=count($estado)){

            //Recorre el array contenedor de los nuevos atletas
            for($j=0;$j<count($noRepetidos);$j++){

                //Ingresa cadenas vacías a aquellos días en los que el atleta no formaba
                //parte de la asociación
                for($i=$cAntiguos+$contador;$i<$cAntiguos+$antiguos-$noRepetidos[$j]+$contador;$i++){
                    array_splice($estado,$i,0,"");
                }
                $contador=$contador+$antiguos;
            }
        }

        foreach ($fechas as $da)
        {
            array_push($fs,substr($da,8,2));
        }

        //Obtiene el estado de los atletas para calcular el promedio de días entrenados
        //así como también la cantidad de días entrenados
        foreach ($atleta as $item){
            $dias = Asistencia::where('atleta_id',$item->atleta_id)
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

            if(count($dias)>0){
                array_push($contarDias,count($dias));
                array_push($promedio,round((count($dias)/count($fs))*100,2));
            }
            else{
                array_push($contarDias,0);
                array_push($promedio,round((count($dias)/count($fs))*100,2));
            }
        }
        
        return view('Reportes.RepFor30.index',compact('atleta','fs','estado','contarDias','promedio','m','y','mostrarAnioReporte','mostrarMes'));
    }
}

