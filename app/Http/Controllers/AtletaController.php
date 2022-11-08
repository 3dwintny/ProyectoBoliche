<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atleta;
use App\Models\Centro;
use App\Models\Entrenador;
use App\Models\Alumno;
use App\Models\Categoria;
use App\Models\Etapa_Deportiva;
use App\Models\Deporte_Adaptado;
use App\Models\Otro_Programa;
use App\Models\Linea_Desarrollo;
use App\Models\Deporte;
use App\Models\Modalidad;
use App\Models\PRT;

class AtletaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atletas = Atleta::with('centro','entrenador','alumno','categoria','etapa_deportiva',
        'deporte_adaptado','otro_programa','linea_desarrollo','deporte','modalidad',
        'prt')->get();
        return view('atleta.show',compact('atletas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centros = Centro::all();
        $entrenadores = Entrenador::all();
        $alumnos = Alumno::all();
        $categorias = Categoria::all();
        $etapas_deportivas = Etapa_Deportiva::all();
        $deportes_adaptados = Deporte_Adaptado::all();
        $otros_programas = Otro_Programa::all();
        $lineas_desarrollo = Linea_Desarrollo::all();
        $deportes = Deporte::all();
        $modalidades = Modalidad::all();
        $prts = PRT::all();
        return view('atleta.create',compact("centros","entrenadores","alumnos",
    "categorias","etapas_deportivas","deportes_adaptados","otros_programas","lineas_desarrollo",
"deportes","modalidades","prts"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $atletas = new Atleta($request->all());
        $atletas->save();
        return redirect()->action([AtletaController::class, 'index']);
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
