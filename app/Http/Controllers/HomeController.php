<?php

namespace App\Http\Controllers;
use App\Models\Psicologia;

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
        return view('dashboard');
    }
    public function wel()
    {
        return view('welcome');
    }
  
}
