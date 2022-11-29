<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlergiaController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\AtletaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\Deporte_AdaptadoController;
use App\Http\Controllers\DeporteController;
use App\Http\Controllers\EncargadoController;
use App\Http\Controllers\EntrenadorController;
use App\Http\Controllers\Etapa_DeportivaController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\Linea_DesarrolloController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ModalidadController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\NacionalidadController;
use App\Http\Controllers\Nivel_cdagController;
use App\Http\Controllers\Nivel_fadnController;
use App\Http\Controllers\Otro_ProgramaController;
use App\Http\Controllers\ParentezcoController;
use App\Http\Controllers\PRTController;
use App\Http\Controllers\PsicologiaController;
use App\Http\Controllers\TerapiaController;
use App\Http\Controllers\Tipo_ContratoController;
use App\Http\Controllers\Tipo_UsuarioController;
use App\Http\Controllers\EDG27Controller;
use App\Http\Controllers\EDG272Controller;
use App\Http\Controllers\EDG31Controller;


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

Route::get('/', function () {
    return view('welcome');
});

//Rutas Alergia
Route::resource('alergias',AlergiaController::class);

//Rutas Formulario de Inscripción
Route::resource('alumnos',AlumnoController::class);
Route::get('municipios', [AlumnoController::class, 'getMunicipios'])->name('municipios');
Route::get('edad', [AlumnoController::class, 'calcularEdad'])->name('edad');

//Rutas Asistencia
Route::resource('asistencias',AsistenciaController::class);
Route::post('asis',[AsistenciaController::class,'guardar'])->name('asis');
Route::post('asistencias/buscar',[AsistenciaController::class,'buscar'])->name('buscar');

//Rutas Atletas
Route::resource('atletas',AtletaController::class);

//Ruta Categorias
Route::resource('categorias',CategoriaController::class);

//Rutas Centros
Route::resource('centros',CentroController::class);

//Rutas Departamentos
Route::resource('departamentos',DepartamentoController::class);

//Rutas Deporte_Adoptado
Route::resource('deportes-adaptados',Deporte_AdaptadoController::class);

//Rutas Deporte
Route::resource('deportes',DeporteController::class);

//Ruta Reporte EDG27
Route::resource('edg-27',EDG27Controller::class);

//Ruta Reporte EDG27.2
Route::resource('edg-27-2',EDG272Controller::class);

//Ruta Reporte EDG31
Route::resource('edg-31',EDG31Controller::class);

//Rutas Encargado
Route::resource('encargados',EncargadoController::class);

//Rutas de Entrenador
Route::resource('entrenadores',EntrenadorController::class);

//Rutas Etapa_Deportiva
Route::resource('etapas-deportivas',Etapa_DeportivaController::class);

//Rutas Formulario
Route::resource('formularios',FormularioController::class);

//Rutas Horario
Route::resource('horarios',HorarioController::class);

//Rutas Linea_Desarrollo
Route::resource('lineas-desarrollo',Linea_DesarrolloController::class);

//Rutas Login
Route::resource('login',LoginController::class);

//Rutas Modalidad
Route::resource('modalidades',ModalidadController::class);

//Rutas Municipio
Route::resource('municipio',MunicipioController::class);

//Rutas Nacionalidad
Route::resource('nacionalidades',NacionalidadController::class);

//Rutas Nivel_cdag
Route::resource('niveles-cdag',Nivel_cdagController::class);

//Rutas Nivel_fadn
Route::resource('niveles-fadn',Nivel_fadnController::class);

//Rutas Otro_Programa
Route::resource('otros-programas',Otro_ProgramaController::class);

//Rutas Parentezco
Route::resource('parentezcos',ParentezcoController::class);

//Rutas PRT
Route::resource('prt',PRTController::class);

//Ruta Psicologia
Route::resource('psicologia',PsicologiaController::class);

//Rutas Terapia
Route::resource('terapias',TerapiaController::class);

//Rutas Tipo_Contrato
Route::resource('tipo-contratos',Tipo_ContratoController::class);

//Rutas Tipo_Usuario
Route::resource('tipo-usuarios',Tipo_UsuarioController::class);

Route::get('asistencias-PDF',[AsistenciaController::class,'generarPDF'])->name('asistenciasPDF');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
