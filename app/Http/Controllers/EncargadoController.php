<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encargado;
use App\Models\Control;
use Illuminate\Support\Facades\DB;

class EncargadoController extends Controller
{
    protected $encargados;
    public function __construct(Encargado $encargado)
    {
        $this->encargados = $encargado;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $encargados = Encargado::all();
            return view('encargados.index', compact('encargados'));
        }
        catch(\Exception $e){
            return back()->with('error','Se produjo un error al procesar la solicitud');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $encargados = $this->encargados->obtenerEncargadoporId($id);
        return view('encargados.edit',['encargados'=>$encargados]);
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
            $encargado = Encargado::find($id);
            $encargado->nombre1p = $request->input('nombre1p');
            $encargado->nombre2p = $request->input('nombre2p');
            $encargado->nombre3p = $request->input('nombre3p');
            $encargado->apellido1p = $request->input('apellido1p');
            $encargado->apellido2p = $request->input('apellido2p');
            $encargado->apellido_casada = $request->input('apellido_casada');
            $encargado->direccionp = $request->input('direccionp');
            $encargado->celularp = $request->input('celularp');
            $encargado->telefono_casap = $request->input('telefono_casap');
            $encargado->correop = $request->input('correop');
            $encargado->dpi = $request->input('dpi');
            $encargado->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>11]);
            $control->save();
            DB::commit();
            return redirect()->action([EncargadoController::class, 'index'])->with('status','Información actualizada exitosamente');
        }
        catch(\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return back()->withErrors($e->validator->errors())->withInput();
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
        //
    }

    public function acciones(){
        try{
            $control = Control::where('tabla_accion_id',11)->with('usuario')->paginate(5);
            return view('encargados.control',compact('control'));
        }
        catch(\Exception $e){
            report($e);
            $this->addError('error','Se produjo un error al procesar la solicitud');
        }
    }
}
