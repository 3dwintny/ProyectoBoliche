<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use Carbon\Carbon;
use App\Models\Control;

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
        $horario = Horario::where('estado','activo')->get(['id','hora_inicio','hora_fin','lunes','martes','miercoles','jueves','viernes','sabado','domingo']);
        return view('configuraciones.horario.show', compact('horario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoy = Carbon::now();
        return view('configuraciones.horario.create',compact('hoy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        return redirect()->back();
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
        $horario = $this->h->obtenerHorarioById(decrypt($id));
        return view('configuraciones.horario.edit',['horario'=>$horario]);
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
        return redirect()->action([HorarioController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Horario::find(decrypt($id))->update(['estado' => 'inactivo']);
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>17]);
        $control->save();
        return redirect()->action([HorarioController::class,'index']);
    }

    public function acciones(){
        $control = Control::where('tabla_accion_id',17)->with('usuario')->paginate(5);
        return view('configuraciones.horario.control',compact('control'));
    }

    public function eliminados(){
        $eliminar = Horario::where('estado', 'inactivo')->get();
        return view('configuraciones.horario.eliminados',compact('eliminar'));
    }

    public function restaurar(Request $request){
        Horario::find(decrypt($request->e))->update(['estado'=>'activo']);
        return redirect()->action([HorarioController::class,'index']);
    }
}
