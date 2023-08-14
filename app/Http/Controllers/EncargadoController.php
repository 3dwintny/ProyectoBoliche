<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encargado;
use App\Models\Alumnos_encargados;
use App\Models\Alumno;
use App\Models\Atleta;
use App\Models\Parentezco;
use App\Models\Control;
use Illuminate\Support\Facades\DB;

class EncargadoController extends Controller
{
    protected $encargados;
    public function __construct(Encargado $encargado)
    {
        $this->encargados = $encargado;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $encargados = Encargado::all();
            return view('encargados.index', compact('encargados'));
        }
        catch(\Exception $e){
            return back()->with('error','Se produjo un error al procesar la solicitud');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $encargados = $this->encargados->obtenerEncargadoporId($id);
        return view('encargados.edit',['encargados'=>$encargados]);
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
            $encargado = Encargado::find($id);
            $encargado->nombre1p = $request->input('nombre1p');
            $encargado->nombre2p = $request->input('nombre2p');
            $encargado->nombre3p = $request->input('nombre3p');
            $encargado->apellido1p = $request->input('apellido1p');
            $encargado->apellido2p = $request->input('apellido2p');
            $encargado->apellido_casada = $request->input('apellido_casada');
            $encargado->direccionp = $request->input('direccionp');
            $encargado->celularp = $request->input('celularp');
            $encargado->telefono_casap = $request->input('telefono_casap');
            $encargado->correop = $request->input('correop');
            $encargado->dpi = $request->input('dpi');
            $encargado->save();
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>11]);
            $control->save();
            DB::commit();
            return redirect()->action([EncargadoController::class, 'index'])->with('status','Información actualizada exitosamente');
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
        //
    }

    public function acciones(){
        try{
            $control = Control::where('tabla_accion_id',11)->with('usuario')->paginate(5);
            return view('encargados.control',compact('control'));
        }
        catch(\Exception $e){
            return back()->with('error','Se produjo un error al procesar la solicitud');
        }
    }

    public function editarInformacionDeEncargados(){
        try{
            $alumno = Alumno::where('correo',auth()->user()->email)->first();
            $cantidadEncargados = Alumnos_encargados::where('alumno_id',$alumno->id)->get('encargado_id');
            $encargados = null;
            $parentescos = Parentezco::where('estado','activo')->get(['tipo','id']);
            if(count($cantidadEncargados)!=0){
                switch(count($cantidadEncargados))
                {
                    case 1:
                        $encargados = Encargado::where('id',$cantidadEncargados[0]->encargado_id)->get(['id','nombre1p','nombre2p','nombre3p','apellido1p','apellido2p','apellido_casada','direccionp','celularp','telefono_casap','correop','dpi','parentezco_id']);
                        break;
                    case 2:
                        $encargados_id = array();
                        foreach($cantidadEncargados as $item){
                            array_push($encargados_id,$item->encargado_id);
                        }
                        $encargados = Encargado::whereIn('id',$encargados_id)->get(['id','nombre1p','nombre2p','nombre3p','apellido1p','apellido2p','apellido_casada','direccionp','celularp','telefono_casap','correop','dpi','parentezco_id']);
                        break;
                }
            }
            return view('Atletas.informacionEncargados',compact('cantidadEncargados','alumno','encargados','parentescos'));
        }
        catch(\Exception $e){
            return back()->with('error','Se produjo un error al procesar la solicitud');
        }
    }

    public function actualizarInformacionDeEncargados(Request $request){
        DB::beginTransaction();
        try{
            $primerEncargadoId = decrypt($request->encargado1);
            $primerEncargado = Encargado::find($primerEncargadoId); 
            $primerEncargado->fill([
                'nombre1p'=>$request->primer_nombre_primer_encargado,
                'nombre2p'=>$request->segundo_nombre_primer_encargado,
                'nombre3p'=>$request->tercer_nombre_primer_encargado,
                'apellido1p'=>$request->primer_apellido_primer_encargado,
                'apellido2p'=>$request->segundo_apellido_primer_encargado,
                'apellido_casada'=>$request->apellido_casada_primer_encargado,
                'direccionp'=>$request->direccion_primer_encargado,
                'celularp'=>$request->celular_primer_encargado,
                'telefono_casap'=>$request->telefono_casa_primer_encargado,
                'correop'=>$request->correo_primer_encargado,
                'dpi'=>$request->dpi_primer_encargado,
                'parentezco_id'=>decrypt($request->parentesco_primer_encargado),
            ]);
            $primerEncargado->save();
            if($request->encargado2!=""){
                $segundoEncargadoId = decrypt($request->encargado2);
                $segundoEncargado = Encargado::find($segundoEncargadoId);
                $segundoEncargado->fill([
                    'nombre1p'=>$request->primer_nombre_segundo_encargado,
                    'nombre2p'=>$request->segundo_nombre_segundo_encargado,
                    'nombre3p'=>$request->tercer_nombre_segundo_encargado,
                    'apellido1p'=>$request->primer_apellido_segundo_encargado,
                    'apellido2p'=>$request->segundo_apellido_segundo_encargado,
                    'apellido_casada'=>$request->apellido_casada_segundo_encargado,
                    'direccionp'=>$request->direccion_segundo_encargado,
                    'celularp'=>$request->celular_segundo_encargado,
                    'telefono_casap'=>$request->telefono_casa_segundo_encargado,
                    'correop'=>$request->correo_segundo_encargado,
                    'dpi'=>$request->dpi_segundo_encargado,
                    'parentezco_id'=>decrypt($request->parentesco_segundo_encargado),
                ]);
                $segundoEncargado->save();
            }   
            $control = new Control(['usuario_id'=> auth()->user()->id,'Descripcion'=>'ACTUALIZAR', 'tabla_accion_id'=>11]);
            $control->save();
            DB::commit();
            return back()->with('success','Información actualizada exitosamente')->withInput();
            return back()->with('success','Información actualizada exitosamente');
        }
        catch(\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return back()->withErrors($e->validator->errors())->withInput();
        }
    }
}
