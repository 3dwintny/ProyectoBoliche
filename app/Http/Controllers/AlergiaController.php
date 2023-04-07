<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alergia;
use App\Models\Control;
use Carbon\Carbon;

class AlergiaController extends Controller
{
    protected $a;
    public function __construct(Alergia $a){
        $this->a = $a;
    }
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alergia = Alergia::where('estado', 'activo')->get(['id','nombre','descripcion']);
        return view('configuraciones.alergia.show',compact("alergia"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoy = Carbon::now();
        return view('configuraciones.alergia.create', compact("hoy"));
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
            'nombre' => ['unique:alergia']
        ]);
        $alergia = new Alergia($request->all());
        $alergia->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>1]);
        $control->save();
        return redirect()->action([AlergiaController::class,'index']);
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
        $alergia = $this->a->obtenerAlergiaById(decrypt($id));
        return view('configuraciones.alergia.edit',['alergia'=>$alergia]);
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
        $alergia = Alergia::find(decrypt($id));
        $alergia->fill($request->all());
        $alergia->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>1]);
        $control->save();
        return redirect()->action([AlergiaController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alergia::find(decrypt($id))->update(['estado'=>'inactivo']);
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>1]);
        $control->save();
        return redirect()->action([AlergiaController::class,'index']);
    }

    public function acciones(){
        $control = Control::where('tabla_accion_id',1)->with('usuario')->paginate(5);
        return view('configuraciones.alergia.control',compact('control'));
    }

    public function eliminados(){
        $eliminar = Alergia::where('estado', 'inactivo')->get();
        return view('configuraciones.alergia.eliminados',compact('eliminar'));
    }

    public function restaurar(Request $request){
        Alergia::find(decrypt($request->e))->update(['estado'=>'activo']);
        return redirect()->action([AlergiaController::class,'index']);
    }
}
