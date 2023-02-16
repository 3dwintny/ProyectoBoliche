<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Hashids\Hashids;
use Carbon\Carbon;
use App\Models\Control;

class CategoriaController extends Controller
{
    protected $c;

    public function __construct(Categoria $c){
        $this->c = $c;
    }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria = Categoria::where('estado','activo')->get();
        return view('configuraciones.categoria.show', compact("categoria"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoy = Carbon::now();
        return view('configuraciones.categoria.create',compact('hoy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = new Categoria($request->all());
        $categoria->save();
        $fecha = Carbon::now()->format('Y-m-d');
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR','Fecha'=>$fecha, 'tabla_accion_id'=>5]);
        $control->save();
        return redirect()->action([CategoriaController::class, 'index']);
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
        $categoria = $this->c->obtenerCategoriaById($id);
        return view('configuraciones.categoria.edit',['categoria' => $categoria]);
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
        $categoria = Categoria::find($id);
        $categoria->fill($request->all());
        $categoria->save();
        $fecha = Carbon::now()->format('Y-m-d');
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR','Fecha'=>$fecha, 'tabla_accion_id'=>5]);
        $control->save();
        return redirect()->action([CategoriaController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categoria::find($id)->update(['estado' => 'inactivo']);
        $fecha = Carbon::now()->format('Y-m-d');
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR','Fecha'=>$fecha, 'tabla_accion_id'=>5]);
        $control->save();
        return redirect()->action([CategoriaController::class,'index']);
    }
}
