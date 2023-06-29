@extends('layouts.app')

@section('content')
<style>
  #declaracion{
    text-align: justify;
    resize: none;
  }
</style>
<div class="header bg-dark pb-2 pt-5 pt-md-10 mt--5">
  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-6 col-lg-6">
          <h1 class="text-white">Encabezado formulario de inscripción</h1>
        </div>
      </div>
    </div>
  </div>
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
    <table class="table table-responsive table-hover col-md-12 mb-10" style="border-radius: 5px;">
      <thead class="table-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Título</th>
          <th scope="col">Subtítulo</th>
          <th scope="col">Título de ficha</th>
        </tr>
      </thead>
      <tbody class="table-hover">
        @php
            $contador = 1;
        @endphp
        @foreach ($formulario as $item)
        <tr>
          <td>{{$contador}}</td>
          <td>{{$item->titulo_principal}}</td>
          <td>{{$item->subtitulo}}</td>
          <td>{{$item->titulo_ficha}}</td>
          <td>
            <form action="{{route('formulario-inscripcion.edit',encrypt($item->id))}}" method="GET" role="form" enctype="multipart/form-data">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-regular fa-edit"></i></button>
            </form>
          </td>
          @php
            $contador++;
          @endphp
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="container">
      <div class="col-md-2 mb-10 center">
        <label>Declaración</label>
      </div>
    </div>  
    @foreach ($formulario as $item)
    <textarea name="" id="declaracion" cols="60" rows="5" class="form-control text-dark" readonly>{{$item->declaracion}}</textarea>
    @endforeach
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
