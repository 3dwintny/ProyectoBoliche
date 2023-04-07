<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nivel_cdag;
use Carbon\Carbon;
use App\Models\Control;

class Nivel_cdagController extends Controller
{
    protected $n;
    public function __construct(Nivel_cdag $n){
        $this->n = $n;  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $niveles = Nivel_cdag::where('estado','activo')->get(['id','nombre']);
        return view('configuraciones.nivel_cdag.show', compact('niveles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoy = Carbon::now()->toDateString();
        return view('configuraciones.nivel_cdag.create', compact('hoy'));
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
            'nombre'=>['unique:nivel_cdag'],
        ]);
        $nivel = new Nivel_cdag(['nombre' => $request->nombre]);
        $nivel->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>22]);
        $control->save();
        return redirect()->action([Nivel_cdagController::class, 'index']);
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
        $nivel = $this->n->obtenerNivelCDAGById(decrypt($id));
        return view('configuraciones.nivel_cdag.edit',['nivel' => $nivel]);
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
        $nivel = Nivel_cdag::find(decrypt($id));
        $nivel ->fill(['nombre' => $request->nombre]);
        $nivel->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>22]);
        $control->save();
        return redirect()->action([Nivel_cdagController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Nivel_cdag::find(decrypt($id))->update(['estado' => 'inactivo']);
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>22]);
        $control->save();
        return redirect()->action([Nivel_cdagController::class,'index']);
    }

    public function acciones(){
        $control = Control::where('tabla_accion_id',22)->with('usuario')->paginate(5);
        return view('configuraciones.nivel_cdag.control',compact('control'));
    }

    public function eliminados(){
        $eliminar = Nivel_cdag::where('estado', 'inactivo')->get();
        return view('configuraciones.nivel_cdag.eliminados',compact('eliminar'));
    }

    public function restaurar(Request $request){
        Nivel_cdag::find(decrypt($request->e))->update(['estado'=>'activo']);
        return redirect()->action([Nivel_cdagController::class,'index']);
    }
}