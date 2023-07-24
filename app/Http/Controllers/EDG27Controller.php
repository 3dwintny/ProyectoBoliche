<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atleta;
use PDF;
use App\Models\Departamento;
use App\Models\Deporte;
use Carbon\Carbon;
use App\Models\Control;

class EDG27Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $atletas = Atleta::where('federado','SISTEMÁTICO')->where('estado','activo')->get();
            if(count($atletas)>0){
                return view('Reportes.edg27.show',compact('atletas'));
            }
            else{
                return view('Reportes.edg27.sinresultados');
            }
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
            $mostrarMes = "";
            switch ($mes){
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
            $federacion = Deporte::find(1);
            $departamento = Departamento::find(13);
            $atletas = Atleta::where('federado','SISTEMÁTICO')->where('estado','activo')->get();
            if(count($atletas)>0){
                // $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>10]);
                // $control->save();
                return PDF::loadView('Reportes.edg27.pdf',compact('atletas','mostrarMes','anio','federacion','departamento'))->setPaper('8.5x11', 'landscape')->stream();
            }
            else{
                return view('Reportes.edg27.sinresultados');
            }
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function acciones(){
        try{
            $control = Control::where('tabla_accion_id',10)->with('usuario')->paginate(5);
            return view('Reportes.edg27.control',compact('control'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }
}
