@extends('layouts.app')

@section('content')
<style>
  #declaracion{
    text-align: justify;
    resize: none;
  }
</style>
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
  <div class="container-fluid">
      <div class="header-body">
          <div class="row">
              <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10">
                  <h1 class="text-white">Encabezado de formulario de inscripción</h1>
              </div>
          </div>
      </div>
  </div>
</div>
@include('configuraciones.varnav')
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
      <div class="col-xl-11 col-lg-12 col-md-12 col-sm-12">
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
            @if (count($formulario)<=0)
              <tr>
                <td colspan="4" style="font-weight: bolder; font-size:100%;">SIN RESULTADOS</td>
              </tr>
            @else
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
            @endif
          </tbody>
        </table>
      </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-10 center">
          <label>Declaración</label>
          @foreach ($formulario as $item)
            <textarea name="" id="declaracion" cols="60" rows="5" class="form-control text-dark" readonly>{{$item->declaracion}}</textarea>
          @endforeach
        </div>
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
