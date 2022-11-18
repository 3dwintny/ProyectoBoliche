@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />

<script type="text/javascript" src="DataTables/datatables.min.js"></script>

<div class="header bg-dark pb-4 pt-5 pt-md-6">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <h1 class="text-white">Reporte EDG-27.2 </h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="col-xl-12 col-lg-12 ">
        <div class="pb-4 pt-5 pt-md-1">
            <div class="card-body">
                <table class="table table-responsive table-bordered border-light">
                    <thead class="table-dark ">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tipo de Atleta</th>
                                <th>Nombre(s) Apellido(s)</th>
                                <th>Edad</th>
                                <th>Género</th>
                                <th>Modalidad</th>
                                <th>Categoría</th>
                                <th>Etapa Deportiva</th>
                                <th>Años de Experiencia</th>
                                <th>Meses de Experiencia</th>
                            </tr>
                        </thead>
                    <tbody>
                        @foreach ($atletas as $item)
                        <tr style="text-align: center;">
                            <td>{{$item->id}}</td>
                            <td>{{$item->federado}}</td>
                            <td>
                                {{$item->alumno->nombre1}} {{$item->alumno->nombre2}} {{$item->alumno->nombre3}}
                                {{$item->alumno->apellido1}} {{$item->alumno->apellido2}}
                            </td>
                            <td>{{$item->alumno->edad}}</td>
                            <td>{{$item->alumno->genero}}</td>
                            <td>{{$item->modalidad->nombre}}</td>
                            <td>{{$item->categoria->tipo}}</td>
                            <td>{{$item->etapa_deportiva->nombre}}</td>
                            <td>{{$item->anios}}</td>
                            <td>{{$item->meses}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>