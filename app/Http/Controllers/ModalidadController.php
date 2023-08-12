<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modalidad;
use Carbon\Carbon;
use App\Models\Control;
use Illuminate\Support\Facades\DB;

class ModalidadController extends Controller
{
    protected $m;

    public function __construct (Modalidad $m){
        $this->m = $m;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $modalidad = Modalidad::where('estado','activo')->get(['id','nombre','medio_comunicacion']);
            return view('configuraciones.modalidad.show',compact('modalidad'));
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
            return view('configuraciones.modalidad.create',compact('hoy'));
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
                'nombre'=>['unique:modalidad'],
            ]);
            $modalidad = new Modalidad(['nombre' => $request->nombre,'medio_comunicacion' => $request->medio_comunicacion]);
            $modalidad->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>19]);
            $control->save();
            DB::commit();
            return redirect()->action([ModalidadController::class,'index'])->with('success','Modalidad registrada exitosamente');
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
    public function edit($id)
    {
        try{
            $modalidad = $this->m->obtenerModalidadById(decrypt($id));
            return view('configuraciones.modalidad.edit',['modalidad' => $modalidad]);
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
            $modalidad = Modalidad::find(decrypt($id));
            $modalidad->fill(['nombre' => $request->nombre,'medio_comunicacion' => $request->medio_comunicacion]);
            $modalidad->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>19]);
            $control->save();
            DB::commit();
            return redirect()->action([ModalidadController::class,'index'])->with('success','Modalidad actualizada exitosamente');
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
            Modalidad::find(decrypt($id))->update(['estado' => 'inactivo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>19]);
            $control->save();
            DB::commit();
            return redirect()->action([ModalidadController::class,'index'])->with('success','Modalidad eliminada exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al eliminar la modalidad');
        }
    }

    public function acciones(){
        try{
            $control = Control::where('tabla_accion_id',19)->with('usuario')->paginate(5);
            return view('configuraciones.modalidad.control',compact('control'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function eliminados(){
        try{
            $eliminar = Modalidad::where('estado', 'inactivo')->get();
            return view('configuraciones.modalidad.eliminados',compact('eliminar'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function restaurar(Request $request){
        DB::beginTransaction();
        try{
            Modalidad::find(decrypt($request->e))->update(['estado'=>'activo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'RESTAURAR', 'tabla_accion_id'=>19]);
            $control->save();
            DB::commit();
            return redirect()->action([ModalidadController::class,'index'])->with('success','Modalidad restaurada exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al restaurar la modalidad');
        }
    }
}
