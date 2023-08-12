@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
  <div class="container-fluid">
      <div class="header-body">
          <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-10 col-sm-6">
                  <h1 class="text-white">Listado de sesiones</h1>
              </div>
          </div>
      </div>
  </div>
</div>
<div class="container my-1">
  <form action="{{route('sesiones.index')}}" role="form">
    <div class="row justify-content-center">
      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-2">
        <div class="form-floating">
            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Búsqueda por nombre" id="buscarNombre" type="text" name="buscarNombre" value="" required>
            <label for="buscarNombre">Búsqueda por nombre</label>
        </div>
      </div>
      <div class="col-xl-1 col-lg-2 col-md-2 col-sm-2 mb-2">
        <button type="submit" class="btn btn-primary">Buscar</button>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
        <button type="button" class="btn btn-light" onclick="window.location='{{route('sesiones.index')}}'">Cancelar búsqueda</button>
      </div>
    </div>
  </form>
</div>
<div class="container">
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
  <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
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
            <td colspan="2" class="textoCentrado textoNegrita">SIN RESULTADOS</td>
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
    </div>
  </div>
  {{$atleta->appends(['buscarNombre'=>$buscarAtleta])->links('vendor.pagination.custom')}}
</div>
@include('layouts.footers.auth')
@endsection
@push('styles')
  <link rel="stylesheet" href="css/general.css">
@endpush
