<?php

namespace App\Http\Controllers;

use App\Models\Deporte;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Hashids\Hashids;
use App\Models\Control;

class DeporteController extends Controller
{
    protected $n;
    public function __construct(Deporte $n){
        $this->n = $n;  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $deporte = Deporte::where('estado','activo')->get();
        return view('configuraciones.deporte.show',compact('deporte'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoy = Carbon::now();
        return view('configuraciones.deporte.create', compact('hoy'));
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
            'nombre' => ['unique:deporte'],
        ]);
        $deporte = new Deporte($request->all());
        $deporte->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>9]);
        $control->save();
        return redirect()->action([DeporteController::class, 'index']);
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
        $deporte = Deporte::find($id);
        return view('configuraciones.deporte.edit',['deporte' => $deporte]);
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
        $deporte = Deporte::find($id);
        $deporte ->fill($request->all());
        $deporte->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>9]);
        $control->save();
        return redirect()->action([DeporteController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Deporte::find($id)->update(['estado' => 'inactivo']);
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>9]);
        $control->save();
        return redirect()->action([DeporteController::class,'index']);
    }

    public function acciones(){
        $control = Control::where('tabla_accion_id',9)->with('usuario')->paginate(5);
        return view('configuraciones.deporte.control',compact('control'));
    }
}
