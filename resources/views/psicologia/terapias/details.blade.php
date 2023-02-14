@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-2 pt-5 pt-md-10">
    <div class="container-fluid">
      <div class="header-body">
        <!-- Card stats -->
        <div class="row">
          <div class="col-xl-6 col-lg-6">
            <h1 class="text-white">Terapias</h1>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="header-body text-center  mb-7">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8">
                <div class="card">
                    <div class="card-header text-bold ">
                        <strong>
                            <h3>Detalles de la terapia de {{$paciente->nombre1}} {{$paciente->nombre3}} {{$paciente->nombre3}} {{$paciente->apellido1}} {{$paciente->apellido2}}</h3>
                        </strong>
                    </div>
                </div>
                    <div class="form-group">
                        <div class="card">
                            <div class="card-body bg-light">
                            <div class="col-12 mb-2"><img src="{{ asset('storage/uploads/'.$paciente->foto) }}" class="img-thumbnail" alt="50" height="50" width="50"></div>
                                <h5 class="mb-2">Información personal</h5>
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Fecha') }}" id="fecha" type="text" value="{{Carbon\Carbon::parse($terapia->fecha)->format('d-m-Y')}}" readonly style="background-color: white;">
                                            <label for="fecha">Fecha</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Hora de inicio') }}" id="hora_inicio" type="text" value="{{Carbon\Carbon::parse($terapia->hora_inicio)->format('H:i')}}" readonly style="background-color: white;">
                                            <label for="hora_inicio">Hora de inicio</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Número de sesión') }}" id="numero_terapia" type="text" value="{{$terapia->numero_terapia}}" readonly style="background-color: white;">
                                            <label for="numero_terapia">Número de sesión</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="form-floating">
                                            <textarea class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Impresión clínica') }}" id="impresion_clinica" readonly style="background-color: white;resize:none;" cols="10" rows="10">{{$terapia->impresion_clinica}}</textarea>
                                            <label for="impresion_clinica">Impresión clínica</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="form-floating">
                                            <textarea class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Análisis semiológico (signos y síntomas)') }}" id="analisis_semiologico" readonly style="background-color: white;resize:none;" cols="10" rows="10">{{$terapia->analisis_semiologico}}</textarea>
                                            <label for="analisis_semiologico">Análisis semiológico (signos y síntomas)a</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="form-floating">
                                            <textarea class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Desarrollo') }}" id="desarrollo" readonly style="background-color: white;resize:none;" cols="10" rows="10">{{$terapia->desarrollo}}</textarea>
                                            <label for="desarrollo">Desarrollo</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="form-floating">
                                            <textarea class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Observaciones') }}" id="observaciones" readonly style="background-color: white;resize:none;" cols="10" rows="10">{{$terapia->observaciones}}</textarea>
                                            <label for="observaciones">Observaciones</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="form-floating">
                                            <textarea class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Tarea') }}" id="tarea" readonly style="background-color: white;resize:none;" cols="10" rows="10">{{$terapia->tarea}}</textarea>
                                            <label for="tarea">Tarea</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <table cellpading=0 cellspacing=0 style="width: 100%;" class="table table-hover" >
                                            <thead>
                                                <tr>
                                                    <th colspan="2" style="background-color: white;">FACTORES EMOCIONALES Y SENSORIALES</th>
                                                </tr>
                                                <tr>
                                                    <th style="background-color: white;">Factor</th>
                                                    <th style="background-color: white;">Indicativo</th>
                                                </tr>
                                            </thead>
                                            <tbody class="tamanioFuente60 textoCentrado">
                                                <tr>
                                                    <td style="background-color: white;">Conciencia Corporal</td>
                                                    <td style="background-color: white;">{{$terapia->conciencia_corporal}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: white;">Dominio Corporal</td>
                                                    <td style="background-color: white;">{{$terapia->dominio_corporal}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: white;">Dominio de Respiración</td>
                                                    <td style="background-color: white;">{{$terapia->dominio_respiracion}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: white;">Diálogo Interno</td>
                                                    <td style="background-color: white;">{{$terapia->dialogo_interno}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: white;">Atención</td>
                                                    <td style="background-color: white;">{{$terapia->atencion}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: white;">Concentración</td>
                                                    <td style="background-color: white;">{{$terapia->concentracion}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: white;">Motivación</td>
                                                    <td style="background-color: white;">{{$terapia->motivacion}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: white;">Confianza</td>
                                                    <td style="background-color: white;">{{$terapia->confianza}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: white;">Activación</td>
                                                    <td style="background-color: white;">{{$terapia->activacion}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: white;">Relajación</td>
                                                    <td style="background-color: white;">{{$terapia->relajacion}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: white;">Estrés</td>
                                                    <td style="background-color: white;">{{$terapia->estres}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: white;">Ansiedad Cognitiva</td>
                                                    <td style="background-color: white;">{{$terapia->ansiedad_cognitiva}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: white;">Ansiedad Física</td>
                                                    <td style="background-color: white;">{{$terapia->ansiedad_fisica}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: white;">Miedo</td>
                                                    <td style="background-color: white;">{{$terapia->miedo}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: white;">Frustración</td>
                                                    <td style="background-color: white;">{{$terapia->estres}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
            </div>
        </div>
    </div>
</div>

@endsection











