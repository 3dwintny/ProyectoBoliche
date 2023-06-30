<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nacionalidad;
use Carbon\Carbon;
use App\Models\Control;
use Illuminate\Support\Facades\DB;

class NacionalidadController extends Controller
{
    protected $n;
    public function __construct(Nacionalidad $n){
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
            $nacionalidad = Nacionalidad::where('estado','activo')->get(['id','descripcion']);
            return view('configuraciones.nacionalidad.show',compact('nacionalidad'));
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
            return view('configuraciones.nacionalidad.create', compact('hoy'));
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
            'descripcion'=>['unique:nacionalidad'],
            ]);
            $nacionalidad = new Nacionalidad(['descripcion' => $request->descripcion]);
            $nacionalidad->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>21]);
            $control->save();
            DB::commit();
            return redirect()->action([NacionalidadController::class, 'index'])->with('success','Nacionalidad registrada exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al registrar la nacionalidad');
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
            $nacionalidad = $this->n->obtenerNacionalidadesById(decrypt($id));
            return view('configuraciones.nacionalidad.edit',['nacionalidad' => $nacionalidad]);
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
            $nacionalidad = Nacionalidad::find(decrypt($id));
            $nacionalidad ->fill(['descripcion' => $request->descripcion]);
            $nacionalidad->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>21]);
            $control->save();
            DB::commit();
            return redirect()->action([NacionalidadController::class,'index'])->with('success','Nacionalidad actualizada exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al actualizar la información de la nacionalidad');
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
            Nacionalidad::find(decrypt($id))->update(['estado' => 'inactivo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>21]);
            $control->save();
            DB::commit();
            return redirect()->action([NacionalidadController::class,'index'])->with('success','Nacionalidad eliminada exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al eliminar la nacionalidad');
        }
    }

    public function acciones(){
        try{
            $control = Control::where('tabla_accion_id',21)->with('usuario')->paginate(5);
            return view('configuraciones.nacionalidad.control',compact('control'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function eliminados(){
        try{
            $eliminar = Nacionalidad::where('estado', 'inactivo')->get();
            return view('configuraciones.nacionalidad.eliminados',compact('eliminar'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function restaurar(Request $request){
        DB::beginTransaction();
        try{
            Nacionalidad::find(decrypt($request->e))->update(['estado'=>'activo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'RESTAURAR', 'tabla_accion_id'=>21]);
            $control->save();
            DB::commit();
            return redirect()->action([NacionalidadController::class,'index'])->with('success','Nacionalidad restaurada exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al restaurar la nacionalidad');
        }
    }
}