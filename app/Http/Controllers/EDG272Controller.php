<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atleta;
use PDF;
use App\Models\Departamento;
use App\Models\Deporte;
use Carbon\Carbon;
use App\Models\Control;

class EDG272Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atletas = Atleta::where('otro_programa_id',2)->where('estado','activo')->get();
        if(count($atletas)>0){
            return view('Reportes.edg272.show',compact('atletas'));
        }
        else{
            return view('Reportes.edg272.sinresultados');
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
        $atletas = Atleta::where('otro_programa_id',2)->where('estado','activo')->get();
        if(count($atletas)>0){
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'PDF', 'tabla_accion_id'=>11]);
            $control->save();
            return PDF::loadView('Reportes.edg272.pdf',compact('atletas','mostrarMes','anio','federacion','departamento'))->setPaper('8.5x11')->stream();
        }
        else{
            return view('Reportes.edg272.sinresultados');
        }
    }

    public function acciones(){
        $control = Control::where('tabla_accion_id',11)->with('usuario')->paginate(5);
        return view('Reportes.edg272.control',compact('control'));
    }
}
