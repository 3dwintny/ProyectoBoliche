@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-2 pt-5 pt-md-10">
  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-6 col-lg-6">
          <h1 class="text-white">Psicólogos</h1>
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
          <th scope="col">Primer Nombre</th>
          <th scope="col">Segundo Nombre</th>
          <th scope="col">Tercer Nombre</th>
          <th scope="col">Primer Apellido</th>
          <th scope="col">Segundo Apellido</th>
          <th scope="col">Apellido de Casada</th>
          <th scope="col">Número de Colegiado</th>
          <th scope="col">Teléfono</th>
          <th scope="col">Correo</th>
          <th scope="col">Dirección</th>
          <th scope="col">Fecha de Inicio de Labores</th>
        </tr>
      </thead>
      <tbody class="table-hover">
        @php
            $contador = 1;   
        @endphp
        @foreach ($psicologo as $item)
        @php
          $hashids = new Hashids\Hashids();
          $idAtleta = $hashids->encode($item->id);
        @endphp
        <tr>
          <td>{{$contador}}</td>
          <td>{{$item->nombre1}}</td>
          <td>{{$item->nombre2}}</td>
          <td>{{$item->nombre3}}</td>
          <td>{{$item->apellido1}}</td>
          <td>{{$item->apellido2}}</td>
          <td>{{$item->apellido_casada}}</td>
          <td>{{$item->colegiado}}</td>
          <td>{{$item->telefono}}</td>
          <td>{{$item->correo}}</td>
          <td>{{$item->direccion}}</td>
          <td>{{$item->fecha_inicio_labores}}</td>
          <td>
            <form action="{{route('psicologia.edit',$idAtleta)}}" method="GET" enctype="multipart/form-data" role="form">
              @csrf
              <button type="submit" class="btn btn-primary" style="color:#FFFFFF; font-weight:bolder;"><i class="fa fa-fw fa-regular fa-pen"></i></button>
              <input type="hidden" name="e" id="e" value="{{$idAtleta}}">
            </form>
          </td>
          <td>
            <form action="{{route('psicologia.destroy',$item->id)}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger" onclick="return eliminarPsicologia('Eliminar Psicologa(o)')" style="color:#FFFFFF; font-weight:bolder;"><i class="fa fa-fw fa-regular fa-trash"></i></button>
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
  function eliminarPsicologia(value){
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