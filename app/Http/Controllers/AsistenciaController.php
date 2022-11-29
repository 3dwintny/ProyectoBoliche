<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia;
use App\Models\Atleta;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoy = Carbon::now();
        $mes = Asistencia::
        whereMonth('fecha',$hoy->month)
        ->whereYear('fecha',$hoy->year)
        ->get(); 
        $ads = Asistencia::whereMonth('fecha',$hoy->month)
        ->whereYear('fecha',$hoy->year)
        ->get()
        ->sortBy('atleta_id');
        $atletas = Asistencia::all('atleta_id');
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
                if(in_array($mes[$i]->fecha,$fechas,)==false){
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
        return view('asistencia.show',compact('atleta','fs','estado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $atletas = Atleta::all();
        $hoy = Carbon::now();
        return view('asistencia.create',compact("atletas" , "hoy"));
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
        return redirect()->back();
    }

    public function buscar(Request $request){
        $m = $request->mes;
        $y = $request->anio;
        $mes = Asistencia::
        whereMonth('fecha',$m)
        ->whereYear('fecha',$y)
        ->get();
        if(count($mes)>0){
            $ads = Asistencia::
            whereMonth('fecha',$m)
            ->whereYear('fecha',$y)
            ->get()->sortBy('atleta_id');
        $atletas = Asistencia::all('atleta_id');
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
                if(in_array($mes[$i]->fecha,$fechas,)==false){
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
        return view('asistencia.show',compact('atleta','fs','estado'));
        }
        else{
            return view('asistencia.sinresultados');
        }
    }

    public function generarPDF(Request $request)
    {
        $hoy = Carbon::now();
        $mes = Asistencia::
        whereMonth('fecha',$hoy->month)
        ->whereYear('fecha',$hoy->year)
        ->get(); 
        $ads = Asistencia::whereMonth('fecha',$hoy->month)
        ->whereYear('fecha',$hoy->year)
        ->get()
        ->sortBy('atleta_id');
        $atletas = Asistencia::all('atleta_id');
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
                if(in_array($mes[$i]->fecha,$fechas,)==false){
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
        $c = $request->carta;
        if($c=="1"){
            return PDF::loadView('asistencia.pdf',compact('atleta','fs','estado'))
                ->setPaper('8.5x11', 'landscape')->stream();
        }
        else{
            return PDF::loadView('asistencia.pdf',compact('atleta','fs','estado'))
                ->setPaper('8.5x14', 'landscape')->stream();
        }
    }
}
