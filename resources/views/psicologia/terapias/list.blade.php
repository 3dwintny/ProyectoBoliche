@extends('layouts.app')

@section('content')
@include('layouts.headers.cards', ['texto' => 'Listado de sesiones'])
<div class="container my-1">
  <form action="{{route('sesiones.index')}}" role="form">
    <div class="row">
      <div class="col-md-4 mb-2">
        <div class="form-floating">
            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Búsqueda por nombre" id="buscarNombre" type="text" name="buscarNombre" value="" required>
            <label for="buscarNombre">Búsqueda por nombre</label>
        </div>
      </div>
      <div class="col-md-1 mb-2">
        <button type="submit" class="btn btn-primary">Buscar</button>
      </div>
      <div class="col-md-1 mb-2">
        <button type="button" class="btn btn-light" onclick="window.location='{{route('sesiones.index')}}'">Cancelar búsqueda</button>
      </div>
    </div>
  </form>
</div>
<div class="container">
<div class="pb-5 pt-5 pt-md-2">
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
  <div class="">
    <table class="table table-responsive table-hover" style="border-radius: 5px;">
      <thead class="table-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Atleta</th>
        </tr>
      </thead>
      <tbody class="table-hover">
        @php
            $contador = 1;   
        @endphp
        @if (count($atleta)<=0)
        <tr>
          <td colspan="2">SIN RESULTADOS</td>
        </tr>
        @else
          @foreach ($atleta as $item)
          <tr>
            <td>{{$contador}}</td>
            <td>{{$item->alumno->nombre1}} {{$item->alumno->nombre2}} {{$item->alumno->nombre3}} {{$item->alumno->apellido1}} {{$item->alumno->apellido2}}</td>
            <td>
              <a href="{{route('sesiones.show',encrypt($item->id))}}" style="text-decoration: none; font-weight:bolder;" class="btn btn-primary"><i class="fa fa-fw fa-thin fa-list"></i></a>
            </td>
            @php
              $contador++;
            @endphp
          </tr>
          @endforeach
        @endif
      </tbody>
    </table>
    {{$atleta->appends(['buscarNombre'=>$buscarAtleta])->links('vendor.pagination.custom')}}
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