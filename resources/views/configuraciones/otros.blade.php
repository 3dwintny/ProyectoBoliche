@extends('layouts.app')
@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-10 col-sm-6">
                    <h1 class="text-white">Usuarios</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@include('configuraciones.varnav')
<div class="align-center">
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row container mb-3">
        <div>
            <h1 style="text-align: right;">OTROS</h1>
            <hr>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 mb-xl-0 mb-4">
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
        <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 mb-xl-0 mb-4">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-7">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Centros de entrenamiento
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
        <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1 my-1">
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
        <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1 my-1">
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
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{route('deporte.create')}}'">
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('deporte.index') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-7">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Deportes adaptados
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
        <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-7">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Etapas deportivas
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
        <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-7">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Formulario de inscripción
                                    <span class="text-success font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{route('formulario-inscripcion.index')}}'">
                                <i class="fa fa-fw fa-light fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
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
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{route('horario.create')}}'">
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('horario.index') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-7">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Líneas de desarrollo
                                    <span class="text-success font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{route('linea-de-desarrollo.create')}}'">
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('linea-de-desarrollo.index') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
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
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{route('modalidad.create')}}'">
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('modalidad.index') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
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
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{route('municipio.create')}}'">
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('municipio.index') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
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
        <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
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
        <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
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
        <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-7">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Otros programas de atención
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
        <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
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
        <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
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
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{route('prt.create')}}'">
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('prt.index') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-7">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Tipos de contrato
                                    <span class="text-success font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{route('tipo-de-contrato.create')}}'">
                                <i class="fa fa-fw fa-light fa-plus"></i>
                            </button>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('tipo-de-contrato.index') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
