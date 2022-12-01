<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PRTController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AtletaController;
use App\Http\Controllers\CentroController;
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
use App\Http\Controllers\ParentezcoController;
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
    Route::resource('asistencias',AsistenciaController::class);
    Route::post('asis',[AsistenciaController::class,'guardar'])->name('asis');
    Route::post('asistencias/buscar',[AsistenciaController::class,'buscar'])->name('buscar');
	Route::resource('alergias',AlergiaController::class);

    //Rutas Atletas
    Route::resource('atletas',AtletaController::class);

    //Ruta Categorias
    Route::resource('categorias',CategoriaController::class);

    //Rutas Centros
    Route::resource('centros',CentroController::class);

    //Rutas Departamentos
    Route::resource('departamentos',DepartamentoController::class);

    //Rutas Deporte_Adoptado
    Route::resource('deportes-adoptados',Deporte_AdoptadoController::class);

    //Rutas Deporte
    Route::resource('deportes',DeporteController::class);

    //Rutas Encargado
    Route::resource('encargados',EncargadoController::class);

    //Rutas de Entrenador
    Route::resource('entrenadores',EntrenadorController::class);

    //Rutas Etapa_Deportiva
    Route::resource('departamentos',Etapa_DeportivaController::class);

    //Rutas Formulario
    Route::resource('departamentos',FormularioController::class);

    //Rutas Horario
    Route::resource('departamentos',HorarioController::class);

    //Rutas Linea_Desarrollo
    Route::resource('lineas-desarrollo',Linea_DesarrolloController::class);

    //Rutas Login
    Route::resource('login',LoginController::class);

    //Rutas Modalidad
    Route::resource('modalidades',ModalidadController::class);

    //Rutas Municipio

    //Rutas Nacionalidad
    Route::resource('nacionalidades',NacionalidadController::class);

    //Rutas Nivel_cdag
    Route::resource('niveles-cdag',Nivel_cdagController::class);

    //Rutas Nivel_fadn
    Route::resource('niveles-fadn',Nivel_fadnController::class);

    //Rutas Otro_Programa
    Route::resource('otros_programas',Otro_ProgramaController::class);

    //Rutas Parentezco
    Route::resource('parentezcos',ParentezcoController::class);

    //Rutas PRT
    Route::resource('prt',PRTController::class);

    //Ruta Psicologia
    Route::resource('psicologia',PsicologiaController::class);

    //Rutas Terapia
    Route::resource('terapias',TerapiaController::class);

    //Rutas Tipo_Contrato
    Route::resource('tipo_contratos',Tipo_ContratoController::class);

    //Rutas Tipo_Usuario
    Route::resource('tipo-usuarios',Tipo_UsuarioController::class);

//Rutas Tipo_Contrato

//ruta para mostrar el nombre del atleta
    Route::get('atl/{id}',[AtletaController::class,'creacion'])->name('creacion');

    Route::get('for31', function () {return view('Reportes.for31');})->name('for31');
    Route::get('for30', function () {return view('Reportes.for30');})->name('for30');

    Route::resource('slider', SliderController::class);
});
//Ruta Formulario de Inscripción
Route::resource('alumnos',AlumnoController::class);
Route::resource('tipo-usuarios',Tipo_UsuarioController::class);
Route::get('municipios', [AlumnoController::class, 'getMunicipios'])->name('municipios');
Route::get('edad', [AlumnoController::class, 'calcularEdad'])->name('edad');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
require __DIR__.'/auth.php';
