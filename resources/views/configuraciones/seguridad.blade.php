@extends('layouts.app')
@section('content')
@include('layouts.headers.cards', ['texto' => 'Preferencias'])
@include('configuraciones.varnav')
<div class="align-center">
    <div class="row container mb-3">
        <div>
            <h1 style="text-align: right;">SEGURIDAD</h1>
            <hr>
        </div>
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Alergias
                                </h5>
                            </div>
                        </div>
                        <div class="col-1 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesAlergia') }}'">
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
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Atletas
                                </h5>
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
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Categorías
                                </h5>
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
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Centros de entrenamiento
                                </h5>
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
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Departamentos
                                </h5>
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
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Deportes adaptados
                                </h5>
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
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Deportes
                                </h5>
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
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    EDG-27
                                </h5>
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
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    EDG-27.2
                                </h5>
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
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    EDG-30
                                </h5>
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
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    EDG-31
                                </h5>
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
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Encargados
                                </h5>
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
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Entrenadores
                                </h5>
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
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Etapas deportivas
                                </h5>
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
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Formulario
                                </h5>
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
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Horarios
                                </h5>
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
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Líneas de desarrollo
                                </h5>
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
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Modalidades
                                </h5>
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
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Municipios
                                </h5>
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
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Nacionalidades
                                </h5>
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
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Niveles CDAG
                                </h5>
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
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Niveles FADN
                                </h5>
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
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Otros programas de atención
                                </h5>
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
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Parentescos
                                </h5>
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
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    PRT
                                </h5>
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
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Psicólogos
                                </h5>
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
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Terapias
                                </h5>
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
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Tipos de contrato
                                </h5>
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
        <div class="col-xl-4 col-md-12 col-sm-12 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Usuarios
                                </h5>
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