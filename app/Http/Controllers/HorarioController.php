<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use Carbon\Carbon;
use App\Models\Control;
use Illuminate\Support\Facades\DB;

class HorarioController extends Controller
{
    protected $h;
    public function __construct(Horario $h){
        $this->h = $h;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $horario = Horario::where('estado','activo')->get(['id','hora_inicio','hora_fin','lunes','martes','miercoles','jueves','viernes','sabado','domingo']);
            return view('configuraciones.horario.show', compact('horario'));
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
            return view('configuraciones.horario.create',compact('hoy'));
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
            $horario = new Horario([
            'hora_inicio' => $request->hora_inicio,
            'hora_fin' => $request->hora_fin,
            'lunes' => $request->lunes,
            'martes' => $request->martes,
            'miercoles' => $request->miercoles,
            'jueves' => $request->jueves,
            'viernes' => $request->viernes,
            'sabado' => $request->sabado,
            'domingo' => $request->domingo,
            ]);
            $horario->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>17]);
            $control->save();
            DB::commit();
            return redirect()->back()->with('success','Horario de entrenamiento registrado exitosamente');
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
            $horario = $this->h->obtenerHorarioById(decrypt($id));
            return view('configuraciones.horario.edit',['horario'=>$horario]);
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
            $horario = Horario::find(decrypt($id));
            $horario->fill([
                'hora_inicio' => $request->hora_inicio,
                'hora_fin' => $request->hora_fin,
                'lunes' => $request->lunes,
                'martes' => $request->martes,
                'miercoles' => $request->miercoles,
                'jueves' => $request->jueves,
                'viernes' => $request->viernes,
                'sabado' => $request->sabado,
                'domingo' => $request->domingo,]);
            $horario->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>17]);
            $control->save();
            DB::commit();
            return redirect()->action([HorarioController::class,'index'])->with('success','Horario de entrenamiento actualizado exitosamente');
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
            Horario::find(decrypt($id))->update(['estado' => 'inactivo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>17]);
            $control->save();
            DB::commit();
            return redirect()->action([HorarioController::class,'index'])->with('success','Horario de entrenamiento eliminado exitosamente');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'Se produjo un error al eliminar al horario de entrenamiento');
        }
        
    }

    public function acciones(){
        try{
            $control = Control::where('tabla_accion_id',17)->with('usuario')->paginate(5);
            return view('configuraciones.horario.control',compact('control'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
        
    }

    public function eliminados(){
        try{
            $eliminar = Horario::where('estado', 'inactivo')->get();
            return view('configuraciones.horario.eliminados',compact('eliminar'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
        
    }

    public function restaurar(Request $request){
        DB::beginTransaction();
        try{
            Horario::find(decrypt($request->e))->update(['estado'=>'activo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'RESTAURAR', 'tabla_accion_id'=>17]);
            $control->save();
            DB::commit();
            return redirect()->action([HorarioController::class,'index'])->with('success','Horario de entrenamiento restaurado exitosamente');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'Se produjo un error al restaurar al horario de entrenamiento');
        }
        
    }
}
