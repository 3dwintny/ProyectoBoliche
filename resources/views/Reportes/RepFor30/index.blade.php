@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-4 pt-5 pt-md-6 mt--5">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <h1 class="text-white">Reporte de Asistencia de {{$mostrarMes}} de {{$obtenerAnio}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="pb-4 pt-5 pt-md-3">
        <div class="card-body">
            <form action="{{route('buscar')}}" role="form" method="GET">
                @csrf
                <div class="row">
                  <div class="col-md-4 mb-2">
                    <div class="form-floating">
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
                        <label for="mes">Mes</label>
                    </div>
                  </div>
                  <div class="col-md-4 mb-2">
                    <div class="form-floating">
                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Año" id="anio" type="number" name="anio" value="" required>
                        <label for="anio">Año</label>
                    </div>
                  </div>
                  <div class="col-md-1 mb-2">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                  </div>
                  <div class="col-md-2 mb-2">
                    <button type="button" class="btn btn-light" onclick="window.location='{{route('asistencias.index')}}'">Cancelar búsqueda</button>
                  </div>
                </div>
              </form>
        </div>
        
        <div class="container">
                <form method="GET" action="{{route('asistenciasPDF')}}" enctype="multipart/form-data" role="form" target="_blank">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <div class="form-floating">
                                <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Fecha de aprobación') }}" id="fechaAprobacion" type="date" name="fechaAprobacion" required>
                                <label for="fechaAprobacion">Fecha de aprobación</label>
                            </div>
                        </div>
                        <div class="col-md-1 mb-2">
                            <button class="btn btn-outline-info" type="submit"><i class="fa fa-fw fa-regular fa-file-pdf"></i></button>
                        </div>
                        <input type="hidden" name="meses" id="meses" value="{{$obtenerMes}}">
                        <input type="hidden" name="anios" id="anios" value="{{$obtenerAnio}}">
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
                                @for ($i=0;$i<count($fechas);$i++) <th>{{Carbon\Carbon::parse($fechas[$i]->fecha)->format('d')}}</th>
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
                                    {{$item->alumno->nombre1}} {{$item->alumno->nombre2}}
                                    {{$item->alumno->nombre3}}
                                    {{$item->alumno->apellido1}} {{$item->alumno->apellido2}}
                                </td>
                                <td>{{$item->alumno->edad}}</td>
                                <td>{{$item->alumno->genero}}</td>
                                <td>{{$item->categoria->tipo}}</td>
                                <td>{{$item->modalidad->nombre}}</td>
                                @for($i=$s;$i<count($fechas)+$s;$i++) <td>{{$estado[$i]}}</td>
                                    @endfor
                                <td>{{$contarDias[$c]}}</td>
                                <td>{{$promedio[$c]}}</td>
                                <td>{{$item->etapa_deportiva->nombre}}</td>
                                @php
                                    $contador++;
                                @endphp
                            </tr>

                            @php
                            $c=$c+1;
                            $s=$s+count($fechas)
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{$atleta->appends(['mes'=>$obtenerMes,'anio'=>$obtenerAnio])->links('vendor.pagination.custom')}} --}}
                </div>
            </div>
        </div>
    </div>
    @endsection