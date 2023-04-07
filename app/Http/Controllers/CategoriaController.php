<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
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
        $categoria = Categoria::where('estado','activo')->get(['id','tipo','rango_edades']);
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
        $request->validate([
            'tipo' => ['unique:categoria']
        ]);
        $categoria = new Categoria(['tipo'=>$request->tipo,'descripcion'=>$request->descripcion]);
        $categoria->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>5]);
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
    public function edit($id)
    {
        $categoria = $this->c->obtenerCategoriaById(decrypt($id));
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
        $categoria = Categoria::find(decrypt($id));
        $categoria->fill(['tipo'=>$request->tipo,'descripcion'=>$request->descripcion]);
        $categoria->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>5]);
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
        Categoria::find(decrypt($id))->update(['estado' => 'inactivo']);
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>5]);
        $control->save();
        return redirect()->action([CategoriaController::class,'index']);
    }

    public function acciones(){
        $control = Control::where('tabla_accion_id',5)->with('usuario')->paginate(5);
        return view('configuraciones.categoria.control',compact('control'));
    }

    public function eliminados(){
        $eliminar = Categoria::where('estado', 'inactivo')->get();
        return view('configuraciones.categoria.eliminados',compact('eliminar'));
    }

    public function restaurar(Request $request){
        Categoria::find(decrypt($request->e))->update(['estado'=>'activo']);
        return redirect()->action([CategoriaController::class,'index']);
    }
}
