@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
  <div class="container-fluid">
      <div class="header-body">
          <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-10 col-sm-6">
                  <h1 class="text-white">Tipos de contrato</h1>
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
      <div class="col-xl-12 col-lg-4 col-md-7 col-sm-5">
        <table class="table table-responsive table-hover" style="border-radius: 5px;">
          <thead class="table-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Tipo</th>
            </tr>
          </thead>
          <tbody class="table-hover">
            @php
                $contador = 1;   
            @endphp
            @if (count($tipos)<=0)
              <tr>
                <td colspan="2" style="font-weight: bolder; font-size:100%;">SIN RESULTADOS</td>
              </tr>
            @else
              @foreach ($tipos as $item)
              <tr>
                <td>{{$contador}}</td>
                <td>{{$item->descripcion}}</td>
                <td>
                  <form action="{{route('tipo-de-contrato.edit',encrypt($item->id))}}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-regular fa-pen"></i></button>
                </form>
                </td>
                <td>
                  <form action="{{route('tipo-de-contrato.destroy',encrypt($item->id))}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return eliminarContratos('Eliminar Tipo de Contrato')"><i class="fa fa-fw fa-regular fa-trash"></i></button>
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
  function eliminarContratos(value){
      action = confirm(value) ? true : event.preventDefault();
  }
</script>
@include('layouts.footers.auth')
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush