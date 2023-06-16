<?php

namespace App\Http\Livewire;

use App\Models\Alumno;
use Livewire\Component;
use App\Models\Encargado;
use App\Models\Municipio;
use App\Models\Parentesco;
use App\Models\Departamento;
use App\Models\Nacionalidad;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Livewire\Field;
use App\Models\Alumnos_encargados;
use App\Models\Parentezco;

class Formulario extends Component
{
    use WithFileUploads;
    /* Constructores para el ingreso de relasiones */
    protected $oencargado = NULL ;
    protected $oalumno = NULL;
    #Nacimiento
    public $country;
    public $city;

    public $contries = NULL;
    public $cities = NULL;
    #recidencia
    public $countryr;
    public $cityr;

    public $contriesr = NULL;
    public $citiesr = NULL;



    #variables para el formulario
    public $currentStep = 1;
    public $successMessage = '';
    #Variables para los alumnos
    public $nombre1, $nombre2, $nombre3, $apellido1, $apellido2,
    $cui, $fecha, $edad, $peso, $altura, $genero = 1, $direccion, $telefono,
    $celular, $correo, $contacto_emergencia, $foto,$fecha_fotografia, $estado,
    $nit, $pasaporte, $nacionalidad=1, $alergias = 'Sin alergias';

    #variables para ingreso de encargados / formulario de encargados
    public $primernombrep = [''], $segundonombrep = [''], $tercernombrep = [''], $primerapellidop = [''],
        $segundoapellidop = [''], $apellidocasadap = [''], $direccionp = [''], $celularp = [''], $telefonop = [''],
        $correop = [''],$dpip = [''], $parentezcop = [''];

    public $updateMode = false;
    public $i = 1;
    public $disabled = false;
    #Validacion de encargados
    public $ex_encargados = 1;



    public function firstStepSubmit()
    {
        #Validamos la informacion minima requerida por la base de datos
      /*  try{

       }catch(\Exception $e){
        session()->flash('message', 'Ha ocurrido un error');
       } */
       $this->validarAlumnos();
        if ($this->edad>= 18){
            $this->currentStep = 3;
            $this->ex_encargados= 0;
        }else{
            $this->currentStep = 2;
        }


    }


    public function secondStepSubmit()
    {
        try{
            $this->validarEncargados();
            $this->currentStep = 3;
        }catch(\Exception $e){
            session()->flash('message', 'Ha ocurrido un error');
        }

    }


    public function submitForm()
    {
        /* try{
            #Metodo para guardar encargados


        }catch(\Exception $e){
            session()->flash('message', 'Ha ocurrido un error');
        } */
        if($this->ex_encargados === 1){
                $this->guardarAlumno();
                $this->crearRelacionAlumnos();
                $this->guardarEncargados();
        }else{
                $this->guardarAlumno();
        }
        $this->successMessage='Datos ingresados correctamente';
        //$this->clearForm();
        $this->currentStep = 1;

    }

    public function back($step)
    {
        if($this->ex_encargados === 1){
            $this->currentStep = $step;
        }else{
            $this->currentStep = 1;
        }
    }

    public function clearForm()
    {
        /* $this->name = '';
        $this->amount = '';
        $this->description = '';
        $this->stock = '';
        $this->status = 1; */
    }

/* --------------------------------------------------- Metodos para el registro de alumnos ---------------------------------------------------------------------- */

    /* Calcular Edad */
    public function updatedFecha($fechan)
    {
        $hoy = date("Y-m-d");
        $diff = date_diff(date_create($fechan),date_create($hoy));
        $this->edad = $diff->format('%y');
    }
    /* Select dependientes para ingreso de los municipios*/
    public function mount()
    {
        $this->contries = Departamento::all();
        $this->contriesr = Departamento::all();
        $this->cities = collect();
        $this->citiesr = collect();
    }


    public function updatedCountry($value)
    {
        #$this->mn = DB::table('municipio')->where('departamento_id',$dep)->get();
        $this->cities = Municipio::where('departamento_id',$value)->get();
        $this->city  = $this->cities->first()->id ?? null;


    }
    public function updatedCountryr($valuer)
    {
        $this->citiesr = Municipio::where('departamento_id',$valuer)->get();
        $this->cityr  = $this->citiesr->first()->id ?? null;;
    }
    /* Validamos la informacion minima requerida por la base de datos */

    public function updated($propertyCui)
    {
        $this->validateOnly($propertyCui, [
            'cui' => 'min:13 | max:13',
            'cui' => 'numeric',
            'correo' => 'email',
            'peso' => 'numeric',
            'altura' => 'numeric',
            'contacto_emergencia' => 'numeric',
            'telefono' => 'numeric',
            'celular' => 'numeric',
            'nit' => 'numeric',
            'pasaporte' => 'numeric',
        ],[
           'cui.min' => 'Ingrese el cui correcto (no menos de 13 caracteres)',
           'cui.max' => 'Ingrese el cui correcto (no mas de 13 caracteres)',
           'cui.numeric' => 'Unicamente debe ingresar números',
           'correo.email' => 'Debe ser una dirección de correo electrónico válida.',
           'peso.numeric' => 'Unicamente debe ingresar números',
           'altura.numeric' => 'Unicamente debe ingresar números',
           'contacto_emergencia.numeric' => 'Unicamente debe ingresar números',
           'telefono' => 'Unicamente debe ingresar números',
           'celular' => 'Unicamente debe ingresar números',
           'nit' => 'Unicamente debe ingresar números',
           'Pasaporte' => 'Unicamente debe ingresar números',
        ]);
    }
    public function validarAlumnos(){

        $validatedData = $this->validate([
            'nombre1' => 'required',
            'apellido1' => 'required',
            'peso' => 'required',
            'cui' => 'required',
            'fecha' => 'required',
            'peso' => 'required | numeric',
            'altura' => 'required | numeric',
            'direccion' => 'required',
            'genero' => 'required',
            'contacto_emergencia' => 'required',
            'correo' => 'required | email',
            'foto' => 'required | image |max:2048',
            'nacionalidad' => 'required',
            'country' => 'required',
            'city' => 'required',
            'countryr' => 'required',
            'cityr' => 'required',


        ],
        [
            'nombre1' => 'Este campo es requerido',
            'apellido1' => 'Este campo es requerido',
            'cui' => 'Este campo es requerido',
            'peso' => 'Este campo es requerido',
            'altura' => 'Este campo es requerido',
            'direccion' => 'Este campo es requerido',
            'contacto_emergencia' => 'Este campo es requerido',
            'correo' => 'Este campo es requerido',
            'correo' => 'Este campo es requerido',
            'correo.email' => 'Debe ser una dirección de correo electrónico válida.',
            'foto' => 'Este campo es requerido',
            'fecha' => 'Este campo es requerido',
            'country'=> 'Este campo es requerido',
            'city'=> 'Este campo es requerido',
            'countryr'=> 'Este campo es requerido',
            'cityr'=> 'Este campo es requerido',

        ]
    );

    }
    public function guardarAlumno(){

        /* Subir fotografia */
        /* Extraemos el nombre de la fotografia */
        $imageName = time().'.'.$this->foto->getClientOriginalExtension();
        /* el public_uploados es lo que se modifico de filesystem para poder ingresar los datos a public */
        $this->foto->storeAs("uploads/alumnos",$imageName,'public_uploads'); #los parametros que ingresan son (el path,nombre, disco a donde ingresa)
        Alumno::create([

            'nombre1'=> $this->nombre1,
            'nombre2'=> $this->nombre2,
            'nombre3'=> $this->nombre3,
            'apellido1'=> $this->apellido1,
            'apellido2'=> $this->apellido2,
            'cui'=> $this->cui,
            'fecha'=> $this->fecha,
            'edad'=> $this->edad,
            'peso'=> $this->peso,
            'altura'=> $this->altura,
            'genero'=> $this->genero,
            'direccion'=> $this->direccion,
            'telefono_casa'=> $this->telefono,
            'celular'=> $this->celular,
            'correo'=> $this->correo,
            'contacto_emergencia'=> $this->contacto_emergencia,
            'foto' => $imageName,
            'fecha_fotografia'=> date("Y-m-d"),
            'estado'=> 'Pendiente',
            'nit'=> $this->nit,
            'alergias'=> $this->alergias,
            'pasaporte'=> $this->pasaporte,
            'nacionalidad_id'=> $this->nacionalidad,
            'departamento_id'=> $this->country,
            'municipio_id'=> $this->city,
            'departamento_residencia_id'=> $this->countryr,
            'municipio_residencia_id'=> $this->cityr,

        ]);
    }
    /* -----------------------------------------Metodos para el registro de encargados------------------------------------------- */


    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;

        if($i<=2){
        $this->primernombrep[] = '';
        $this->segundonombrep[] = '';
        $this->tercernombrep[] = '';
        $this->primerapellidop[] = '';
        $this->segundoapellidop[] = '';
        $this->apellidocasadap[] = '';
        $this->direccionp[] = '';
        $this->celularp[] = '';
        $this->telefonop[] = '';
        $this->correop[] = '';
        $this->dpip[] = '';
        // $this->parentezcop = [];
        }else{
            session()->flash('message', 'Solo puede ingresar un maximo de 2 encargados');
            $this->disabled = true;
        }
    }

    public function remove($index)
    {   $i = $index - 1;
        $this->i = $i;
        unset($this->primernombrep[$index]);
        $this->primernombrep = array_values($this->primernombrep);
        unset($this->segundonombrep[$index]);
        $this->segundonombrep = array_values($this->segundonombrep);
        unset($this->tercernombrep[$index]);
        $this->tercernombrep = array_values($this->tercernombrep);
        unset($this->primerapellidop[$index]);
        $this->primerapellidop = array_values($this->primerapellidop);
        unset($this->segundoapellidop[$index]);
        $this->segundoapellidop = array_values($this->segundoapellidop);
        unset($this->apellidocasadap[$index]);
        $this->apellidocasadap = array_values($this->apellidocasadap);
        unset($this->direccionp[$index]);
        $this->direccionp = array_values($this->direccionp);
        unset($this->celularp[$index]);
        $this->celularp = array_values($this->celularp);
        unset($this->telefonop[$index]);
        $this->telefonop = array_values($this->telefonop);
        unset($this->correop[$index]);
        $this->correop = array_values($this->correop);
        unset($this->dpip[$index]);
        $this->dpip = array_values($this->dpip);
        unset($this->parentezcop[$index]);
        /* $this->parentezcop = array_values($this->parentezcop); */

    }

    private function resetInputFields(){

        $this->primernombrep = '';
        $this->segundonombrep = '';
        $this->tercernombrep = '';
        $this->primerapellidop = '';
        $this->segundoapellidop = '';
        $this->apellidocasadap = '';
        $this->direccionp = '';
        $this->celularp = '';
        $this->telefonop = '';
        $this->correop = '';
        $this->dpip = '';
        $this->parentezcop ='';
    }

    public function validarEncargados()
    {
        $validateDate =$this->validate([

            'primernombrep.*' => 'required',
            'primerapellidop.*' => 'required',
            'direccionp.*' => 'required',
            'celularp.*' => 'required | numeric',
            'dpip.*' => 'required',
            'correop.*' => 'required | email',
        ],
        [
            'primernombrep.*' => 'Este campo es requerido',
            'primerapellidop.*' => 'Este campo es requerido',
            'direccionp.*' => 'Este campo es requerido',
            'celularp.*' => 'Este campo es requerido',
            'celularp.*.numeric' => 'Unicamente debe ingresar números',
            'dpip.*' => 'Este campo es requerido',
            'dpip.*.numeric' => 'Unicamente debe ingresar números',
            'correop.*.email' => 'Debe ser una dirección de correo electrónico válida.',
            'correop.*' => 'Este campo es requerido',
        ]


        );
    }
    public function guardarEncargados()
    {
        foreach($this->primernombrep as $indice => $nombre) {
            $modelo = new Encargado;
            $modelo->nombre1p = $nombre;
            $modelo->nombre2p = $this->segundonombrep[$indice];
            $modelo->nombre3p = $this->tercernombrep[$indice];
            $modelo->apellido1p = $this->primerapellidop[$indice];
            $modelo->apellido2p = $this->segundoapellidop[$indice];
            $modelo->apellido_casada = $this->apellidocasadap[$indice];
            $modelo->direccionp = $this->direccionp[$indice];
            $modelo->celularp = $this->celularp[$indice];
            $modelo->telefono_casap = $this->telefonop[$indice];
            $modelo->correop = $this->correop[$indice];
            $modelo->dpi = $this->dpip[$indice];
            $modelo->parentezco_id = $this->parentezcop[$indice];
            $modelo->save();
        }

    }

    public function crearRelacionAlumnos()
    {
        /* Buscaremos crear la relacion que existe de alumnos a encargados
        como lo espesificamos arriba es que si se tiene a mas de 3 padres
        la relasion es de esa fomra */
       // $num_encargados = count($this->dpip);
       try{

            foreach($this->dpip as $dpien){
                $this->oencargado = Encargado::all();
                $this->oalumno = Alumno::all();
                $obEncargado = $this->oencargado;
                $obAlumno = $this->oalumno;
                $id_alumno_encargado = new Alumnos_encargados;

                foreach($obAlumno as $alumn){
                    if($alumn->cui === $this->cui){
                        $id_alumno_encargado->alumno_id = $alumn->id;
                        session()->flash('message', 'Alumno');
                    }else{
                        session()->flash('message', 'Ingreso la consulta Alumno');
                    }
                }
                foreach($obEncargado as $encarg){
                    if($encarg->dpi === $dpien){
                        $id_alumno_encargado->encargado_id = $encarg->id;
                        session()->flash('message', 'Encargado');
                    }else{
                        session()->flash('message', 'Ingreso la consulta Encargado');
                    }
                }
            $id_alumno_encargado->save();
            }
       }catch(\Exception $e){
        $this-> addError('Error creando la relación', $e->getMessage());
       }

}

    public function render()
    {
        #Encargados
        $parentezcos = Parentesco::all();
        #Alumnos
        $nacionalidades = Nacionalidad::all();
        $formularios = Formulario::all();

        return view('livewire.formulario', compact("parentezcos","nacionalidades","formularios"));
    }
}
