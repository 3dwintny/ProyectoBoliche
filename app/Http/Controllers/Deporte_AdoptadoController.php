<?php

namespace App\Http\Controllers;

use App\Models\Deporte_Adoptado;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Control;
use Illuminate\Support\Facades\DB;

class Deporte_AdoptadoController extends Controller
{
    protected $n;
    public function __construct(Deporte_Adoptado $n){
        $this->n = $n;  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $deporte = Deporte_Adoptado::where('estado','activo')->get(['id','nombre']);
            return view('configuraciones.deporte_a.show',compact('deporte'));
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
            $hoy = Carbon::now();
            return view('configuraciones.deporte_a.create', compact('hoy'));
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
            $request->validate([
                'nombre'=>['unique:deporte_adaptado'],
            ]);
            $deporte = new Deporte_Adoptado(['nombre' => $request->nombre]);
            $deporte->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>8]);
            $control->save();
            DB::commit();
            return redirect()->action([Deporte_AdoptadoController::class, 'index'])->with('success','Deporte adaptado registrado exitosamente');
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
            $deporte = Deporte_Adoptado::find(decrypt($id));
            return view('configuraciones.deporte_a.edit',['deporte' => $deporte]);
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
            $deporte = Deporte_Adoptado::find(decrypt($id));
            $deporte->fill(['nombre' => $request->nombre]);
            $deporte->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>8]);
            $control->save();
            DB::commit();
            return redirect()->action([Deporte_AdoptadoController::class,'index'])->with('success','Deporte adaptado actualizado exitosamente');
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
            Deporte_Adoptado::find(decrypt($id))->update(['estado' => 'inactivo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>8]);
            $control->save();
            DB::commit();
            return redirect()->action([Deporte_AdoptadoController::class,'index'])->with('success','Deporte adaptado eliminado exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al eliminar al deporte adaptado');
        }
    }

    public function acciones(){
        try{
            $control = Control::where('tabla_accion_id',8)->with('usuario')->paginate(5);
            return view('configuraciones.deporte_a.control',compact('control'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function eliminados(){
        try{
            $eliminar = Deporte_Adoptado::where('estado', 'inactivo')->get();
            return view('configuraciones.deporte_a.eliminados',compact('eliminar'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function restaurar(Request $request){
        DB::beginTransaction();
        try{
            Deporte_Adoptado::find(decrypt($request->e))->update(['estado'=>'activo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>8]);
            $control->save();
            DB::commit();
            return redirect()->action([Deporte_AdoptadoController::class,'index'])->with('success','Deporte adaptado restaurado exitosamente');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'Se produjo un error al restaurar al deporte adaptado');
        }
    }
}
