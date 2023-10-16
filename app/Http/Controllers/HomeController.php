<?php

namespace App\Http\Controllers;
use App\Models\Psicologia;
use App\Models\Entrenador;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if(auth()->user()->tipo_usuario_id==3){
            $psicologia = Psicologia::where('correo',auth()->user()->email)->first();
            if($psicologia->codigo_correo==null){
                return view('configuraciones.psicologia.codigoCorreo');
            }
        }

        if(auth()->user()->tipo_usuario_id==2){
            $entrenador = Entrenador::where('correo',auth()->user()->email)->first();
            if($entrenador->codigo_correo==null){
                return view('entrenador.codigoCorreo');
            }
        }
        return view('dashboard');
    }
    public function wel()
    {
        return view('welcome');
    }
  
}
