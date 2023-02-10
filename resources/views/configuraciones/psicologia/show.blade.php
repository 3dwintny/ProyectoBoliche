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
          <th scope="col">Nombre Completo</th>
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
          $hashid = new Hashids\Hashids();
          $idPsicologo = $hashid->encode($item->id)
        @endphp
        <tr>
          <td>{{$contador}}</td>
          <td>{{$item->nombre1}} {{$item->nombre2}} {{$item->nombre3}} {{$item->apellido1}} {{$item->apellido2}} {{$item->apellido_casada}}</td>
          <td>{{$item->colegiado}}</td>
          <td>{{$item->telefono}}</td>
          <td>{{$item->correo}}</td>
          <td>{{$item->direccion}}</td>
          <td>{{\Carbon\Carbon::parse($item->fecha_inicio_labores)->format("d-m-Y")}}</td>
          <td>
            <form action="{{route('psicologia.edit',$idPsicologo)}}" method="GET">
              @csrf
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-regular fa-edit"></i></button>
              <input type="hidden" name="e" id="e" value="{{$idPsicologo}}">
            </form>
          </td>
          <td>
            <form action="{{route('psicologia.destroy',$item->id)}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit" onclick="return eliminarPsicologia('Eliminar Psicológa(o)')"><i class="fa fa-fw fa-regular fa-trash"></i></button>
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