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
use Carbon\Carbon;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Nacionalidad;
use App\Models\Control;

class AtletaController extends Controller
{
    protected $alumno;
    public function __construct(Alumno $alumno)
    {
        $this->alumno = $alumno;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscarAtleta = $request->buscarNombre;
        $filtrarCategoria = $request->filtroCategoria;
        $categoria = Categoria::where('estado','activo')->get(['tipo','rango_edades','id']);
        if($buscarAtleta ==""){
            if($filtrarCategoria==""){
                $atletas = Atleta::where('estado','activo')->paginate(5);
            }
            else{
                $atletas = Atleta::where('estado','activo')->where('categoria_id',decrypt($filtrarCategoria))->paginate(5);
            }
        }
        else{
            $indices = array();
            $alumno = Alumno::get(['nombre1','nombre2','nombre3','apellido1','apellido2','id']);
            for($i=0;$i<count($alumno);$i++){
                if($buscarAtleta==$alumno[$i]->nombre1){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre2){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre3){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->apellido1){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->apellido2){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre1.' '.$alumno[$i]->nombre2){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre1.' '.$alumno[$i]->nombre3){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre2.' '.$alumno[$i]->nombre3){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->apellido1.' '.$alumno[$i]->apellido2){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre1.' '.$alumno[$i]->apellido1){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre2.' '.$alumno[$i]->apellido1){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre3.' '.$alumno[$i]->apellido1){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre1.' '.$alumno[$i]->apellido2){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre2.' '.$alumno[$i]->apellido2){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre3.' '.$alumno[$i]->apellido2){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre1.' '.$alumno[$i]->nombre2.' '.$alumno[$i]->nombre3){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre1.' '.$alumno[$i]->nombre2.' '.$alumno[$i]->apellido1){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre1.' '.$alumno[$i]->nombre3.' '.$alumno[$i]->apellido1){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre2.' '.$alumno[$i]->nombre3.' '.$alumno[$i]->apellido1){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre1.' '.$alumno[$i]->nombre2.' '.$alumno[$i]->apellido2){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre1.' '.$alumno[$i]->nombre3.' '.$alumno[$i]->apellido2){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre2.' '.$alumno[$i]->nombre3.' '.$alumno[$i]->apellido2){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre1.' '.$alumno[$i]->nombre2.' '.$alumno[$i]->apellido1.' '.$alumno[$i]->apellido2){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->apellido1.' '.$alumno[$i]->apellido2.' '.$alumno[$i]->nombre1.' '.$alumno[$i]->nombre2){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre1.' '.$alumno[$i]->nombre2.' '.$alumno[$i]->nombre3.' '.$alumno[$i]->apellido1){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre1.' '.$alumno[$i]->nombre2.' '.$alumno[$i]->nombre3.' '.$alumno[$i]->apellido2){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->apellido1.' '.$alumno[$i]->nombre1.' '.$alumno[$i]->nombre2.' '.$alumno[$i]->nombre3){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->apellido2.' '.$alumno[$i]->nombre1.' '.$alumno[$i]->nombre2.' '.$alumno[$i]->nombre3){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre1.' '.$alumno[$i]->nombre2.' '.$alumno[$i]->nombre3.' '.$alumno[$i]->apellido1.' '.$alumno[$i]->apellido2){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->apellido1.' '.$alumno[$i]->apellido2.' '.$alumno[$i]->nombre1.' '.$alumno[$i]->nombre2.' '.$alumno[$i]->nombre3){
                    array_push($indices,$alumno[$i]->id);
                }
                else{
                    array_push($indices,0);
                }
            }
            $atletas = Atleta::where('estado','activo')->wherein('alumno_id',$indices)->paginate(5);
        }
        return view('Atletas.index', compact('atletas','buscarAtleta','categoria','filtrarCategoria'));
    }

      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $hoy = Carbon::now(); 
        $centro=Centro::all();
        $entrenador= Entrenador::All();
        $alumnos = Alumno::all();
        $categoria = Categoria::all();
        $etapa=Etapa_Deportiva::all();
        $deporteadaptado = Deporte_Adoptado::all();
        $otroprograma = Otro_Programa::all();
        $lineadesarrollo = Linea_Desarrollo::all();
        $deporte = Deporte::all();
        $modalidad = Modalidad::all();
        $prt = PRT::all();
        return view('atletas.create',compact('centro','entrenador','alumnos','categoria','etapa',
                                            'deporteadaptado','otroprograma','lineadesarrollo',
                                            'deporte','modalidad','prt','hoy'));
    }
    public function creacion($id){
        $centro=Centro::where('estado','activo')->get(['id','nombre']);
        $entrenador= Entrenador::where('estado','activo')->get(['id','nombre1','apellido1']);
        $alumno = Alumno::find($id);     
        $categoria = Categoria::where('estado','activo')->get(['id','tipo','rango_edades']);
        $etapa=Etapa_Deportiva::where('estado','activo')->get(['id','nombre']);
        $deporteadaptado = Deporte_Adoptado::where('estado','activo')->get(['id','nombre']);
        $otroprograma = Otro_Programa::where('estado','activo')->get(['id','nombre']);
        $lineadesarrollo = Linea_Desarrollo::where('estado','activo')->get(['id','tipo']);
        $deporte = Deporte::where('estado','activo')->get(['id','nombre']);
        $modalidad = Modalidad::where('estado','activo')->get(['id','nombre']);
        $prt = PRT::where('estado','activo')->get(['id','nombre']);
        $hoy = Carbon::now();
        return view('atletas.create',compact('alumno','centro','entrenador','categoria','etapa',
        'deporteadaptado','otroprograma','lineadesarrollo','deporte','modalidad','prt','hoy'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        Alumno::find(decrypt($id))->update(['estado' => 'Inscrito']); 
        if($request->deporte_adaptado_id==1){
            $depAdaptado = $request->deporte_adaptado_id;
        }
        else{
            $depAdaptado = decrypt($request->deporte_adaptado_id);
        }

        if($request->otro_programa_id==1){
            $otroPrograma = $request->otro_programa_id;
        }
        else{
            $otroPrograma = decrypt($request->otro_programa_id);
        }
        $atletas = Atleta::find($id);
        $prt = decrypt($request->prt_id);
        $atletas->fill([
            'fecha_ingreso'=> $request->fecha_ingreso,
            'adaptado'=> $request->adaptado,
            'estado_civil' => $request->estado_civil,
            'etnia' => $request->etnia,
            'escolaridad' => $request->escolaridad,
            'centro_id' => decrypt($request->centro_id),
            'entrenador_id' => decrypt($request->entrenador_id),
            'categoria_id' => decrypt($request->categoria_id),
            'etapa_deportiva_id' => decrypt($request->etapa_deportiva_id),
            'deporte_id' => decrypt($request->deporte_id),
            'deporte_adaptado_id' => $depAdaptado,
            'otro_programa_id' => $otroPrograma,
            'linea_desarrollo_id' => decrypt($request->linea_desarrollo_id),
            'modalidad_id' => decrypt($request->modalidad_id),
            'prt_id' => $prt,
            'anios' => $request->anios,
            'meses' => $request->meses,
            'federado' => $request->federado,
            'alumno_id' => decrypt($request->alumno_id),
        ]);
        $atletas->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>4]);
        $control->save(); 
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
        $atleta = Atleta::find(decrypt($id));
        $alumno = Alumno::find($atleta->alumno_id);
        $departamento = Departamento::find($alumno->departamento_residencia_id);
        $municipio = Municipio::find($alumno->municipio_residencia_id);
        $nacionalidad = Nacionalidad::find($alumno->nacionalidad_id);
        $deporte_adaptado = Deporte_Adoptado::find($atleta->deporte_adaptado_id);
        $otro_programa = Otro_Programa::find($atleta->otro_programa_id);
        $categoria = Categoria::find($atleta->categoria_id);
        $etapa_deportiva = Etapa_Deportiva::find($atleta->etapa_deportiva_id);
        $linea_desarrollo = Linea_Desarrollo::find($atleta->linea_desarrollo_id);
        $prt = PRT::find($atleta->prt_id);
        $modalidad = Modalidad::find($atleta->modalidad_id);
        $centro = Centro::find($atleta->centro_id);
        $entrenador = Entrenador::find($atleta->entrenador_id);
        return view('Atletas.show', compact('atleta','alumno','departamento','municipio','nacionalidad','deporte_adaptado','otro_programa','categoria',
        'etapa_deportiva','linea_desarrollo','prt','modalidad','centro','entrenador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $atleta = Atleta::find(decrypt($id));
        $centro=Centro::where('estado','activo')->get(['id','nombre']);
        $entrenador= Entrenador::where('estado','activo')->get(['id','nombre1','apellido1']);
        $categoria = Categoria::where('estado','activo')->get(['id','tipo','rango_edades']);
        $etapa=Etapa_Deportiva::where('estado','activo')->get(['id','nombre']);
        $deporteadaptado = Deporte_Adoptado::where('estado','activo')->get(['id','nombre']);
        $otroprograma = Otro_Programa::where('estado','activo')->get(['id','nombre']);
        $lineadesarrollo = Linea_Desarrollo::where('estado','activo')->get(['id','tipo']);
        $deporte = Deporte::where('estado','activo')->get(['id','nombre']);
        $modalidad = Modalidad::where('estado','activo')->get(['id','nombre']);
        $prt = PRT::where('estado','activo')->get(['id','nombre']);
        return view('atletas.edit',compact('centro','entrenador','categoria','etapa',
        'deporteadaptado','otroprograma','lineadesarrollo','deporte','modalidad','prt','atleta'));
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
        if($request->deporte_adaptado_id==1){
            $depAdaptado = $request->deporte_adaptado_id;
        }
        else{
            $depAdaptado = decrypt($request->deporte_adaptado_id);
        }

        if($request->otro_programa_id==1){
            $otroPrograma = $request->otro_programa_id;
        }
        else{
            $otroPrograma = decrypt($request->otro_programa_id);
        }
        $atletas = Atleta::find(decrypt($id));
        $prt = decrypt($request->prt_id);
        $atletas->fill([
            'fecha_ingreso'=> $request->fecha_ingreso,
            'adaptado'=> $request->adaptado,
            'estado_civil' => $request->estado_civil,
            'etnia' => $request->etnia,
            'escolaridad' => $request->escolaridad,
            'centro_id' => decrypt($request->centro_id),
            'entrenador_id' => decrypt($request->entrenador_id),
            'categoria_id' => decrypt($request->categoria_id),
            'etapa_deportiva_id' => decrypt($request->etapa_deportiva_id),
            'deporte_id' => decrypt($request->deporte_id),
            'deporte_adaptado_id' => $depAdaptado,
            'otro_programa_id' => $otroPrograma,
            'linea_desarrollo_id' => decrypt($request->linea_desarrollo_id),
            'modalidad_id' => decrypt($request->modalidad_id),
            'prt_id' => $prt,
            'anios' => $request->anios,
            'meses' => $request->meses,
            'federado' => $request->federado
        ]);
        $atletas->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>4]);
        $control->save();
        return redirect()->action([AtletaController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Atleta::find(decrypt($id))->update(['estado' => 'inactivo']);
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>4]);
        $control->save();
        return redirect()->action([AtletaController::class,'index'])->with('message','Atleta eliminado');
    }
    
    public function acciones(){
        $control = Control::where('tabla_accion_id',4)->with('usuario')->paginate(5);
        return view('Atletas.control',compact('control'));
    }

    public function eliminados(){}
}
