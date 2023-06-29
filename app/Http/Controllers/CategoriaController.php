<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Carbon\Carbon;
use App\Models\Control;
use Illuminate\Support\Facades\DB;

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
        try{
            $categoria = Categoria::where('estado','activo')->get(['id','tipo','rango_edades']);
            return view('configuraciones.categoria.show', compact("categoria"));
        }
        catch(\Exception $e){
            report($e);
            $this->addError('error','Se produjo un error al procesar la solicitud');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $hoy = Carbon::now();
            return view('configuraciones.categoria.create',compact('hoy'));
        }
        catch(\Exception $e){
            report($e);
            $this->addError('error','Se produjo un error al procesar la solicitud');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $request->validate([
                'tipo' => ['unique:categoria']
            ]);
            $categoria = new Categoria(['tipo'=>$request->tipo,'descripcion'=>$request->descripcion]);
            $categoria->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>5]);
            $control->save();
            DB::commit();
            return redirect()->action([CategoriaController::class, 'index'])->with('success','Categoría registrada exitosamente');
        }
        catch(\Exception $e){
            DB::rollBack();
            report($e);
            $this->addError('error','Se produjo un error al registrar la categoría');
        }
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
        try{
            $categoria = $this->c->obtenerCategoriaById(decrypt($id));
            return view('configuraciones.categoria.edit',['categoria' => $categoria]);
        }
        catch(\Exception $e){
            report($e);
            $this->addError('error','Se produjo un error al procesar la solicitud');
        }
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
        DB::beginTransaction();
        try{
            $categoria = Categoria::find(decrypt($id));
            $categoria->fill(['tipo'=>$request->tipo,'descripcion'=>$request->descripcion]);
            $categoria->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>5]);
            $control->save();
            DB::commit();
            return redirect()->action([CategoriaController::class,'index'])->with('success','Categoría actualizada exitosamente');
        }
        catch(\Exception $e){
            DB::rollBack();
            report($e);
            $this->addError('error','Se produjo un error al actualizar la categoría');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            Categoria::find(decrypt($id))->update(['estado' => 'inactivo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>5]);
            $control->save();
            DB::commit();
            return redirect()->action([CategoriaController::class,'index'])->with('success','Categoría eliminada exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            report($e);
            $this->addError('error','Se produjo un error al eliminar la categoría');
        }
    }

    public function acciones(){
        try{
            $control = Control::where('tabla_accion_id',5)->with('usuario')->paginate(5);
            return view('configuraciones.categoria.control',compact('control'));
        }
        catch(\Exception $e){
            report($e);
            $this->addError('error','Se produjo un error al procesar la solicitud');
        }
    }

    public function eliminados(){
        try{
            $eliminar = Categoria::where('estado', 'inactivo')->get();
            return view('configuraciones.categoria.eliminados',compact('eliminar'));
        }
        catch(\Exception $e){
            report($e);
            $this->addError('error','Se produjo un error al procesar la solicitud');
        }
    }

    public function restaurar(Request $request){
        DB::beginTransaction();
        try{
            Categoria::find(decrypt($request->e))->update(['estado'=>'activo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'RESTAURAR', 'tabla_accion_id'=>5]);
            $control->save();
            DB::commit();
            return redirect()->action([CategoriaController::class,'index'])->with('success','Categoría restaurada exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            report($e);
            $this->addError('error','Se produjo un error al restaurar la categoría');
        }
    }
}
