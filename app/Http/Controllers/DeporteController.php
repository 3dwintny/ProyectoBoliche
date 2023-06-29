<?php

namespace App\Http\Controllers;

use App\Models\Deporte;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Control;
use Illuminate\Support\Facades\DB;

class DeporteController extends Controller
{
    protected $n;
    public function __construct(Deporte $n){
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
            $deporte = Deporte::where('estado','activo')->get(['id','nombre']);
            return view('configuraciones.deporte.show',compact('deporte'));
        }
        catch(\Exception $e){
            report($e);
            $this->addError('error','Se produjo un error al procesar la solicitud');
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
            return view('configuraciones.deporte.create', compact('hoy'));
        }
        catch(\Exception $e){
            report($e);
            $this->addError('error','Se produjo un error al procesar la solicitud');
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
            $deporte = new Deporte(['nombre' => $request->nombre]);
            $deporte->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>9]);
            $control->save();
            DB::commit();
            return redirect()->action([DeporteController::class, 'index'])->with('success','Deporte registrado exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            report($e);
            $this->addError('error','Se produjo un error al registrar el deporte');
        }
        $request->validate([
            'nombre' => ['unique:deporte'],
        ]);
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
        try{
            $deporte = Deporte::find(decrypt($id));
            return view('configuraciones.deporte.edit',['deporte' => $deporte]);
        }
        catch(\Exception $e){
            report($e);
            $this->addError('error','Se produjo un error al procesar la solicitud');
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
            $deporte = Deporte::find(decrypt($id));
            $deporte ->fill(['nombre' => $request->nombre]);
            $deporte->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>9]);
            $control->save();
            DB::commit();
            return redirect()->action([DeporteController::class,'index'])->with('success','Deporte actualizado exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            report($e);
            $this->addError('error','Se produjo un error al actualizar el deporte');
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
            Deporte::find(decrypt($id))->update(['estado' => 'inactivo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>9]);
            $control->save();
            DB::commit();
            return redirect()->action([DeporteController::class,'index'])->with('success','Deporte eliminado exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            report($e);
            $this->addError('error','Se produjo un error al eliminar el deporte');
        }
    }

    public function acciones(){
        try{
            $control = Control::where('tabla_accion_id',9)->with('usuario')->paginate(5);
            return view('configuraciones.deporte.control',compact('control'));
        }
        catch(\Exception $e){
            report($e);
            $this->addError('error','Se produjo un error al procesar la solicitud');
        }
    }

    public function eliminados(){
        try{
            $eliminar = Deporte::where('estado', 'inactivo')->get();
            return view('configuraciones.deporte.eliminados',compact('eliminar'));
        }
        catch(\Exception $e){
            report($e);
            $this->addError('error','Se produjo un error al procesar la solicitud');
        }
    }

    public function restaurar(Request $request){
        DB::beginTransaction();
        try{
            Deporte::find(decrypt($request->e))->update(['estado'=>'activo']);
            DB::commit();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'RESTAURAR', 'tabla_accion_id'=>9]);
            $control->save();
            return redirect()->action([DeporteController::class,'index'])->with('success','Deporte restaurado exitosamente');
        }
        catch(\Exception $e){
            DB::rollBack();
            report($e);
            $this->addError('error','Se produjo un error al restaurar el deporte');
        }
    }
}
