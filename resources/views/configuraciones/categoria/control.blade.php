@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
  <div class="container-fluid">
      <div class="header-body">
          <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-10 col-sm-6">
                  <h1 class="text-white">Categorías</h1>
              </div>
          </div>
      </div>
  </div>
</div>
<div class="container-fluid pt-2">
  <div class="header-body text-center mb-7">
    <div class="row justify-content-center">
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
            <th scope="col">Usuario</th>
            <th scope="col">Acción</th>
            <th scope="col">Fecha y hora</th>
          </tr>
        </thead>
        <tbody class="table-hover">
          @php
              $contador = 1;
          @endphp
          @if (count($control)<=0)
            <tr>
              <td colspan="4">SIN RESULTADOS</td>
            </tr>
          @else
            @foreach ($control as $item)
              <tr>
                <td>{{$contador}}</td>
                <td>{{$item->usuario->name}}</td>
                <td>{{$item->Descripcion}}</td>
                <td>{{Carbon\Carbon::parse($item->created_at)->format('d-m-Y')}} {{Carbon\Carbon::parse($item->created_at)->format('H:i:s')}}</td>
                @php
                  $contador++;
                @endphp
              </tr>
            @endforeach
          @endif
        </tbody>
        </table>
      </div>
      {{$control->links('vendor.pagination.custom')}}
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
