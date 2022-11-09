<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia;
use App\Models\Atleta;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asistencias = Asistencia::with('atleta')->get();
        $atletas = Atleta::all();
        $ast = Asistencia::all('fecha')->sortBy('fecha');
        $arreglo = array();
        for($i=0;$i<count($ast);$i++){
            
            if(count($arreglo)==0){
                array_push($arreglo,$ast[$i]);
            }
            else{
                if(in_array($ast[$i],$arreglo,)==false){
                    array_push($arreglo,$ast[$i]);
                }
            }
        }
        asort($arreglo);
        return view('asistencia.show',compact('asistencias','atletas','arreglo'));
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
}
