@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-2 pt-5 pt-md-10">
  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-6 col-lg-6">
          <h1 class="text-white">Atletas Inscritos</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="pb-5 pt-5 pt-md-2">
  <div class="">
    <table class="table table-responsive table-hover">
      <thead class="table-dark">
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Nombre</th>
          <th scope="col">Etnia</th>
          <th scope="col">Estado Civil</th>
          <th scope="col">Fecha Ingreso</th>
          <th scope="col">Categoria</th>
          <th scope="col">Adaptado</th>
          <th scope="col">Centro</th>
          <th scope="col">Entrenador</th>
          <th scope="col">Etapa Deportiva</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody class="table-hover">
        @foreach ($atletas as $atleta)
        <tr>
          <td>{{$atleta->id}}</td>
          <td><strong>{{$atleta->alumno->nombre1}} {{$atleta->alumno->nombre2}} {{$atleta->alumno->apellido1}} {{$atleta->alumno->apellido2}}</strong></td>
          <td>{{$atleta->etnia}}</td>
          <td>{{$atleta->estado_civil}}</td>
          <td>{{$atleta->fecha_ingreso}}</td>
          <td>{{$atleta->categoria->tipo}}</td>
          <td>{{$atleta->adaptado}}</td>
          <td>{{$atleta->centro->nombre}}</td>
          <td>{{$atleta->entrenador->nombre1}} {{$atleta->entrenador->nombre2}} {{$atleta->entrenador->apellido1}} {{$atleta->entrenador->apellido2}}</td>
          <td>{{$atleta->etapa_deportiva->nombre}}</td>
          <td>
            <form action="" method="POST">
            <a class="btn btn-sm btn-info" href="{{route('atletas.edit',$atleta->id)}}"><i class="fa fa-fw fa-edit"></i>Modificar</a>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@include('layouts.footers.auth')
</div>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush