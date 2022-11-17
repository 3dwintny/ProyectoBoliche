@extends('layouts.app')

@section('content')

<div class="header bg-gradient-dark py-7 py-lg-5">
    <div class="contaimer mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Asistencia
                        </h4>
                    </div>
                    <div class="card-body">
                        <label>Modificar Fecha de Asistencia</label>
                        <input type="date" id="fecha">
                        <form method="POST" action="{{route('asis')}}" enctype="multipart/form-data" role="form">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <div class="table-responsive">

                                            <table class="table table-striped table-hover">
                                                <thead class="table table-dark mt-2">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Fecha</th>
                                                        <th>Atleta</th>
                                                        <th>Asistencia</th>
                                                        <th>Inasistencia</th>
                                                        <th>Permiso/Descanso</th>
                                                        <th>Enfermo</th>
                                                        <th>Lesión</th>
                                                        <th>Competencia</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $c = 0;
                                                    @endphp
                                                    @foreach($atletas as $item)
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="atleta_id[]" value="{{$item->id}}"
                                                                readonly>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="fecha[]"
                                                                value="{{$hoy->format('Y-m-d')}}"
                                                                id="fecha_registro{{$c}}" readonly>
                                                        </td>
                                                        <td>
                                                            <input type="text"
                                                                value="{{$item->alumno->nombre1}} {{$item->alumno->nombre2}} {{$item->alumno->nombre3}} {{$item->alumno->apellido1}} {{$item->alumno->apellido2}}"
                                                                readonly>
                                                        </td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" id="estado" class="{{$item->id}}"
                                                                    name="estado[]" value="X"> <span></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" id="estado" class="{{$item->id}}"
                                                                    name="estado[]" value="O"> <span></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" id="estado" class="{{$item->id}}"
                                                                    name="estado[]" value="P"> <span></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" id="estado" class="{{$item->id}}"
                                                                    name="estado[]" value="E"> <span></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" id="estado" class="{{$item->id}}"
                                                                    name="estado[]" value="L"> <span></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" id="estado" class="{{$item->id}}"
                                                                    name="estado[]" value="C"> <span></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    @php
                                                    $c = $c+1;
                                                    @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <input type="submit" class="next-form btn btn-outline-primary" value="Guardar Asistencia">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
