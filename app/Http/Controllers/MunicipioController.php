<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipio;
use App\Models\Departamento;
use App\Models\Control;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipio = Municipio::where('estado','activo')
        ->with('departamento')
        ->paginate(15);
        return view('configuraciones.municipio.show',compact('municipio')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamento::where('estado','activo')->get(['id','nombre']);
        return view('configuraciones.municipio.create',compact("departamentos"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $municipios = new Municipio(['nombre' => $request->nombre,'departamento_id' => $request->departamento_id]);
        $municipios->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>20]);
        $control->save();
        return redirect()->action([MunicipioController::class,'index']);
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
    public function edit($id, Request $request)
    {
        $municipio = Municipio::find(decrypt($id));
        $departamentos = Departamento::where('estado','activo')->get(['id','nombre']);
        return view('configuraciones.municipio.edit',compact('municipio','departamentos'));
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
        $municipio = Municipio::find(decrypt($id));
        $municipio->fill(['nombre' => $request->nombre,'departamento_id' => decrypt($request->departamento_id)]);
        $municipio->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>20]);
        $control->save();
        return redirect()->action([MunicipioController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Municipio::find(decrypt($id))->update(['estado' => 'inactivo']);
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>20]);
        $control->save();
        return redirect()->action([MunicipioController::class,'index']);
    }

    public function acciones(){
        $control = Control::where('tabla_accion_id',20)->with('usuario')->paginate(5);
        return view('configuraciones.municipio.control',compact('control'));
    }

    public function eliminados(){
        $eliminar = Municipio::where('estado', 'inactivo')->with('departamento')->get();
        return view('configuraciones.municipio.eliminados',compact('eliminar'));
    }

    public function restaurar(Request $request){
        Municipio::find(decrypt($request->e))->update(['estado'=>'activo']);
        return redirect()->action([MunicipioController::class,'index']);
    }
}
