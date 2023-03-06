<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Entrenador;
use App\Models\Psicologia;
use App\Models\Alumno;
use App\Models\Atleta;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $usuario = User::where('email',$request->email)->get();
        if(count($usuario)>0){
            if($usuario[0]->tipo_usuario_id!=null){
                switch($usuario[0]->tipo_usuario_id){
                    case 1:
                        $alumno = Alumno::where('correo',$usuario[0]->email)->get();
                        $atleta = Atleta::where('alumno_id',$alumno[0]->id)->get();
                        if($atleta[0]->estado=='inactivo'){
                            return redirect()->back()->with('warning','Usted ya no forma parte de la asociación, para más información, comuníquese con la administración.');
                        }
                        else{
                            $request->authenticate();
                            $request->session()->regenerate();
                            return redirect('home');
                        }
                        break;
                    case 2:
                        $entrenador = Entrenador::where('correo',$usuario[0]->email)->get();
                        if($entrenador[0]->estado=='inactivo'){
                            return redirect()->back()->with('warning','Usted ya no forma parte de la asociación, para más información, comuníquese con la administración.');
                        }
                        else{
                            $request->authenticate();
                            $request->session()->regenerate();
                            return redirect('home');
                        }
                        break;
                    case 3:
                        $psicologo = Psicologia::where('correo',$usuario[0]->email)->get();
                        if ($psicologo[0]->estado =='inactivo') {
                            return redirect()->back()->with('warning','Usted ya no forma parte de la asociación, para más información, comuníquese con la administración.');
                        }else{
                            $request->authenticate();
                            $request->session()->regenerate();
                            return redirect('home');
                        }
                        break;
                }  
            }
            else{
                $request->authenticate();
                $request->session()->regenerate();
                return redirect('home');
            }
        }
        else{
            $request->authenticate();
            $request->session()->regenerate();
            return redirect('home');
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
