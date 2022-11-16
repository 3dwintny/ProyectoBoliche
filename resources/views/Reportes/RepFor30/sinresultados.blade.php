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
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
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

                            <table>
                                <thead>
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
                            <button type="submit" onclick="window.location='{{ url('asistencias') }}'">Regresar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
