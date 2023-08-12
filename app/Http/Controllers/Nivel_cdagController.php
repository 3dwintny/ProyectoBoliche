<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nivel_cdag;
use Carbon\Carbon;
use App\Models\Control;
use Illuminate\Support\Facades\DB;

class Nivel_cdagController extends Controller
{
    protected $n;
    public function __construct(Nivel_cdag $n){
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
            $niveles = Nivel_cdag::where('estado','activo')->get(['id','nombre']);
            return view('configuraciones.nivel_cdag.show', compact('niveles'));
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
            return view('configuraciones.nivel_cdag.create', compact('hoy'));
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
                'nombre'=>['unique:nivel_cdag'],
            ]);
            $nivel = new Nivel_cdag(['nombre' => $request->nombre]);
            $nivel->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>22]);
            $control->save();
            DB::commit();
            return redirect()->action([Nivel_cdagController::class, 'index'])->with('success','Nivel CDAG registrado exitosamente');
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
            $nivel = $this->n->obtenerNivelCDAGById(decrypt($id));
            return view('configuraciones.nivel_cdag.edit',['nivel' => $nivel]);
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
            $nivel = Nivel_cdag::find(decrypt($id));
            $nivel ->fill(['nombre' => $request->nombre]);
            $nivel->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>22]);
            $control->save();
            DB::commit();
            return redirect()->action([Nivel_cdagController::class,'index'])->with('success','Nivel CDAG actualizado exitosamente');
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
            Nivel_cdag::find(decrypt($id))->update(['estado' => 'inactivo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>22]);
            $control->save();
            DB::commit(); 
            return redirect()->action([Nivel_cdagController::class,'index'])->with('success','Nivel CDAG eliminado exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al eliminar el nivel CDAG');
        }
    }

    public function acciones(){
        try{
            $control = Control::where('tabla_accion_id',22)->with('usuario')->paginate(5);
            return view('configuraciones.nivel_cdag.control',compact('control'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function eliminados(){
        try{
            $eliminar = Nivel_cdag::where('estado', 'inactivo')->get();
            return view('configuraciones.nivel_cdag.eliminados',compact('eliminar'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function restaurar(Request $request){
        DB::beginTransaction();
        try{
            Nivel_cdag::find(decrypt($request->e))->update(['estado'=>'activo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>22]);
            $control->save();
            DB::commit();   
            return redirect()->action([Nivel_cdagController::class,'index'])->with('success','Nivel CDAG restaurado exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al restaurar al nivel CDAG');
        }
    }
}