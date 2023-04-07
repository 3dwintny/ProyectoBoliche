<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PRT;
use Carbon\Carbon;
use App\Models\Control;

class PRTController extends Controller
{
    protected $p;
    public function __construct(PRT $p){
        $this->p = $p;  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prts = PRT::where('estado','activo')->get(['id','nombre']);
        return view('configuraciones.prt.show', compact('prts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoy = Carbon::now()->toDateString();
        return view('configuraciones.prt.create', compact('hoy'));
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
            'nombre'=>['unique:prt'],
        ]);
        $prt = new PRT(['nombre' => $request->nombre]);
        $prt->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>26]);
        $control->save();
        return redirect()->action([PRTController::class, 'index']);
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
        $prt = $this->p->obtenerPRTById(decrypt($id));
        return view('configuraciones.prt.edit',['prt' => $prt]);
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
        $prt = PRT::find(decrypt($id));
        $prt ->fill(['nombre' => $request->nombre]);
        $prt->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>26]);
        $control->save();
        return redirect()->action([PRTController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PRT::find(decrypt($id))->update(['estado' => 'inactivo']);
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>26]);
        $control->save();
        return redirect()->action([PRTController::class,'index']);
    }

    public function acciones(){
        $control = Control::where('tabla_accion_id',26)->with('usuario')->paginate(5);
        return view('configuraciones.prt.control',compact('control'));
    }

    public function eliminados(){
        $eliminar = PRT::where('estado', 'inactivo')->get();
        return view('configuraciones.prt.eliminados',compact('eliminar'));
    }

    public function restaurar(Request $request){
        PRT::find(decrypt($request->e))->update(['estado'=>'activo']);
        return redirect()->action([PRTController::class,'index']);
    }
}