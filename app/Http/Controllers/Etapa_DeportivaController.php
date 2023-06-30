<?php

namespace App\Http\Controllers;

use App\Models\Etapa_Deportiva;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Control;
use Illuminate\Support\Facades\DB;

class Etapa_DeportivaController extends Controller
{
    protected $n;
    public function __construct(Etapa_Deportiva $n){
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
            $etapa = Etapa_Deportiva::where('estado','activo')->get(['id','nombre']);
            return view('configuraciones.etapadep.show',compact('etapa'));
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
            $hoy = Carbon::now()->toDateString();
            return view('configuraciones.etapadep.create', compact('hoy'));
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
                'nombre'=>['unique:etapa_deportiva'],
            ]);
            $etapa = new Etapa_Deportiva(['nombre' => $request->nombre]);
            $etapa->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>15]);
            $control->save();
            DB::commit();
            return redirect()->action([Etapa_DeportivaController::class, 'index'])->with('success','Etapa deportiva registrada exitosamente');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'Se produjo un error al registrar a la etapa deportiva');
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
            $etapa = Etapa_Deportiva::find(decrypt($id));
            return view('configuraciones.etapadep.edit',['etapa' => $etapa]);
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
            $etapa = Etapa_Deportiva::find(decrypt($id));
            $etapa ->fill(['nombre' => $request->nombre]);
            $etapa->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>15]);
            $control->save();
            DB::commit();
            return redirect()->action([Etapa_DeportivaController::class,'index'])->with('success','Etapa deportiva actualizada exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al actualizar la información de la etapa deportiva');
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
            Etapa_Deportiva::find(decrypt($id))->update(['estado' => 'inactivo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>15]);
            $control->save();
            DB::commit();
            return redirect()->action([Etapa_DeportivaController::class,'index'])->with('success','Etapa deportiva eliminada exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al eliminar a la etapa deportiva');
        }
    }

    public function acciones(){
        try{
            $control = Control::where('tabla_accion_id',15)->with('usuario')->paginate(5);
            return view('configuraciones.etapadep.control',compact('control'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function eliminados(){
        try{
            $eliminar = Etapa_Deportiva::where('estado', 'inactivo')->get();
            return view('configuraciones.etapadep.eliminados',compact('eliminar'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function restaurar(Request $request){
        DB::beginTransaction();
        try{
            Etapa_Deportiva::find(decrypt($request->e))->update(['estado'=>'activo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'RESTAURAR', 'tabla_accion_id'=>15]);
            $control->save();
            DB::commit();
            return redirect()->action([Etapa_DeportivaController::class,'index'])->with('success','Etapa deportiva restaurada exitosamente');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'Se produjo un error al restaurar a la etapa deportiva');
        }
    }
}
