<?php

namespace App\Http\Controllers;
use App\Models\Parentesco;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Hashids\Hashids;
use App\Models\Control;

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
        $parentescos = Parentesco::where('estado','activo')->get();
        return view('configuraciones.parentesco.show',compact("parentescos"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoy = Carbon::now()->toDateString();
        return view('configuraciones.parentesco.create',compact('hoy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parentescos = new Parentesco($request->all());
        $parentescos->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>25]);
        $control->save();
        return redirect()->action([ParentescoController::class,'index']);

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
    public function edit($id,Request $request)
    {
        $idEncriptado = $request->e;
        $hashid = new Hashids();
        $idDesencriptado = $hashid->decode($idEncriptado);
        $id = $idDesencriptado[0];
        $parentesco = $this->p->obtenerParentescoById($id);
        return view('configuraciones.parentesco.edit',['parentesco' => $parentesco]);
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
        $parentesco = Parentesco::find($id);
        $parentesco ->fill($request->all());
        $parentesco->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>25]);
        $control->save();
        return redirect()->action([ParentescoController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Parentesco::find($id)->update(['estado' => 'inactivo']);
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>25]);
        $control->save();
        return redirect()->action([ParentescoController::class,'index']);
    }

    public function acciones(){
        $control = Control::where('tabla_accion_id',25)->with('usuario')->paginate(5);
        return view('configuraciones.alergia.control',compact('control'));
    }
}