@extends('layouts.app')
@section('content')
@include('layouts.headers.cards', ['texto' => 'Preferencias'])
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
            <h1 style="text-align: right;">RESTAURAR</h1>
            <hr>
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
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('eliminadosAtletas') }}'">
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
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('eliminadosCategoria') }}'">
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
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('eliminadosCentro') }}'">
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
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('eliminadosDepartamento') }}'">
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
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('eliminadosAdaptado') }}'">
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
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('eliminadosDeporte') }}'">
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
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('eliminadosEDG27') }}'">
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
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('eliminadosEDG272') }}'">
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
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('eliminadosAsistencia') }}'">
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
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('eliminadosEDG31') }}'">
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
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('eliminadosEncargado') }}'">
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
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('eliminadosEntrenador') }}'">
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
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('eliminadosEtapa') }}'">
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
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('eliminadosFormulario') }}'">
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
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('eliminadosHorario') }}'">
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
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('eliminadosLinea') }}'">
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
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('eliminadosModalidad') }}'">
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
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('eliminadosMunicipio') }}'">
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
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('eliminadosNacionalidad') }}'">
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
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('eliminadosCDAG') }}'">
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
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('eliminadosFADN') }}'">
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
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('eliminadosOtro') }}'">
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
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('eliminadosParentesco') }}'">
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
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('eliminadosPRT') }}'">
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
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('eliminadosPsicologia') }}'">
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
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('eliminadosTerapia') }}'">
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
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('eliminadosContrato') }}'">
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
                            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('eliminadosUsuarios') }}'">
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