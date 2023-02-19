@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-2 pt-5 pt-md-10">
  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-6 col-lg-6">
          <h1 class="text-white">Listado de terapias</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container my-1">
  <form action="{{route('terapias.index')}}" role="form">
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
        <button type="button" class="btn btn-light" onclick="window.location='{{route('terapias.index')}}'">Cancelar búsqueda</button>
      </div>
    </div>
  </form>
</div>
<div class="container">
<div class="pb-5 pt-5 pt-md-2">
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
              <a href="{{route('terapias.show',$item->id)}}" style="text-decoration: none; font-weight:bolder;" class="btn btn-primary"><i class="fa fa-fw fa-thin fa-list"></i></a>
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