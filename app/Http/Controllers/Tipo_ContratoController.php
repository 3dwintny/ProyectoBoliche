<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo_Contrato;
use Carbon\Carbon;
use App\Models\Control;
use Illuminate\Support\Facades\DB;

class Tipo_ContratoController extends Controller
{
    protected $t;
    public function __construct(Tipo_Contrato $t){
        $this->t = $t;  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $tipos = Tipo_Contrato::where('estado','activo')->get(['id','descripcion']);
            return view('configuraciones.tipos_contratos.show', compact('tipos'));
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
            return view('configuraciones.tipos_contratos.create', compact('hoy'));
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
                'descripcion'=>['unique:tipo_contrato'],
            ]);
            $contratos = new Tipo_Contrato(['descripcion' => $request->descripcion]);
            $contratos->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>30]);
            $control->save();
            DB::commit();
            return redirect()->action([Tipo_ContratoController::class, 'index'])->with('success','Tipo de contrato registrado exitosamente');
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
    public function edit($id,Request $request)
    {
        try{
            $contratos = $this->t->obtenerTipoContratoById(decrypt($id));
            return view('configuraciones.tipos_contratos.edit',['contratos' => $contratos]);
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
            $contratos = Tipo_Contrato::find(decrypt($id));
            $contratos ->fill(['descripcion' => $request->descripcion]);
            $contratos->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>30]);
            $control->save();
            DB::commit();
            return redirect()->action([Tipo_ContratoController::class,'index'])->with('success','Tipo de contrato actualizado exitosamente');
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
            Tipo_Contrato::find(decrypt($id))->update(['estado' => 'inactivo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>30]);
            $control->save();
            DB::commit();
            return redirect()->action([Tipo_ContratoController::class,'index'])->with('success','Tipo de contrato eliminado exitosamente');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'Se produjo un error al eliminar al tipo de contrato');
        }
    }

    public function acciones(){
        try{
            $control = Control::where('tabla_accion_id',30)->with('usuario')->paginate(5);
            return view('configuraciones.tipos_contratos.control',compact('control'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function eliminados(){
        try{
            $eliminar = Tipo_Contrato::where('estado', 'inactivo')->get();
            return view('configuraciones.tipos_contratos.eliminados',compact('eliminar'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function restaurar(Request $request){
        DB::beginTransaction();
        try{
            Tipo_Contrato::find(decrypt($request->e))->update(['estado'=>'activo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'RESTAURAR', 'tabla_accion_id'=>30]);
            $control->save();
            DB::commit();
            return redirect()->action([Tipo_ContratoController::class,'index'])->with('success','Tipo de contrato restaurado exitosamente');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'Se produjo un error al restaurar al tipo de contrato');
        }
    }
}