<?php

namespace App\Http\Controllers;
use App\Models\Parentesco;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ParentescoController extends Controller
{
    protected $p;
    public function __construct(Parentesco $p){
        $this->p = $p;  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parentescos = Parentesco::all();
        return view('configuraciones.parentesco.show',compact("parentescos"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoy = Carbon::now()->toDateString();
        return view('configuraciones.parentesco.create',compact('hoy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parentescos = new Parentesco($request->all());
        $parentescos->save();
        return redirect()->action([ParentescoController::class,'index']);

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
        $parentesco = $this->p->obtenerParentescoById($id);
        return view('configuraciones.parentesco.edit',['parentesco' => $parentesco]);
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
        $parentesco = Parentesco::find($id);
        $parentesco ->fill($request->all());
        $parentesco->save();
        return redirect()->action([ParentescoController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parentesco = Parentesco::find($id);
        $parentesco->delete();
        return redirect()->action([ParentescoController::class,'index']);
    }
}