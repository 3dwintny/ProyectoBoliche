@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-2 pt-5 pt-md-10 mt--5">
  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-6 col-lg-6">
          <h1 class="text-white">Usuarios</h1>
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
          <th scope="col">Usuario</th>
          <th scope="col">Acción</th>
          <th scope="col">Fecha</th>
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
          <td>{{Carbon\Carbon::parse($item->Fecha)->format('d-m-Y')}}</td>
          @php
            $contador++;
          @endphp
        </tr>
        @endforeach
        @endif
      </tbody>
    </table>
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
