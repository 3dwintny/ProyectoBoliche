<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo_Contrato;
use Carbon\Carbon;

class Tipo_ContratoController extends Controller
{
    protected $t;
    public function __construct(Tipo_Contrato $t){
        $this->t = $t;  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = Tipo_Contrato::all();
        return view('configuraciones.tipos_contratos.show', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoy = Carbon::now()->toDateString();
        return view('configuraciones.tipos_contratos.create', compact('hoy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contratos = new Tipo_Contrato($request->all());
        $contratos->save();
        return redirect()->action([Tipo_ContratoController::class, 'index']);
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
        $contratos = $this->t->obtenerTipoContratoById($id);
        return view('configuraciones.tipos_contratos.edit',['contratos' => $contratos]);
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
        $contratos = Tipo_Contrato::find($id);
        $contratos ->fill($request->all());
        $contratos->save();
        return redirect()->action([Tipo_ContratoController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contratos = Tipo_Contrato::find($id);
        $contratos->delete();
        return redirect()->action([Tipo_ContratoController::class,'index']);
    }
}
