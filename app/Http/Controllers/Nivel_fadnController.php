<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Nivel_fadn;
use App\Models\Control;

class Nivel_fadnController extends Controller
{
    protected $n;
    public function __construct(Nivel_fadn $n){
        $this->n = $n;  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $niveles = Nivel_fadn::where('estado','activo')->get(['id','tipo']);
        return view('configuraciones.nivel_fadn.show', compact('niveles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoy = Carbon::now()->toDateString();
        return view('configuraciones.nivel_fadn.create', compact('hoy'));
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
            'tipo'=>['unique:nivel_fadn'],
        ]);
        $nivel = new Nivel_fadn(['tipo' => $request->tipo]);
        $nivel->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>23]);
        $control->save();
        return redirect()->action([Nivel_fadnController::class, 'index']);
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
        $nivel = $this->n->obtenerNivelFADNById(decrypt($id));
        return view('configuraciones.nivel_fadn.edit',['nivel' => $nivel]);
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
        $nivel = Nivel_fadn::find(decrypt($id));
        $nivel ->fill(['tipo' => $request->tipo]);
        $nivel->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>23]);
        $control->save();
        return redirect()->action([Nivel_fadnController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Nivel_fadn::find(decrypt($id))->update(['estado' => 'inactivo']);
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>23]);
        $control->save();
        return redirect()->action([Nivel_fadnController::class,'index']);
    }

    public function acciones(){
        $control = Control::where('tabla_accion_id',23)->with('usuario')->paginate(5);
        return view('configuraciones.nivel_fadn.control',compact('control'));
    }

    public function eliminados(){
        $eliminar = Nivel_fadn::where('estado', 'inactivo')->get();
        return view('configuraciones.nivel_fadn.eliminados',compact('eliminar'));
    }

    public function restaurar(Request $request){
        Nivel_fadn::find(decrypt($request->e))->update(['estado'=>'activo']);
        return redirect()->action([Nivel_fadnController::class,'index']);
    }
}