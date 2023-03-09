<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo_Contrato;
use Carbon\Carbon;
use Hashids\Hashids;
use App\Models\Control;

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
        $tipos = Tipo_Contrato::where('estado','activo')->get();
        return view('configuraciones.tipos_contratos.show', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoy = Carbon::now()->toDateString();
        return view('configuraciones.tipos_contratos.create', compact('hoy'));
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
            'descripcion'=>['unique:tipo_contrato'],
        ]);
        $contratos = new Tipo_Contrato($request->all());
        $contratos->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>30]);
        $control->save();
        return redirect()->action([Tipo_ContratoController::class, 'index']);
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
        $contratos = $this->t->obtenerTipoContratoById($id);
        return view('configuraciones.tipos_contratos.edit',['contratos' => $contratos]);
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
        $contratos = Tipo_Contrato::find($id);
        $contratos ->fill($request->all());
        $contratos->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>30]);
        $control->save();
        return redirect()->action([Tipo_ContratoController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tipo_Contrato::find($id)->update(['estado' => 'inactivo']);
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>30]);
        $control->save();
        return redirect()->action([Tipo_ContratoController::class,'index']);
    }

    public function acciones(){
        $control = Control::where('tabla_accion_id',30)->with('usuario')->paginate(5);
        return view('configuraciones.tipos_contratos.control',compact('control'));
    }

    public function eliminados(){
        $eliminar = Tipo_Contrato::where('estado', 'inactivo')->get();
        return view('configuraciones.tipos_contratos.eliminados',compact('eliminar'));
    }

    public function restaurar(Request $request){
        $idEncriptado = $request->e;
        $hashid = new Hashids();
        $idDesencriptado = $hashid->decode($idEncriptado);
        $id = $idDesencriptado[0];
        Tipo_Contrato::find($id)->update(['estado'=>'activo']);
        return redirect()->action([Tipo_ContratoController::class,'index']);
    }
}