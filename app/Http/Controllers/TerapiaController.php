<?php

namespace App\Http\Controllers;

use App\Mail\ActualizarCorreos;
use App\Models\Psicologia;
use App\Models\Atleta;
use App\Models\Alumno;
use App\Models\Terapia;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PDF;
use Mail;
use App\Mail\CorreosTerapia;
use App\Models\Control;

class TerapiaController extends Controller
{
    protected $t;
    public function __construct(Terapia $t){
        $this->t = $t;  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscarAtleta = $request->buscarNombre;
        if($buscarAtleta ==""){
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'LISTAR', 'tabla_accion_id'=>29]);
            $control->save();
            $atleta = Atleta::paginate(5);
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
                else if($buscarAtleta==$alumno[$i]->nombre1." ".$alumno[$i]->nombre2){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre1." ".$alumno[$i]->nombre3){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre2." ".$alumno[$i]->nombre3){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->apellido1." ".$alumno[$i]->apellido2){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre1." ".$alumno[$i]->apellido1){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre2." ".$alumno[$i]->apellido1){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre3." ".$alumno[$i]->apellido1){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre1." ".$alumno[$i]->apellido2){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre2." ".$alumno[$i]->apellido2){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre3." ".$alumno[$i]->apellido2){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre1." ".$alumno[$i]->nombre2." ".$alumno[$i]->nombre3){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre1." ".$alumno[$i]->nombre2." ".$alumno[$i]->apellido1){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre1." ".$alumno[$i]->nombre3." ".$alumno[$i]->apellido1){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre2." ".$alumno[$i]->nombre3." ".$alumno[$i]->apellido1){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre1." ".$alumno[$i]->nombre2." ".$alumno[$i]->apellido2){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre1." ".$alumno[$i]->nombre3." ".$alumno[$i]->apellido2){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre2." ".$alumno[$i]->nombre3." ".$alumno[$i]->apellido2){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre1." ".$alumno[$i]->nombre2." ".$alumno[$i]->apellido1." ".$alumno[$i]->apellido2){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->apellido1." ".$alumno[$i]->apellido2." ".$alumno[$i]->nombre1." ".$alumno[$i]->nombre2){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre1." ".$alumno[$i]->nombre2." ".$alumno[$i]->nombre3." ".$alumno[$i]->apellido1){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre1." ".$alumno[$i]->nombre2." ".$alumno[$i]->nombre3." ".$alumno[$i]->apellido2){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->apellido1." ".$alumno[$i]->nombre1." ".$alumno[$i]->nombre2." ".$alumno[$i]->nombre3){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->apellido2." ".$alumno[$i]->nombre1." ".$alumno[$i]->nombre2." ".$alumno[$i]->nombre3){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->nombre1." ".$alumno[$i]->nombre2." ".$alumno[$i]->nombre3." ".$alumno[$i]->apellido1." ".$alumno[$i]->apellido2){
                    array_push($indices,$alumno[$i]->id);
                }
                else if($buscarAtleta==$alumno[$i]->apellido1." ".$alumno[$i]->apellido2." ".$alumno[$i]->nombre1." ".$alumno[$i]->nombre2." ".$alumno[$i]->nombre3){
                    array_push($indices,$alumno[$i]->id);
                }
                else{
                    array_push($indices,0);
                }
            }
            $atleta = Atleta::wherein('alumno_id',$indices)->paginate(5);
        }
        return view('psicologia.terapias.list',compact('atleta','buscarAtleta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $psicologos = Psicologia::where('correo',auth()->user()->email)->get(['id','nombre1','nombre2','nombre3','apellido1','apellido2','apellido_casada']);
        $atletas = Atleta::where('estado','activo')->get();
        $hoy = Carbon::now();
        $hora = Carbon::now()->toTimeString('minute');
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'CREACIÓN', 'tabla_accion_id'=>29]);
        $control->save();
        return view('psicologia.terapias.create',compact('psicologos','atletas','hoy','hora'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obtenerTarea = $request->tarea;
        $correoAtleta = $request->obtenerCorreo;
        $obtenerFechaTarea = $request->fecha;
        $tarea = "";
        if($obtenerTarea != ""){
            Mail::to($correoAtleta)->send(new CorreosTerapia($obtenerTarea,$obtenerFechaTarea));
            $tarea = "pendiente";
        }
        else{
            $tarea = "sin";
        }
        $terapias = new Terapia([
            'numero_terapia' => $request->numero_terapia,
            'fecha' => $request->fecha,
            'hora_inicio' => $request->hora_inicio,
            'impresion_clinica' => $request->impresion_clinica,
            'analisis_semiologico' => $request->analisis_semiologico,
            'desarrollo' => $request->desarrollo,
            'observaciones' => $request->observaciones,
            'tarea' => $obtenerTarea,
            'estado_tarea' => $tarea,
            'conciencia_corporal' => $request->conciencia_corporal,
            'dominio_corporal' => $request->dominio_corporal,
            'dominio_respiracion' => $request->dominio_respiracion,
            'dialogo_interno' => $request->dialogo_interno,
            'atencion' => $request->atencion,
            'concentracion' => $request->concentracion,
            'motivacion' => $request->motivacion,
            'confianza' => $request->confianza,
            'activacion' => $request->activacion,
            'relajacion' => $request->relajacion,
            'estres' => $request->estres,
            'ansiedad_cognitiva' => $request->ansiedad_cognitiva,
            'ansiedad_fisica' => $request->ansiedad_fisica,
            'miedo' => $request->miedo,
            'frustracion' => $request->frustracion,
            'atleta_id' => decrypt($request->atleta_id),
            'psicologia_id' => decrypt($request->psicologia_id),
        ]);
        $terapias->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>29]);
        $control->save();
        return redirect()->action([TerapiaController::class,'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $psicologo = Psicologia::where('correo',auth()->user()->email)->get();
        if(count($psicologo)==0)
        {
            $historial = DB::table('terapia')->where('atleta_id',decrypt($id))->where('psicologia_id',0)->paginate(5);
        }
        else{
            $historial = DB::table('terapia')->where('atleta_id',decrypt($id))->where('psicologia_id',$psicologo[0]->id)->paginate(5);
        }
        $guardarAtleta = $id;
        $inicial = "";
        $final = "";
        $atleta = DB::table('atleta')
        ->where('id', decrypt($id))->get('alumno_id');
        $alumno = "";
        foreach ($atleta as $item){
            $alumno = $item->alumno_id;
        }
        $nombre = DB::table('alumno')
        ->where('id',$alumno)->get();
        $completo = "";
        foreach ($nombre as $item){
            $completo = $item->nombre1." ".$item->nombre2." ".$item->nombre3." ".$item->apellido1." ".$item->apellido2;
        }
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'HISTORIAL', 'tabla_accion_id'=>29]);
        $control->save();
        return view('psicologia.terapias.show',compact('historial','completo','guardarAtleta','inicial','final'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $terapia = $this->t->obtenerTerapiaById(decrypt($id));
        $atleta = Atleta::where('id',$terapia->atleta_id)->get();
        foreach ($atleta as $item){
            $alumno = Alumno::where('id',$item->alumno_id)->get();
        }
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'EDICIÓN', 'tabla_accion_id'=>29]);
        $control->save();
        return view('psicologia.terapias.edit',['terapia' => $terapia,'alumno' => $alumno]);
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
        $terapia = Terapia::find(decrypt($id));
        $correoAtleta = $request->correo;
        $obtenerTarea = $request->tarea;
        $obtenerFechaTarea = $request->fecha;
        if($terapia->tarea!=$obtenerTarea)
        {
            if($obtenerTarea!="" || $obtenerTarea!=NULL){
                $tarea = "pendiente";
                //DB::table('terapia')->where('id',decrypt($id))->update(['estado_tarea'=>'pendiente']);
            }
            else{
                $obtenerTarea = "Se ha eliminado la tarea asignada";
                $tarea = "sin";
                //DB::table('terapia')->where('id',decrypt($id))->update(['estado_tarea'=>'sin']);
            }
            Mail::to($correoAtleta)->send(new ActualizarCorreos($obtenerTarea,$obtenerFechaTarea));
        }
        $terapia ->fill([
            'numero_terapia' => $request->numero_terapia,
            'fecha' => $request->fecha,
            'hora_inicio' => $request->hora_inicio,
            'impresion_clinica' => $request->impresion_clinica,
            'analisis_semiologico' => $request->analisis_semiologico,
            'desarrollo' => $request->desarrollo,
            'observaciones' => $request->observaciones,
            'tarea' => $request->tarea,
            'estado_tarea' => $tarea,
            'conciencia_corporal' => $request->conciencia_corporal,
            'dominio_corporal' => $request->dominio_corporal,
            'dominio_respiracion' => $request->dominio_respiracion,
            'dialogo_interno' => $request->dialogo_interno,
            'atencion' => $request->atencion,
            'concentracion' => $request->concentracion,
            'motivacion' => $request->motivacion,
            'confianza' => $request->confianza,
            'activacion' => $request->activacion,
            'relajacion' => $request->relajacion,
            'estres' => $request->estres,
            'ansiedad_cognitiva' => $request->ansiedad_cognitiva,
            'ansiedad_fisica' => $request->ansiedad_fisica,
            'miedo' => $request->miedo,
            'frustracion' => $request->frustracion,
            'atleta_id' => decrypt($request->atleta_id),
            'psicologia_id' => decrypt($request->psicologia_id),
        ]);
        $terapia->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>29]);
        $control->save();
        return redirect()->action([TerapiaController::class,'index']);
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

    //Obitene información sobre el paciente para mostrar el número de sesión
    public function getPaciente(Request $request)
    {
        $paciente = DB::table('terapia')
        ->where('atleta_id', decrypt($request->atleta_id))->get();
        if (count($paciente)>0){
            return response()->json($paciente);
        }
    }

    //Obtiene el correo electrónico del atleta para enviar la tarea asignada
    public function getCorreo(Request $request){
        $informacionAtleta = DB::table('atleta')->where('id',decrypt($request->atleta_id))->get();
        foreach($informacionAtleta as $item){
            $informacionAlumno = DB::table('alumno')->where('id',$item->alumno_id)->get();
        }

        if(count($informacionAlumno)>0){
            return response()->json($informacionAlumno);
        }
    }

    //Función para generar el PDF de la sesión seleccionada
    public function generarPDF($id)
    {
        $terapia = $this->t->obtenerTerapiaById(decrypt($id));
        $atleta = Atleta::where('id',$terapia->atleta_id)->get();
        foreach ($atleta as $item){
            $alumno = Alumno::where('id',$item->alumno_id)->get();
        }
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'PDF', 'tabla_accion_id'=>29]);
        $control->save();
        return PDF::loadView('psicologia.terapias.pdf',['terapia' => $terapia,'alumno' => $alumno])->setPaper('8.5x11')->stream();
    }

    //Función para efectuar la búsqueda de sesiones por fecha
    public function busquedaTerapia(Request $request)
    {
        $guardarAtleta = decrypt($request->idAtleta);
        $inicial = $request->fechaInicial;
        $final = $request->fechaFinal; 
        $historial = Terapia::where('atleta_id',$guardarAtleta)->whereBetween('fecha',[$inicial,$final])
        ->paginate(5);
        $atleta = DB::table('atleta')
        ->where('id', $guardarAtleta)->get('alumno_id');
        $alumno = "";
        foreach ($atleta as $item){
            $alumno = $item->alumno_id;
        }
        $nombre = DB::table('alumno')
        ->where('id',$alumno)->get();
        $completo = "";
        foreach ($nombre as $item){
            $completo = $item->nombre1." ".$item->nombre2." ".$item->nombre3." ".$item->apellido1." ".$item->apellido2;
        }
        $guardarAtleta = encrypt($guardarAtleta);
        return view('psicologia.terapias.show',compact('historial','completo','guardarAtleta','inicial','final'));
    }


    //Función que devuelve el detalle de la sesión
    public function details($id){
        $terapia = Terapia::find(decrypt($id));
        $atleta = Atleta::find($terapia->atleta_id);
        $paciente = Alumno::find($atleta->alumno_id);
        return view('psicologia.terapias.details', compact('terapia','paciente'));
    }

    //Función  que muestra las tareas pendientes de cada atleta
    public function tareaPendiente(Request $request){
        $alumno = Alumno::where('correo',auth()->user()->email)->get();
        if($request->idAtleta!=null){
            $paciente = Atleta::where('id',decrypt($request->idAtleta))->get();
        }
        else{
            $paciente = array();
        }
        $nombre = "";
        if(count($alumno)>0){
            $atleta = Atleta::where('alumno_id',$alumno[0]->id)->get();
            $tarea = Terapia::where('estado_tarea','pendiente')->where('atleta_id',$atleta[0]->id)->get();
        }
        else if(count($paciente)>0){
            $tarea = Terapia::where('estado_tarea','pendiente')->where('atleta_id',$paciente[0]->id)->get();
            $nombre = " del atleta ".$request->nombreAtleta;
        }
        else{
            $atleta = Atleta::where('alumno_id',0)->get();
            $tarea = Terapia::where('estado_tarea','pendiente')->where('atleta_id',0)->get();
        }
        return view('Atletas.pendientes',compact('tarea','nombre'));
    }

    public function acciones(){
        $control = Control::where('tabla_accion_id',29)->with('usuario')->paginate(15);
        return view('psicologia.terapias.control',compact('control'));
    }

    //Función para marcar la(s) tarea(s) que el atleta ha finalizado
    public function finalizarTarea(Request $request){
        if($request->id!=null){
            $terapia_id = array();
            foreach($request->id as $item){
                array_push($terapia_id,decrypt($item));
            }
        }
        else{
            $terapia_id = $request->id;
        }
        if($terapia_id!==null){
            for ($i=0;$i<count($terapia_id);$i++){
                $informacion = [
                    'estado_tarea' => 'fin',
                ];
                DB::table('terapia')->where('id',$terapia_id[$i])->update($informacion);
            }
            return redirect()->action([TerapiaController::class,'tareaPendiente']);
        }
        else{
            return redirect()->action([TerapiaController::class,'tareaPendiente'])->with('warning', 'Debe de seleccionar al menos una tarea');
        }
    }
}