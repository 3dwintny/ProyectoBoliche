<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Otro_Programa;
use Carbon\Carbon;
use Hashids\Hashids;
use App\Models\Control;

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
        $programas = Otro_Programa::where('estado','activo')->get();
        return view('configuraciones.otros_programas.show',compact('programas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoy = Carbon::now()->toDateString();
        return view('configuraciones.otros_programas.create', compact('hoy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $programas = new Otro_Programa($request->all());
        $programas->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>24]);
        $control->save();
        return redirect()->action([Otro_ProgramaController::class, 'index']);
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
        $idEncriptado = $request->e;
        $hashid = new Hashids();
        $idDesencriptado = $hashid->decode($idEncriptado);
        $id = $idDesencriptado[0];
        $otro_programa = $this->o->obtenerOtroProgramaById($id);
        return view('configuraciones.otros_programas.edit',['otro_programa' => $otro_programa]);
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
        $otro_programa = Otro_Programa::find($id);
        $otro_programa ->fill($request->all());
        $otro_programa->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>24]);
        $control->save();
        return redirect()->action([Otro_ProgramaController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Otro_Programa::find($id)->update(['estado' => 'inactivo']);
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>24]);
        $control->save();
        return redirect()->action([Otro_ProgramaController::class,'index']);
    }

    public function acciones(){
        $control = Control::where('tabla_accion_id',24)->with('usuario')->paginate(5);
        return view('configuraciones.alergia.control',compact('control'));
    }
}