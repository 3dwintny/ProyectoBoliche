<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hashids\Hashids;
use App\Models\Linea_Desarrollo;
use Carbon\Carbon;

class Linea_DesarrolloController extends Controller
{
    protected $lD;
    public function __construct(Linea_Desarrollo $lD){
        $this->lD = $lD;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lineaDesarrollo = Linea_Desarrollo::all();
        return view('configuraciones.linea_desarrollo.show',compact('lineaDesarrollo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoy = Carbon::now();
        return view('configuraciones.linea_desarrollo.create',compact('hoy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lineaDesarrollo = new Linea_Desarrollo($request->all());
        $lineaDesarrollo->save();
        return redirect()->action([Linea_DesarrolloController::class,'index']);
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
    public function edit($id, Request $request)
    {
        $idEncriptado = $request->e;
        $hashid = new Hashids();
        $idDesencriptado = $hashid->decode($idEncriptado);
        $id = $idDesencriptado[0];
        $lineaDesarrollo = $this->lD->obtenerLineaDesarrolloById($id);
        return view('configuraciones.linea_desarrollo.edit',['lineaDesarrollo' => $lineaDesarrollo]);
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
        $lineaDesarrollo = Linea_Desarrollo::find($id);
        $lineaDesarrollo->fill($request->all());
        $lineaDesarrollo->save();
        return redirect()->action([Linea_DesarrolloController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lineaDesarrollo = Linea_Desarrollo::find($id);
        $lineaDesarrollo->delete();
        return redirect()->action([Linea_DesarrolloController::class,'index']);
    }
}
