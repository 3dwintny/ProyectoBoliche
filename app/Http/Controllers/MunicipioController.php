<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipio;
use App\Models\Departamento;
use App\Models\Control;
use Illuminate\Support\Facades\DB;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $municipio = Municipio::where('estado','activo')
            ->with('departamento')
            ->paginate(15);
            return view('configuraciones.municipio.show',compact('municipio')); 
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
        try{
            $departamentos = Departamento::where('estado','activo')->get(['id','nombre']);
            return view('configuraciones.municipio.create',compact("departamentos"));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $municipios = new Municipio(['nombre' => $request->nombre,'departamento_id' => $request->departamento_id]);
            $municipios->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>20]);
            $control->save();
            DB::commit();
            return redirect()->action([MunicipioController::class,'index'])->with('success','Municipio registrado exitosamente');
        }
        catch(\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return back()->withErrors($e->validator->errors())->withInput();
        }
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
        try{
            $municipio = Municipio::find(decrypt($id));
            $departamentos = Departamento::where('estado','activo')->get(['id','nombre']);
            return view('configuraciones.municipio.edit',compact('municipio','departamentos'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
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
        DB::beginTransaction();
        try{
            $municipio = Municipio::find(decrypt($id));
            $municipio->fill(['nombre' => $request->nombre,'departamento_id' => decrypt($request->departamento_id)]);
            $municipio->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>20]);
            $control->save();
            DB::commit();
            return redirect()->action([MunicipioController::class,'index'])->with('success','Municipio actualizado exitosamente');
        }
        catch(\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return back()->withErrors($e->validator->errors())->withInput();
        }
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
            Municipio::find(decrypt($id))->update(['estado' => 'inactivo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>20]);
            $control->save();
            DB::commit();
            return redirect()->action([MunicipioController::class,'index'])->with('success','Municipio eliminado exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al eliminar al municipio');
        }
    }

    public function acciones(){
        try{
            $control = Control::where('tabla_accion_id',20)->with('usuario')->paginate(5);
            return view('configuraciones.municipio.control',compact('control'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function eliminados(){
        try{
            $eliminar = Municipio::where('estado', 'inactivo')->with('departamento')->get();
            return view('configuraciones.municipio.eliminados',compact('eliminar'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function restaurar(Request $request){
        DB::beginTransaction();
        try{
            Municipio::find(decrypt($request->e))->update(['estado'=>'activo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'RESTAURAR', 'tabla_accion_id'=>20]);
            $control->save();
            DB::commit();
            return redirect()->action([MunicipioController::class,'index'])->with('success','Municipio restaurado exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al restaurar al municipio');
        }
    }
}
