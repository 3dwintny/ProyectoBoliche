@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
  <div class="container-fluid">
      <div class="header-body">
          <div class="row">
              <div class="col-xl-6 col-lg-8 col-md-12 col-sm-8">
                  <h1 class="text-white">Centros de entrenamiento</h1>
              </div>
          </div>
      </div>
  </div>
</div>
<div class="container-fluid pt-2">
  <div class="header-body text-center mb-7">
    <div class="row justify-content-center">
      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <table class="table table-responsive table-hover" style="border-radius: 5px;">
        <thead class="table-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nombre</th>
            <th>Dirección</th>
            <th>Accesibilidad</th>
            <th>Institución</th>
            <th>Implementación</th>
            <th>Espacio Físico</th>
            <th>Fecha de Registro</th>
            <th>Departamento</th>
          </tr>
        </thead>
        <tbody class="table-hover">
          @php
              $contador = 1;
          @endphp
          @foreach ($centro as $item)
          <tr>
            <td>{{$contador}}</td>
            <td>{{$item->nombre}}</td>
            <td>{{$item->direccion}}</td>
            <td>{{$item->accesibilidad}}</td>
            <td>{{$item->institucion}}</td>
            <td>{{$item->implementacion}}</td>
            <td>{{$item->espacio_fisico}}</td>
            <td>{{\Carbon\Carbon::parse($item->fecha_registro)->format('d-m-Y')}}</td>
            <td>{{$item->departamento->nombre}}</td>
            <td>
              <form action="{{route('centro.edit',encrypt($item->id))}}" method="GET">
                <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-regular fa-pen"></i></button>
              </form>
            </td>
            <td>
              <form action="{{route('listarHorarios',encrypt($item->id))}}" method="GET">
                <button type="submit" class="btn btn-warning"><i class="fa fa-fw fa-regular fa-calendar"></i></button>
              </form>
            </td>
            <td>
              <form action="{{route('agregarHorarios',encrypt($item->id))}}" method="GET">
                <button type="submit" class="btn btn-warning"><i class="fa fa-fw fa-regular fa-plus"></i></button>
              </form>
            </td>
            <td>
              <form action="{{route('centro.destroy',encrypt($item->id))}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return eliminarCentro('Eliminar centro de entrenamiento')"><i class="fa fa-fw fa-regular fa-trash"></i></button>
            </form>
            </td>
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
<script>
  function eliminarCentro(value){
      action = confirm(value) ? true : event.preventDefault();
  }
</script>
@include('layouts.footers.auth')
</div>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
