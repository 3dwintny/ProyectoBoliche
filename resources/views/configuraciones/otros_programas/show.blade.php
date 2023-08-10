@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
  <div class="container-fluid">
      <div class="header-body">
          <div class="row">
              <div class="col-xl-8 col-lg-8 col-md-10 col-sm-10">
                  <h1 class="text-white">Otros programas de atención</h1>
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
      <div class="col-xl-12 col-lg-5 col-md-8 col-sm-7">
        <table class="table table-responsive table-hover" style="border-radius: 5px;">
          <thead class="table-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Programa</th>
            </tr>
          </thead>
          <tbody class="table-hover">
            @php
                $contador = 1;   
            @endphp
            @if (count($programas)<=0)
              <tr>
                <td colspan="2" style="font-weight: bolder; font-size:100%;">SIN RESULTADOS</td>
              </tr>
            @else
              @foreach ($programas as $item)
                <tr>
                  <td>{{$contador}}</td>
                  <td>{{$item->nombre}}</td>
                  <td>
                    <form action="{{route('otro-programa-de-atencion.edit',encrypt($item->id))}}" method="GET">
                      @csrf
                      <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-regular fa-pen"></i></button>
                    </form>
                  </td>
                  <td>
                    <form action="{{route('otro-programa-de-atencion.destroy',encrypt($item->id))}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" onclick="return eliminarProgramas('Eliminar otros programa de atención')" style="color:#FFFFFF; font-weight:bolder;"><i class="fa fa-fw fa-regular fa-trash"></i></button>
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
    </div>
  </div>
</div>
<script>
  function eliminarProgramas(value){
      action = confirm(value) ? true : event.preventDefault();
  }
</script>
@include('layouts.footers.auth')
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush