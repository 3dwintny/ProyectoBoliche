<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formulario;
use App\Models\Control;

class FormularioController extends Controller
{
    protected $f;

    public function __construct (Formulario $f){
        $this->f = $f;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $formulario = Formulario::get(['id','titulo_principal','subtitulo','titulo_ficha','declaracion']);
            return view(' configuraciones.formulario.show',compact('formulario'));
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
            $formulario = $this->f->obtenerFormularioById(decrypt($id));
            return view('configuraciones.formulario.edit',compact('formulario'));
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
        try{
            $formulario = $this->f->obtenerFormularioById(decrypt($id));
            $formulario->fill([
                'titulo_principal' => $request->titulo_principal,
                'subtitulo' => $request->subtitulo,
                'titulo_ficha' => $request->titulo_ficha,
                'declaracion' => $request->declaracion,
            ]);
            $formulario->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>16]);
            $control->save();
            return redirect()->action([FormularioController::class,'index'])->with('success','Formulario actualizado exitosamente');
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al actualizar la información del formulario');
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
            $control = Control::where('tabla_accion_id',16)->with('usuario')->paginate(5);
            return view('configuraciones.formulario.control',compact('control'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }
}
