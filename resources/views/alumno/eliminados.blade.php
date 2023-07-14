@extends('layouts.app')

@section('content')
@include('layouts.headers.cards', ['texto' => 'Deportes'])
<div class="container">
  <div class="pb-5 pt-5 pt-md-2">
    <div class="">
      <table class="table table-responsive table-hover" style="border-radius: 5px;">
        <thead class="table-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nombre</th>
          </tr>
        </thead>
        <tbody class="table-hover">
          @php
              $contador = 1;
          @endphp
          @if (count($eliminar)<=0)
            <tr>
              <td colspan="2">SIN RESULTADOS</td>
            </tr>
          @else
            @foreach ($eliminar as $item)
              @php
                $hashid = new Hashids\Hashids();
                $idDeporte = $hashid->encode($item->id);
              @endphp
              <tr>
                <td>{{$contador}}</td>
                <td>{{$item->nombre}}</td>
                <td>
                  <form action="{{route('restaurandoDeporte')}}" method="POST">
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