<?php

namespace App\Http\Controllers;

use App\Models\Psicologia;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Control;

class PsicologiaController extends Controller
{
    protected $p;
    public function __construct(Psicologia $p){
        $this->p = $p;  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $psicologo = Psicologia::where('estado','activo')->paginate(5);
        return view('configuraciones.psicologia.show', compact('psicologo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoy = Carbon::now();
        return view('configuraciones.psicologia.create',compact('hoy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'correo'=>['unique:psicologia'],
            'colegiado'=>['unique:psicologia'],
            'telefono' => 'nullable|regex:/[0-9]{4}[-][0-9]{4}/'
        ]);
        $psicologo = new Psicologia([
            'nombre1' => $request->nombre1,
            'nombre2' => $request->nombre2,
            'nombre3' => $request->nombre3,
            'apellido1' => $request->apellido1,
            'apellido2' => $request->apellido2,
            'apellido_casada' => $request->apellido_casada,
            'colegiado' => $request->colegiado,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'direccion' => $request->direccion,
            'fecha_inicio_labores' => $request->fecha_inicio_labores,
        ]);
        $psicologo->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>27]);
        $control->save();
        return redirect()->action([PsicologiaController::class,'index']);
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
        $psicologo = $this->p->obtenerPsicologiaById(decrypt($id));
        return view('configuraciones.psicologia.edit',['psicologo' => $psicologo]);
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
        $psicologo = Psicologia::find(decrypt($id));
        $request->validate([
            'telefono' => 'nullable|regex:/[0-9]{4}[-][0-9]{4}/'
        ]);
        $psicologo ->fill([
            'nombre1' => $request->nombre1,
            'nombre2' => $request->nombre2,
            'nombre3' => $request->nombre3,
            'apellido1' => $request->apellido1,
            'apellido2' => $request->apellido2,
            'apellido_casada' => $request->apellido_casada,
            'colegiado' => $request->colegiado,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'direccion' => $request->direccion,
            'fecha_inicio_labores' => $request->fecha_inicio_labores,
        ]);
        $psicologo->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>27]);
        $control->save();
        return redirect()->action([PsicologiaController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Psicologia::find(decrypt($id))->update(['estado' => 'inactivo']);
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>27]);
        $control->save();
        return redirect()->action([PsicologiaController::class,'index']);
    }

    public function modificar(){
        $psicologos = Psicologia::where('correo',auth()->user()->email)->get();
        if(count($psicologos)>0){
            $psicologo = Psicologia::find($psicologos[0]->id);
            return view('configuraciones.psicologia.informacionPersonal',compact('psicologo'));
        }
        else{
            return redirect('home');
        }
    }

    public function actualizar(Request $request){
        $request->validate([
            'telefono' => 'nullable|regex:/[0-9]{4}[-][0-9]{4}/'
        ]);
        $psicologos = Psicologia::where('correo',auth()->user()->email)->get();
        $psicologo = Psicologia::find($psicologos[0]->id);
        $psicologo->fill($request->all());
        $psicologo->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>27]);
        $control->save();
        return redirect('home');
    }

    public function acciones(){
        $control = Control::where('tabla_accion_id',27)->with('usuario')->paginate(5);
        return view('configuraciones.psicologia.control',compact('control'));
    }

    public function eliminados(){
        $eliminar = Psicologia::where('estado', 'inactivo')->get();
        return view('configuraciones.psicologia.eliminados',compact('eliminar'));
    }

    public function restaurar(Request $request){
        Psicologia::find(decrypt($request->e))->update(['estado'=>'activo']);
        return redirect()->action([PsicologiaController::class,'index']);
    }
}