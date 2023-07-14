<?php

namespace App\Http\Controllers;
use App\Models\Parentezco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParentezcoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{

        }
        catch(\Exception $e){
            report($e);
            $this->addError('error','Se produjo un error al restaurar la categoría');
        }
        $parentezcos = Parentezco::all();
        return view('parentezco.show',compact("parentezcos"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{

        }
        catch(\Exception $e){
            report($e);
            $this->addError('error','Se produjo un error al restaurar la categoría');
        }
        return view('parentezco.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

        }
        catch(\Exception $e){
            report($e);
            $this->addError('error','Se produjo un error al restaurar la categoría');
        }
        $parentezcos = new Parentezco($request->all());
        $parentezcos->save();
        return redirect()->action([ParentezcoController::class,'index']);
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
        //
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
        //
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
}
