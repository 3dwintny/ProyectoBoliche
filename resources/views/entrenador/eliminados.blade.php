@extends('layouts.app')

@section('content')
@include('layouts.headers.cards', ['texto' => 'Entrenadores'])
<div class="container">
  <div class="pb-5 pt-5 pt-md-2">
    <div class="">
      <table class="table table-responsive table-hover" style="border-radius: 5px;">
        <thead class="table-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nombre</th>
            <th scope="col">CUI</th>
            <th scope="col">Correo</th>
          </tr>
        </thead>
        <tbody class="table-hover">
          @php
              $contador = 1;
          @endphp
          @if (count($eliminar)<=0)
            <tr>
              <td colspan="4">SIN RESULTADOS</td>
            </tr>
          @else
            @foreach ($eliminar as $item)
              <tr>
                <td>{{$contador}}</td>
                <td>{{$item->nombre1}} {{$item->nombre2}} {{$item->nombre3}} {{$item->apellido1}} {{$item->apellido2}} {{$item->apellido_casada}}</td>
                <td>{{$item->cui}}</td>
                <td>{{$item->correo}}</td>
                <td>
                  <form action="{{route('restaurandoEntrenador')}}" method="POST">
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
@include('layouts.footers.auth')
</div>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush