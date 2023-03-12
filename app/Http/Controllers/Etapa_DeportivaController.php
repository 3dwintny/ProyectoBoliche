<?php

namespace App\Http\Controllers;

use App\Models\Etapa_Deportiva;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Control;

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
        $etapa = Etapa_Deportiva::where('estado','activo')->get(['id','nombre']);
        return view('configuraciones.etapadep.show',compact('etapa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoy = Carbon::now()->toDateString();
        return view('configuraciones.etapadep.create', compact('hoy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>['unique:etapa_deportiva'],
        ]);
        $etapa = new Etapa_Deportiva(['nombre' => $request->nombre]);
        $etapa->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>15]);
        $control->save();
        return redirect()->action([Etapa_DeportivaController::class, 'index']);
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
        $etapa = Etapa_Deportiva::find(decrypt($id));
        return view('configuraciones.etapadep.edit',['etapa' => $etapa]);
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
        $etapa = Etapa_Deportiva::find(decrypt($id));
        $etapa ->fill(['nombre' => $request->nombre]);
        $etapa->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>15]);
        $control->save();
        return redirect()->action([Etapa_DeportivaController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Etapa_Deportiva::find(decrypt($id))->update(['estado' => 'inactivo']);
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>15]);
        $control->save();
        return redirect()->action([Etapa_DeportivaController::class,'index']);
    }

    public function acciones(){
        $control = Control::where('tabla_accion_id',15)->with('usuario')->paginate(5);
        return view('configuraciones.etapadep.control',compact('control'));
    }

    public function eliminados(){
        $eliminar = Etapa_Deportiva::where('estado', 'inactivo')->get();
        return view('configuraciones.etapadep.eliminados',compact('eliminar'));
    }

    public function restaurar(Request $request){
        Etapa_Deportiva::find(decrypt($request->e))->update(['estado'=>'activo']);
        return redirect()->action([Etapa_DeportivaController::class,'index']);
    }
}
