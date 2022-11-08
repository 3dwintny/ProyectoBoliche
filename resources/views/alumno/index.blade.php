@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-5 pt-5 pt-md-10">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                <h1 class="text-white">Solicitudes Pendientes</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pt-md-3 pb-12 pt-5">
<div class="">
<table class="table table-sm">
  <thead class="table-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">CUI</th>
      <th scope="col">Celular</th>
      <th scope="col">Correo</th>
      <th scope="col">Estado</th>
      <th scope="col">Fecha</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody class="table-hover">
  @foreach ($alumnos as $alumno)
    <tr>
      <td>{{ $alumno->id }}</td>
      <td>{{$alumno->nombre1}}</td>
      <td>{{$alumno->apellido1}}</td>
      <td>{{$alumno->cui}}</td>
      <td>{{$alumno->celular}}</td>
      <td>{{$alumno->correo}}</td>
      <td class="table-danger">{{$alumno->estado}}</td>
      <td>{{$alumno->fecha}}</td>
      <td>
      <form action="" method="POST">
       <a class="btn btn-sm btn-primary " href="{{ route('alumnos.show',$alumno->id) }}"><i class="fa fa-fw fa-eye"></i>Ver</a>
        <a class="btn btn-sm btn-success" href="{{ route('atletas.create',2) }}"><i class="fa fa-fw fa-check"></i>Aceptar</a>
        <a class="btn btn-sm btn-danger" href="{{ route('alumnos.create')}}"><i class="fa fa-fw fa-trash"></i>Rechazar</a>
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
