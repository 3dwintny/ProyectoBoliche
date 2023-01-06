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
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold"></p>
                                <h5 class="font-weight-bolder mb-0">
                                    Alergía

                                </h5>
                            </div>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-dark">
                                <i class="ni ni-settings"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder">Modificar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold"></p>
                                <h5 class="font-weight-bolder mb-0">
                                    Deporte
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-dark">
                                <i class="ni ni-settings"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder">Modificar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold"></p>
                                <h5 class="font-weight-bolder mb-0">
                                    Categoría
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-dark">
                                <i class="ni ni-settings"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder">Modificar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row container mb-3">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold"></p>
                                <h5 class="font-weight-bolder mb-0">
                                    Deporte Adaptado
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-dark">
                                <i class="ni ni-settings"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder">Modificar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold"></p>
                                <h5 class="font-weight-bolder mb-0">
                                    Etapa Deportiva
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-dark">
                                <i class="ni ni-settings"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder">Modificar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold"></p>
                                <h5 class="font-weight-bolder mb-0">
                                    Formulario de Inscripción
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-dark">
                                <i class="ni ni-settings"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder">Modificar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row container mb-3">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold"></p>
                                <h5 class="font-weight-bolder mb-0">
                                    Horario
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-dark">
                                <i class="ni ni-settings"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder">Modificar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold"></p>
                                <h5 class="font-weight-bolder mb-0">
                                    Línea de Desarrollo
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-dark">
                                <i class="ni ni-settings"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder">Modificar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold"></p>
                                <h5 class="font-weight-bolder mb-0">
                                    Modalidad
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-dark">
                                <i class="ni ni-settings"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder">Modificar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row container mb-3">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold"></p>
                                <h5 class="font-weight-bolder mb-0">
                                    Nacionalidad
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-dark">
                                <i class="ni ni-settings"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder">Modificar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold"></p>
                                <h5 class="font-weight-bolder mb-0">
                                    Nivel CDAG
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-dark">
                                <i class="ni ni-settings"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder">Modificar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold"></p>
                                <h5 class="font-weight-bolder mb-0">
                                    Nivel FADN
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-dark">
                                <i class="ni ni-settings"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder">Modificar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row container mb-3">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold"></p>
                                <h5 class="font-weight-bolder mb-0">
                                    Otro Programa
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-dark">
                                <i class="ni ni-settings"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder">Modificar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold"></p>
                                <h5 class="font-weight-bolder mb-0">
                                    Parentesco
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-dark">
                                <i class="ni ni-settings"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder">Modificar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold"></p>
                                <h5 class="font-weight-bolder mb-0">
                                    Tipo de Contrato
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-dark">
                                <i class="ni ni-settings"></i>
                            </button>
                            <span class="text-warning text-sm font-weight-bolder">Modificar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
