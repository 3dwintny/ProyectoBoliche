@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
  <div class="container-fluid">
      <div class="header-body">
          <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-10 col-sm-6">
                  <h1 class="text-white">Roles</h1>
              </div>
          </div>
      </div>
  </div>
</div>
@include('configuraciones.varnav')
<div class="container-fluid pt-2">
  <div class="header-body text-center mb-7">
    <div class="row justify-content-center">
      @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <div class="col-xl-4 col-lg-5 col-md-8 col-sm-7">
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
            @if (count($control)<=0) <tr>
              <td colspan="4" style="font-weight: bolder;">SIN RESULTADOS</td>
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
      </div>
      {{$control->links('vendor.pagination.custom')}}
    </div>
  </div>
</div>
@include('layouts.footers.auth')
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush