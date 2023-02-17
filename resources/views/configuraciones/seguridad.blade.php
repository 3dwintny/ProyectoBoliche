@extends('layouts.app')
@section('content')
<div class="header bg-dark pb-3 pt-5 pt-md-10">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <h2 class="text-white">Preferencias</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@include('configuraciones.varnav')
<div class="align-center">
    <div class="row container mb-3">
        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Alergias
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesAlergia') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Atletas
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesAtletas') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Categorías
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesCategoria') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Centros de entrenamiento
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesCentro') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Departamentos
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesDepartamento') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Deportes adaptados
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesAdaptado') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Deportes
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesDeporte') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    EDG-27
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesEDG27') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    EDG-27.2
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesEDG272') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    EDG-30
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesAsistencia') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    EDG-31
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesEDG31') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Encargados
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesEncargado') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Entrenadores
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesEntrenador') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Etapas deportivas
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesEtapa') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Formulario
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesFormulario') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Horarios
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesHorario') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Líneas de desarrollo
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesLinea') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Modalidades
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesModalidad') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Municipios
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesMunicipio') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Nacionalidades
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesNacionalidad') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Niveles CDAG
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesCDAG') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Niveles FADN
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesFADN') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Otros programas de atención
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesOtro') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Parentescos
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesParentesco') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    PRT
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesPRT') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Psicólogos
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesPsicologia') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Terapias
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesTerapia') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Tipos de contrato
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesContrato') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4 my-1">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="numbers">
                                <h5 class="font-weight-bolder mb-0">
                                    Usuarios
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-3 text-end">
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('accionesUsuarios') }}'">
                                <i class="fa fa-fw fa-eye"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder" style="text-align: left;">Ver</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection