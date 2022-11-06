<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

namespace App\Http\Controllers\Auth;


use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Validation\Rules;
use App\Models\Alumno;
use App\Models\Tipo_Usuario;
use App\Models\Entrenador;
use App\Models\Psicologia;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $request)
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
    

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
