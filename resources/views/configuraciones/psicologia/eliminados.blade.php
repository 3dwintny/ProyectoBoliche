@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-2 pt-5 pt-md-10">
  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-6 col-lg-6">
          <h1 class="text-white">Deportes</h1>
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
            <th scope="col">Nombre</th>
            <th scope="col">Inicio de labores</th>
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
              @php
                $hashid = new Hashids\Hashids();
                $idPsicologia = $hashid->encode($item->id);
              @endphp
              <tr>
                <td>{{$contador}}</td>
                <td>{{$item->nombre1}} {{$item->nombre2}} {{$item->nombre3}} {{$item->apellido1}} {{$item->apellido2}} {{$item->apellido_casada}}</td>
                <td>{{Carbon\Carbon::parse($item->fecha_inicio_labores)->format('d-m-Y')}}</td>
                <td>{{$item->correo}}</td>
                <td>
                  <form action="{{route('restaurandoPsicologia')}}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$idPsicologia}}" name="e" id="e">
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