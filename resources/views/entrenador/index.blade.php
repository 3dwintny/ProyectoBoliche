@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-4 pt-5 pt-md-8 responsive">
  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-6 col-lg-6">
          <h1 class="text-white">Entrenadores</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="pt-md-2 pb-4 pt-5">
    @include('components.flash_alerts')
      <table class="table table-responsive">
        <thead class="table-dark" style="border-radius: 5px;">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nombre Completo</th>
            <th scope="col">CUI</th>
            <th scope="col">Estado Civil</th>
            <th scope="col">Celular</th>
            <th scope="col">Correo</th>
            <th scope="col">Edad</th>
            <th scope="col">Direccion</th>
            <th scope="col">Deporte</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @php
            $contador = 1;
          @endphp
          @foreach ($entrenadores as $entrenador)
          @php
            $hashid = new Hashids\Hashids();
            $idEntrenador = $hashid->encode($entrenador->id);
          @endphp
          <tr>
            <td>{{$contador}}</td>
            <td>{{$entrenador->nombre1}} {{$entrenador->nombre2}} {{$entrenador->nombre3}} {{$entrenador->apellido1}} {{$entrenador->apellido2}} {{$entrenador->apellido_casada}}</td>
            <td>{{$entrenador->cui}}</td>
            <td>{{$entrenador->estado_civil}}</td>
            <td>{{$entrenador->celular}}</td>
            <td>{{$entrenador->correo}}</td>
            <td>{{$entrenador->edad}}</td>
            <td>{{$entrenador->direccion}}</td>
            <td>{{$entrenador->deporte->nombre}}</td>
            <td>
              <form action="{{route('entrenadores.edit',$idEntrenador)}}" method="GET">
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-regular fa-edit"></i></button>
                <input type="hidden" name="e" id="e" value="{{$idEntrenador}}">
              </form>
            </td>
            <td>
              <form action="{{route('entrenadores.destroy',$entrenador->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return eliminarEntrenador('Eliminar Entrenador')"><i class="fa fa-fw fa-regular fa-trash"></i></button>
              </form>
            </td>
          </tr>
          @php
            $contador++;
          @endphp
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@include('layouts.footers.auth')
</div>
<script type="text/javascript">
  function eliminarEntrenador(value){
      action = confirm(value) ? true : event.preventDefault();
  }
</script>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush