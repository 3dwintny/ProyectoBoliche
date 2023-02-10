@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-2 pt-5 pt-md-10">
  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-6 col-lg-6">
          <h1 class="text-white">Líneas de Desarrollo</h1>
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
          <th scope="col">Línea de Desarrollo</th>
        </tr>
      </thead>
      <tbody class="table-hover">
        @php
            $contador = 1;
        @endphp
        @foreach ($lineaDesarrollo as $item)
        @php
          $hashid = new Hashids\Hashids();
          $idLineaDesarrollo = $hashid->encode($item->id)
        @endphp
        <tr>
          <td>{{$contador}}</td>
          <td>{{$item->tipo}}</td>
          <td>
            <form action="{{route('linea-de-desarrollo.edit',$idLineaDesarrollo)}}" method="GET">
              @csrf
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-regular fa-pen"></i></button>
              <input type="hidden" name="e" id="e" value="{{$idLineaDesarrollo}}">
            </form>
          </td>
          <td>
            <form action="{{route('linea-de-desarrollo.destroy',$item->id)}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger" onclick="return eliminarLineaDesarrollo('Eliminar Línea de Desarrollo')"><i class="fa fa-fw fa-regular fa-trash"></i></button>
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
  function eliminarLineaDesarrollo(value){
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