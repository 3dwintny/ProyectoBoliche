<?php

namespace App\Http\Controllers;

use App\Models\Psicologia;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Control;
use App\Models\User;
use App\Models\Alumno;
use App\Models\Atleta;
use App\Models\Entrenador;
use App\Models\Administracion;
use Illuminate\Support\Facades\DB;

class PsicologiaController extends Controller
{
    protected $p;
    public function __construct(Psicologia $p){
        $this->p = $p;  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $psicologo = Psicologia::where('estado','activo')->paginate(5);
            return view('configuraciones.psicologia.show', compact('psicologo'));
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
            return view('configuraciones.psicologia.create',compact('hoy'));
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
                'correo'=>['unique:psicologia'],
                'colegiado'=>['unique:psicologia'],
                'telefono' => 'nullable|regex:/[0-9]{4}[-][0-9]{4}/'
            ]);
            $psicologo = new Psicologia([
                'nombre1' => $request->nombre1,
                'nombre2' => $request->nombre2,
                'nombre3' => $request->nombre3,
                'apellido1' => $request->apellido1,
                'apellido2' => $request->apellido2,
                'apellido_casada' => $request->apellido_casada,
                'colegiado' => $request->colegiado,
                'telefono' => $request->telefono,
                'correo' => $request->correo,
                'direccion' => $request->direccion,
                'fecha_inicio_labores' => $request->fecha_inicio_labores,
            ]);
            $usuario = User::where('email',$request->correo)->first();
            if($usuario != null){
                $tipoUsuarioId = $usuario->tipo_usuario_id;
                if($tipoUsuarioId!=null){
                    switch($tipoUsuarioId){
                        case 1:
                            $alumno = Alumno::where('correo',$request->email)->first();
                            Atleta::where('alumno_id',$alumno->id)->update(['estado'=>'inactivo']);
                            break;
                        case 2:
                            Entrenador::where('correo',$request->correo)->update(['estado'=>'inactivo']);
                            break;
                    }
                }
                else{
                    Administracion::where('user_id',$usuario->id)->update(['estado'=>'inactivo']);
                }
                DB::table('model_has_roles')->where('model_id',$usuario->id)->delete();
                $usuario->update(['tipo_usuario_id'=>3]);
                $usuario->assignRole('Psicólogo');
            }
            $psicologo->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>27]);
            $control->save();
            DB::commit();
            return redirect()->action([PsicologiaController::class,'index'])->with('success','Psicólogo registrado exitosamente');
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
        try{
            $psicologo = $this->p->obtenerPsicologiaById(decrypt($id));
            return view('configuraciones.psicologia.edit',['psicologo' => $psicologo]);
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
            $psicologo = Psicologia::find(decrypt($id));
            $request->validate([
                'telefono' => 'nullable|regex:/[0-9]{4}[-][0-9]{4}/'
            ]);
            $usuario = "";
            if($psicologo->correo!=$request->correo){
                $correoNuevoExiste = User::where('email',$request->correo)->get();
                if(count($correoNuevoExiste)>0){
                    return redirect()->back()->with('error','El correo que desea ingresar ya ha sido registrado');
                }
                else{
                    $usuario = User::where('email',$psicologo->correo)->first();
                    $usuario->fill(['email' => $request->correo,'email_verified_at'=>NULL]);
                    $usuario->save();
                    $psicologo ->fill([
                        'codigo_correo' => NULL
                    ]);
                }
            }
            $psicologo ->fill([
                'nombre1' => $request->nombre1,
                'nombre2' => $request->nombre2,
                'nombre3' => $request->nombre3,
                'apellido1' => $request->apellido1,
                'apellido2' => $request->apellido2,
                'apellido_casada' => $request->apellido_casada,
                'colegiado' => $request->colegiado,
                'telefono' => $request->telefono,
                'correo' => $request->correo,
                'direccion' => $request->direccion,
                'fecha_inicio_labores' => $request->fecha_inicio_labores,
            ]);
            $psicologo->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>27]);
            $control->save();
            DB::commit();
            if($usuario!=""){
                $usuario->sendEmailVerificationNotification();
            }
            return redirect()->action([PsicologiaController::class,'index'])->with('success','Información del psicólogo actualizada exitosamente');
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
        DB::beginTransaction();
        try{
            Psicologia::find(decrypt($id))->update(['estado' => 'inactivo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>27]);
            $control->save();
            DB::commit();
            return redirect()->action([PsicologiaController::class,'index'])->with('success','Psicólogo eliminado exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al eliminar al psicólogo');
        }
    }

    public function modificar(){
        try{
            $psicologos = Psicologia::where('correo',auth()->user()->email)->get('codigo_correo');
            if($psicologos[0]->codigo_correo == null or $psicologos[0]->codigo_correo == ""){
                return redirect('home');
            }
            $psicologos = Psicologia::where('correo',auth()->user()->email)->get();
            if(count($psicologos)>0){
                $psicologo = Psicologia::find($psicologos[0]->id);
                return view('configuraciones.psicologia.informacionPersonal',compact('psicologo'));
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
            $request->validate([
                'telefono' => 'nullable|regex:/[0-9]{4}[-][0-9]{4}/'
            ]);
            $psicologos = Psicologia::where('correo',auth()->user()->email)->get();
            $psicologo = Psicologia::find($psicologos[0]->id);
            $usuario = "";
            if($psicologo->correo!=$request->correo){
                $correoNuevoExiste = User::where('email',$request->correo)->get();
                if(count($correoNuevoExiste)>0){
                    return redirect()->back()->with('error','El correo que desea ingresar ya ha sido registrado');
                }
                else{
                    $usuario = User::where('email',$psicologo->correo)->first();
                    $usuario->fill(['email' => $request->correo,'email_verified_at'=>NULL]);
                    $usuario->save();
                    $psicologo ->fill([
                        'codigo_correo' => NULL
                    ]);
                }
            }
            $psicologo->fill($request->all());
            $psicologo->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>27]);
            $control->save();
            DB::commit();
            if($usuario!=""){
                $usuario->sendEmailVerificationNotification();
                return redirect()->route('login');
            }
            return redirect()->action([PsicologiaController::class,'modificar'])->with('success','Información actualizada exitosamente');
        }
        catch(\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return back()->withErrors($e->validator->errors())->withInput();
        }
    }

    public function acciones(){
        try{
            $control = Control::where('tabla_accion_id',27)->with('usuario')->paginate(5);
            return view('configuraciones.psicologia.control',compact('control'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function eliminados(){
        try{
            $eliminar = Psicologia::where('estado', 'inactivo')->get();
            return view('configuraciones.psicologia.eliminados',compact('eliminar'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function restaurar(Request $request){
        DB::beginTransaction();
        try{
            Psicologia::find(decrypt($request->e))->update(['estado'=>'activo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'RESTAURAR', 'tabla_accion_id'=>27]);
            $control->save();
            DB::commit();
            return redirect()->action([PsicologiaController::class,'index'])->with('success','Psicólogo restaurado exitosamente');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'Se produjo un error al restaurar al psicólogo');
        }
    }

    public function editarCodigoCorreo(){
        try{
            $psicologo = Psicologia::where('correo',auth()->user()->email)->first();
            $codigo = $psicologo->codigo_correo;
            if($codigo == null or $codigo == ""){
                return redirect('home');
            }
            return view('configuraciones.psicologia.editarCodigoCorreo',compact('codigo'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function actualizarCodigoCorreo(Request $request){
        try{
            Psicologia::where('correo',auth()->user()->email)->update(['codigo_correo'=>$request->codigo_correo]);
            return redirect('home');             
        }
        catch(\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return back()->withErrors($e->validator->errors())->withInput();
        }
    }
}