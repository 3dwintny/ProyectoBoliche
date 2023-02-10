@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-2 pt-5 pt-md-10">
  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-6 col-lg-6">
          <h1 class="text-white">Solicitudes pendientes</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="pb-5 pt-5 pt-md-2">
  <div class="col-xl-12 col-lg-12">
    <table class="table table-responsive table-hover" style="border-radius: 5px;">
      <thead class="table-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nombre Completo</th>
          <th scope="col">CUI</th>
          <th scope="col">Celular</th>
          <th scope="col">Contacto de Emergencia</th>
          <th scope="col">Correo</th>
          <th scope="col">Estado</th>
          <th scope="col">Fecha</th>
          <th scope="col">Direccion</th>
        </tr>
      </thead>
      <tbody class="table-hover">
        @php
          $contador = 1;
        @endphp
        @foreach ($alumnos as $alumno)
        <tr>
          <td>{{ $contador }}</td>
          <td>{{$alumno->nombre1}} {{$alumno->nombre2}} {{$alumno->nombre3}} {{$alumno->apellido1}} {{$alumno->apellido2}}</td>
          <td>{{$alumno->cui}}</td>
          <td>{{$alumno->celular}}</td>
          <td>{{$alumno->contacto_emergencia}}</td>
          <td>{{$alumno->correo}}</td>
          <td class="table-danger text-danger">{{$alumno->estado}}</td>
          <td>{{$alumno->fecha}}</td>
          <td>{{$alumno->direccion}}</td>
          <td>
            <form action="{{ route('alumnos.destroy',$alumno->id) }}" method="POST">
              <a class="btn btn-sm btn-primary " href="{{ route('alumnos.show',$alumno->id) }}"><i class="fa fa-fw fa-eye"></i>Ver</a>
              <a class="btn btn-sm btn-success" href="{{route('creacion',$alumno->id)}}"><i class="fa fa-fw fa-check"></i>Aceptar</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i>Rechazar</button>
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
@include('layouts.footers.auth')
</div>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush