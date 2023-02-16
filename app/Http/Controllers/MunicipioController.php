<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipio;
use App\Models\Departamento;
use Hashids\Hashids;
use App\Models\Control;
use Carbon\Carbon;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipio = Municipio::where('estado','activo')->with('departamento')->paginate(6);
        return view('configuraciones.municipio.show',compact('municipio')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamento::where('estado','activo')->get();
        return view('configuraciones.municipio.create',compact("departamentos"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $municipios = new Municipio($request->all());
        $municipios->save();
        $fecha = Carbon::now()->format('Y-m-d');
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR','Fecha'=>$fecha, 'tabla_accion_id'=>20]);
        $control->save();
        return redirect()->action([MunicipioController::class,'index']);
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
        $municipio = Municipio::find($id);
        $departamentos = Departamento::where('estado','activo')->get();
        return view('configuraciones.municipio.edit',compact('municipio','departamentos'));
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
        $municipio = Municipio::find($id);
        $municipio->fill($request->all());
        $municipio->save();
        $fecha = Carbon::now()->format('Y-m-d');
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR','Fecha'=>$fecha, 'tabla_accion_id'=>20]);
        $control->save();
        return redirect()->action([MunicipioController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Municipio::find($id)->update(['estado' => 'inactivo']);
        $fecha = Carbon::now()->format('Y-m-d');
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR','Fecha'=>$fecha, 'tabla_accion_id'=>20]);
        $control->save();
        return redirect()->action([MunicipioController::class,'index']);
    }
}
