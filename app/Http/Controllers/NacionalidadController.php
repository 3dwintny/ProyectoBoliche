<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nacionalidad;
use Carbon\Carbon;
use Hashids\Hashids;
use App\Models\Control;

class NacionalidadController extends Controller
{
    protected $n;
    public function __construct(Nacionalidad $n){
        $this->n = $n;  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nacionalidad = Nacionalidad::where('estado','activo')->get();
        return view('configuraciones.nacionalidad.show',compact('nacionalidad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoy = Carbon::now()->toDateString();
        return view('configuraciones.nacionalidad.create', compact('hoy'));
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
            'descripcion'=>['unique:nacionalidad'],
        ]);
        $nacionalidad = new Nacionalidad($request->all());
        $nacionalidad->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>21]);
        $control->save();
        return redirect()->action([NacionalidadController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        $nacionalidad = $this->n->obtenerNacionalidadesById($id);
        return view('configuraciones.nacionalidad.edit',['nacionalidad' => $nacionalidad]);
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
        $nacionalidad = Nacionalidad::find($id);
        $nacionalidad ->fill($request->all());
        $nacionalidad->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>21]);
        $control->save();
        return redirect()->action([NacionalidadController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Nacionalidad::find($id)->update(['estado' => 'inactivo']);
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>21]);
        $control->save();
        return redirect()->action([NacionalidadController::class,'index']);
    }

    public function acciones(){
        $control = Control::where('tabla_accion_id',21)->with('usuario')->paginate(5);
        return view('configuraciones.nacionalidad.control',compact('control'));
    }

    public function eliminados(){
        $eliminar = Nacionalidad::where('estado', 'inactivo')->get();
        return view('configuraciones.nacionalidad.eliminados',compact('eliminar'));
    }

    public function restaurar(Request $request){
        $idEncriptado = $request->e;
        $hashid = new Hashids();
        $idDesencriptado = $hashid->decode($idEncriptado);
        $id = $idDesencriptado[0];
        Nacionalidad::find($id)->update(['estado'=>'activo']);
        return redirect()->action([NacionalidadController::class,'index']);
    }
}