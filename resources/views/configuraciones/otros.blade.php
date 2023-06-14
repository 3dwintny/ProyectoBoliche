@extends('layouts.app')
@section('content')
@include('layouts.headers.cards', ['texto' => 'Preferencias'])
@include('configuraciones.varnav')
<div class="align-center">
    <div class="row container mb-3">
        <div>
            <h1 style="text-align: right;">OTROS</h1>
            <hr>
        </div>
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-7">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Alergias
                                    <span class="text-success font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{route('alergia.create')}}'">
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('alergia.index') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-7">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Categorías
                                    <span class="text-success font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{route('categoria.create')}}'">
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('categoria.index') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-7">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Centros de Entrenamiento
                                    <span class="text-success font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{route('centro.create')}}'">
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('centro.index') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-7">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0" style="font-size:120%;">
                                    Departamentos
                                    <span class="text-success font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{route('departamentos.create')}}'">
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('departamentos.index') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-7">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Deportes
                                    <span class="text-success font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
<<<<<<< HEAD
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark"
                                onclick="window.location='{{route('nacionalidades.create')}}'">
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder">Agregar</span>
                        </div>
                        <div class="col-2 text-end">
                            <button type="button" class="btn btn-dark"
                                onclick="window.location='{{ route('nacionalidades.index') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
=======
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{route('deporte.create')}}'">
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('deporte.index') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
>>>>>>> 03e7a231be7f35737b46212c52a6ad402453e6df
                        </div>
                    </div>
                </div>
            </div>
        </div>
<<<<<<< HEAD

        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
=======
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1 my-1">
>>>>>>> 03e7a231be7f35737b46212c52a6ad402453e6df
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-7">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Deportes Adaptados
                                    <span class="text-success font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{route('deporte-adaptado.create')}}'">
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('deporte-adaptado.index')}}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-7">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Etapas Deportivas
                                    <span class="text-success font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{route('etapa-deportiva.create')}}'">
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('etapa-deportiva.index') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-7">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Formulario de Inscripción
                                    <span class="text-success font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
<<<<<<< HEAD
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark"
                                onclick="window.location='{{route('nacionalidades.create')}}'">
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder">Agregar</span>
                        </div>
                        <div class="col-2 text-end">
                            <button type="button" class="btn btn-dark"
                                onclick="window.location='{{ route('nacionalidades.index') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
=======
                        <div class="col-4 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{route('formulario-inscripcion.index')}}'">
                                <i class="fa fa-fw fa-light fa-eye"></i>
                            </button>
>>>>>>> 03e7a231be7f35737b46212c52a6ad402453e6df
                        </div>
                    </div>
                </div>
            </div>
        </div>
<<<<<<< HEAD
    </div>
    <div class="row container mb-3">
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
=======
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
>>>>>>> 03e7a231be7f35737b46212c52a6ad402453e6df
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-7">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Horarios
                                    <span class="text-success font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
<<<<<<< HEAD
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark"
                                onclick="window.location='{{route('nacionalidades.create')}}'">
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder">Agregar</span>
                        </div>
                        <div class="col-2 text-end">
                            <button type="button" class="btn btn-dark"
                                onclick="window.location='{{ route('nacionalidades.index') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
=======
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{route('horario.create')}}'">
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('horario.index') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
>>>>>>> 03e7a231be7f35737b46212c52a6ad402453e6df
                        </div>
                    </div>
                </div>
            </div>
        </div>
<<<<<<< HEAD

        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Línea de Desarrollo
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark"
                                onclick="window.location='{{route('nacionalidades.create')}}'">
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder">Agregar</span>
                        </div>
                        <div class="col-2 text-end">
                            <button type="button" class="btn btn-dark"
                                onclick="window.location='{{ route('nacionalidades.index') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Modaliadad
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark"
                                onclick="window.location='{{route('nacionalidades.create')}}'">
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder">Agregar</span>
                        </div>
                        <div class="col-2 text-end">
                            <button type="button" class="btn btn-dark"
                                onclick="window.location='{{ route('nacionalidades.index') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row container mb-3">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
=======
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
>>>>>>> 03e7a231be7f35737b46212c52a6ad402453e6df
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-7">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Líneas de Desarrollo
                                    <span class="text-success font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
<<<<<<< HEAD
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark"
                                onclick="window.location='{{route('nacionalidades.create')}}'">
=======
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{route('linea-de-desarrollo.create')}}'">
>>>>>>> 03e7a231be7f35737b46212c52a6ad402453e6df
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                        </div>
<<<<<<< HEAD
                        <div class="col-2 text-end">
                            <button type="button" class="btn btn-dark"
                                onclick="window.location='{{ route('nacionalidades.index') }}'">
=======
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('linea-de-desarrollo.index') }}'">
>>>>>>> 03e7a231be7f35737b46212c52a6ad402453e6df
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<<<<<<< HEAD

        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Nivel CDAG
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark"
                                onclick="window.location='{{route('niveles-cdag.create')}}'">
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder">Agregar</span>
                        </div>
                        <div class="col-2 text-end">
                            <button type="button" class="btn btn-dark"
                                onclick="window.location='{{ route('niveles-cdag.index') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Nivel FADN
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark"
                                onclick="window.location='{{route('niveles-fadn.create')}}'">
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder">Agregar</span>
                        </div>
                        <div class="col-2 text-end">
                            <button type="button" class="btn btn-dark"
                                onclick="window.location='{{ route('niveles-fadn.index') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row container mb-3">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
=======
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
>>>>>>> 03e7a231be7f35737b46212c52a6ad402453e6df
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-7">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Modalidades
                                    <span class="text-success font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
<<<<<<< HEAD
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark"
                                onclick="window.location='{{route('otros-programas.create')}}'">
=======
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{route('modalidad.create')}}'">
>>>>>>> 03e7a231be7f35737b46212c52a6ad402453e6df
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                        </div>
<<<<<<< HEAD
                        <div class="col-2 text-end">
                            <button type="button" class="btn btn-dark"
                                onclick="window.location='{{ route('otros-programas.index') }}'">
=======
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('modalidad.index') }}'">
>>>>>>> 03e7a231be7f35737b46212c52a6ad402453e6df
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-7">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Municipios
                                    <span class="text-success font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
<<<<<<< HEAD
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark"
                                onclick="window.location='{{route('parentescos.create')}}'">
=======
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{route('municipio.create')}}'">
>>>>>>> 03e7a231be7f35737b46212c52a6ad402453e6df
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                        </div>
<<<<<<< HEAD
                        <div class="col-2 text-end">
                            <button type="button" class="btn btn-dark"
                                onclick="window.location='{{ route('parentescos.index') }}'">
=======
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('municipio.index') }}'">
>>>>>>> 03e7a231be7f35737b46212c52a6ad402453e6df
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-7">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0" style="font-size: 122%;">
                                    Nacionalidades
                                    <span class="text-success font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{route('nacionalidad.create')}}'">
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('nacionalidad.index') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-7">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Niveles CDAG
                                    <span class="text-success font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{route('nivel-cdag.create')}}'">
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('nivel-cdag.index') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-7">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Niveles FADN
                                    <span class="text-success font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{route('nivel-fadn.create')}}'">
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('nivel-fadn.index') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-7">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Otros Programas de Atención
                                    <span class="text-success font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{route('otro-programa-de-atencion.create')}}'">
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('otro-programa-de-atencion.index') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-7">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Parentescos
                                    <span class="text-success font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{route('parentesco.create')}}'">
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('parentesco.index') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-7">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    PRT
                                    <span class="text-success font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
<<<<<<< HEAD
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark"
                                onclick="window.location='{{route('prt.create')}}'">
=======
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{route('prt.create')}}'">
>>>>>>> 03e7a231be7f35737b46212c52a6ad402453e6df
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                        </div>
<<<<<<< HEAD
                        <div class="col-2 text-end">
                            <button type="button" class="btn btn-dark"
                                onclick="window.location='{{ route('prt.index') }}'">
=======
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('prt.index') }}'">
>>>>>>> 03e7a231be7f35737b46212c52a6ad402453e6df
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-7">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Tipos de Contrato
                                    <span class="text-success font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
<<<<<<< HEAD
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark"
                                onclick="window.location='{{route('psicologia.create')}}'">
=======
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{route('tipo-de-contrato.create')}}'">
>>>>>>> 03e7a231be7f35737b46212c52a6ad402453e6df
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                        </div>
<<<<<<< HEAD
                        <div class="col-2 text-end">
                            <button type="button" class="btn btn-dark"
                                onclick="window.location='{{ route('psicologia.index') }}'">
=======
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('tipo-de-contrato.index') }}'">
>>>>>>> 03e7a231be7f35737b46212c52a6ad402453e6df
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<<<<<<< HEAD

        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Tipo de Contrato
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark"
                                onclick="window.location='{{route('tipo-contratos.create')}}'">
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder">Agregar</span>
                        </div>
                        <div class="col-2 text-end">
                            <button type="button" class="btn btn-dark"
                                onclick="window.location='{{ route('tipo-contratos.index') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
=======
>>>>>>> 03e7a231be7f35737b46212c52a6ad402453e6df
</div>
@endsection
