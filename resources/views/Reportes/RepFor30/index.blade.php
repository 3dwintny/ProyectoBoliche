@extends('layouts.app')

@section('content')

<div class="header bg-gradient-dark py-7 py-lg-5">
    <div class="contaimer mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Reporte de asistencia
                        </h4>
                        <form method="POST" action="{{route('buscar')}}">
                                @csrf
                                <label>Mes</label>
                                <select name="mes" id="mes">
                                    <option value="1">Enero</option>
                                    <option value="2">Febrero</option>
                                    <option value="3">Marzo</option>
                                    <option value="4">Abril</option>
                                    <option value="5">Mayo</option>
                                    <option value="6">Junio</option>
                                    <option value="7">Julio</option>
                                    <option value="8">Agosto</option>
                                    <option value="9">Septiembre</option>
                                    <option value="10">Octube</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option>
                                </select>
                                <label>Año</label>
                                <input type="number" name="anio" id="anio" required>
                                <input type="submit" value="Buscar">
                            </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table tabla-dark">
                                <thead>
                                    <tr>
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
                                            <td></td>
                                            <td></td>
                                            <td>{{$item->atleta->etapa_deportiva->nombre}}</td>
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
            </div>
        </div>
    </div>
</div>
@endsection
