<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Nivel_fadn;
use App\Models\Control;
use Illuminate\Support\Facades\DB;

class Nivel_fadnController extends Controller
{
    protected $n;
    public function __construct(Nivel_fadn $n){
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
            $niveles = Nivel_fadn::where('estado','activo')->get(['id','tipo']);
            return view('configuraciones.nivel_fadn.show', compact('niveles'));
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
            return view('configuraciones.nivel_fadn.create', compact('hoy'));
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
                'tipo'=>['unique:nivel_fadn'],
            ]);
            $nivel = new Nivel_fadn(['tipo' => $request->tipo]);
            $nivel->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>23]);
            $control->save();
            DB::commit();
            return redirect()->action([Nivel_fadnController::class, 'index'])->with('success','Nivel FADN registrado exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al registrar el nivell FADN');
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
            $nivel = $this->n->obtenerNivelFADNById(decrypt($id));
            return view('configuraciones.nivel_fadn.edit',['nivel' => $nivel]);
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
            $nivel = Nivel_fadn::find(decrypt($id));
            $nivel ->fill(['tipo' => $request->tipo]);
            $nivel->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>23]);
            $control->save();
            DB::commit();
            return redirect()->action([Nivel_fadnController::class,'index'])->with('success','Nivel FADN actualizado exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al actualizar la información del nivel FADN');
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
            Nivel_fadn::find(decrypt($id))->update(['estado' => 'inactivo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>23]);
            $control->save();
            DB::commit();
            return redirect()->action([Nivel_fadnController::class,'index'])->with('success','Nivel FADN eliminado exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al eliminar al nivel FADN');
        }
    }

    public function acciones(){
        try{
            $control = Control::where('tabla_accion_id',23)->with('usuario')->paginate(5);
            return view('configuraciones.nivel_fadn.control',compact('control'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function eliminados(){
        try{
            $eliminar = Nivel_fadn::where('estado', 'inactivo')->get();
            return view('configuraciones.nivel_fadn.eliminados',compact('eliminar'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function restaurar(Request $request){
        DB::beginTransaction();
        try{
            Nivel_fadn::find(decrypt($request->e))->update(['estado'=>'activo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'RESTAURAR', 'tabla_accion_id'=>23]);
            $control->save();
            DB::commit();
            return redirect()->action([Nivel_fadnController::class,'index'])->with('success','Nivel FADN restaurado exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al restaurar al nivel FADN');
        }
    }
}