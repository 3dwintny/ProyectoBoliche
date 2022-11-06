<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Alumno;
use App\Models\Tipo_Usuario;
use App\Models\Entrenador;
use App\Models\Psicologia;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tipo_usuarios = Tipo_Usuario::all();
        return view('auth.register',compact("tipo_usuarios"));
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
        $tipoUsuario = $_POST['tipo_usuario_id'];
        $correo = $_POST['email'];
        switch($tipoUsuario){
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
                        'tipo_usuario_id' => ['required','integer'],
                    ]);
            
                    $user = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'tipo_usuario_id' => $request->tipo_usuario_id,
                    ]);
                    event(new Registered($user));
                    Auth::login($user);
                    return redirect(RouteServiceProvider::HOME);
                }
                else{
                    echo "Valió Queso";
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
                        'tipo_usuario_id' => ['required','integer'],
                    ]);
            
                    $user = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'tipo_usuario_id' => $request->tipo_usuario_id,
                    ]);
                    event(new Registered($user));
                    Auth::login($user);
                    return redirect(RouteServiceProvider::HOME);
                }
                else{
                    echo "Valió Queso";
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
                        'tipo_usuario_id' => ['required','integer'],
                    ]);
            
                    $user = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'tipo_usuario_id' => $request->tipo_usuario_id,
                    ]);
                    event(new Registered($user));
                    Auth::login($user);
                    return redirect(RouteServiceProvider::HOME);
                }
                else{
                    echo "Valió Queso";
                }
                break;
        }
    }
}
