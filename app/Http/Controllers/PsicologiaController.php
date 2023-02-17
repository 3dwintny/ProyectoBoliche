<?php

namespace App\Http\Controllers;

use App\Models\Psicologia;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Hashids\Hashids;
use App\Models\Control;

class PsicologiaController extends Controller
{
    protected $p;
    public function __construct(Psicologia $p){
        $this->p = $p;  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $psicologo = Psicologia::where('estado','activo')->paginate(5);
        return view('configuraciones.psicologia.show', compact('psicologo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoy = Carbon::now();
        return view('configuraciones.psicologia.create',compact('hoy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $psicologo = new Psicologia($request->all());
        $psicologo->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>27]);
        $control->save();
        return redirect()->action([PsicologiaController::class,'index']);
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
        $idEncriptado = $request->e;
        $hashid = new Hashids();
        $idDesencriptado = $hashid->decode($idEncriptado);
        $id = $idDesencriptado[0];
        $psicologo = $this->p->obtenerPsicologiaById($id);
        return view('configuraciones.psicologia.edit',['psicologo' => $psicologo]);
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
        $psicologo = Psicologia::find($id);
        $psicologo ->fill($request->all());
        $psicologo->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>27]);
        $control->save();
        return redirect()->action([PsicologiaController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Psicologia::find($id)->update(['estado' => 'inactivo']);
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>27]);
        $control->save();
        return redirect()->action([PsicologiaController::class,'index']);
    }

    public function acciones(){
        $control = Control::where('tabla_accion_id',27)->with('usuario')->paginate(5);
        return view('configuraciones.alergia.control',compact('control'));
    }
}