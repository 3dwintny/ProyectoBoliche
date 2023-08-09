<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administracion;
use App\Models\Control;
use Illuminate\Support\Facades\DB;

class AdministracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $administracion = Administracion::where('estado', 'activo')->with('user')->get();
            return view('administracion.index',compact('administracion'));
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
        DB::beginTransaction();
        try{
            Administracion::find($id)->update(['estado' => 'inactivo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>31]);
            $control->save();
            DB::commit();
            return redirect()->action([AdministracionController::class,'index'])->with('success','Administrador eliminado exitosamente');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function eliminados(){
        try{
            $eliminar = Administracion::where('estado', 'inactivo')->get();
            return view('administracion.eliminados',compact('eliminar'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function restaurar(Request $request){
        DB::beginTransaction();
        try{
            Administracion::find(decrypt($request->e))->update(['estado'=>'activo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'RESTAURAR', 'tabla_accion_id'=>31]);
            $control->save();
            DB::commit();
            return redirect()->action([AdministracionController::class,'index'])->with('success','Administrador restaurado exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al restaurar al administrador');
        }
    }
}
