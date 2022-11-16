<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia;
use App\Models\Atleta;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AsistenciaController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $hoy = Carbon::now();
        $mes = Asistencia::whereMonth('fecha',$hoy->month)->get(); 
        $ads = Asistencia::whereMonth('fecha',$hoy->month)->get()->sortBy('atleta_id');
=======
<<<<<<< HEAD
        $hoy = Carbon::now();
        $mes = Asistencia::whereMonth('fecha',$hoy->month)->get();
        $ads = Asistencia::whereMonth('fecha',$hoy->month)->get()->sortBy('atleta_id');
=======
        $ads = Asistencia::all("atleta_id","estado")->sortBy("atleta_id");
>>>>>>> 9a480d6edc522a93f13c0b25ab0f276c2d705497
>>>>>>> f8f2de15642dbf5c86f8dec9c68b3c12f5a4cf6c
        $atletas = Asistencia::all('atleta_id');
        $ast = Asistencia::all('fecha');
        //Array en el que se almacenan las fechas una sola vez
        $fechas = array();

<<<<<<< HEAD
        //Array en el que se almacenan los atletas una sola vez
=======
        //Array en el que se almacenan los atletas una sola vez 
>>>>>>> 9a480d6edc522a93f13c0b25ab0f276c2d705497
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
<<<<<<< HEAD
        for($i=0;$i<count($mes);$i++){
=======
<<<<<<< HEAD
        for($i=0;$i<count($mes);$i++){
            if(count($fechas)==0){
                array_push($fechas,$mes[$i]->fecha);
            }
            else{
                if(in_array($mes[$i]->fecha,$fechas,)==false){
                    array_push($fechas,$mes[$i]->fecha);
=======
        for($i=0;$i<count($ast);$i++){
>>>>>>> f8f2de15642dbf5c86f8dec9c68b3c12f5a4cf6c
            if(count($fechas)==0){
                array_push($fechas,$mes[$i]->fecha);
            }
            else{
<<<<<<< HEAD
                if(in_array($mes[$i]->fecha,$fechas,)==false){
                    array_push($fechas,$mes[$i]->fecha);
=======
                if(in_array($ast[$i],$fechas,)==false){
                    array_push($fechas,$ast[$i]);
>>>>>>> 9a480d6edc522a93f13c0b25ab0f276c2d705497
>>>>>>> f8f2de15642dbf5c86f8dec9c68b3c12f5a4cf6c
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
<<<<<<< HEAD

=======
        
<<<<<<< HEAD
=======
        
>>>>>>> 9a480d6edc522a93f13c0b25ab0f276c2d705497
>>>>>>> f8f2de15642dbf5c86f8dec9c68b3c12f5a4cf6c
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
<<<<<<< HEAD
        {
            array_push($fs,substr($da,8,2));
        }
        return view('Reportes.RepFor30.index',compact('atleta','fs','estado'));
=======
        { 
            array_push($fs,substr($da,8,2));
        }
        return view('Reportes.for31',compact('atleta','fs','estado'));
>>>>>>> 9a480d6edc522a93f13c0b25ab0f276c2d705497
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
<<<<<<< HEAD
        return view('Reportes.RepFor30.crear',compact("atletas" , "hoy"));
=======
        return view('asistencia.create',compact("atletas" , "hoy"));
>>>>>>> 9a480d6edc522a93f13c0b25ab0f276c2d705497
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
<<<<<<< HEAD
    
=======
<<<<<<< HEAD

>>>>>>> f8f2de15642dbf5c86f8dec9c68b3c12f5a4cf6c
    public function buscar(Request $request){
        $m = $request->mes;
        $y = $request->anio;
        $mes = Asistencia::whereMonth('fecha',$m)->get();
        $anio = Asistencia::whereYear('fecha',$y)->get();
        if(count($mes)>0 && count($anio)>0){
            $ads = Asistencia::whereMonth('fecha',$m)->get()->sortBy('atleta_id');
        $atletas = Asistencia::all('atleta_id');
        $ast = Asistencia::all('fecha');
        //Array en el que se almacenan las fechas una sola vez
        $fechas = array();

<<<<<<< HEAD
        //Array en el que se almacenan los atletas una sola vez 
=======
        //Array en el que se almacenan los atletas una sola vez
>>>>>>> f8f2de15642dbf5c86f8dec9c68b3c12f5a4cf6c
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
<<<<<<< HEAD
        
=======

>>>>>>> f8f2de15642dbf5c86f8dec9c68b3c12f5a4cf6c
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
<<<<<<< HEAD
        { 
            array_push($fs,substr($da,8,2));
        }
        return view('asistencia.show',compact('atleta','fs','estado'));
        }
        else{
            return view('asistencia.sinresultados');
        }
    }
=======
        {
            array_push($fs,substr($da,8,2));
        }
        return view('Reportes.RepFor30.index',compact('atleta','fs','estado'));
        }
        else{
            return view('Reportes.RepFor30.sinresultados');
        }
    }
=======
>>>>>>> 9a480d6edc522a93f13c0b25ab0f276c2d705497
>>>>>>> f8f2de15642dbf5c86f8dec9c68b3c12f5a4cf6c
}
