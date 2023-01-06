<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nacionalidad;
use Carbon\Carbon;

class NacionalidadController extends Controller
{
    protected $n;
    public function __construct(Nacionalidad $n){
        $this->n = $n;  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nacionalidad = Nacionalidad::all();
        return view('configuraciones.nacionalidad.show',compact('nacionalidad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoy = Carbon::now()->toDateString();
        return view('configuraciones.nacionalidad.create', compact('hoy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nacionalidad = new Nacionalidad($request->all());
        $nacionalidad->save();
        return redirect()->action([NacionalidadController::class, 'index']);
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
        $nacionalidad = $this->n->obtenerNacionalidadesById($id);
        return view('configuraciones.nacionalidad.edit',['nacionalidad' => $nacionalidad]);
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
        $nacionalidad = Nacionalidad::find($id);
        $nacionalidad ->fill($request->all());
        $nacionalidad->save();
        return redirect()->action([NacionalidadController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nacionalidad = Nacionalidad::find($id);
        $nacionalidad->delete();
        return redirect()->action([NacionalidadController::class,'index']);
    }
}
