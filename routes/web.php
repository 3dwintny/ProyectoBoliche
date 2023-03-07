<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PRTController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EDG27Controller;
use App\Http\Controllers\EDG31Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AtletaController;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\EDG272Controller;
use App\Http\Controllers\AlergiaController;
use App\Http\Controllers\DeporteController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\TerapiaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EncargadoController;
use App\Http\Controllers\ModalidadController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\EntrenadorController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\Nivel_cdagController;
use App\Http\Controllers\Nivel_fadnController;
use App\Http\Controllers\ParentescoController;
use App\Http\Controllers\PsicologiaController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\NacionalidadController;
use App\Http\Controllers\Tipo_UsuarioController;
use App\Http\Controllers\Otro_ProgramaController;
use App\Http\Controllers\Tipo_ContratoController;
use App\Http\Controllers\Etapa_DeportivaController;
use App\Http\Controllers\Deporte_AdoptadoController;
use App\Http\Controllers\Linea_DesarrolloController;
use App\Http\Controllers\Frontend\FrontendController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {return view('welcome');});
Route::get('wel', function () {return view('welcome');})->name('wel'); */

//

//Son para los sliders

Route::resource('/', FrontendController::class);
//Ruta Formulario de Inscripción
Route::resource('alumnos',AlumnoController::class);
Route::get('alumno-PDF',[AlumnoController::class,'generarPDF'])->name('alumnosPDF');

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
//Auth::routes();
	Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');
	Route::get('map', function () {return view('pages.maps');})->name('map');
	Route::get('icons', function () {return view('pages.icons');})->name('icons');
	Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    Route::resource('entrenadores',EntrenadorController::class);
	Route::resource('psicologia',PsicologiaController::class);
    //Controlador de roles
    Route::resource('roles',RolController::class);
    Route::resource('usuarios',UserController::class);

    Route::resource('alergias',AlergiaController::class);
	//Rutas Asistencia
    Route::get('asistencia-atleta',[AsistenciaController::class, 'asistenciaIndividual'])->name('asistenciaIndividual');
    Route::get('asistencias/buscar',[AsistenciaController::class,'buscar'])->name('buscar');
    Route::resource('asistencias',AsistenciaController::class);
    Route::post('asis',[AsistenciaController::class,'guardar'])->name('asis');
	Route::resource('alergia',AlergiaController::class);
    //Ruta Reporte EDG31
    Route::resource('edg-31',EDG31Controller::class);
    //Rutas Atletas
    Route::resource('atletas',AtletaController::class);

    //Ruta Categorias
    Route::resource('categoria',CategoriaController::class);

    //Rutas Centros
    Route::resource('centro',CentroController::class);

    //Rutas Departamentos
    Route::resource('departamentos',DepartamentoController::class);

    //Rutas Deporte_Adoptado
    Route::resource('deporte-adaptado',Deporte_AdoptadoController::class);

    //Rutas Deporte
    Route::resource('deporte',DeporteController::class);

    //Rutas Encargado
    Route::resource('encargados',EncargadoController::class);

    //Rutas de Entrenador
    Route::get('editar-perfil-entrenador',[EntrenadorController::class,'modificar'])->name('modificar');
    Route::put('actualizar-informacion-entrenador',[EntrenadorController::class,'actualizar'])->name('actualizar');
    Route::resource('entrenadores',EntrenadorController::class);

    //Rutas Etapa_Deportiva
    Route::resource('etapa-deportiva',Etapa_DeportivaController::class);

    //Rutas Formulario
    Route::resource('formulario-inscripcion',FormularioController::class);

    //Rutas Horario
    Route::resource('horario',HorarioController::class);
    Route::get('horario-del-centro/{id}',[CentroController::class,'mostrarHorarios'])->name('listarHorarios');
    Route::get('eliminar-horario/{id}',[CentroController::class,'eliminarHorario'])->name('eliminarHorarios');
    Route::get('agregar-horario/{id}',[CentroController::class,'agregarHorarios'])->name('agregarHorarios');
    Route::post('guardar-horario',[CentroController::class,'guardarHorarios'])->name('guardarHorarios');

    //Rutas Linea_Desarrollo
    Route::resource('linea-de-desarrollo',Linea_DesarrolloController::class);

    //Rutas Login
    Route::resource('login',LoginController::class);

    //Rutas Modalidad
    Route::resource('modalidad',ModalidadController::class);

    //Rutas Municipio

    //Rutas Nacionalidad
    Route::resource('nacionalidad',NacionalidadController::class);

    //Rutas Nivel_cdag
    Route::resource('nivel-cdag',Nivel_cdagController::class);

    //Rutas Nivel_fadn
    Route::resource('nivel-fadn',Nivel_fadnController::class);

    //Rutas Otro_Programa
    Route::resource('otro-programa-de-atencion',Otro_ProgramaController::class);

    //Rutas Parentesco
    Route::resource('parentesco',ParentescoController::class);

    //Rutas PRT
    Route::resource('prt',PRTController::class);

    //Ruta Psicologia
    Route::get('editar-perfil-psicologia',[PsicologiaController::class,'modificar'])->name('modificarPsicologia');
    Route::put('actualizar-informacion-psicologia',[PsicologiaController::class,'actualizar'])->name('actualizarPsicologia');
    Route::resource('psicologia',PsicologiaController::class);

    //Rutas Terapia
    Route::get('tareas-pendientes',[TerapiaController::class,'tareaPendiente'])->name('tareaPendiente');
    Route::post('finalizar-tarea',[TerapiaController::class,'finalizarTarea'])->name('finalizarTarea');
    Route::resource('terapias',TerapiaController::class);

    //Rutas Tipo_Contrato
    Route::get('detalles-de-terapia/{id}',[TerapiaController::class,'details'])->name('detallesTerapia');
    Route::resource('tipo-de-contrato',Tipo_ContratoController::class);

    //Rutas Tipo_Usuario
    Route::resource('tipo-usuarios',Tipo_UsuarioController::class);
    //Ruta Reporte EDG27
Route::resource('edg-27',EDG27Controller::class);

//Ruta Reporte EDG27.2
Route::resource('edg-27-2',EDG272Controller::class);

//Rutas Generar pdf Asistencias
Route::get('asistencias-PDF',[AsistenciaController::class,'generarPDF'])->name('asistenciasPDF');

//Rutas Generar pdf Asistencias
Route::get('edg-31-PDF',[EDG31Controller::class,'generarPDF'])->name('edg31PDF');

//Rutas Generar pdf Asistencias
Route::get('edg-27-PDF',[EDG27Controller::class,'generarPDF'])->name('edg27PDF');

//Rutas Generar pdf Asistencias
Route::get('edg-27-2-PDF',[EDG272Controller::class,'generarPDF'])->name('edg272PDF');

//ruta para mostrar el nombre del atleta
    Route::get('atl/{id}',[AtletaController::class,'creacion'])->name('creacion');
    Route::post('alc/{id}',[AtletaController::class,'store'])->name('ac_estado');


    Route::get('for31', function () {return view('Reportes.for31');})->name('for31');
    Route::get('for30', function () {return view('Reportes.for30');})->name('for30');

    Route::resource('slider', SliderController::class);
    Route::get('conf', function () {return view('configuraciones.index');})->name('conf');
    Route::get('us', function () {return view('configuraciones.us');})->name('us');
    Route::get('otros', function () {return view('configuraciones.otros');})->name('otros');
    Route::get('seguridad', function () {return view('configuraciones.seguridad');})->name('seguridad');
    Route::get('seguridad/alergias',[AlergiaController::class,'acciones'])->name('accionesAlergia');
    Route::get('seguridad/atletas',[AtletaController::class,'acciones'])->name('accionesAtletas');
    Route::get('seguridad/asistencia',[AsistenciaController::class,'acciones'])->name('accionesAsistencia');
    Route::get('seguridad/alumnos',[AlumnoController::class,'acciones'])->name('accionesAlumno');
    Route::get('seguridad/categorias',[CategoriaController::class,'acciones'])->name('accionesCategoria');
    Route::get('seguridad/centros',[CentroController::class,'acciones'])->name('accionesCentro');
    Route::get('seguridad/departamentos',[DepartamentoController::class,'acciones'])->name('accionesDepartamento');
    Route::get('seguridad/deporte-adaptado',[DeporteAdaptadoController::class,'acciones'])->name('accionesAdaptado');
    Route::get('seguridad/deporte',[DeporteController::class,'acciones'])->name('accionesDeporte');
    Route::get('seguridad/edg-27',[EDG27Controller::class,'acciones'])->name('accionesEDG27');
    Route::get('seguridad/edg-272',[EDG272Controller::class,'acciones'])->name('accionesEDG272');
    Route::get('seguridad/edg-31',[EDG31Controller::class,'acciones'])->name('accionesEDG31');
    Route::get('seguridad/encargados',[EncargadoController::class,'acciones'])->name('accionesEncargado');
    Route::get('seguridad/entrenadores',[EntrenadorController::class,'acciones'])->name('accionesEntrenador');
    Route::get('seguridad/etapa-deportiva',[Etapa_DeportivaController::class,'acciones'])->name('accionesEtapa');
    Route::get('seguridad/formulario',[FormularioController::class,'acciones'])->name('accionesFormulario');
    Route::get('seguridad/horarios',[HorarioController::class,'acciones'])->name('accionesHorario');
    Route::get('seguridad/linea-de-desarrollo',[LineaDesarrolloController::class,'acciones'])->name('accionesLinea');
    Route::get('seguridad/modalidad',[ModalidadController::class,'acciones'])->name('accionesModalidad');
    Route::get('seguridad/municipios',[MunicipioController::class,'acciones'])->name('accionesMunicipio');
    Route::get('seguridad/nacionalidades',[NacionalidadController::class,'acciones'])->name('accionesNacionalidad');
    Route::get('seguridad/niveles-cdag',[Nivel_cdagController::class,'acciones'])->name('accionesCDAG');
    Route::get('seguridad/niveles-fadn',[Nivel_fadnController::class,'acciones'])->name('accionesFADN');
    Route::get('seguridad/otros-programas-de-atencion',[Otro_ProgramaController::class,'acciones'])->name('accionesOtro');
    Route::get('seguridad/parentescos',[ParentescoController::class,'acciones'])->name('accionesParentesco');
    Route::get('seguridad/prt',[PRTController::class,'acciones'])->name('accionesPRT');
    Route::get('seguridad/psicologia',[PsicologiaController::class,'acciones'])->name('accionesPsicologia');
    Route::get('seguridad/terapias',[TerapiaController::class,'acciones'])->name('accionesTerapia');
    Route::get('seguridad/tipos-de-contratos',[Tipo_ContratoController::class,'acciones'])->name('accionesContrato');
    Route::get('seguridad/usuarios',[UserController::class,'acciones'])->name('accionesUsuarios');
    });

Route::resource('tipo-usuarios',Tipo_UsuarioController::class);
Route::get('municipios', [AlumnoController::class, 'getMunicipios'])->name('municipios');
Route::resource('municipio',MunicipioController::class);
Route::get('edad', [AlumnoController::class, 'calcularEdad'])->name('edad');
Route::get('paciente', [TerapiaController::class, 'getPaciente'])->name('paciente');
Route::post('historiales', [TerapiaController::class, 'getHistorial'])->name('historiales');
Route::get('terapias-PDF/{id}', [TerapiaController::class, 'generarPDF'])->name('historialPDF');
Route::get('correos',[TerapiaController::class,'getCorreo'])->name('correos');
Route::get('busquedaFecha',[TerapiaController::class,'busquedaTerapia'])->name('busquedaFecha');
Route::post('asistenciaCategoria',[AsistenciaController::class,'filtroCategoria'])->name('asistenciaCategoria');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
require __DIR__.'/auth.php';

