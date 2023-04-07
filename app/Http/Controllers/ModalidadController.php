<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modalidad;
use Carbon\Carbon;
use App\Models\Control;

class ModalidadController extends Controller
{
    protected $m;

    public function __construct (Modalidad $m){
        $this->m = $m;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modalidad = Modalidad::where('estado','activo')->get(['id','nombre','medio_comunicacion']);
        return view('configuraciones.modalidad.show',compact('modalidad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoy = Carbon::now();
        return view('configuraciones.modalidad.create',compact('hoy'));
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
            'nombre'=>['unique:modalidad'],
        ]);
        $modalidad = new Modalidad(['nombre' => $request->nombre,'medio_comunicacion' => $request->medio_comunicacion]);
        $modalidad->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>19]);
        $control->save();
        return redirect()->action([ModalidadController::class,'index']);
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
        $modalidad = $this->m->obtenerModalidadById(decrypt($id));
        return view('configuraciones.modalidad.edit',['modalidad' => $modalidad]);
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
        $modalidad = Modalidad::find(decrypt($id));
        $modalidad->fill(['nombre' => $request->nombre,'medio_comunicacion' => $request->medio_comunicacion]);
        $modalidad->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>19]);
        $control->save();
        return redirect()->action([ModalidadController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Modalidad::find(decrypt($id))->update(['estado' => 'inactivo']);
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>19]);
        $control->save();
        return redirect()->action([ModalidadController::class,'index']);
    }

    public function acciones(){
        $control = Control::where('tabla_accion_id',19)->with('usuario')->paginate(5);
        return view('configuraciones.modalidad.control',compact('control'));
    }

    public function eliminados(){
        $eliminar = Modalidad::where('estado', 'inactivo')->get();
        return view('configuraciones.modalidad.eliminados',compact('eliminar'));
    }

    public function restaurar(Request $request){
        Modalidad::find(decrypt($request->e))->update(['estado'=>'activo']);
        return redirect()->action([ModalidadController::class,'index']);
    }
}
