<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PRT;
use Carbon\Carbon;

class PRTController extends Controller
{
    protected $p;
    public function __construct(PRT $p){
        $this->p = $p;  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prts = PRT::all();
        return view('configuraciones.prt.show', compact('prts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoy = Carbon::now()->toDateString();
        return view('configuraciones.prt.create', compact('hoy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prt = new PRT($request->all());
        $prt->save();
        return redirect()->action([PRTController::class, 'index']);
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
        $prt = $this->p->obtenerPRTById($id);
        return view('configuraciones.prt.edit',['prt' => $prt]);
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
        $prt = PRT::find($id);
        $prt ->fill($request->all());
        $prt->save();
        return redirect()->action([PRTController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prt = PRT::find($id);
        $prt->delete();
        return redirect()->action([PRTController::class,'index']);
    }
}