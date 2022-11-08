<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Nacionalidad;
use App\Models\Parentezco;
use App\Models\Formulario;
use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::with('encargado','alergia','departamento'
        ,'departamento_residencia','municipio','municipio_residencia','nacionalidad')->get();
        return view('alumno.show',compact('alumnos'));   
    }

     /**
     * return cities list
     *
     * @return json
     */

    public function getMunicipios(Request $request)
    {
        $municipios = DB::table('municipio')
            ->where('departamento_id', $request->departamento_id)
            ->get();
        
        if (count($municipios) > 0) {
            return response()->json($municipios);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamento::all();
        $nacionalidades = Nacionalidad::all();
        $parentezcos = Parentezco::all();
        $formularios = Formulario::all();
        return view('alumno.alumno',compact("departamentos","nacionalidades","parentezcos","formularios"));
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
        $alumnos = new Alumno($request->all());
        $alumnos->save();
        return redirect()->action([AlumnoController::class,'index']);
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
