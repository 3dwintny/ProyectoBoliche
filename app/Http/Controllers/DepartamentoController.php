<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\Control;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamento = Departamento::where('estado','activo')->paginate(6);
        return view('configuraciones.departamento.show',compact('departamento')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuraciones.departamento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>['unique:departamento'],
        ]);
        $departamento = new Departamento(['nombre' => $request->nombre]);
        $departamento->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>7]);
        $control->save();
        return redirect()->action([DepartamentoController::class,'index']);
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
        $departamento = Departamento::find(decrypt($id));
        return view('configuraciones.departamento.edit', compact('departamento'));
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
        $departamento = Departamento::find(decrypt($id));
        $departamento->fill(['nombre' => $request->nombre]);
        $departamento->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>7]);
        $control->save();
        return redirect()->action([DepartamentoController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Departamento::find(decrypt($id))->update(['estado' => 'inactivo']);
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>7]);
        $control->save();
        return redirect()->action([DepartamentoController::class,'index']);
    }

    public function acciones(){
        $control = Control::where('tabla_accion_id',7)->with('usuario')->paginate(5);
        return view('configuraciones.departamento.control',compact('control'));
    }

    public function eliminados(){
        $eliminar = Departamento::where('estado', 'inactivo')->get();
        return view('configuraciones.departamento.eliminados',compact('eliminar'));
    }

    public function restaurar(Request $request){
        Departamento::find(decrypt($request->e))->update(['estado'=>'activo']);
        return redirect()->action([DepartamentoController::class,'index']);
    }
}
