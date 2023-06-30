<?php

namespace App\Http\Controllers;
use App\Models\Parentesco;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Control;
use Illuminate\Support\Facades\DB;

class ParentescoController extends Controller
{
    protected $p;
    public function __construct(Parentesco $p){
        $this->p = $p;  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $parentescos = Parentesco::where('estado','activo')->get(['id','tipo']);
            return view('configuraciones.parentesco.show',compact("parentescos"));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
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
            $hoy = Carbon::now()->toDateString();
            return view('configuraciones.parentesco.create',compact('hoy'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
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
                'tipo'=>['unique:parentezco'],
            ]);
            $parentescos = new Parentesco(['tipo' => $request->tipo]);
            $parentescos->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>25]);
            $control->save();
            DB::commit();
            return redirect()->action([ParentescoController::class,'index'])->with('success','Parentesco registrado exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al registrar al parentesco');
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
            $parentesco = $this->p->obtenerParentescoById(decrypt($id));
            return view('configuraciones.parentesco.edit',['parentesco' => $parentesco]);
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
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
            $parentesco = Parentesco::find(decrypt($id));
            $parentesco ->fill(['tipo' => $request->tipo]);
            $parentesco->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>25]);
            $control->save();
            DB::commit();
            return redirect()->action([ParentescoController::class,'index'])->with('success','Parentesco actualizado exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al actualizar la información del parentesco');
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
            Parentesco::find(decrypt($id))->update(['estado' => 'inactivo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>25]);
            $control->save();
            DB::commit();
            return redirect()->action([ParentescoController::class,'index'])->with('success','Parentesco eliminado exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al eliminar al parentesco');
        }
    }

    public function acciones(){
        try{
            $control = Control::where('tabla_accion_id',25)->with('usuario')->paginate(5);
            return view('configuraciones.parentesco.control',compact('control'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function eliminados(){
        try{
            $eliminar = Parentesco::where('estado', 'inactivo')->get();
            return view('configuraciones.parentesco.eliminados',compact('eliminar'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function restaurar(Request $request){
        DB::beginTransaction();
        try{
            Parentesco::find(decrypt($request->e))->update(['estado'=>'activo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'RESTAURAR', 'tabla_accion_id'=>25]);
            $control->save();
            DB::commit();
            return redirect()->action([ParentescoController::class,'index'])->with('success','Parentesco restaurado exitosamente');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'Se produjo un error al restaurar al parentesco');
        }
    }
}