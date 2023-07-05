@extends('layouts.app')
@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-10 col-sm-6">
                    <h1 class="text-white">Preferencias</h1>
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
            <h1 style="text-align: right;">SEGURIDAD</h1>
            <hr>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-xl-0 mb-4">
            <div class="card bg-light">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder mb-0">
                                    Atletas
                                </h6>
                            </div>
                        </div>
                        <div class="col-1 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesAtletas') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-xl-0 mb-4">
            <div class="card bg-light">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder mb-0">
                                    Categorías
                                </h6>
                            </div>
                        </div>
                        <div class="col-1 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesCategoria') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder mb-0">
                                    Centros de entrenamiento
                                </h6>
                            </div>
                        </div>
                        <div class="col-1 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesCentro') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder mb-0">
                                    Departamentos
                                </h6>
                            </div>
                        </div>
                        <div class="col-1 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesDepartamento') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder mb-0">
                                    Deportes adaptados
                                </h6>
                            </div>
                        </div>
                        <div class="col-1 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesAdaptado') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder mb-0">
                                    Deportes
                                </h6>
                            </div>
                        </div>
                        <div class="col-1 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesDeporte') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder mb-0">
                                    EDG-27
                                </h6>
                            </div>
                        </div>
                        <div class="col-1 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesEDG27') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder mb-0">
                                    EDG-27.2
                                </h6>
                            </div>
                        </div>
                        <div class="col-1 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesEDG272') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder mb-0">
                                    EDG-30
                                </h6>
                            </div>
                        </div>
                        <div class="col-1 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesAsistencia') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder mb-0">
                                    EDG-31
                                </h6>
                            </div>
                        </div>
                        <div class="col-1 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesEDG31') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder mb-0">
                                    Encargados
                                </h6>
                            </div>
                        </div>
                        <div class="col-1 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesEncargado') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder mb-0">
                                    Entrenadores
                                </h6>
                            </div>
                        </div>
                        <div class="col-1 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesEntrenador') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder mb-0">
                                    Etapas deportivas
                                </h6>
                            </div>
                        </div>
                        <div class="col-1 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesEtapa') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder mb-0">
                                    Formulario
                                </h6>
                            </div>
                        </div>
                        <div class="col-1 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesFormulario') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder mb-0">
                                    Horarios
                                </h6>
                            </div>
                        </div>
                        <div class="col-1 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesHorario') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder mb-0">
                                    Líneas de desarrollo
                                </h6>
                            </div>
                        </div>
                        <div class="col-1 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesLinea') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder mb-0">
                                    Modalidades
                                </h6>
                            </div>
                        </div>
                        <div class="col-1 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesModalidad') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder mb-0">
                                    Municipios
                                </h6>
                            </div>
                        </div>
                        <div class="col-1 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesMunicipio') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder mb-0">
                                    Nacionalidades
                                </h6>
                            </div>
                        </div>
                        <div class="col-1 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesNacionalidad') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder mb-0">
                                    Niveles CDAG
                                </h6>
                            </div>
                        </div>
                        <div class="col-1 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesCDAG') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder mb-0">
                                    Niveles FADN
                                </h6>
                            </div>
                        </div>
                        <div class="col-1 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesFADN') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder mb-0">
                                    Otros programas de atención
                                </h6>
                            </div>
                        </div>
                        <div class="col-1 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesOtro') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder mb-0">
                                    Parentescos
                                </h6>
                            </div>
                        </div>
                        <div class="col-1 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesParentesco') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder mb-0">
                                    PRT
                                </h6>
                            </div>
                        </div>
                        <div class="col-1 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesPRT') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder mb-0">
                                    Psicólogos
                                </h6>
                            </div>
                        </div>
                        <div class="col-1 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesPsicologia') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder mb-0">
                                    Terapias
                                </h6>
                            </div>
                        </div>
                        <div class="col-1 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesTerapia') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder mb-0">
                                    Tipos de contrato
                                </h6>
                            </div>
                        </div>
                        <div class="col-1 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesContrato') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder mb-0">
                                    Usuarios
                                </h6>
                            </div>
                        </div>
                        <div class="col-1 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesUsuarios') }}'">
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