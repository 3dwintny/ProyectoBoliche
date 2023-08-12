@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
  <div class="container-fluid">
      <div class="header-body">
          <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-10 col-sm-6">
                  <h1 class="text-white">Entrenadores</h1>
              </div>
          </div>
      </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row pt-2">
    @include('components.flash_alerts')
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>  
      </div>
    @endif

    @if(session('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <div class="col-12">
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
          </tr>
        </thead>
        <tbody>
          @php
            $contador = 1;
          @endphp
          @if(count($entrenadores)<=0)
            <tr>
              <td colspan="9" class="textoCentrado textoNegrita">NO SE ENCONTRARON RESULTADOS</td>
            </tr>
          @else
            @foreach ($entrenadores as $entrenador)
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
                  <form action="{{route('entrenadores.edit',encrypt($entrenador->id))}}" method="GET">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-regular fa-edit"></i></button>
                  </form>
                </td>
                <td>
                  <form action="{{route('entrenadores.show',encrypt($entrenador->id))}}" action="GET">
                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-regular fa-eye"></i></button>
                  </form>
                </td>
                <td>
                  <form action="{{route('entrenadores.destroy',encrypt($entrenador->id))}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return eliminarEntrenador('Eliminar entrenador')"><i class="fa fa-fw fa-regular fa-trash"></i></button>
                  </form>
                </td>
              </tr>
              @php
                $contador++;
              @endphp
            @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
@include('layouts.footers.auth')


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
@push('styles')
  <link rel="stylesheet" href="css/general.css">
@endpush