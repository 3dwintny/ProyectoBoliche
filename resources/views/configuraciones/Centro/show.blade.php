@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-2 pt-5 pt-md-10 mt--5">
  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-6 col-lg-6">
          <h1 class="text-white">Centros de entrenamiento</h1>
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
