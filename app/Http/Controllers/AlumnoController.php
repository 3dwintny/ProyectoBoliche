<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Alergia;
use App\Models\Encargado;
use App\Models\Formulario;
use App\Models\Parentezco;
use App\Models\Departamento;
use App\Models\Nacionalidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Input\Input;

class AlumnoController extends Controller
{
    protected $encargado;
    public function __construct(Encargado $encargado)
    {
        $this->encargado = $encargado;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::where('estado','Pendiente')->get();
        return view('alumno.index', compact('alumnos'));
        //return view('alumno.show');
    }

     /**
     * return cities list
     *
     * @return json
     */

    public function getMunicipios(Request $request)
    {
        $municipios = DB::table('municipio')
            ->where('departamento_id', $request->departamento_id)
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
        $departamentos = Departamento::all();
        $nacionalidades = Nacionalidad::all();
        $parentezcos = Parentezco::all();
        $formularios = Formulario::all();
        $alergia = Alergia::all();
        return view('alumno.alumno',compact("departamentos","nacionalidades","parentezcos","formularios", "alergia"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        $padres->direccion = $request->input('direccion');
        $padres->celular = $request->input('celular');
        $padres->telefono_casa = $request->input('telefono_casa');
        $padres->correo = $request->input('correo');
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
            $file->move('uploads/alumnos/', $filename);
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

        $alumno->alergia_id = $request->input('alergia_id');
        $alumno->departamento_id = $request->input('departamento_id');
        $alumno->municipio_id = $request->input('municipio_id');
        $alumno->nacionalidad_id = $request->input('nacionalidad_id');
        $alumno->departamento_residencia_id = $request->input('departamento_residencia_id');
        $alumno->municipio_residencia_id= $request->input('municipio_residencia_id');
        $alumno->save();
        //return view("Funciona");
        return redirect()->back()->with('status','Alumno ingresado Correctamente');
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
        $departamentos = Departamento::pluck('nombre');
        return view('alumno.show', compact('alumno'));
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
        //
    }
}
