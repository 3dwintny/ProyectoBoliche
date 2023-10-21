<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrenador;
use App\Models\Atleta;
use App\Models\Alumno;
use App\Models\Actividad_Entreno;
use App\Models\Actividad_Atleta;
use App\Models\Control;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\File;

class Actividad_EntrenoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $entrenador = Entrenador::where('correo',auth()->user()->email)->first();
            $actividadesAsignadas = Actividad_Entreno::where('entrenador_id',$entrenador->id)->get(['id','fecha','actividad']);
            return view('entrenador.actividadesAsignadas',compact('actividadesAsignadas'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $entrenador = Entrenador::where('correo',auth()->user()->email)->get(['id','nombre1','nombre2','nombre3','apellido1','apellido2','apellido_casada','codigo_correo']);
            if($entrenador[0]->codigo_correo == null or $entrenador[0]->codigo_correo == ""){
                return redirect('home');
            }
            $atletas = Atleta::where('estado','activo')->with(['alumno','categoria'])->get();
            $hoy = Carbon::now();
            return view('entrenador.asignarActividad',compact('entrenador','atletas','hoy'));
        }
        catch (\Exception $e) {
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $request->validate(['txtActividad'=>'required']);
            if($request->atletaSeleccionado!=null){
                $atletaId = array();
                foreach($request->atletaSeleccionado as $item){
                    array_push($atletaId,decrypt($item));
                }
                $entrenadorId = decrypt($request->entrenador_id);
                $informacionAtletas = Atleta::whereIn('id',$atletaId)->with('alumno')->get();
                $actividad = $request->txtActividad;
                $actividades = new Actividad_Entreno(['fecha'=>$request->fecha[0],'actividad'=>$actividad,'entrenador_id'=>$entrenadorId]);
                $actividades->save();

                for ($i=0;$i<count($atletaId);$i++){
                    $informacion = [
                        'atleta_id' => $atletaId[$i],
                        'actividad_id' => $actividades->id,
                    ];
                    DB::table('actividad_atleta')->insert($informacion);
                }
                $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>33]);
                $control->save();

                $datos = $this->obtenerInformacionUsuarioLogueado();
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; 
                $mail->Port = 587;
                $mail->SMTPAuth = true;
                $mail->Username = $datos['correo'];
                $mail->Password = $datos['contrasenia'];
                $mail->SMTPSecure = 'tls';
                $mail->CharSet = 'UTF-8';
                $mail->setFrom($datos['correo'], 'Asociación de Boliche de Quetzaltenango');
                $mail->isHTML(true);
                foreach($informacionAtletas as $correoAtleta){
                    $mail->addAddress($correoAtleta ->alumno->correo, '');
                    $mail->Subject = 'Equipo Técnico - Actividad de entreno asignada el '.Carbon::parse($request->fecha[0])->format("d-m-Y");
                    $mail->Body = $actividad;
                }
                $mail->send();
                DB::commit();
                return redirect()->action([Actividad_EntrenoController::class,'create'])->with('success','Actividad asignada exitosamente');
            }
            session()->flash('txtActividad', $request->input('txtActividad'));
            return redirect()->action([Actividad_EntrenoController::class,'create'])->with('warning', 'Debe de seleccionar al menos un atleta');
        }
        catch(\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return back()->withErrors($e->validator->errors())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $actividades = Actividad_Atleta::where('actividad_id',decrypt($id))->get();
            $atletasId = array();
            for($i=0;$i<count($actividades);$i++){
                array_push($atletasId,$actividades[$i]->atleta_id);
            }
            
            $datosActividad = Actividad_Entreno::where('id',decrypt($id))->first();
            
            $alumnosId = Atleta::whereIn('id',$atletasId)->with('alumno')->get();
            
            $atletas = array();
            foreach($alumnosId as $item){
                if($item->alumno->nombre2==null){
                    $nombreCompleto = trim($item->alumno->nombre1 . ' ' . $item->alumno->apellido1 . ' ' . $item->alumno->apellido2);
                }
                elseif($item->alumno->nombre3==null){
                    $nombreCompleto = trim($item->alumno->nombre1 . ' '. $item->alumno->nombre2 . ' ' . $item->alumno->apellido1 . ' ' . $item->alumno->apellido2);
                }
                else{
                    $nombreCompleto = trim($item->alumno->nombre1 . ' ' . $item->alumno->nombre2 . ' ' . $item->alumno->nombre3 . ' ' . $item->alumno->apellido1 . ' ' . $item->alumno->apellido2);
                }
                array_push($atletas,$nombreCompleto);
            }
            $actividad = $datosActividad->actividad;
            return view('entrenador.detalleTareaAsignada',compact('atletas','actividad','actividades'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $entrenador = Entrenador::where('correo',auth()->user()->email)->get(['id','nombre1','nombre2','nombre3','apellido1','apellido2','apellido_casada','codigo_correo']);
            if($entrenador[0]->codigo_correo == null or $entrenador[0]->codigo_correo == ""){
                return redirect('home');
            }
            $datosActividad = Actividad_Entreno::find(decrypt($id));
            $actividad = $datosActividad->actividad;
            $atletas = Atleta::where('estado','activo')->with(['alumno','categoria'])->get();
            $actividades = Actividad_Atleta::where('actividad_id',decrypt($id))->pluck('atleta_id');
            return view('entrenador.editarTareaAsignada',compact('atletas','actividad','datosActividad','actividades'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
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
        DB::beginTransaction();
        try{
            $datosActividad = Actividad_Entreno::find(decrypt($id));
            $idAtletasAsignadosOriginalemente = Actividad_Atleta::where('actividad_id',decrypt($id))->pluck('atleta_id')->toArray();
            $idAtletasNuevos = array();
            $idAtletasEliminados = array();
            $idAtletasAsignadosOriginalementeFinal = array();
            $datos = $this->obtenerInformacionUsuarioLogueado();
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = $datos['correo'];
            $mail->Password = $datos['contrasenia'];
            $mail->SMTPSecure = 'tls';
            $mail->CharSet = 'UTF-8';
            $mail->setFrom($datos['correo'], 'Asociación de Boliche de Quetzaltenango');
            $mail->isHTML(true);
            if($request->atletaSeleccionado!=null){
                $actividad = $request->txtActividad;
                $fecha = $request->fecha[0];
                $atletasProvenientesFormulario = array();

                foreach($request->atletaSeleccionado as $item){
                    array_push($atletasProvenientesFormulario,decrypt($item));
                }
                for($i = 0;$i<count($atletasProvenientesFormulario);$i++){
                    if(!in_array($atletasProvenientesFormulario[$i],$idAtletasAsignadosOriginalemente)){
                        array_push($idAtletasNuevos,$atletasProvenientesFormulario[$i]);
                    }
                }
                for($i = 0;$i<count($idAtletasAsignadosOriginalemente);$i++){
                    if(!in_array($idAtletasAsignadosOriginalemente[$i],$atletasProvenientesFormulario)){
                        array_push($idAtletasEliminados,$idAtletasAsignadosOriginalemente[$i]);
                    }
                    else{
                        array_push($idAtletasAsignadosOriginalementeFinal,$idAtletasAsignadosOriginalemente[$i]);  
                    }
                }

                if(count($idAtletasEliminados)>0){
                    $informacionAtletasEliminados = Atleta::whereIn('id',$idAtletasEliminados)->with('alumno')->get();
                    DB::table('actividad_atleta')->whereIn('atleta_id',$idAtletasEliminados)->where('actividad_id',decrypt($id))->delete();
                    foreach($informacionAtletasEliminados as $correoAtleta){
                        $mail->addAddress($correoAtleta->alumno->correo, '');
                        $mail->Subject = 'Equipo Técnico - Actividad de entreno asignada el '.Carbon::parse($datosActividad->fecha)->format("d-m-Y");
                        $mail->Body = "Se ha cancelado la actividad asignada";
                    }
                    $mail->send();
                    $mail->clearAddresses();
                }

                if(count($idAtletasNuevos)>0){
                    $informacionAtletasNuevos = Atleta::whereIn('id',$idAtletasNuevos)->with('alumno')->get();
                    for ($i=0;$i<count($idAtletasNuevos);$i++){
                        $informacion = [
                            'atleta_id' => $idAtletasNuevos[$i],
                            'actividad_id' => decrypt($id),
                        ];
                        DB::table('actividad_atleta')->insert($informacion);
                    }
                    foreach($informacionAtletasNuevos as $correoAtleta){
                        $mail->addAddress($correoAtleta->alumno->correo, '');
                        $mail->Subject = 'Equipo Técnico - Actividad de entreno asignada el '.Carbon::parse($fecha)->format("d-m-Y");
                        $mail->Body = $actividad;
                    }
                    $mail->send();
                    $mail->clearAddresses();
                }

                if($datosActividad->actividad != $actividad || $datosActividad->fecha != $fecha){
                    $informacionAtletasAsignadosOriginalemente = Atleta::whereIn('id',$idAtletasAsignadosOriginalementeFinal)->with('alumno')->get();
                    if($datosActividad->actividad != $actividad && $datosActividad->fecha != $fecha){
                        Actividad_Entreno::find(decrypt($id))->update(['fecha' => $fecha,'actividad' => $actividad]);
                        foreach($informacionAtletasAsignadosOriginalemente as $correoAtleta){
                            $mail->addAddress($correoAtleta->alumno->correo, '');
                            $mail->Subject = 'Equipo Técnico - Modificación de fecha de asignación y actividad';
                            $mail->Body = "La actividad asignada el "
                            .Carbon::parse($datosActividad->fecha)->format("d-m-Y").
                            " ha sido asignada el "
                            .Carbon::parse($fecha)->format("d-m-Y")
                            .". La nueva actividad es la siguiente: ".$actividad;
                        }
                    }
                    else if($datosActividad->actividad != $actividad){
                        Actividad_Entreno::find(decrypt($id))->update(['actividad' => $actividad]);
                        foreach($informacionAtletasAsignadosOriginalemente as $correoAtleta){
                            $mail->addAddress($correoAtleta->alumno->correo, '');
                            $mail->Subject = 'Equipo Técnico - Modificación de actividad';
                            $mail->Body = "La actividad asignada el "
                            .Carbon::parse($datosActividad->fecha)->format("d-m-Y").
                            " ha sido modificada. "
                            ."La nueva actividad es la siguiente: ".$actividad;
                        }
                    }
                    else if($datosActividad->fecha != $fecha){
                        Actividad_Entreno::find(decrypt($id))->update(['fecha' => $fecha]);
                        foreach($informacionAtletasAsignadosOriginalemente as $correoAtleta){
                            $mail->addAddress($correoAtleta->alumno->correo, '');
                            $mail->Subject = 'Equipo Técnico - Modificación de fecha de asignación';
                            $mail->Body = "La actividad asignada el "
                            .Carbon::parse($datosActividad->fecha)->format("d-m-Y").
                            " ha sido asignada el "
                            .Carbon::parse($fecha)->format("d-m-Y")
                            .". La actividad continua como se ha mencionado anteriormente: ".$actividad;
                        }
                    }
                    $mail->send();
                    $mail->clearAddresses();
                }
            }
            else{
                $idAtletas = Actividad_Atleta::where('actividad_id',$datosActividad->id)->pluck('atleta_id');
                $correosAtletas = Atleta::whereIn('id',$idAtletas)->with('alumno')->get();
                foreach($correosAtletas as $correoAtleta){
                    $mail->addAddress($correoAtleta->alumno->correo, '');
                    $mail->Subject = 'Equipo Técnico - Actividad de entreno asignada el '.Carbon::parse($datosActividad->fecha)->format("d-m-Y");
                    $mail->Body = "Se ha cancelado la actividad asignada";
                }
                $mail->send();
                $mail->clearAddresses();
                DB::table('actividad_atleta')->where('actividad_id',decrypt($id))->delete();
            }
            DB::commit();
            return redirect()->route('entreno-en-casa.show', ['entreno_en_casa' => $id])->with('success', 'Práctica actualizada exitosamente');
        }
        catch(\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return back()->withErrors($e->validator->errors())->withInput();
        }
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

    private function obtenerInformacionUsuarioLogueado(){
        $entrenador = Entrenador::where('correo',auth()->user()->email)->first();
        $codigoCorreo = $entrenador->codigo_correo;
        $correoUsuarioLogueado = auth()->user()->email;
        $correoUsuarioPassword = $codigoCorreo;
        $informacionUsuario = array(
            "correo" => $correoUsuarioLogueado,
            "contrasenia" => $correoUsuarioPassword,
        );
        return $informacionUsuario;
    }

    public function actividadPendiente(Request $request){
        try{
            $alumno = null;
            if(auth()->user()->tipo_usuario_id==1){
                $alumno = Alumno::where('correo',auth()->user()->email)->first();
                if($alumno!=null){
                    $atleta = Atleta::where('alumno_id',$alumno->id)->first();
                    $practicas = Actividad_Atleta::where('estado','pendiente')->where('atleta_id',$atleta->id)->with('actividad_entreno')->get();
                }
                else{
                    $atleta = Atleta::where('alumno_id',0)->get();
                    $practicas = Terapia::where('estado_tarea','pendiente')->where('atleta_id',0)->get();
                }
                return view('Atletas.actividadesPendientes',compact('practicas'));
            }
            return back();
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function finalizarActividad(Request $request){
        try{
            $actividadId = decrypt($request->actividad);
            $actividad = Actividad_Atleta::where('id',$actividadId)->with('actividad_entreno')->get();
            return view('Atletas.finalizarActividad', compact('actividadId','actividad'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function actividadFinalizada(Request $request){
        try{
            $request->validate([
                'fotografia' => 'required|file|max:2048', // Valida el tamaño
            ]);
            $file = $request->file('fotografia');
            $extention = $file->getClientOriginalExtension();
            if (!in_array($extention, ['jpg', 'png', 'jpeg'])) {
                return back()->with('error','Solo se permiten archivos jpg, png o jpeg.');
            }
            $actividad = Actividad_Atleta::find(decrypt($request->actividad));
            $nombreFotografia = time().'.'.$extention;
            $file->move('uploads/evidencia/', $nombreFotografia);
            $fotografia = $nombreFotografia;
            $actividad->fill(['estado'=>'sin','evidencia'=>$fotografia]);
            $actividad->save();
            return redirect()->action([Actividad_EntrenoController::class,'actividadPendiente'])->with('success','Práctica finalizada exitosamente');
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }
}