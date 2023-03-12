<?php

namespace App\Http\Controllers;
use App\Models\Nivel_cdag;
use App\Models\Nivel_fadn;
use App\Models\Tipo_Contrato;
use App\Models\Departamento;
use App\Models\Nacionalidad;
use App\Models\Deporte;
use App\Models\Entrenador;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use App\Models\Control;

class EntrenadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:ver-rol | crear-rol | editar-rol |  eliminar-rol ', ['only'=> ['index']]);
        $this->middleware('permission:crear-rol', ['only'=> ['create','store']]);
        $this->middleware('permission:editar-rol', ['only'=> ['edit','update']]);
        $this->middleware('permission:eliminar-rol', ['only'=> ['destroy']]);
    }

    public function index()
    {
        $entrenadores = Entrenador::where('estado','activo')->get(['id','nombre1','nombre2','nombre3','apellido1','apellido2','apellido_casada',
                        'celular','telefono_casa','cui','pasaporte','genero','fecha_nacimiento','edad','años_experiencia','correo','direccion',
                        'foto','estado_civil','nit','fecha_registro','escolaridad','nivel_cdag_id','nivel_fadn_id','departamento_id',
                        'nacionalidad_id','deporte_id','tipo_contrato_id']);
        return view('entrenador.index', compact('entrenadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoy = Carbon::now();
        $niveles_cdag = Nivel_cdag::get(['id','nombre']);
        $niveles_fadn = Nivel_fadn::get(['id','tipo']);
        $departamentos = Departamento::get(['id','nombre']);
        $nacionalidades = Nacionalidad::get(['id','descripcion']);
        $deportes = Deporte::get(['id','nombre']);
        $tipos_contratos = Tipo_Contrato::get(['id','descripcion']);
        return view('entrenador.create',compact("niveles_cdag","niveles_fadn","departamentos","nacionalidades"
        ,"deportes","tipos_contratos","hoy"));
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
            'cui'=>['unique:entrenador'],
            'correo'=>['unique:entrenador']
        ]);
        $entrenador = new Entrenador([
            'nombre1' => $request->nombre1,
            'nombre2' => $request->nombre2,
            'nombre3' => $request->nombre3,
            'apellido1' => $request->apellido1,
            'apellido2' => $request->apellido2,
            'apellido_casada' => $request->apellido_casada,
            'celular' => $request->celular,
            'telefono_casa' => $request->telefono_casa,
            'cui' => $request->cui,
            'pasaporte' => $request->pasaporte,
            'genero' => $request->genero,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'edad' => $request->edad,
            'años_experiencia' => $request->años_experiencia,
            'correo' => $request->correo,
            'direccion' => $request->direccion,
            'foto' => $request->foto,
            'estado_civil' => $request->estado_civil,
            'nit' => $request->nit,
            'fecha_registro' => $request->fecha_registro,
            'escolaridad' => $request->escolaridad,
            'nivel_cdag_id' => decrypt($request->nivel_cdag_id),
            'nivel_fadn_id' => decrypt($request->nivel_fadn_id),
            'departamento_id' => decrypt($request->departamento_id),
            'nacionalidad_id' => decrypt($request->nacionalidad_id),
            'deporte_id' => decrypt($request->deporte_id),
            'tipo_contrato_id' => decrypt($request->tipo_contrato_id),
        ]);
        if($request->hasFile('foto'))
        {
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('storage/uploads/', $filename);
            $entrenador->foto = $filename;
        }
        $entrenador->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>14]);
        $control->save();
        return redirect()->action([EntrenadorController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entrenador = Entrenador::find(decrypt($id));
        $nivel_cdag = Nivel_cdag::find($entrenador->nivel_cdag_id); 
        $nivel_fadn = Nivel_fadn::find($entrenador->nivel_fadn_id); 
        $departamento = Departamento::find($entrenador->departamento_id);
        $nacionalidad = Nacionalidad::find($entrenador->nacionalidad_id);
        $tipo_contrato = Tipo_Contrato::find($entrenador->tipo_contrato_id);
        return view('entrenador.show', compact('entrenador','nivel_cdag','nivel_fadn','departamento','nacionalidad','tipo_contrato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entrenador = Entrenador::find(decrypt($id));
        $niveles_cdag = Nivel_cdag::get(['id','nombre']);
        $niveles_fadn = Nivel_fadn::get(['id','tipo']);
        $departamentos = Departamento::get(['id','nombre']);
        $nacionalidades = Nacionalidad::get(['id','descripcion']);
        $deportes = Deporte::get(['id','nombre']);
        $tipos_contratos = Tipo_Contrato::get(['id','descripcion']);
        return view('entrenador.edit',compact('entrenador','niveles_cdag','niveles_fadn','departamentos','tipos_contratos','deportes','nacionalidades'));
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
        $entrenador = Entrenador::find(decrypt($id));
        if($request->hasFile('foto'))
        {
            $destination = 'storage/uploads/'.$entrenador->foto;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('storage/uploads/', $filename);
            $fotografia = $filename;
        }
        else{
            $fotografia = $request->pic;
        }
        $entrenador->fill([
            'nombre1' => $request->nombre1,
            'nombre2' => $request->nombre2,
            'nombre3' => $request->nombre3,
            'apellido1' => $request->apellido1,
            'apellido2' => $request->apellido2,
            'apellido_casada' => $request->apellido_casada,
            'celular' => $request->celular,
            'telefono_casa' => $request->telefono_casa,
            'cui' => $request->cui,
            'pasaporte' => $request->pasaporte,
            'genero' => $request->genero,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'edad' => $request->edad,
            'años_experiencia' => $request->años_experiencia,
            'correo' => $request->correo,
            'direccion' => $request->direccion,
            'foto' => $fotografia,
            'estado_civil' => $request->estado_civil,
            'nit' => $request->nit,
            'fecha_registro' => $request->fecha_registro,
            'escolaridad' => $request->escolaridad,
            'nivel_cdag_id' => decrypt($request->nivel_cdag_id),
            'nivel_fadn_id' => decrypt($request->nivel_fadn_id),
            'departamento_id' => decrypt($request->departamento_id),
            'nacionalidad_id' => decrypt($request->nacionalidad_id),
            'deporte_id' => decrypt($request->deporte_id),
            'tipo_contrato_id' => decrypt($request->tipo_contrato_id),
        ]);
        $entrenador->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>14]);
        $control->save();
        return redirect()->action([EntrenadorController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Entrenador::find(decrypt($id))->update(['estado' => 'inactivo']);
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>14]);
        $control->save();
        return redirect()->route('entrenadores.index')->with('message', 'Entrenador eliminado');;
    }

    public function acciones(){
        $control = Control::where('tabla_accion_id',14)->with('usuario')->paginate(5);
        return view('entrenador.control',compact('control'));
    }

    public function modificar(){
        $entrenadores = Entrenador::where('correo',auth()->user()->email)->get();
        if(count($entrenadores)>0){
            $entrenador = Entrenador::find($entrenadores[0]->id);
            $niveles_cdag = Nivel_cdag::get(['id','nombre']);
            $niveles_fadn = Nivel_fadn::get(['id','tipo']);
            $departamentos = Departamento::get(['id','nombre']);
            $nacionalidades = Nacionalidad::get(['id','descripcion']);
            $deportes = Deporte::get(['id','nombre']);
            $tipos_contratos = Tipo_Contrato::get(['id','descripcion']);
            return view('entrenador.informacionPersonal',compact('entrenador','niveles_cdag','niveles_fadn','departamentos','tipos_contratos','deportes','nacionalidades'));
        }
        else{
            return redirect('home');
        }
    }

    public function actualizar(Request $request){
        $entrenadores = Entrenador::where('correo',auth()->user()->email)->get();
        $entrenador = Entrenador::find($entrenadores[0]->id);
        if($request->hasFile('foto'))
        {
            $destination = 'storage/uploads/'.$entrenador->foto;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('storage/uploads/', $filename);
            $fotografia = $filename;
        }
        else{
            $fotografia = $request->pic;
        }
        $entrenador->fill([
            'nombre1' => $request->nombre1,
            'nombre2' => $request->nombre2,
            'nombre3' => $request->nombre3,
            'apellido1' => $request->apellido1,
            'apellido2' => $request->apellido2,
            'apellido_casada' => $request->apellido_casada,
            'celular' => $request->celular,
            'telefono_casa' => $request->telefono_casa,
            'cui' => $request->cui,
            'pasaporte' => $request->pasaporte,
            'genero' => $request->genero,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'edad' => $request->edad,
            'años_experiencia' => $request->años_experiencia,
            'correo' => $request->correo,
            'direccion' => $request->direccion,
            'foto' => $fotografia,
            'estado_civil' => $request->estado_civil,
            'nit' => $request->nit,
            'fecha_registro' => $request->fecha_registro,
            'escolaridad' => $request->escolaridad,
            'nivel_cdag_id' => decrypt($request->nivel_cdag_id),
            'nivel_fadn_id' => decrypt($request->nivel_fadn_id),
            'departamento_id' => decrypt($request->departamento_id),
            'nacionalidad_id' => decrypt($request->nacionalidad_id),
            'deporte_id' => decrypt($request->deporte_id),
            'tipo_contrato_id' => decrypt($request->tipo_contrato_id),
        ]);
        $entrenador->save();
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>14]);
        $control->save();
        return redirect('home');
    }

    public function eliminados(){
        $eliminar = Entrenador::where('estado', 'inactivo')->get();
        return view('entrenador.eliminados',compact('eliminar'));
    }

    public function restaurar(Request $request){
        Entrenador::find(decrypt($request->e))->update(['estado'=>'activo']);
        return redirect()->action([EntrenadorController::class,'index']);
    }
}
