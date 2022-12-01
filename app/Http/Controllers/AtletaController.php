<?php

namespace App\Http\Controllers;

use App\Models\Atleta;
use Illuminate\Http\Request;
use App\Models\Centro;
use App\Models\Entrenador;
use App\Models\Alumno;
use App\Models\Categoria;
use App\Models\Etapa_Deportiva;
use App\Models\Deporte_Adoptado;
use App\Models\Otro_Programa;
use App\Models\Linea_Desarrollo;
use App\Models\Deporte;
use App\Models\Modalidad;
use App\Models\PRT;
class AtletaController extends Controller
{
    protected $alumnos;
    public function __construct(Alumno $alumno)
    {
        $this->alumno = $alumno;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $atletas = Atleta::paginate();
        
        return view('Atletas.index', compact('atletas'))
            ->with('i', (request()->input('page', 1) - 1) * $atletas->perPage());
    }

      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $centro=Centro::all();
        $entrenador= Entrenador::All();
        $alumnos = Alumno::all();
        //$alumnos = Alumno::all();
        //$alumnos = Alumno::find($id);
        //$alumno = $this->alumno->obterenrAlumno();
        $categoria = Categoria::all();
        $etapa=Etapa_Deportiva::all();
        $deporteadaptado = Deporte_Adoptado::all();
        $otroprograma = Otro_Programa::all();
        $lineadesarrollo = Linea_Desarrollo::all();
        $deporte = Deporte::all();
        $modalidad = Modalidad::all();
        $prt = PRT::all();
        return view('atletas.create',compact("centro","entrenador","alumnos","categoria","etapa",
                                            "deporteadaptado","otroprograma","lineadesarrollo",
                                            "deporte","modalidad","prt"));
        

                                            /*$municipios = DB::table('municipio')
            ->where('departamento_id', $request->departamento_id)
            ->get();*/
        
     
    }
    public function creacion($id){
        $centro=Centro::all();
        $entrenador= Entrenador::All();
        $alumno = Alumno::find($id);     
        $categoria = Categoria::all();
        $etapa=Etapa_Deportiva::all();
        $deporteadaptado = Deporte_Adoptado::all();
        $otroprograma = Otro_Programa::all();
        $lineadesarrollo = Linea_Desarrollo::all();
        $deporte = Deporte::all();
        $modalidad = Modalidad::all();
        $prt = PRT::all();
        return view('atletas.create',compact('alumno',"centro","entrenador","categoria","etapa",
        "deporteadaptado","otroprograma","lineadesarrollo",
        "deporte","modalidad","prt"));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $alumno=Alumno::find($id)->update(['estado' => 'Inscrito']); 
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
        
    }
}
