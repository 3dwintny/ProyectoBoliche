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
    <div class="row justify-content-center"">
      @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <div class="col-xl-6 col-lg-6 col-md-10 col-sm-8">
        <table class="table table-responsive table-hover" style="border-radius: 5px;">
          <thead class="table-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nombre</th>
              <th scope="col">Dirrección</th>
            </tr>
          </thead>
          <tbody class="table-hover">
            @php
                $contador = 1;
            @endphp
            @if (count($eliminar)<=0)
              <tr>
                <td colspan="3" style="font-weight: bolder; font-size:100%;">SIN RESULTADOS</td>
              </tr>
            @else
              @foreach ($eliminar as $item)
                @php
                  $hashid = new Hashids\Hashids();
                  $idCentro = $hashid->encode($item->id);
                @endphp
                <tr>
                  <td>{{$contador}}</td>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->direccion}}</td>
                  <td>
                    <form action="{{route('restaurandoCentro')}}" method="POST">
                      @csrf
                      <input type="hidden" value="{{$idCentro}}" name="e" id="e">
                      <button type="submit" class="btn btn-primary">Restaurar</button>
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
@include('layouts.footers.auth')
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush