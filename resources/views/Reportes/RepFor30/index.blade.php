@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-4 pt-5 pt-md-6">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <h1 class="text-white">Reporte de Asistencia de {{$mostrarMes}} de {{$mostrarAnioReporte}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="pb-4 pt-5 pt-md-3">
        <div class="card-body">
            <form method="POST" action="{{route('buscar')}}">
                @csrf

                <div class="row mb-2">
                    <div class="col-3">
                        <select class="form-control" name="mes" id="mes">
                            <option selected disabled>Mes</option>
                            <option value="1">Enero</option>
                            <option value="2">Febrero</option>
                            <option value="3">Marzo</option>
                            <option value="4">Abril</option>
                            <option value="5">Mayo</option>
                            <option value="6">Junio</option>
                            <option value="7">Julio</option>
                            <option value="8">Agosto</option>
                            <option value="9">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <input type="number" class="form-control" placeholder="Año" name="anio" id="anio" required>
                    </div>
                    <div class="col-3">
                        <input class="btn btn-outline-info" type="submit" value="Buscar">
                    </div>
                </div>
            </form>
        </div>
        <div class="container">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" style="border-radius: 5px;">
                        @php
                            $contador = 1;   
                        @endphp
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Atleta</th>
                                <th>Edad</th>
                                <th>Género</th>
                                <th>Categoría</th>
                                <th>Modalidad</th>
                                @for ($i=0;$i<count($fs);$i++) <th>{{$fs[$i]}}</th>
                                    @endfor
                                    <th>Días Entrenados</th>
                                    <th>% de Asistencia</th>
                                    <th>Etapa Deportiva</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $s=0;
                            $c=0;
                            @endphp
                            @foreach($atleta as $item)
                            
                            <tr id="{{$c}}" style="text-align: center;">
                                <td>{{$contador}}</td>
                                <!--Filas-->
                                <td>
                                    <!--Columnas-->
                                    {{$item->atleta->alumno->nombre1}} {{$item->atleta->alumno->nombre2}}
                                    {{$item->atleta->alumno->nombre3}}
                                    {{$item->atleta->alumno->apellido1}} {{$item->atleta->alumno->apellido2}}
                                </td>
                                <td>{{$item->atleta->alumno->edad}}</td>
                                <td>{{$item->atleta->alumno->genero}}</td>
                                <td>{{$item->atleta->categoria->tipo}}</td>
                                <td>{{$item->atleta->modalidad->nombre}}</td>

                                @for($i=$s;$i<count($fs)+$s;$i++) <td>{{$estado[$i]}}</td>
                                    @endfor
                                    <td>{{$contarDias[$c]}}</td>
                                    <td>{{$promedio[$c]}}</td>
                                    <td>{{$item->atleta->etapa_deportiva->nombre}}</td>
                                @php
                                    $contador++;
                                @endphp
                            </tr>

                            @php
                            $c=$c+1;
                            $s=$s+count($fs)
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <hr>
        <div class="row mb-2">
        <div class="col-2">
            <form method="GET" action="{{route('asistenciasPDF')}}">
                @csrf
                <input class="btn btn-outline-info " type="submit" value="Generar PDF Carta">
                <input type="hidden" name="carta" id="carta" value="1">
                <input type="hidden" name="meses" id="meses" value="{{$m}}">
                <input type="hidden" name="anios" id="anios" value="{{$y}}">
            </form>

        </div>

        <div class="col-2">
            <form method="GET" action="{{route('asistenciasPDF')}}">
                @csrf
                <input class="btn btn-outline-info" type="submit" value="Generar PDF Oficio">
                <input type="hidden" name="carta" id="carta" value="2">
                <input type="hidden" name="meses" id="meses" value="{{$m}}">
                <input type="hidden" name="anios" id="anios" value="{{$y}}">
            </form>
        </div>
        </div>
    </div>
    @endsection
