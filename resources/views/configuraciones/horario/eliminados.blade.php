@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
  <div class="container-fluid">
      <div class="header-body">
          <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-10 col-sm-6">
                  <h1 class="text-white">Horarios de entreno</h1>
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
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <table class="table table-responsive table-hover" style="border-radius: 5px;">
          <thead class="table-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Hora de inicio</th>
              <th scope="col">Hora de finalización</th>
              <th scope="col">Lunes</th>
              <th scope="col">Martes</th>
              <th scope="col">Miércoles</th>
              <th scope="col">Jueves</th>
              <th scope="col">Viernes</th>
              <th scope="col">Sábado</th>
              <th scope="col">Domingo</th>
            </tr>
          </thead>
          <tbody class="table-hover">
            @php
                $contador = 1;
            @endphp
            @if (count($eliminar)<=0)
              <tr>
                <td colspan="10" style="font-weight: bolder; font-size:100%;">SIN RESULTADOS</td>
              </tr>
            @else
              @foreach ($eliminar as $item)
                <tr>
                  <td>{{$contador}}</td>
                  <td>{{\Carbon\Carbon::parse($item->hora_inicio)->format('H:i')}}</td>
                  <td>{{\Carbon\Carbon::parse($item->hora_fin)->format('H:i')}}</td>
                  <td>{{$item->lunes}}</td>
                  <td>{{$item->martes}}</td>
                  <td>{{$item->miercoles}}</td>
                  <td>{{$item->jueves}}</td>
                  <td>{{$item->viernes}}</td>
                  <td>{{$item->sabado}}</td>
                  <td>{{$item->domingo}}</td>
                  <td>
                    <form action="{{route('restaurandoHorario')}}" method="POST">
                      @csrf
                      <input type="hidden" value="{{encrypt($item->id)}}" name="e" id="e">
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