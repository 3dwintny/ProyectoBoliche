@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                    <h1 class="text-white">Reporte de Asistencia de {{$mostrarMes}} de {{$mostrarAnioReporte}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container pt-2">
    <div class="justify-content-center">
        <div class="card rounded">
          <div class="card-body">
            <h3>Búsqueda</h3>
            <form action="{{ route('buscar') }}" role="form" method="GET">
              @csrf
              <div class="row justify-content-center">
                <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 mb-2">
                  <div class="form-floating">
                    <select class="form-select" name="mes" id="mes">
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
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 mb-2">
                  <div class="form-floating">
                    <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Año" id="anio" type="number" name="anio" value="" required>
                    <label for="anio">Año</label>
                  </div>
                </div>
                <div class="col-xl-1 col-lg-2 col-md-2 col-sm-2 mb-2 text-center">
                  <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
                <div class="col-xl-1 col-lg-2 col-md-3 col-sm-2 mb-2 text-center">
                  <button type="button" class="btn btn-light" onclick="window.location='{{ route('asistencia.index') }}'">Cancelar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>
</div>

<div class="container-fluid pt-2">
    <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12">
                <table class="table table-responsive" style="border-radius: 5px;">
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
                            <td colspan="8" style="text-align: center; font-weight: bolder; font-size:100%;">NO SE ENCONTRARON RESULTADOS</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
