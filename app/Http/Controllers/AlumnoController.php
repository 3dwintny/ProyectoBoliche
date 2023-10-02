<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Encargado;
use App\Models\Formulario;
use App\Models\Parentesco;
use App\Models\Departamento;
use App\Models\Nacionalidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Alumnos_encargados;
use PDF;
use Carbon\Carbon;
use App\Models\Control;
use Throwable;
use App\Models\Categoria;

class AlumnoController extends Controller
{
    protected $encargado, $alumnosCons;
    public function __construct(Encargado $encargado, Alumno $alumnos)
    {
        $this->encargado = $encargado;
        $this->alumnosCons = $alumnos;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $alumnos = Alumno::where('estado','Pendiente')->paginate(5);
            return view('alumno.index', compact('alumnos'));
        }
        catch(\Exception $e){
            return back()->with('error','Se produjo un error al procesar la solicitud');
        }
    }

     /**
     * return cities list
     *
     * @return json
     */

    public function getMunicipios(Request $request)
    {
        $municipios = DB::table('municipio')
            ->where('departamento_id', decrypt($request->departamento_id))
            ->get();

        if (count($municipios) > 0) {
            return response()->json($municipios);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anio = Carbon::now()->format('Y');
        $departamentos = Departamento::all();
        $nacionalidades = Nacionalidad::all();
        $parentezcos = Parentesco::all();
        $formularios = Formulario::all();
        return view('alumno.alumno',compact("departamentos","nacionalidades","parentezcos","formularios","anio"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validarAlumnos(Request $request){

        $request->validate([
            'nombre1' => 'required',
            'apellido1' => 'required',
            'peso' => 'required',
            'cui' => 'required | numeric | max:11 | min:10',
            'fecha' => 'required',
            'peso' => 'required | numeric',
            'altura' => 'required | numeric',
            'direccion' => 'required',
            'contacto_emergencia' => 'required |regex:(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}',
            'correo' => 'required | email',
            'foto' => 'required | image |max:2048'
        ],
        [
            'nombre1' => 'Este campo es requerido',
            'apellido1' => 'Este campo es requerido',
            'cui' => 'Este campo es requerido',
            'cui.numeric' => 'Unicamente debe ingresar números',
            'peso' => 'Este campo es requerido',
            'peso.numeric' => 'Unicamente debe ingresar números',
            'altura' => 'Este campo es requerido',
            'altura.numeric' => 'Unicamente debe ingresar números',
            'direccion' => 'Este campo es requerido',
            'contacto_emergencia' => 'Este campo es requerido',
            'contacto_emergencia.numeric' => 'Unicamente debe ingresar números',
            'correo' => 'Este campo es requerido',
            'correo.email' => 'Debe ser una dirección de correo electrónico válida.',
            'foto' => 'Este campo es requerido',
            'fecha' => 'Este campo es requerido',



        ]
    );

    }
    public function store(Request $request)
    {
        // $entrenador = new Entrenador($request->all());
        $padres = new Encargado;
        $padres->nombre1p = $request->input('nombre1p');
        $padres->nombre2p = $request->input('nombre2p');
        $padres->nombre3p = $request->input('nombre3p');
        $padres->apellido1p = $request->input('apellido1p');
        $padres->apellido2p = $request->input('apellido2p');
        $padres->apellido_casada = $request->input('apellido_casada');
        $padres->direccionp = $request->input('direccionp');
        $padres->celularp = $request->input('celularp');
        $padres->telefono_casap = $request->input('telefono_casap');
        $padres->correop = $request->input('correop');
        $padres->dpi = $request->input('dpi');
        $padres->parentezco_id = $request->input('parentezco_id');
        //$padres = new Encargado ($request->all());
        $padres->save();
        $alumno = new  Alumno;
        $alumno->nombre1 = $request->input('nombre1');
        $alumno->nombre2 = $request->input('nombre2');
        $alumno->nombre3 = $request->input('nombre3');
        $alumno->apellido1 = $request->input('apellido1');
        $alumno->apellido2 = $request->input('apellido2');
        $alumno->cui = $request->input('cui');
        $alumno->fecha = $request->input('fecha');
        $alumno->edad = $request->input('edad');
        $alumno->peso = $request->input('peso');
        $alumno->altura = $request->input('altura');
        $alumno->genero = $request->input('genero');
        $alumno->direccion = $request->input('direccion');
        $alumno->telefono_casa = $request->input('telefono_casa');
        $alumno->celular = $request->input('celular');
        $alumno->correo = $request->input('correo');
        $alumno->contacto_emergencia = $request->input('contacto_emergencia');
        if($request->hasFile('foto'))
        {
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('storage/uploads/', $filename);
            $alumno->foto = $filename;
        }
        $alumno->fecha_fotografia= $request->input('fecha_fotografia');
        $alumno->estado = 'Pendiente';
        $alumno->nit= $request->input('nit');
        $alumno->pasaporte = $request->input('pasaporte');

        $encargado = $this->encargado->obtenerEncargado();
        $dpi = $request->input('dpi');
        $contador = 0 ;
        foreach ($encargado as $encarg){
            if ($encarg->dpi === $dpi){

                $alumno->encargado_id = $encarg->id;
            }else{
                    $contador++;
                      //return("No Existe");
            }

        }
        //$alumno->encargado_id = $request->input('encargado_id');

        $alumno->departamento_id = $request->input('departamento_id');
        $alumno->municipio_id = $request->input('municipio_id');
        $alumno->nacionalidad_id = $request->input('nacionalidad_id');
        $alumno->departamento_residencia_id = $request->input('departamento_residencia_id');
        $alumno->municipio_residencia_id= $request->input('municipio_residencia_id');
        $alumno->save();
        return $this->generarPDF();
        //return view("Funciona");
        //return redirect()->back()->with('status','Alumno ingresado Correctamente');
        /* return redirect()->action([AlumnoController::class, 'index']); */
        /*$factura = Alumno::create($request->all());
        return redirect()->route('facturas.index')
            ->with('success', 'Factura created successfully.');*/
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumno = Alumno::find($id);
        if (!$alumno) {
            return response()->json(['error' => 'Alumno no encontrado'], 404);
        }
        $datosAlumno = [
            'nombre' => $alumno->nombre1 .' '. $alumno->nombre2 .' '. $alumno->nombre3.' '.$alumno->apellido1 .' '.$alumno->apellido2,
            'cui' => $alumno ->cui,
            'celular' => $alumno->celular,
            'telefono_casa' => $alumno->telefono_casa,
            'correo' => $alumno ->correo,
            'fecha_nacimiento' => $alumno->fecha,
            'foto'=>$alumno->foto,
            'departamento'=>$alumno->departamento_residencia->nombre,
            'municipio'=>$alumno->municipio_residencia->nombre,
        ];
        return response()->json($datosAlumno);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alumno::find($id)->update(['estado' => 'Rechazado']);
        return redirect()->route('alumnos.index')->with('success', 'Solicitud Rechazada');
    }

    public static function generarPDF($cui)
    {
            try{
            $anio = Carbon::now()->format('Y');
            $formularios = Formulario::all();
            $alumnos = Alumno::where('cui', $cui)->get();
            $categoria = Categoria::where('estado','activo')->get(['estado','tipo','id']);
            $mesAnioCumpleaniosAtleta = substr($alumnos[0]->fecha,5,5);
            if($alumnos[0]->edad==6 || $alumnos[0]->edad==7 || $alumnos[0]->edad == 8) {
                $categoriaAtleta = $categoria[0]->tipo;
            }
            else if($alumnos[0]->edad==9 || $alumnos[0]->edad==10){
                $categoriaAtleta = $categoria[1]->tipo;
                if($mesAnioCumpleaniosAtleta>"01-01" && $alumnos[0]->edad==9){
                    $categoriaAtleta = $categoria[0]->tipo;
                }
            }
            else if($alumnos[0]->edad==11 || $alumnos[0]->edad==12){
                $categoriaAtleta = $categoria[2]->tipo;
                if($mesAnioCumpleaniosAtleta>"01-01" && $alumnos[0]->edad==11){
                    $categoriaAtleta = $categoria[1]->tipo;
                }
            }
            else if($alumnos[0]->edad==13 || $alumnos[0]->edad==14 || $alumnos[0]->edad==15){
                $categoriaAtleta = $categoria[3]->tipo;
                if($mesAnioCumpleaniosAtleta>"01-01" && $alumnos[0]->edad==13){
                    $categoriaAtleta = $categoria[2]->tipo;
                }
            }
            else if($alumnos[0]->edad==16 || $alumnos[0]->edad==17){
                $categoriaAtleta = $categoria[4]->tipo;
                if($mesAnioCumpleaniosAtleta>"01-01" && $alumnos[0]->edad==16){
                    $categoriaAtleta = $categoria[3]->tipo;
                }
            }
            else if($alumnos[0]->edad==18 || $alumnos[0]->edad==19 || $alumnos[0]->edad==20){
                $categoriaAtleta = $categoria[5]->tipo;
                if($mesAnioCumpleaniosAtleta>"01-01" && $alumnos[0]->edad==18){
                    $categoriaAtleta = $categoria[4]->tipo;
                }
            }
            else if($alumnos[0]->edad>20){
                $categoriaAtleta = $categoria[7]->tipo;
                if($mesAnioCumpleaniosAtleta>"01-01" && $alumnos[0]->edad==21){
                    $categoriaAtleta = $categoria[5]->tipo;
                }
            }
            else{
                $categoriaAtleta = "N/A";
            }
            $cantidadDeRelaciones = null;
            $relalumnos = null;
            $encargados = [];
            $cant_rel = null;
            foreach($alumnos as $item){
                $cantidadDeRelaciones = Alumnos_encargados::where('alumno_id', $item->id)->count();
                $relalumnos = Alumnos_encargados::where('alumno_id', $item->id)->get();
            }
            foreach ($relalumnos as $item) {
                $resultados = Encargado::where('id', $item->encargado_id)->get();
                foreach($resultados as $resultado) {
                $encargados[] = $resultado->toArray();
                }
            }
            if($cantidadDeRelaciones === 2){
                $cant_rel = 2;
                return PDF::loadView('alumno.pdf',compact('formularios','alumnos','encargados','anio','cant_rel','categoriaAtleta'))->setPaper('8.5x11')->stream();
            }elseif($cantidadDeRelaciones === 1){
                $cant_rel = 1;
                return PDF::loadView('alumno.pdf',compact('formularios','alumnos','encargados','anio','cant_rel','categoriaAtleta'))->setPaper('8.5x11')->stream();

            }else{
                $cant_rel = 0;
                return PDF::loadView('alumno.pdf',compact('formularios','alumnos','anio','cant_rel','categoriaAtleta'))->setPaper('8.5x11')->stream();
            }

        }catch(Throwable $e){
            report($e);
            echo "Ha ocurrido un error. Por favor, inténtalo de nuevo.";
            return false;
        }
    }

    public function acciones(){
        $control = Control::where('tabla_accion_id',2)->with('usuario')->paginate(5);
        return view('configuraciones.alergia.control',compact('control'));
    }

    public function eliminados(){}
}
