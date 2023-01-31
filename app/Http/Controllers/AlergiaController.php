<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alergia;
use Hashids\Hashids;
use Carbon\Carbon;

class AlergiaController extends Controller
{
    protected $a;
    public function __construct(Alergia $a){
        $this->a = $a;
    }
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alergia = Alergia::all();
        return view('configuraciones.alergia.show',compact("alergia"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoy = Carbon::now();
        return view('configuraciones.alergia.create', compact("hoy"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alergia = new Alergia($request->all());
        $alergia->save();
        return redirect()->action([AlergiaController::class,'index']);
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
        $alergia = $this->a->obtenerAlergiaById($id);
        return view('configuraciones.alergia.edit',['alergia'=>$alergia]);
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
        $alergia = Alergia::find($id);
        $alergia->fill($request->all());
        $alergia->save();
        return redirect()->action([AlergiaController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alergia = Alergia::find($id);
        $alergia->delete();
        return redirect()->action([AlergiaController::class,'index']);
    }
}
