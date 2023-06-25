<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Alumno;
use App\Models\Entrenador;
use App\Models\Psicologia;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

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
        $roles = decrypt($request->roles);
        $correo = $request->email;
        switch($roles){
            case 1:
                $contadorC=0;
                $contadorE=0;
                $alumno = Alumno::where('correo',$correo)->get();
                if(count($alumno)>0){
                    $contadorC++;
                    if($alumno[0]->estado=='Inscrito'){
                        $contadorE++;
                    }
                }
                
                if($contadorC>0 && $contadorE>0){
                    $request->validate([
                        'name' => ['required', 'string', 'max:255'],
                        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                        'password' => ['required', 'confirmed', Rules\Password::defaults()],
                        'roles' => ['required'],
                    ]);

                    $user = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'tipo_usuario_id' => $roles,
                    ]);
                    event(new Registered($user));
                    Auth::login($user);
                    $user->assignRole($roles);
                    return redirect(RouteServiceProvider::HOME);
                }
                else{
                    $contadorC = -1;
                    return redirect()->action([RegisteredUserController::class,'create'])->with("contadorC",$contadorC)->withInput();
                }
                break;
            case 2:
                $contadorC=0;
                $entrenador = Entrenador::where('correo',$correo)->get();
                if(count($entrenador)>0){
                    $contadorC++;
                }
                if($contadorC>0){
                    $request->validate([
                        'name' => ['required', 'string', 'max:255'],
                        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                        'password' => ['required', 'confirmed', Rules\Password::defaults()],
                        'roles' => ['required'],
                    ]);

                    $user = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'tipo_usuario_id' => $roles,
                    ]);
                    event(new Registered($user));
                    Auth::login($user);
                    $user->assignRole($roles);
                    return redirect(RouteServiceProvider::HOME);
                }
                else{
                    $contadorC = -1;
                    return redirect()->action([RegisteredUserController::class,'create'])->with("contadorC",$contadorC)->withInput();
                }
                break;
            case 3:
                $contadorC=0;
                $psicologo = Psicologia::where('correo',$correo)->get();
                if(count($psicologo) > 0){
                    $contadorC++;
                }
                if($contadorC>0){
                    $request->validate([
                        'name' => ['required', 'string', 'max:255'],
                        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                        'password' => ['required', 'confirmed', Rules\Password::defaults()],
                        'roles' => ['required'],
                    ]);

                    $user = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'tipo_usuario_id' => $roles,
                    ]);
                    event(new Registered($user));
                    Auth::login($user);
                    $user->assignRole($roles);
                    return redirect(RouteServiceProvider::HOME);
                }
                else{
                    $contadorC = -1;
                    return redirect()->action([RegisteredUserController::class,'create'])->with("contadorC",$contadorC)->withInput();
                }
                break;
        }
    }

}
