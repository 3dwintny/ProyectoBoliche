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
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Alumnos_encargados;
use App\Models\User;
use App\Models\Encargado;
use PDF;
use App\Models\Formulario;
use App\Models\Psicologia;
use App\Models\Administracion;

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
        try{
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
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
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
        try{
            $centro=Centro::where('estado','activo')->get(['id','nombre']);
            $entrenador= Entrenador::where('estado','activo')->get(['id','nombre1','apellido1']);
            $alumno = Alumno::find(decrypt($id));
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
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        DB::beginTransaction();
        try{
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
            $prt = decrypt($request->prt_id);
            $atletas = new Atleta([
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
            $alumno = Alumno::find(decrypt($id));
            $usuario = User::where('email',$alumno->correo)->first();
            if($usuario != null){
                $tipoUsuarioId = $usuario->tipo_usuario_id;
                if($tipoUsuarioId!=null){
                    switch($tipoUsuarioId){
                        case 2:
                            Entrenador::where('correo',$alumno->correo)->update(['estado'=>'inactivo']);
                            break;
                        case 3:
                            Psicologia::where('correo',$alumno->correo)->update(['estado'=>'inactivo']);
                            break;
                    }
                }
                else{
                    Administracion::where('user_id',$usuario->id)->update(['estado'=>'inactivo']);
                }
                DB::table('model_has_roles')->where('model_id',$usuario->id)->delete();
                $usuario->update(['tipo_usuario_id'=>1]);
                $usuario->assignRole('Atleta');
            }
            $alumno->update(['estado' => 'Inscrito']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>4]);
            $control->save();
            DB::commit();
            return redirect()->action([AtletaController::class, 'index'])->with('success','Atleta registrado exitosamente');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'Se produjo un error al registrar al atleta');
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
    public function edit($id, Request $request)
    {
        try{
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
                'adaptado'=> $request->seleccionarAdaptado,
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
            ]);
            $atletas->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>4]);
            $control->save();
            DB::commit();
            return redirect()->action([AtletaController::class,'index'])->with('success','Atleta actualizado exitosamente');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'Se produjo un error al actualizar la información del atleta');
        }
    }

    public function getMunicipios(Request $request)
    {
        try{
            $municipios = DB::table('municipio')
            ->where('departamento_id', decrypt($request->departamento_id))
            ->get();

            if (count($municipios) > 0) {
                return response()->json($municipios);
        }
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function modificar(){
        try{
            $alumnos = Alumno::where('correo',auth()->user()->email)->get();
            if(count($alumnos)>0){
                $atleta = Alumno::find($alumnos[0]->id);
                $departamentos = Departamento::get(['id','nombre']);
                $nacionalidades = Nacionalidad::get(['id','descripcion']);
                $municipioNacimiento = Municipio::where('departamento_id',$atleta->departamento_id)->get();
                $municipioResidencia = Municipio::where('departamento_id',$atleta->departamento_residencia_id)->get();
                return view('Atletas.informacionPersonal',compact('atleta','nacionalidades','departamentos','municipioNacimiento','municipioResidencia'));
            }
            else{
                return redirect('home');
            }  
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function actualizar(Request $request){
        DB::beginTransaction();
        try{
            $alumnos = Alumno::where('correo',auth()->user()->email)->get();
            $usuario = User::where('email',auth()->user()->email)->first();
            $atleta = Alumno::find($alumnos[0]->id);
            $fecha_foto = null;
            if($request->hasFile('foto'))
            {
                $destination = 'uploads/alumnos/'.$atleta->foto;
                if(File::exists($destination)){
                    File::delete($destination);
                }
                $file = $request->file('foto');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('uploads/alumnos/', $filename);
                $fotografia = $filename;
                $usuario->fill([
                    'avatar' => $fotografia,
                ]);
                $usuario->save();
                $fecha_foto = Carbon::now();
            }
            else{
                $fotografia = $request->pic;
                $fecha_foto = $request->fecha_fotografia;
            }
            $atleta->fill([
                'nombre1' => $request->nombre1,
                'nombre2' => $request->nombre2,
                'nombre3' => $request->nombre3,
                'apellido1' => $request->apellido1,
                'apellido2' => $request->apellido2,
                'celular' => $request->celular,
                'telefono_casa' => $request->telefono_casa,
                'cui' => $request->cui,
                'pasaporte' => $request->pasaporte,
                'genero' => $request->genero,
                'fecha' => $request->fecha,
                'edad' => $request->edad,
                'correo' => $request->correo,
                'direccion' => $request->direccion,
                'foto' => $fotografia,
                'peso' => $request->peso,
                'nit' => $request->nit,
                'fecha_fotografia' => $fecha_foto,
                'altura' => $request->altura,
                'contacto_emergencia' => $request->contacto_emergencia,
                'departamento_residencia_id' => decrypt($request->departamento_residencia_id),
                'municipio_residencia_id' => decrypt($request->municipio_residencia_id),
                'departamento_id' => decrypt($request->departamento_id),
                'nacionalidad_id' => decrypt($request->nacionalidad_id),
                'municipio_id' => decrypt($request->municipio_id),
            ]);
            $atleta->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>4]);
            $control->save();
            DB::commit();
            return redirect('home');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'Se produjo un error al actualizar la información');
        }
    }

    public static function generarPDF()
    {
        try{
            $formularios = Formulario::all();
            $alumnos = Alumno::where('correo',auth()->user()->email)->get();
            $anio = Carbon::now()->format('Y');
            $cantidadDeRelaciones = null;
            $relalumnos = null;
            $encargados = [];
            $cant_rel = null;
            foreach($alumnos as $item){
                $cantidadDeRelaciones = Alumnos_encargados::where('alumno_id', $item->id)->count();
                $relalumnos = Alumnos_encargados::where('alumno_id', $item->id)->get();
            }
            foreach ($relalumnos as $item) {
                $resultados = Encargado::where('id', $item->encargado_id)->get();
                foreach($resultados as $resultado) {
                $encargados[] = $resultado->toArray();
                }
            }
            if($cantidadDeRelaciones === 2){
                $cant_rel = 2;
                return PDF::loadView('alumno.pdf',compact('formularios','alumnos','encargados','anio','cant_rel'))->setPaper('8.5x11')->stream();
            }elseif($cantidadDeRelaciones === 1){
                $cant_rel = 1;
                return PDF::loadView('alumno.pdf',compact('formularios','alumnos','encargados','anio','cant_rel'))->setPaper('8.5x11')->stream();

            }else{
                $cant_rel = 0;
                return PDF::loadView('alumno.pdf',compact('formularios','alumnos','anio','cant_rel'))->setPaper('8.5x11')->stream();
            }
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
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
        DB::beginTransaction();
        try{
            Atleta::find(decrypt($id))->update(['estado' => 'inactivo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>4]);
            $control->save();
            DB::commit();
            return redirect()->action([AtletaController::class,'index'])->with('success','Atleta eliminado exitosamente');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'Se produjo un error al eliminar al atleta');
        }
    }

    public function acciones(){
        try{
            $control = Control::where('tabla_accion_id',4)->with('usuario')->paginate(5);
            return view('Atletas.control',compact('control'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function eliminados(){
        try{
            $eliminar = Atleta::where('estado', 'inactivo')->with('alumno')->get();
            return view('Atletas.eliminados',compact('eliminar'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function restaurar(Request $request){
        DB::beginTransaction();
        try{
            Atleta::find(decrypt($request->e))->update(['estado'=>'activo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'RESTAURAR', 'tabla_accion_id'=>4]);
            $control->save();
            DB::commit();
            return redirect()->action([AtletaController::class,'index'])->with('success','Atleta restaurado exitosamente');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'Se produjo un error al restaurar al atleta');
        }
    }
}
