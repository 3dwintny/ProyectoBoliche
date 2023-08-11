<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Nivel_cdag;
use App\Models\Nivel_fadn;
use App\Models\Tipo_Contrato;
use App\Models\Departamento;
use App\Models\Nacionalidad;
use App\Models\Deporte;
use App\Models\Entrenador;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use App\Models\Control;
use App\Models\User;
use App\Models\Psicologia;
use App\Models\Atleta;
use App\Models\Administracion;
use Illuminate\Support\Facades\DB;

class EntrenadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:Listar roles | Crear roles | Editar roles |  Eliminar roles ', ['only'=> ['index']]);
        $this->middleware('permission:Crear roles', ['only'=> ['create','store']]);
        $this->middleware('permission:Editar roles', ['only'=> ['edit','update']]);
        $this->middleware('permission:Eliminar roles', ['only'=> ['destroy']]);
    }

    public function index()
    {
        try{
            $entrenadores = Entrenador::where('estado','activo')->get(['id','nombre1','nombre2','nombre3','apellido1','apellido2','apellido_casada',
                        'celular','telefono_casa','cui','pasaporte','genero','fecha_nacimiento','edad','años_experiencia','correo','direccion',
                        'foto','estado_civil','nit','fecha_registro','escolaridad','nivel_cdag_id','nivel_fadn_id','departamento_id',
                        'nacionalidad_id','deporte_id','tipo_contrato_id']);
            return view('entrenador.index', compact('entrenadores'));
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
        try{
            $hoy = Carbon::now();
            $niveles_cdag = Nivel_cdag::get(['id','nombre']);
            $niveles_fadn = Nivel_fadn::get(['id','tipo']);
            $departamentos = Departamento::get(['id','nombre']);
            $nacionalidades = Nacionalidad::get(['id','descripcion']);
            $deportes = Deporte::get(['id','nombre']);
            $tipos_contratos = Tipo_Contrato::get(['id','descripcion']);
            return view('entrenador.create',compact("niveles_cdag","niveles_fadn","departamentos","nacionalidades"
            ,"deportes","tipos_contratos","hoy"));
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
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $request->validate([
                'cui'=>['unique:entrenador'],
                'correo'=>['unique:entrenador'],
                'celular' => 'nullable|regex:/[0-9]{4}[ -][0-9]{4}/',
                'telefono_casa' => 'nullable|regex:/[0-9]{4}[-][0-9]{4}/'
            ]);
            $entrenador = new Entrenador([
                'nombre1' => $request->nombre1,
                'nombre2' => $request->nombre2,
                'nombre3' => $request->nombre3,
                'apellido1' => $request->apellido1,
                'apellido2' => $request->apellido2,
                'apellido_casada' => $request->apellido_casada,
                'celular' => $request->celular,
                'telefono_casa' => $request->telefono_casa,
                'cui' => $request->cui,
                'pasaporte' => $request->pasaporte,
                'genero' => $request->genero,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'edad' => $request->edad,
                'años_experiencia' => $request->años_experiencia,
                'correo' => $request->correo,
                'direccion' => $request->direccion,
                'foto' => $request->foto,
                'estado_civil' => $request->estado_civil,
                'nit' => $request->nit,
                'fecha_registro' => $request->fecha_registro,
                'escolaridad' => $request->escolaridad,
                'nivel_cdag_id' => decrypt($request->nivel_cdag_id),
                'nivel_fadn_id' => decrypt($request->nivel_fadn_id),
                'departamento_id' => decrypt($request->departamento_id),
                'nacionalidad_id' => decrypt($request->nacionalidad_id),
                'deporte_id' => decrypt($request->deporte_id),
                'tipo_contrato_id' => decrypt($request->tipo_contrato_id),
            ]);
            if($request->hasFile('foto'))
            {
                $file = $request->file('foto');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('uploads/alumnos/', $filename);
                $entrenador->foto = $filename;
            }
            $usuario = User::where('email',$request->correo)->first();
            if($usuario != null){
                $tipoUsuarioId = $usuario->tipo_usuario_id;
                if($tipoUsuarioId!=null){
                    switch($tipoUsuarioId){
                        case 1:
                            $alumno = Alumno::where('correo',$request->email)->first();
                            Atleta::where('alumno_id',$alumno->id)->update(['estado'=>'inactivo']);
                            break;
                        case 3:
                            Psicologia::where('correo',$request->correo)->update(['estado'=>'inactivo']);
                            break;
                    }
                }
                else{
                    Administracion::where('user_id',$usuario->id)->update(['estado'=>'inactivo']);
                }
                DB::table('model_has_roles')->where('model_id',$usuario->id)->delete();
                $usuario->update(['tipo_usuario_id'=>2]);
                $usuario->assignRole('Entrenador');
            }
            $entrenador->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>14]);
            $control->save();
            DB::commit();
            return redirect()->action([EntrenadorController::class, 'index'])->with('success','Entrenador registrado exitosamente');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'Se produjo un error al registrar al entrenador');
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
            $entrenador = Entrenador::find(decrypt($id));
            $nivel_cdag = Nivel_cdag::find($entrenador->nivel_cdag_id);
            $nivel_fadn = Nivel_fadn::find($entrenador->nivel_fadn_id);
            $departamento = Departamento::find($entrenador->departamento_id);
            $nacionalidad = Nacionalidad::find($entrenador->nacionalidad_id);
            $tipo_contrato = Tipo_Contrato::find($entrenador->tipo_contrato_id);
            return view('entrenador.show', compact('entrenador','nivel_cdag','nivel_fadn','departamento','nacionalidad','tipo_contrato'));
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
            $entrenador = Entrenador::find(decrypt($id));
            $niveles_cdag = Nivel_cdag::get(['id','nombre']);
            $niveles_fadn = Nivel_fadn::get(['id','tipo']);
            $departamentos = Departamento::get(['id','nombre']);
            $nacionalidades = Nacionalidad::get(['id','descripcion']);
            $deportes = Deporte::get(['id','nombre']);
            $tipos_contratos = Tipo_Contrato::get(['id','descripcion']);
            return view('entrenador.edit',compact('entrenador','niveles_cdag','niveles_fadn','departamentos','tipos_contratos','deportes','nacionalidades'));
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
            $entrenador = Entrenador::find(decrypt($id));
            if($request->hasFile('foto'))
            {
                $destination = 'uploads/alumnos/'.$entrenador->foto;
                if(File::exists($destination)){
                    File::delete($destination);
                }
                $file = $request->file('foto');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('uploads/alumnos/', $filename);
                $fotografia = $filename;
            }
            else{
                $fotografia = $request->pic;
            }
            $request->validate([
                'celular' => 'nullable|regex:/[0-9]{4}[ -][0-9]{4}/',
                'telefono_casa' => 'nullable|regex:/[0-9]{4}[-][0-9]{4}/'
            ]);
            $entrenador->fill([
                'nombre1' => $request->nombre1,
                'nombre2' => $request->nombre2,
                'nombre3' => $request->nombre3,
                'apellido1' => $request->apellido1,
                'apellido2' => $request->apellido2,
                'apellido_casada' => $request->apellido_casada,
                'celular' => $request->celular,
                'telefono_casa' => $request->telefono_casa,
                'cui' => $request->cui,
                'pasaporte' => $request->pasaporte,
                'genero' => $request->genero,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'edad' => $request->edad,
                'años_experiencia' => $request->años_experiencia,
                'correo' => $request->correo,
                'direccion' => $request->direccion,
                'foto' => $fotografia,
                'estado_civil' => $request->estado_civil,
                'nit' => $request->nit,
                'fecha_registro' => $request->fecha_registro,
                'escolaridad' => $request->escolaridad,
                'nivel_cdag_id' => decrypt($request->nivel_cdag_id),
                'nivel_fadn_id' => decrypt($request->nivel_fadn_id),
                'departamento_id' => decrypt($request->departamento_id),
                'nacionalidad_id' => decrypt($request->nacionalidad_id),
                'deporte_id' => decrypt($request->deporte_id),
                'tipo_contrato_id' => decrypt($request->tipo_contrato_id),
            ]);
            $entrenador->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>14]);
            $control->save();
            DB::commit();
            return redirect()->action([EntrenadorController::class,'index'])->with('success','Información del entrenador actualizada exitosamente');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'Se produjo un error al actualizar la información del entrenador');
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
            Entrenador::find(decrypt($id))->update(['estado' => 'inactivo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>14]);
            $control->save();
            DB::commit();
            return redirect()->route('entrenadores.index')->with('message', 'Entrenador eliminado')->with('success','Entrenador eliminado exitosamente');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'Se produjo un error al eliminar al entrenador');
        }
    }

    public function acciones(){
        try{
            $control = Control::where('tabla_accion_id',14)->with('usuario')->paginate(5);
            return view('entrenador.control',compact('control'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function modificar(){
        try{
            $entrenadores = Entrenador::where('correo',auth()->user()->email)->get();
            if(count($entrenadores)>0){
                $entrenador = Entrenador::find($entrenadores[0]->id);
                $niveles_cdag = Nivel_cdag::get(['id','nombre']);
                $niveles_fadn = Nivel_fadn::get(['id','tipo']);
                $departamentos = Departamento::get(['id','nombre']);
                $nacionalidades = Nacionalidad::get(['id','descripcion']);
                $deportes = Deporte::get(['id','nombre']);
                $tipos_contratos = Tipo_Contrato::get(['id','descripcion']);
                return view('entrenador.informacionPersonal',compact('entrenador','niveles_cdag','niveles_fadn','departamentos','tipos_contratos','deportes','nacionalidades'));
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
            $entrenadores = Entrenador::where('correo',auth()->user()->email)->get();
            $entrenador = Entrenador::find($entrenadores[0]->id);
            if($request->hasFile('foto'))
            {
                $destination = 'uploads/alumnos/'.$entrenador->foto;
                if(File::exists($destination)){
                    File::delete($destination);
                }
                $file = $request->file('foto');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('uploads/alumnos/', $filename);
                $fotografia = $filename;
            }
            else{
                $fotografia = $request->pic;
            }
            $entrenador->fill([
                'nombre1' => $request->nombre1,
                'nombre2' => $request->nombre2,
                'nombre3' => $request->nombre3,
                'apellido1' => $request->apellido1,
                'apellido2' => $request->apellido2,
                'apellido_casada' => $request->apellido_casada,
                'celular' => $request->celular,
                'telefono_casa' => $request->telefono_casa,
                'cui' => $request->cui,
                'pasaporte' => $request->pasaporte,
                'genero' => $request->genero,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'edad' => $request->edad,
                'años_experiencia' => $request->años_experiencia,
                'correo' => $request->correo,
                'direccion' => $request->direccion,
                'foto' => $fotografia,
                'estado_civil' => $request->estado_civil,
                'nit' => $request->nit,
                'fecha_registro' => $request->fecha_registro,
                'escolaridad' => $request->escolaridad,
                'nivel_cdag_id' => decrypt($request->nivel_cdag_id),
                'nivel_fadn_id' => decrypt($request->nivel_fadn_id),
                'departamento_id' => decrypt($request->departamento_id),
                'nacionalidad_id' => decrypt($request->nacionalidad_id),
                'deporte_id' => decrypt($request->deporte_id),
                'tipo_contrato_id' => decrypt($request->tipo_contrato_id),
            ]);
            $entrenador->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>14]);
            $control->save();
            DB::commit();
            return redirect('modificar')->with('success','Información actualizada exitosamente');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'Se produjo un error al actualizar la información');
        }
    }

    public function eliminados(){
        try{
            $eliminar = Entrenador::where('estado', 'inactivo')->get();
            return view('entrenador.eliminados',compact('eliminar'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function restaurar(Request $request){
        DB::beginTransaction();
        try{
            Entrenador::find(decrypt($request->e))->update(['estado'=>'activo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>14]);
            $control->save();
            DB::commit();
            return redirect()->action([EntrenadorController::class,'index'])->with('success','Entrenador restaurado exitosamente');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'Se produjo un error al restaurar al entrenador');
        }
    }
}
