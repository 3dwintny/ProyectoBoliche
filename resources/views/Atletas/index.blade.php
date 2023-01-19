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
<div class="container">
<div class="pb-5 pt-5 pt-md-2">
  <div class="">
    <table class="table table-responsive table-hover" style="border-radius: 5px;">
      <thead class="table-dark">
        <tr>
          <th scope="col">No</th>
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
        @php
          $contador = 1;
        @endphp
        @foreach ($atletas as $atleta)
        <tr>
          <td>{{$contador}}</td>
          <td>
          <div class="d-flex px-2 py-1 bg-white">
              <div>
                <img src="{{ asset('uploads/alumnos/'.$atleta->alumno->foto) }}" class="avatar avatar-sm me-3">
              </div>
              <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-xs"><strong>{{$atleta->alumno->nombre1 }} {{$atleta->alumno->nombre2}} {{$atleta->alumno->apellido1}} {{$atleta->alumno->apellido2}}</strong></h6>
                <p class="text-xs text-secondary mb-0">{{ $atleta->alumno->correo }}</p>
              </div>
            </div>
          </td>
          <td>{{$atleta->etnia}}</td>
          <td>{{$atleta->estado_civil}}</td>
          <td>{{\Carbon\Carbon::parse($atleta->fecha_ingreso)->format('d-m-Y')}}</td>
          <td>{{$atleta->categoria->tipo}}</td>
          <td>{{$atleta->adaptado}}</td>
          <td>{{$atleta->centro->nombre}}</td>
          <td>{{$atleta->entrenador->nombre1}} {{$atleta->entrenador->nombre2}} {{$atleta->entrenador->apellido1}} {{$atleta->entrenador->apellido2}}</td>
          <td>{{$atleta->etapa_deportiva->nombre}}</td>
          <td>
            <form action="" method="POST">
              @can('editar-atleta')
              <a class="btn btn-sm btn-info" href="{{route('atletas.edit',$atleta->id)}}"><i class="fa fa-fw fa-edit"></i>Editar</a>
              @endcan
              @can('eliminar-atleta')
              <a class="btn btn-sm btn-danger" href="{{route('atletas.destroy',$atleta->id)}}"><i class="fa fa-fw fa-trash"></i>Eliminar</a>
              @endcan
            </form>
          </td>
        </tr>
        @php
          $contador++;
        @endphp
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>
@include('layouts.footers.auth')
</div>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
