@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
  <div class="container-fluid">
      <div class="header-body">
          <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-10 col-sm-6">
                  <h1 class="text-white">Psicología</h1>
              </div>
          </div>
      </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row pt-2">
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
      <table class="table table-responsive table-hover" style="border-radius: 5px;">
        <thead class="table-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nombre completo</th>
            <th scope="col">Número de colegiado</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Correo</th>
            <th scope="col">Dirección</th>
            <th scope="col">Fecha de inicio de labores</th>
          </tr>
        </thead>
        <tbody class="table-hover">
          @php
              $contador = 1;   
          @endphp
          @foreach ($psicologo as $item)
          <tr>
            <td>{{$contador}}</td>
            <td>{{$item->nombre1}} {{$item->nombre2}} {{$item->nombre3}} {{$item->apellido1}} {{$item->apellido2}} {{$item->apellido_casada}}</td>
            <td>{{$item->colegiado}}</td>
            <td>{{$item->telefono}}</td>
            <td>{{$item->correo}}</td>
            <td>{{$item->direccion}}</td>
            <td>{{\Carbon\Carbon::parse($item->fecha_inicio_labores)->format("d-m-Y")}}</td>
            <td>
              <form action="{{route('psicologia.edit',encrypt($item->id))}}" method="GET">
                @csrf
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-regular fa-edit"></i></button>
              </form>
            </td>
            <td>
              <form action="{{route('psicologia.destroy',encrypt($item->id))}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit" onclick="return eliminarPsicologia('Eliminar psicológa(o)')"><i class="fa fa-fw fa-regular fa-trash"></i></button>
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
    {{$psicologo->links('vendor.pagination.custom')}}
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