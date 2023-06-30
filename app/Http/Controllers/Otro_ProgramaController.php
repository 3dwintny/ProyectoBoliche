<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Otro_Programa;
use Carbon\Carbon;
use App\Models\Control;
use Illuminate\Support\Facades\DB;

class Otro_ProgramaController extends Controller
{
    protected $o;
    public function __construct(Otro_Programa $o){
        $this->o = $o;  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $programas = Otro_Programa::where('estado','activo')->get(['id','nombre']);
            return view('configuraciones.otros_programas.show',compact('programas'));
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
            return view('configuraciones.otros_programas.create', compact('hoy'));
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
                'nombre'=>['unique:otro_programa'],
            ]);
            $programas = new Otro_Programa(['nombre' => $request->nombre]);
            $programas->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>24]);
            $control->save();
            DB::commit();
            return redirect()->action([Otro_ProgramaController::class, 'index'])->with('success','Programa de atención registrado exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al registrar al programa de atención');
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
            $otro_programa = $this->o->obtenerOtroProgramaById(decrypt($id));
            return view('configuraciones.otros_programas.edit',['otro_programa' => $otro_programa]);
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
            $otro_programa = Otro_Programa::find(decrypt($id));
            $otro_programa ->fill(['nombre' => $request->nombre]);
            $otro_programa->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>24]);
            $control->save();
            DB::commit();
            return redirect()->action([Otro_ProgramaController::class,'index'])->with('success','Programa de atención actualizado exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al actualizar la información del programa de atención');
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
            Otro_Programa::find(decrypt($id))->update(['estado' => 'inactivo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>24]);
            $control->save();
            DB::commit();
            return redirect()->action([Otro_ProgramaController::class,'index'])->with('success','Programa de atención eliminado exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al eliminar al programa de atención');
        }
    }

    public function acciones(){
        try{
            $control = Control::where('tabla_accion_id',24)->with('usuario')->paginate(5);
            return view('configuraciones.otros_programas.control',compact('control'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function eliminados(){
        try{
            $eliminar = Otro_Programa::where('estado', 'inactivo')->get();
            return view('configuraciones.otros_programas.eliminados',compact('eliminar'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function restaurar(Request $request){
        DB::beginTransaction();
        try{
            Otro_Programa::find(decrypt($request->e))->update(['estado'=>'activo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'RESTAURAR', 'tabla_accion_id'=>24]);
            $control->save();
            DB::commit();
            return redirect()->action([Otro_ProgramaController::class,'index'])->with('success','Programa de atención restaurado exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al restaurar al programa de atención');
        }
    }
}