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
        $usuarios =User::all();
        return view('users.indexs', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.crear', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        if($rol[0] == 'Administrador'){
            $ultimoUsuario = User::max('id');
            $administrador = new Administracion(['estado'=>'activo','user_id'=>$ultimoUsuario]);
            $administrador->save();
        }
        return redirect()->route('usuarios.index');
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
        $user = User::find(decrypt($id));
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('users.editar', compact('user', 'roles', 'userRole'));
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
        if($rol=="Administrador"){
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
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id',decrypt($id))->delete();
        return redirect()->route('usuarios.index');
    }

    public function acciones(){
        $control = Control::where('tabla_accion_id',31)->with('usuario')->paginate(5);
        return view('users.control',compact('control'));
    }
}
