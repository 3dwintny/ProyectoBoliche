<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Atleta;
use App\Models\Entrenador;
use App\Models\Psicologia;
use App\Models\Alumno;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\Control;
use App\Models\Administracion;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $usuarios =User::all();
            return view('users.indexs', compact('usuarios'));
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
            $roles = Role::pluck('name','name')->all();
            return view('users.crear', compact('roles'));
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
            $usuario = User::where('email',$request->email)->first();
            if($usuario != null){
                $tipoUsuarioId = $usuario->tipo_usuario_id;
                if($tipoUsuarioId!=null){
                    switch($tipoUsuarioId){
                        case 1:
                            $alumno = Alumno::where('correo',$request->email)->first();
                            Atleta::where('alumno_id',$alumno->id)->update(['estado'=>'inactivo']);
                            break;
                        case 2:
                            Entrenador::where('correo',$usuario->email)->update(['estado'=>'inactivo']);
                            break;
                        case 3:
                            Psicologia::where('correo',$request->correo)->update(['estado'=>'inactivo']);
                            break;
                    }
                }
                DB::table('model_has_roles')->where('model_id',$usuario->id)->delete();
                $usuario->update(['tipo_usuario_id'=>null]);
                $usuario->assignRole('Administrador');
                $administrador = new Administracion(['estado'=>'activo','user_id'=>$usuario->id]);
                $administrador->save();
                $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>31]);
                $control->save();
                DB::commit();
                return redirect()->route('usuarios.index')->with('success','Usuario registrado exitosamente');
            }
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required | email | unique:users,email,',
                'password' => 'required | same:confirm-password',
                'roles' => 'required'
            ]);
            $rol = $request->roles;
            $input = $request->all();
            $input ['password'] = Hash::make($input['password']);
    
            $user = User::create($input);
            $user->assignRole($request -> input('roles'));
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>31]);
            $control->save();
            if($rol[0] == 'Usuario'){
                $ultimoUsuario = User::max('id');
                $administrador = new Administracion(['estado'=>'activo','user_id'=>$ultimoUsuario]);
                $administrador->save();
            }
            DB::commit();
            return redirect()->route('usuarios.index')->with('success','Usuario registrado exitosamente');
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
            $user = User::find(decrypt($id));
            $nombreUsuario = $user->name;
            $roles = Role::pluck('name', 'name')->all();
            $userRole = $user->roles->pluck('name', 'name')->all();
            return view('users.editar', compact('user', 'roles', 'userRole','nombreUsuario'));
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
        $input = $request->all();
        $rol = implode(",",$input['roles']);
        $usuario = User::where('email',$request->email)->first();
        if($rol=="Administrador"){
            $administrador = Administracion::where('user_id',$usuario->id)->first();
            if($administrador==null){
                return back()->with('error', 'La información del usuario no se ha modificado, el usuario no ha sido registrado como Administrador');
            }
        }
        else if($rol=="Entrenador"){
            $entrenador = Entrenador::where('correo',$usuario->email)->first();
            if($entrenador==null){
                return back()->with('error','La información del usuario no se ha modificado, el usuario no ha sido registrado como Entrenador');
            }
        }
        else if($rol=="Atleta"){
            $alumno = Alumno::where('correo',$usuario->email)->first();
            if($alumno==null){
                return back()->with('error','La información del usuario no se puede actualizar, el usuario no ha sido registrado como Atleta');
            }
        }
        else{
            $psicologo = Psicologia::where('correo',$usuario->email)->first();
            if($psicologo==null){
                return back()->with('error','La información del usuario no se ha modificado, el usuario no ha sido registrado como Psicólogo');
            }
        }
        DB::beginTransaction();
        try{
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.decrypt($id),
                'password' => 'same:confirm-password',
                'roles' => 'required'
            ]);
    
            $contrasenia = null;
            if(!empty($input['password'])){
                $contrasenia = Hash::make($input['password']);
            }
            
            if($usuario != null){
                $tipoUsuarioId = $usuario->tipo_usuario_id;
                if($tipoUsuarioId!=null){
                    switch($tipoUsuarioId){
                        case 1:
                            $alumno = Alumno::where('correo',$usuario->email)->first();
                            Atleta::where('alumno_id',$alumno->id)->update(['estado'=>'inactivo']);
                            break;
                        case 2:
                            Entrenador::where('correo',$usuario->email)->update(['estado'=>'inactivo']);
                            break;
                        case 3:
                            Psicologia::where('correo',$usuario->email)->update(['estado'=>'inactivo']);
                            break;
                    }
                }
                else{
                    Administracion::where('user_id',$usuario->id)->update(['estado'=>'inactivo']);
                }
            }
            $tipo_usuario_id=null;
            if($rol=="Administrador"){
                Administracion::where('user_id',$usuario->id)->update(['estado'=>'activo']);
            }
            else if($rol=="Atleta"){
                $tipo_usuario_id=1;
                $alumno = Alumno::where('correo',$request->email)->first();
                Atleta::where('alumno_id',$alumno->id)->update(['estado'=>'activo']);
            }
            else if($rol=="Entrenador"){
                $tipo_usuario_id=2;
                Entrenador::where('correo',$usuario->email)->update(['estado'=>'activo']); 
            }
            else{
                $tipo_usuario_id=3;
                Psicologia::where('correo',$usuario->email)->update(['estado'=>'activo']);
            }
    
            $user = User::find(decrypt($id));
            if($contrasenia==null){
                $user->fill([
                    'name'=>$input['name'],
                    'email'=>$input['email'],
                    'tipo_usuario_id'=>$tipo_usuario_id,
                ]);
            }
            else{
                $user->fill([
                    'name'=>$input['name'],
                    'email'=>$input['email'],
                    'password'=>$contrasenia,
                    'tipo_usuario_id'=>$tipo_usuario_id,
                ]);
            }
            $user->save();
            DB::table('model_has_roles')->where('model_id',decrypt($id))->delete();
    
            $user->assignRole($request->input('roles'));
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>31]);
            $control->save();
            DB::commit();
            return redirect()->route('usuarios.index')->with('success','Usuario actualizado exitosamente');
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
        try{
            DB::table('users')->where('id',decrypt($id))->delete();
            return redirect()->route('usuarios.index')->with('success','Usuario eliminado exitosamente');
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al eliminar al usuario');
        }
    }

    

    public function acciones(){
        try{
            $control = Control::where('tabla_accion_id',31)->with('usuario')->paginate(5);
            return view('users.control',compact('control'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }
}
