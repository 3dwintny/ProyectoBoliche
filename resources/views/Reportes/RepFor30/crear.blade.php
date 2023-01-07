@extends('layouts.app')

@section('content')

<div class="header bg-dark pb-4 pt-5 pt-md-6">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <h1 class="text-white">Nueva Asistencia</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-body pb-4 pt-5 pt-md-3">
    @include('components.flash_alerts')
    <form method="POST" action="{{route('asis')}}" enctype="multipart/form-data" role="form">
        @csrf
        <div class="row mb-2">
        <div class="col-3"><label class="form-control">Modificar Fecha de Asistencia</label></div>
        <div class="col-3"><input type="date" class="form-control" id="fecha"></div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-hover">
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
                                $contador = 1;
                                @endphp
                                @foreach($atletas as $item)
                                <tr class="table-sm">
                                    <td>
                                        <input type="hidden" class="text-white bg-dark" name="atleta_id[]" value="{{$item->id}}">
                                        <input type="text" value="{{$contador}}" disabled readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="fecha[]" value="{{$hoy->format('Y-m-d')}}" id="fecha_registro{{$c}}" readonly>
                                    </td>
                                    <td>
                                        <input type="text" value="{{$item->alumno->nombre1}} {{$item->alumno->nombre2}} {{$item->alumno->nombre3}} {{$item->alumno->apellido1}} {{$item->alumno->apellido2}}" readonly>
                                    </td>
                                    <td>
                                        <label>
                                            <input type="checkbox" id="estado" class="{{$item->id}}" name="estado[]" value="X"> <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input type="checkbox" id="estado" class="{{$item->id}}" name="estado[]" value="O"> <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input type="checkbox" id="estado" class="{{$item->id}}" name="estado[]" value="P"> <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input type="checkbox" id="estado" class="{{$item->id}}" name="estado[]" value="E"> <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input type="checkbox" id="estado" class="{{$item->id}}" name="estado[]" value="L"> <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input type="checkbox" id="estado" class="{{$item->id}}" name="estado[]" value="C"> <span></span>
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
                        <div class="container"><input type="submit" class="next-form btn btn-outline-primary" value="Guardar Asistencia"></div>
                    </div>

                </div>
            </div>

        </div>
    </form>

</div>


@endsection