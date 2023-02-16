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
        $centro = Centro::where('estado','activo')->with('departamento')->get();
        return view('configuraciones.centro.show', compact('centro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $horario = Horario::all();
        $hoy = Carbon::now();
        $departamento = Departamento::all();
        return view('configuraciones.centro.create',compact('departamento','hoy','horario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $horario_id = $request->horario_id;
        $centro = new Centro($request->all());
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
                $fecha = Carbon::now()->format('Y-m-d');
                $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'INSERTAR','Fecha'=>$fecha, 'tabla_accion_id'=>6]);
                $control->save();
            }
        }
        return redirect()->action([CentroController::class,'index']);
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
        $idEncriptado = $request->e;
        $hashid = new Hashids();
        $idDesencriptado = $hashid->decode($idEncriptado);
        $id = $idDesencriptado[0];
        $centro = $this->c->obtenerCentroById($id);
        $departamento = Departamento::all();
        return  view('configuraciones.centro.edit',['centro'=>$centro,'departamento'=>$departamento]);
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
        $centro = Centro::find($id);
        $centro ->fill($request->all());
        $centro->save();
        $fecha = Carbon::now()->format('Y-m-d');
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR','Fecha'=>$fecha, 'tabla_accion_id'=>6]);
        $control->save();
        return redirect()->action([CentroController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Centro::find($id)->update(['estado' => 'inactivo']);
        $fecha = Carbon::now()->format('Y-m-d');
        $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ELIMINAR','Fecha'=>$fecha, 'tabla_accion_id'=>6]);
        $control->save();
        return redirect()->action([CentroController::class,'index']);
    }

    public function mostrarHorarios($id, Request $request){
        $idEncriptado = $request->e;
        $hashid = new Hashids();
        $idDesencriptado = $hashid->decode($idEncriptado);
        $id = $idDesencriptado[0];
        $centro = Centro::with('horarios')
        ->where('id', $id)
        ->get();
        foreach ($centro as $item){
            $centro = $item->nombre;
            $horario = $item->horarios;
        }
        return view('configuraciones.centro.horario',compact('horario','centro','idEncriptado'));
    }

    public function eliminarHorario($id, Request $request){
        $idEncriptado = $request->e;
        $hashid = new Hashids();
        $idDesencriptado = $hashid->decode($idEncriptado);
        $idCentro = $idDesencriptado[0];
        $horario = Horario::find($id);
        $centro = Centro::find($idCentro);
        $centro->horarios()->detach($horario->id);
        return redirect()->back();
    }

    public function agregarHorarios($id, Request $request){
        $idHorariosCentros = array();
        $idHorarios = array();
        $horarios = Horario::get('id');
        $idEncriptado = $request->e;
        $hashid = new Hashids();
        $idDesencriptado = $hashid->decode($idEncriptado);
        $id = $idDesencriptado[0];
        $centros = Centro::where('id', $id)
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
        return view('configuraciones.centro.agregar',compact('horarios','centro','idEncriptado'));
    }

    public function guardarHorarios(Request $request){
        $idEncriptado = $request->e;
        $hashid = new Hashids();
        $idDesencriptado = $hashid->decode($idEncriptado);
        $centro_id = $idDesencriptado[0];
        $horario_id = $request->horario_id;
        if($horario_id!=0){
            for ($i=0;$i<count($horario_id);$i++){
                $informacion = [
                    'horario_id' => $horario_id[$i],
                    'centro_id' => $centro_id,
                ];
                DB::table('centro_horario')->insert($informacion);
            }
            return redirect()->action([CentroController::class,'index']);
        }
        else{
            return redirect()->back();
        }
    }
}
