@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />

<script type="text/javascript" src="DataTables/datatables.min.js"></script>

<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-10 col-sm-6">
                    <h1 class="text-white">Reporte EDG-27</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container pt-2">
    <div class="header-body text-center mb-7">
        <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1">
            <form method="GET" action="{{route('edg27PDF')}}" enctype="multipart/form-data" target="_blank" role="form">
                @csrf
                <button class="btn btn-outline-info" type="submit"><i class="fa fa-fw fa-regular fa-file-pdf"></i></button>
            </form>
        </div>
        <div class="row justify-content-center">
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <table class="table table-responsive">
                    @php
                        $contador = 1;   
                    @endphp
                    <thead class="table-dark ">
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
                            <td>{{$contador}}</td>
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
                            @php
                                $contador++;
                            @endphp
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection