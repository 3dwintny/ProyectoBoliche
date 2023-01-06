<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nivel_cdag;
use Carbon\Carbon;

class Nivel_cdagController extends Controller
{
    protected $n;
    public function __construct(Nivel_cdag $n){
        $this->n = $n;  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $niveles = Nivel_cdag::all();
        return view('configuraciones.nivel_cdag.show', compact('niveles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoy = Carbon::now()->toDateString();
        return view('configuraciones.nivel_cdag.create', compact('hoy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nivel = new Nivel_cdag($request->all());
        $nivel->save();
        return redirect()->action([Nivel_cdagController::class, 'index']);
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
        $nivel = $this->n->obtenerNivelCDAGById($id);
        return view('configuraciones.nivel_cdag.edit',['nivel' => $nivel]);
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
        $nivel = Nivel_cdag::find($id);
        $nivel ->fill($request->all());
        $nivel->save();
        return redirect()->action([Nivel_cdagController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nivel = Nivel_cdag::find($id);
        $nivel->delete();
        return redirect()->action([Nivel_cdagController::class,'index']);
    }
}
