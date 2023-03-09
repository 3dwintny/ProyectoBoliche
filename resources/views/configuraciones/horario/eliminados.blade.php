@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-2 pt-5 pt-md-10">
  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-6 col-lg-6">
          <h1 class="text-white">Horarios de entrenamiento</h1>
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
              <td colspan="10">SIN RESULTADOS</td>
            </tr>
          @else
            @foreach ($eliminar as $item)
              @php
                $hashid = new Hashids\Hashids();
                $idDeporte = $hashid->encode($item->id);
              @endphp
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
                    <input type="hidden" value="{{$idDeporte}}" name="e" id="e">
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
@include('layouts.footers.auth')
</div>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush