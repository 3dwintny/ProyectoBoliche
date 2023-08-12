<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hashids\Hashids;
use Carbon\Carbon;
use App\Models\Centro;
use App\Models\Departamento;
use App\Models\Horario;
use App\Models\Control;
use Illuminate\Support\Facades\DB;

class CentroController extends Controller
{
    protected $c;

    public function __construct (Centro $c)
    {
        $this->c = $c;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $centro = Centro::where('estado','activo')->with('departamento')->get(['id','nombre','direccion','fecha_registro',
                'institucion','accesibilidad','implementacion','espacio_fisico','departamento_id']);
            return view('configuraciones.centro.show', compact('centro'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $horario = Horario::get(['id','hora_inicio','hora_fin','lunes','martes','miercoles','jueves','viernes','sabado','domingo']);
            $hoy = Carbon::now();
            $departamento = Departamento::get(['id','nombre']);
            return view('configuraciones.centro.create',compact('departamento','hoy','horario'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $request->validate([
                'nombre' => ['unique:centro']
            ]);
            $horario_id = array();
            $horarios = $request->horario_id;
            if($horarios!=null){
                foreach ($horarios as $item){
                    array_push($horario_id,decrypt($item));
                }
            }
            $centro = new Centro(['nombre' => $request->nombre, 'direccion' => $request->direccion, 'fecha_registro' => $request->fecha_registro,
            'institucuion' => $request->institucion,'accesibilidad' => $request->accesibilidad,'implementacion' => $request->implementacion,
            'espacio_fisico' => $request->espacio_fisico,'departamento_id' => decrypt($request->departamento_id)]);
            $centro->save();
            $centro = Centro::latest('id')->first();
            $centro_id = $centro->id;
            if(count($horario_id)>0){
                for ($i=0;$i<count($horario_id);$i++){
                    $informacion = [
                        'horario_id' => $horario_id[$i],
                        'centro_id' => $centro_id,
                    ];
                    DB::table('centro_horario')->insert($informacion);
        
                    $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR', 'tabla_accion_id'=>6]);
                    $control->save();
                }
            }
            DB::commit();
            return redirect()->action([CentroController::class,'index'])->with('success','Centro de entrenamiento registrado exitosamente');
        }
        catch(\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return back()->withErrors($e->validator->errors())->withInput();
        }
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
    public function edit($id, Request $request)
    {
        try{
            $centro = $this->c->obtenerCentroById(decrypt($id));
            $departamento = Departamento::get(['id','nombre']);
            return  view('configuraciones.centro.edit',['centro'=>$centro,'departamento'=>$departamento]);
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
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
        DB::beginTransaction();
        try{
            $centro = Centro::find(decrypt($id));
            $centro->fill(['nombre' => $request->nombre, 'direccion' => $request->direccon, 'fecha_registro' => $request->fecha_registro,
            'institucuion' => $request->institucion,'accesibilidad' => $request->accesibilidad,'implementacion' => $request->implementacion,
            'espacio_fisico' => $request->espacio_fisico,'departamento_id' => decrypt($request->departamento_id)]);
            $centro->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>6]);
            $control->save();
            DB::commit();
            return redirect()->action([CentroController::class,'index'])->with('success','Información del centro de entrenamiento actualizada exitosamente');
        }
        catch(\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return back()->withErrors($e->validator->errors())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            Centro::find(decrypt($id))->update(['estado' => 'inactivo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR', 'tabla_accion_id'=>6]);
            $control->save();
            DB::commit();
            return redirect()->action([CentroController::class,'index'])->with('success','Centro de entrenamiento eliminado exitosamente');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'Se produjo un error al eliminar al centro de entrenamiento');
        }
    }

    //Muestra los horarios asignados a cada centro de entrenamiento
    public function mostrarHorarios($id){
        try{
            $centro = Centro::with('horarios')
            ->where('id', decrypt($id))
            ->get();
            foreach ($centro as $item){
                $centro = $item->nombre;
                $horario = $item->horarios;
            }
            $idEncriptado = $id;
            return view('configuraciones.centro.horario',compact('horario','centro','idEncriptado'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    //Elimina los horarios del centro de entrenamiento
    public function eliminarHorario($id, Request $request){
        DB::beginTransaction();
        try{
            $horario = Horario::find(decrypt($id));
            $centro = Centro::find(decrypt($request->e));
            $centro->horarios()->detach($horario->id);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR HR', 'tabla_accion_id'=>6]);
            $control->save();
            DB::commit();
            return redirect()->back()->with('success','Horario eliminado exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al eliminar los horarios del centro de entrenamiento');
        }
    }

    //Función utilizada para ingresar nuevos horarios al centro de entrenamiento, permitiendo asignar aquellos horarios
    //que no han sido asignados al centro de entrenamiento en cuestión
    public function agregarHorarios($id, Request $request){
        try{
            $idHorariosCentros = array();
            $idHorarios = array();
            $horarios = Horario::get('id');
            $centros = Centro::where('id', decrypt($id))
            ->with('horarios')
            ->get();
            foreach($centros as $item){
                $centro = $item->nombre;
                $horario = $item->horarios;
            }

            foreach($horario as $item){
                array_push($idHorariosCentros,$item->id);
            }

            foreach($horarios as $item){
                array_push($idHorarios,$item->id);
            }
            
            $horariosDisponibles = array();

            for($i=0;$i<count($idHorarios);$i++){
                if(in_array($idHorarios[$i],$idHorariosCentros)==false){
                    array_push($horariosDisponibles,$idHorarios[$i]);
                }
            }
            $horarios = Horario::wherein('id',$horariosDisponibles)->get();
            $idEncriptado = $id;
            return view('configuraciones.centro.agregar',compact('horarios','centro','idEncriptado'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function guardarHorarios(Request $request){
        DB::beginTransaction();
        try{
            $centro_id = decrypt($request->e);
            $horario_id = array();
            if($request->horario_id!==null){
                foreach($request->horario_id as $item){
                    array_push($horario_id,decrypt($item));
                }
            }
            if(count($horario_id)>0){
                for ($i=0;$i<count($horario_id);$i++){
                    $informacion = [
                        'horario_id' => $horario_id[$i],
                        'centro_id' => $centro_id,
                    ];
                    DB::table('centro_horario')->insert($informacion);
                }
                $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'AGREGAR HR', 'tabla_accion_id'=>6]);
                $control->save();
                DB::commit();
                return redirect()->action([CentroController::class,'index'])->with('success','Horario agregado exitosamente');
            }
            else{
                return redirect()->back();
            }
        }
        catch(\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return back()->withErrors($e->validator->errors())->withInput();
        }
    }

    public function acciones(){
        try{
            $control = Control::where('tabla_accion_id',6)->with('usuario')->paginate(5);
            return view('configuraciones.Centro.control',compact('control'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function eliminados(){
        try{
            $eliminar = Centro::where('estado', 'inactivo')->get();
            return view('configuraciones.Centro.eliminados',compact('eliminar'));
        }
        catch(\Exception $e){
            return back()->with('error', 'Se produjo un error al procesar la solicitud');
        }
    }

    public function restaurar(Request $request){
        DB::beginTransaction();
        try{
            $idEncriptado = $request->e;
            $hashid = new Hashids();
            $idDesencriptado = $hashid->decode($idEncriptado);
            $id = $idDesencriptado[0];
            Centro::find($id)->update(['estado'=>'activo']);
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'RESTAURAR', 'tabla_accion_id'=>6]);
            $control->save();
            DB::commit();
            return redirect()->action([CentroController::class,'index'])->with('success','Centro de entrenamiento restaurado exitosamente');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Se produjo un error al restaurar al centro de entrenamiento');
        }
    }
}
