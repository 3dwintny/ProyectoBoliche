@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="header bg-dark pb-4 pt-5 pt-md-6">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <h1 class="text-white">Toma de asistencia</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-body pb-4 pt-5 pt-md-3">
    @include('components.flash_alerts')
    <div class="container">
        <form action="{{route('asistenciaCategoria')}}" method="POST" enctype="multipart/form-data" role="form">
            @csrf
            <div class="row">
                <div class="col-md-3 mb-2">
                    <!-- Para segir viendo el nombre del placeholder -->
                    <div class="form-floating">
                        <input type="date" class="form-control" id="fecha">
                        <!-- Esto es lo que aparece como placeholder, en el fomulario -->
                        <label for="fecha">Modificar fecha de asistencia</label>
                    </div>
                </div>
                <div class="col-md-3 mb-2">
                    <!-- Para segir viendo el nombre del placeholder -->
                    <div class="form-floating">
                        <select id="categorias" class="form-control" name="categorias" onchange="this.form.submit()">
                            <option value="" selected disabled>Sin filtros</option>
                            @foreach($categoria as $item)
                            <option value="{{$item->id}}" {{$item->tipo == "N/A" ? 'disabled' : ''}}>{{$item->tipo}}</option>
                            @endforeach
                        </select>
                        <!-- Esto es lo que aparece como placeholder, en el fomulario -->
                        <label for="categorias">Filtrar por categoría</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-light" onclick="window.location='{{ route('asistencias.create') }}'">Eliminar filtro</button>
                </div>
            </div>
        </form>
    </div>
    
    
    <div class="container">
        <form method="POST" action="{{route('asis')}}" enctype="multipart/form-data" role="form">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table table-dark mt-2">
                                    <tr>
                                        <th style="width: 3.5%; text-align:center;">No</th>
                                        <th style="width:10%; text-align:center;">Fecha</th>
                                        <th style="width:21.7%; text-align:center;">Atleta</th>
                                        <th style="width:8%; text-align:center;">Asistencia</th>
                                        <th style="width:8%; text-align:center;">Inasistencia</th>
                                        <th style="width:8%; text-align:center;">Permiso/Descanso</th>
                                        <th style="width:8%; text-align:center;">Enfermo</th>
                                        <th style="width:8%; text-align:center;">Lesión</th>
                                        <th style="width:8%; text-align:center;">Competencia</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $c = 0;
                                    $contador = 1;
                                    @endphp
                                    @foreach($atletas as $item)
                                    <tr class="table-sm">
                                        <td>
                                            <input type="hidden" class="text-white bg-dark" name="atleta_id[]" value="{{$item->id}}" style="width: 100%;">
                                            <input type="text" value="{{$contador}}" readonly style="width: 100%; text-align:center;">
                                        </td>
                                        <td>
                                            <input type="text" name="fecha[]" value="{{$hoy->format('Y-m-d')}}" id="fecha_registro{{$c}}" readonly style="width: 100%; text-align:center;">
                                        </td>
                                        <td>
                                            <input type="text" value="{{$item->alumno->nombre1}} {{$item->alumno->nombre2}} {{$item->alumno->nombre3}} {{$item->alumno->apellido1}} {{$item->alumno->apellido2}}" readonly style="width: 100%;text-align:center;">
                                        </td>
                                        <td>
                                            <label style="margin-left: 50%;">
                                                <input type="radio" id="estado" class="{{$item->id}}" name="estado[]{{$item->id}}" value="X" required> <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label style="margin-left: 50%;">
                                                <input type="radio" id="estado" class="{{$item->id}}" name="estado[]{{$item->id}}" value="O" required> <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label style="margin-left: 50%;">
                                                <input type="radio" id="estado" class="{{$item->id}}" name="estado[]{{$item->id}}" value="P" required> <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label style="margin-left: 50%;">
                                                <input type="radio" id="estado" class="{{$item->id}}" name="estado[]{{$item->id}}" value="E" required> <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label style="margin-left: 50%;">
                                                <input type="radio" id="estado" class="{{$item->id}}" name="estado[]{{$item->id}}" value="L" required> <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label style="margin-left: 50%;">
                                                <input type="radio" id="estado" class="{{$item->id}}" name="estado[]{{$item->id}}" value="C" required> <span></span>
                                            </label>
                                        </td>
                                    </tr>
                                    @php
                                    $c = $c+1;
                                    $contador++;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="container"><input type="submit" class="next-form btn btn-outline-primary" value="Registrar Asistencia"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection