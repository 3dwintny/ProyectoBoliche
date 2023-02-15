<?php

namespace App\Http\Controllers;

use App\Models\Etapa_Deportiva;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Hashids\Hashids;

class Etapa_DeportivaController extends Controller
{
    protected $n;
    public function __construct(Etapa_Deportiva $n){
        $this->n = $n;  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etapa = Etapa_Deportiva::where('estado','activo')->get();
        return view('configuraciones.etapadep.show',compact('etapa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoy = Carbon::now()->toDateString();
        return view('configuraciones.etapadep.create', compact('hoy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $etapa = new Etapa_Deportiva($request->all());
        $etapa->save();
        return redirect()->action([Etapa_DeportivaController::class, 'index']);
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
        $etapa = Etapa_Deportiva::find($id);
        return view('configuraciones.etapadep.edit',['etapa' => $etapa]);
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
        $etapa = Etapa_Deportiva::find($id);
        $etapa ->fill($request->all());
        $etapa->save();
        return redirect()->action([Etapa_DeportivaController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $etapa = Etapa_Deportiva::find($id)->update(['estado' => 'inactivo']);
        return redirect()->action([Etapa_DeportivaController::class,'index']);
    }
}
