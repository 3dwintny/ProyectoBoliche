@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
 
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
<form method="GET" action="{{route('edg272PDF')}}">
    @csrf
    <input class="btn btn-outline-info" type="submit" value="Generar PDF">
    <input type="hidden" name="carta" id="carta">
</form>
<div class="card">
    <div class="col-xl-12 col-lg-12 ">
        <div class="pb-4 pt-5 pt-md-1">
            <div class="card-body">
                <table class="table table-responsive table-bordered border-light" style="align-content: center;">
                    <thead class="table-dark ">
                       
                        <tr>
                            <th>No</th>
                            <th>Nombre(s) Apellido(s) completos</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Edad</th>
                            <th>Género</th>
                            <th>Categoría</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($atletas as $item)
                        <tr style="text-align: center;">
                            <td>{{$item->id}}</td>
                            <td>
                                {{$item->alumno->nombre1}} {{$item->alumno->nombre2}} {{$item->alumno->nombre3}}
                                {{$item->alumno->apellido1}} {{$item->alumno->apellido2}}
                            </td>
                            <td>{{$item->alumno->fecha}}</td>
                            <td>{{$item->alumno->edad}}</td>
                            <td>{{$item->alumno->genero}}</td>
                            <td>{{$item->categoria->tipo}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection