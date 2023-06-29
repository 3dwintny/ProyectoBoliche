<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
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
            report($e);
            $this->addError('error','Se produjo un error al procesar la solicitud');
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
            report($e);
            $this->addError('error','Se produjo un error al procesar la solicitud');
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
        catch(\Exception $e){
            DB::rollBack();
            report($e);
            $this->addError('error','Se produjo un error al registrar al usuario');
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
            $roles = Role::pluck('name', 'name')->all();
            $userRole = $user->roles->pluck('name', 'name')->all();
            return view('users.editar', compact('user', 'roles', 'userRole'));
        }
        catch(\Exception $e){
            report($e);
            $this->addError('error','Se produjo un error al procesar la solicitud');
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
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.decrypt($id),
                'password' => 'same:confirm-password',
                'roles' => 'required'
            ]);
    
            $input = $request->all();
            $rol = implode(",",$input['roles']);
            if(!empty($input['password'])){
                $contrasenia = Hash::make($input['password']);
            }else{
                $contrasenia = Arr::except($input,array('password'));
            }
            $tipo_usuario_id=null;
            if($rol=="Usuario"){
                $tipo_usuario_id=null;
            }
            else if($rol=="Atleta"){
                $tipo_usuario_id=1;
            }
            else if($rol=="Entrenador"){
                $tipo_usuario_id=2;
            }
            else{
                $tipo_usuario_id=3;
            }
    
            $user = User::find(decrypt($id));
            $user->fill([
                'name'=>$input['name'],
                'email'=>$input['email'],
                'password'=>$contrasenia,
                'tipo_usuario_id'=>$tipo_usuario_id,
            ]);
            $user->save();
            DB::table('model_has_roles')->where('model_id',decrypt($id))->delete();
    
            $user->assignRole($request->input('roles'));
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>31]);
            $control->save();
            DB::commit();
            return redirect()->route('usuarios.index')->with('success','Usuario actualizado exitosamente');
        }
        catch(\Exception $e){
            DB::rollBack();
            report($e);
            $this->addError('error','Se produjo un error al actualizar la información del usuario');
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
            report($e);
            $this->addError('error','Se produjo un error al eliminar al usuario');
        }
    }

    public function acciones(){
        try{
            $control = Control::where('tabla_accion_id',31)->with('usuario')->paginate(5);
            return view('users.control',compact('control'));
        }
        catch(\Exception $e){
            report($e);
            $this->addError('error','Se produjo un error al procesar la solicitud');
        }
    }
}
