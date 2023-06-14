@extends('layouts.app')

@section('content')

<div class="header bg-dark pb-4 pt-5 pt-md-6 mt--5">
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
<div class="pb-4 pt-5 pt-md-3">
    <div class="card-body">
        <form method="get" action="{{route('buscar')}}">
            @csrf
            <div class="row mb-2">
                <div class="col-3">
                    <select class="form-control" name="mes" id="mes">
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
                    <thead class="table-dark">
                        <tr>
                            <th>Atleta</th>
                            <th>Edad</th>
                            <th>Género</th>
                            <th>Categoría</th>
                            <th>Modalidad</th>
                            <th>Días Entrenados</th>
                            <th>% de Asistencia</th>
                            <th>Etapa Deportiva</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="8" style="text-align: center">NO SE ENCONTRARON RESULTADOS</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
