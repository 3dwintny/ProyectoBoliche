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
          <th>Hora de finalización</th>
          <th>Domingo</th>
          <th>Lunes</th>
          <th>Martes</th>
          <th>Miércoles</th>
          <th>Jueves</th>
          <th>Viernes</th>
          <th>Sábado</th>
        </tr>
      </thead>
      <tbody class="table-hover">
        @php
            $contador = 1;
        @endphp
        @foreach ($horario as $item)
        @php
          $hashid = new Hashids\Hashids();
          $idHorario = $hashid->encode($item->id)
        @endphp
        <tr>
          <td>{{$contador}}</td>
          <td>{{\Carbon\Carbon::parse($item->hora_inicio)->format('H:i')}}</td>
          <td>{{\Carbon\Carbon::parse($item->hora_fin)->format('H:i')}}</td>
          <td>{{$item->domingo}}</td>
          <td>{{$item->lunes}}</td>
          <td>{{$item->martes}}</td>
          <td>{{$item->miercoles}}</td>
          <td>{{$item->jueves}}</td>
          <td>{{$item->viernes}}</td>
          <td>{{$item->sabado}}</td>
          <td>
            <form action="{{route('horario.edit',$idHorario)}}" method="GET">
              @csrf
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-regular fa-pen"></i></button>
              <input type="hidden" name="e" id="e" value="{{$idHorario}}">
            </form>
          </td>
          <td>
            <form action="{{route('horario.destroy',$item->id)}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger" onclick="return eliminarHorario('Eliminar Horario')"><i class="fa fa-fw fa-regular fa-trash"></i></button>
            </form>
          </td>
          @php
            $contador++;
          @endphp
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>
<script>
  function eliminarHorario(value){
      action = confirm(value) ? true : event.preventDefault();
  }
</script>
@include('layouts.footers.auth')
</div>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush