<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Alumno;
use App\Models\Entrenador;
use App\Models\Psicologia;
use App\Models\Tipo_Usuario;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::all();
       /*  $roles = Role::pluck('name','name')->all(); */
        return view('auth.register',compact("roles"));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $roles = $_POST['roles'];
        $correo = $_POST['email'];
        switch($roles){
            case 1:
                $contadorC=0;
                $contadorE=0;
                $alumno = Alumno::where('correo',$correo)->get();
                foreach($alumno as $a){
                    $contadorC++;
                    if($a->estado=='Inscrito'){
                        $contadorE++;
                    }
                }
                if($contadorC>0 && $contadorE>0){
                    $request->validate([
                        'name' => ['required', 'string', 'max:255'],
                        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                        'password' => ['required', 'confirmed', Rules\Password::defaults()],
                        'roles' => ['required','integer'],
                    ]);

                    $user = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        /* 'tipo_usuario_id' => $request->tipo_usuario_id, */
                    ]);
                    event(new Registered($user));
                    Auth::login($user);
                    $user->assignRole($request->input('roles'));
                    return redirect(RouteServiceProvider::HOME);

                }
                else{
                    return redirect()->action([RegisteredUserController::class,'create'])->with('warning', 'Su correo no esta registrado en nuestra base de datos, porfavor comuniquese con administración');
                }
                break;
            case 2:
                $contadorC=0;
                $entrenador = Entrenador::where('correo',$correo)->get();
                foreach($entrenador as $e){
                    $contadorC++;
                }
                if($contadorC>0){
                    $request->validate([
                        'name' => ['required', 'string', 'max:255'],
                        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                        'password' => ['required', 'confirmed', Rules\Password::defaults()],
                        'roles' => ['required','integer'],
                    ]);

                    $user = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                       /*  'tipo_usuario_id' => $request->tipo_usuario_id, */
                    ]);
                    event(new Registered($user));
                    Auth::login($user);
                    $user->assignRole($request->input('roles'));
                    return redirect(RouteServiceProvider::HOME);
                }
                else{
                    return redirect()->action([RegisteredUserController::class,'create'])->with('warning', 'Su correo no esta registrado en nuestra base de datos, porfavor comuniquese con administración');
                }
                break;
            case 3:
                $contadorC=0;
                $psicologo = Psicologia::where('correo',$correo)->get();
                foreach($psicologo as $a){
                    $contadorC++;
                }
                if($contadorC>0){
                    $request->validate([
                        'name' => ['required', 'string', 'max:255'],
                        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                        'password' => ['required', 'confirmed', Rules\Password::defaults()],
                        'roles' => ['required','integer'],
                    ]);

                    $user = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        /* 'tipo_usuario_id' => $request->tipo_usuario_id, */
                    ]);
                    event(new Registered($user));
                    Auth::login($user);
                    $user->assignRole($request->input('roles'));
                    return redirect(RouteServiceProvider::HOME);
                }
                else{
                    return redirect()->action([RegisteredUserController::class,'create'])->with('warning', 'Su correo no esta registrado en nuestra base de datos, porfavor comuniquese con administración');
                }
                break;
        }
    }

}
