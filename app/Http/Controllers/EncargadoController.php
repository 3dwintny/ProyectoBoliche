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
        $encargados = Encargado::all();
        $existencia = false;
        if($encargados){
            $existencia = true;
        }
        return view('encargados.index', compact('encargados','existencia'));
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
        return redirect()->action([EncargadoController::class, 'index'])->with('status','Editado correctamente');
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
            return view('configuraciones.alergia.control',compact('control'));
        }
        catch(\Exception $e){
            report($e);
            $this->addError('error','Se produjo un error al procesar la solicitud');
        }
    }
}
