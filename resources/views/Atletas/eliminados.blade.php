@extends('layouts.app')

@section('content')
@include('layouts.headers.cards', ['texto' => 'Atletas'])
<div class="container">
  <div class="pb-5 pt-5 pt-md-2">
    @if(session('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <div class="">
      <table class="table table-responsive table-hover" style="border-radius: 5px;">
        <thead class="table-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Celular</th>
            <th scope="col">Categoría</th>
          </tr>
        </thead>
        <tbody class="table-hover">
          @php
              $contador = 1;
          @endphp
          @if (count($eliminar)<=0)
            <tr>
              <td colspan="5">SIN RESULTADOS</td>
            </tr>
          @else
            @foreach ($eliminar as $item)
              <tr>
                <td>{{$contador}}</td>
                <td>{{$item->alumno->nombre1}} {{$item->alumno->nombre2}} {{$item->alumno->nombre3}} {{$item->alumno->apellido1}} {{$item->alumno->apellido2}}</td>
                <td>{{$item->alumno->correo}}</td>
                <td>{{$item->alumno->celular}}</td>
                <td>{{$item->categoria->tipo}}</td>
                <td>
                  <form action="{{route('restaurandoAtleta')}}" method="POST">
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