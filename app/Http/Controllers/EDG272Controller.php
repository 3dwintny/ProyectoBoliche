<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atleta;
use PDF;
use App\Models\Departamento;
use App\Models\Deporte;
use Carbon\Carbon;
use App\Models\Control;
use App\Http\Controllers\AsistenciaController;

class EDG272Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $atletas = Atleta::where('otro_programa_id',2)->where('estado','activo')->get();
            return view('Reportes.edg272.show',compact('atletas'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    public function generarPDF()
    {
        try{
            $fecha = Carbon::now();
            $mes = Carbon::parse($fecha)->format('m');
            $anio = Carbon::parse($fecha)->format('Y');
            $meses = new AsistenciaController();
            $mostrarMes = $meses->mesLetras($mes);
            $deporte = Deporte::find(1);
            $departamento = Departamento::find(13);
            $atletas = Atleta::where('otro_programa_id',2)->where('estado','activo')->get();
            if(count($atletas)>0){
                $fechasNacimiento = array();
                $fechaCompleta = "";
                foreach($atletas as $atleta){
                    $fechaNacimiento = Carbon::parse($atleta->alumno->fecha);
                    $fechaCompleta = $fechaNacimiento->day . "/" . strtolower($meses->mesLetras($fechaNacimiento->month)) . "/" . $fechaNacimiento->year;
                    array_push($fechasNacimiento,$fechaCompleta);
                }
                $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'PDF', 'tabla_accion_id'=>11]);
                $control->save();
                return PDF::loadView('Reportes.edg272.pdf',compact('atletas','mostrarMes','anio','deporte','departamento','fechasNacimiento'))->setPaper('8.5x11')->stream();
            }
            else{
                return view('Reportes.edg272.sinresultados');
            }
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function acciones(){
        try{
            $control = Control::where('tabla_accion_id',11)->with('usuario')->paginate(5);
            return view('Reportes.edg272.control',compact('control'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }
}
