<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Linea_Desarrollo;
use Carbon\Carbon;
use App\Models\Control;
use Illuminate\Support\Facades\DB;

class Linea_DesarrolloController extends Controller
{
    protected $lD;
    public function __construct(Linea_Desarrollo $lD){
        $this->lD = $lD;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $lineaDesarrollo = Linea_Desarrollo::where('estado','activo')->get(['id','tipo']);
            return view('configuraciones.linea_desarrollo.show',compact('lineaDesarrollo'));
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
            return view('configuraciones.linea_desarrollo.create',compact('hoy'));
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
                'tipo'=>['unique:linea_desarrollo'],
            ]);
            $lineaDesarrollo = new Linea_Desarrollo(['tipo'=> $request->tipo]);
            $lineaDesarrollo->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>18]);
            $control->save();
            DB::commit();
            return redirect()->action([Linea_DesarrolloController::class,'index'])->with('success','Línea de desarrollo registrada exitosamente');
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
            $lineaDesarrollo = $this->lD->obtenerLineaDesarrolloById(decrypt($id));
            return view('configuraciones.linea_desarrollo.edit',['lineaDesarrollo' => $lineaDesarrollo]);
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
            $lineaDesarrollo = Linea_Desarrollo::find(decrypt($id));
            $lineaDesarrollo->fill(['tipo' =>$request->tipo]);
            $lineaDesarrollo->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>18]);
            $control->save();
            DB::commit();
            return redirect()->action([Linea_DesarrolloController::class,'index'])->with('success','Línea de desarrollo actualizada exitosamente');
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
            Linea_Desarrollo::find(decrypt($id))->update(['estado' => 'inactivo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>18]);
            $control->save();
            DB::commit();
            return redirect()->action([Linea_DesarrolloController::class,'index'])->with('success','Línea de desarrollo eliminada exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al eliminar la línea de desarrollo');
        }
    }

    public function acciones(){
        try{
            $control = Control::where('tabla_accion_id',18)->with('usuario')->paginate(5);
            return view('configuraciones.linea_desarrollo.control',compact('control'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function eliminados(){
        try{
            $eliminar = Linea_Desarrollo::where('estado', 'inactivo')->get();
            return view('configuraciones.linea_desarrollo.eliminados',compact('eliminar'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function restaurar(Request $request){
        DB::beginTransaction();
        try{
            Linea_Desarrollo::find(decrypt($request->e))->update(['estado'=>'activo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'RESTAURAR', 'tabla_accion_id'=>18]);
            $control->save();
            DB::commit();
            return redirect()->action([Linea_DesarrolloController::class,'index'])->with('success','Línea de desarrollo restaurada exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al restaurar la línea de desarrollo');
        }
    }
}
