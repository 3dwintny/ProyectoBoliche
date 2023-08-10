@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <h1 class="text-white">Sesiones</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pt-2">
    <div class="header-body text-center mb-2 container">
        <div class="row justify-content-center">
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <form method="post" role="form" enctype="multipart/form-data" action="{{route('sesiones.update',encrypt($terapia->id))}}">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="card">
                            <div class="card-header bg-light mb-1">
                                <div class="row justify-content-center">
                                    <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12">
                                        @foreach($alumno as $item)
                                        <h3 class="card-title text-dark">Editar sesión de {{$item->nombre1}} {{$item->nombre2}} {{$item->nombre3}} {{$item->apellido1}} {{$item->apellido2}}</h3>
                                        <input type="hidden" value="{{$item->correo}}" name="correo" id="correo" readonly>
                                        @endforeach
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-3">
                                        <div class="form-floating mb-3">
                                            <input style="text-align: center;" type="text" class="form-control" id="numero_terapia" name="numero_terapia" placeholder="No. sesión" value="{{$terapia->numero_terapia}}" readonly required>
                                            <label for="numero_terapia">No. sesión</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-xl-6 col-lg-6 col-md-9 col-sm-10 mb-4">
                                <input type="hidden" class="form-control text-center" name="atleta_id" value="{{encrypt($terapia->atleta_id)}}" readonly required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-9 col-sm-10 mb-4">
                                <input type="hidden" class="form-control text-dark" name="psicologia_id" id="psicologia_id" value="{{encrypt($terapia->psicologia_id)}}" readonly required>
                            </div>
                        </div>
    
                        <div class="row justify-content-center">
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4">
                                <input type="date" class="form-control text-center" name="fecha" value="{{$terapia->fecha}}" required>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 mb-4">
                                <input style="text-align: center" type="time" class="form-control text-dark" name="hora_inicio" id="hora_inicio" value="{{$terapia->hora_inicio}}" required>
                            </div>
                        </div>
                        <div class="card-body bg-light">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2">
                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingOne">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                    Impresión clínica
                                                </button>
                                            </h2>
                                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <textarea class="form-control" name="impresion_clinica" placeholder="Impresión clínica" id="floatingTextarea">{{$terapia->impresion_clinica}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingTwo">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                    Análisis semiológico (signos y síntomas)
                                                </button>
                                            </h2>
                                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <textarea class="form-control" name="analisis_semiologico" placeholder="Análisis semiológico (signos y síntomas)" id="floatingTextarea">{{$terapia->analisis_semiologico}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingThree">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                                    Desarrollo
                                                </button>
                                            </h2>
                                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <textarea class="form-control" name="desarrollo" placeholder="Desarrollo" id="floatingTextarea">{{$terapia->desarrollo}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-heading4">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">
                                                    Observaciones
                                                </button>
                                            </h2>
                                            <div id="flush-collapse4" class="accordion-collapse collapse" aria-labelledby="flush-heading4" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <textarea class="form-control" name="observaciones" placeholder="Observaciones" id="floatingTextarea">{{$terapia->observaciones}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-heading5">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapse5">
                                                    Tarea
                                                </button>
                                            </h2>
                                            <div id="flush-collapse5" class="accordion-collapse collapse" aria-labelledby="flush-heading5" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <textarea class="form-control" name="tarea" placeholder="Tarea" id="floatingTextarea">{{$terapia->tarea}}</textarea>
                                                </div>
                                                <input type="hidden" value="{{$terapia->estado_tarea}}" name="estado_tarea" id="estado_tarea">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="mb-3">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <table class="table table-responsive" style="border-radius: 5px;">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th scope="col">Rubro</th>
                                                        <th scope="col">Valor</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Conciencia Corporal</td>
                                                        <td>
                                                            @for($i=1;$i<=10;$i++)
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="conciencia_corporal" id="inlineRadio1" value="{{$i}}">
                                                                    @if($i==$terapia->conciencia_corporal)
                                                                        <input class="form-check-input" type="radio" name="conciencia_corporal" id="inlineRadio1" value="{{$i}}" checked>
                                                                    @endif
                                                                    <label class="form-check-label" for="inlineRadio1">{{$i}}</label>
                                                                </div>
                                                            @endfor
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Dominio Corporal</td>
                                                        <td>
                                                            @for($i=1;$i<=10;$i++)
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="dominio_corporal" id="inlineRadio1" value="{{$i}}">
                                                                    @if($i==$terapia->dominio_corporal)
                                                                        <input class="form-check-input" type="radio" name="dominio_corporal" id="inlineRadio1" value="{{$i}}" checked>
                                                                    @endif
                                                                    <label class="form-check-label" for="inlineRadio1">{{$i}}</label>
                                                                </div>
                                                            @endfor
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Dominio de Respiración</td>
                                                        <td>
                                                            @for($i=1;$i<=10;$i++)
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="dominio_respiracion" id="inlineRadio1" value="{{$i}}">
                                                                    @if($i==$terapia->dominio_respiracion)
                                                                        <input class="form-check-input" type="radio" name="dominio_respiracion" id="inlineRadio1" value="{{$i}}" checked>
                                                                    @endif
                                                                    <label class="form-check-label" for="inlineRadio1">{{$i}}</label>
                                                                </div>
                                                            @endfor
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Diálogo Interno</td>
                                                        <td>
                                                            @for($i=1;$i<=10;$i++)
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="dialogo_interno" id="inlineRadio1" value="{{$i}}">
                                                                    @if($i==$terapia->dialogo_interno)
                                                                        <input class="form-check-input" type="radio" name="dialogo_interno" id="inlineRadio1" value="{{$i}}" checked>
                                                                    @endif
                                                                    <label class="form-check-label" for="inlineRadio1">{{$i}}</label>
                                                                </div>
                                                            @endfor
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Atención</td>
                                                        <td>
                                                            @for($i=1;$i<=10;$i++)
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="atencion" id="inlineRadio1" value="{{$i}}"> 
                                                                    @if($i==$terapia->atencion)
                                                                        <input class="form-check-input" type="radio" name="atencion" id="inlineRadio1" value="{{$i}}" checked>
                                                                    @endif
                                                                    <label class="form-check-label" for="inlineRadio1">{{$i}}</label>
                                                                </div>
                                                            @endfor
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Concentración</td>
                                                        <td>
                                                            @for($i=1;$i<=10;$i++)
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="concentracion" id="inlineRadio1" value="{{$i}}">
                                                                    @if($i==$terapia->concentracion)
                                                                        <input class="form-check-input" type="radio" name="concentracion" id="inlineRadio1" value="{{$i}}" checked>
                                                                    @endif
                                                                    <label class="form-check-label" for="inlineRadio1">{{$i}}</label>
                                                                </div>
                                                            @endfor
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Motivación</td>
                                                        <td>
                                                            @for($i=1;$i<=10;$i++)
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="motivacion" id="inlineRadio1" value="{{$i}}">
                                                                    @if($i==$terapia->motivacion)
                                                                        <input class="form-check-input" type="radio" name="motivacion" id="inlineRadio1" value="{{$i}}" checked>
                                                                    @endif
                                                                    <label class="form-check-label" for="inlineRadio1">{{$i}}</label>
                                                                </div>
                                                            @endfor
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Confianza</td>
                                                        <td>
                                                            @for($i=1;$i<=10;$i++)
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="confianza" id="inlineRadio1" value="{{$i}}">
                                                                    @if($i==$terapia->confianza)
                                                                        <input class="form-check-input" type="radio" name="confianza" id="inlineRadio1" value="{{$i}}" checked>
                                                                    @endif
                                                                    <label class="form-check-label" for="inlineRadio1">{{$i}}</label>
                                                                </div>
                                                            @endfor
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Activación</td>
                                                        <td>
                                                            @for($i=1;$i<=10;$i++)
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="activacion" id="inlineRadio1" value="{{$i}}">
                                                                    @if($i==$terapia->activacion)
                                                                        <input class="form-check-input" type="radio" name="activacion" id="inlineRadio1" value="{{$i}}" checked>
                                                                    @endif
                                                                    <label class="form-check-label" for="inlineRadio1">{{$i}}</label>
                                                                </div>
                                                            @endfor
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Relajación</td>
                                                        <td>
                                                            @for($i=1;$i<=10;$i++)
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="relajacion" id="inlineRadio1" value="{{$i}}">
                                                                    @if($i==$terapia->relajacion)
                                                                        <input class="form-check-input" type="radio" name="relajacion" id="inlineRadio1" value="{{$i}}" checked>
                                                                    @endif
                                                                    <label class="form-check-label" for="inlineRadio1">{{$i}}</label>
                                                                </div>
                                                            @endfor
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Estrés</td>
                                                        <td>
                                                            @for($i=1;$i<=10;$i++)
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="estres" id="inlineRadio1" value="{{$i}}">
                                                                    @if($i==$terapia->estres)
                                                                        <input class="form-check-input" type="radio" name="estres" id="inlineRadio1" value="{{$i}}" checked>
                                                                    @endif
                                                                    <label class="form-check-label" for="inlineRadio1">{{$i}}</label>
                                                                </div>
                                                            @endfor
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ansiedad Cognitiva</td>
                                                        <td>
                                                            @for($i=1;$i<=10;$i++)
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="ansiedad_cognitiva" id="inlineRadio1" value="{{$i}}">
                                                                    @if($i==$terapia->ansiedad_cognitiva)
                                                                        <input class="form-check-input" type="radio" name="ansiedad_cognitiva" id="inlineRadio1" value="{{$i}}" checked>
                                                                    @endif
                                                                    <label class="form-check-label" for="inlineRadio1">{{$i}}</label>
                                                                </div>
                                                            @endfor
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ansiedad Física</td>
                                                        <td>
                                                            @for($i=1;$i<=10;$i++)
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="ansiedad_fisica" id="inlineRadio1" value="{{$i}}">
                                                                    @if($i==$terapia->ansiedad_fisica)
                                                                        <input class="form-check-input" type="radio" name="ansiedad_fisica" id="inlineRadio1" value="{{$i}}" checked>
                                                                    @endif
                                                                    <label class="form-check-label" for="inlineRadio1">{{$i}}</label>
                                                                </div>
                                                            @endfor
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Miedo</td>
                                                        <td>
                                                            @for($i=1;$i<=10;$i++)
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="miedo" id="inlineRadio1" value="{{$i}}">
                                                                    @if($i==$terapia->miedo)
                                                                        <input class="form-check-input" type="radio" name="miedo" id="inlineRadio1" value="{{$i}}" checked>
                                                                    @endif
                                                                    <label class="form-check-label" for="inlineRadio1">{{$i}}</label>
                                                                </div>
                                                            @endfor
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Frustración</td>
                                                        <td>
                                                            @for($i=1;$i<=10;$i++)
                                                            <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="frustracion" id="inlineRadio1" value="{{$i}}">
                                                            @if($i==$terapia->frustracion)
                                                            <input class="form-check-input" type="radio" name="frustracion" id="inlineRadio1" value="{{$i}}" checked>
                                                            @endif
                                                            <label class="form-check-label" for="inlineRadio1">{{$i}}</label>
                                                            </div>
                                                            @endfor
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <button type="submit" class="btn btn-outline-primary">Actualizar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection