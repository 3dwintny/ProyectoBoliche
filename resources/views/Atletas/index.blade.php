@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@include('layouts.headers.cards', ['texto' => 'Atletas inscritos'])
<div class="container my-1">
  <form action="{{route('atletas.index')}}" role="form">
    <div class="row">
      <div class="col-md-4 mb-2">
        <div class="form-floating">
          <select name="filtroCategoria" class="form-control" id="filtroCategoria" onchange="this.form.submit()">
            <option value="" selected disabled>Sin filtros</option>
            @foreach($categoria as $item)
            <option value="{{encrypt($item->id)}}" {{$item->tipo == "N/A" ? 'disabled' : ''}}>{{$item->tipo}}</option>
            @endforeach>
          </select>
          <label for="filtroCategoria">Filtrar por categoría</label>
        </div>
      </div>
      <div class="col-md-2 mb-2">
        <button type="button" class="btn btn-light" onclick="window.location='{{route('atletas.index')}}'">Eliminar filtro</button>
      </div>
      <div class="col-md-4 mb-2">
        <div class="form-floating">
          <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Búsqueda por nombre" id="buscarNombre" type="text" name="buscarNombre" value="" required>
          <label for="buscarNombre">Búsqueda por nombre</label>
        </div>
      </div>
      <div class="col-md-2 mb-2">
        <button type="submit" class="btn btn-primary">Buscar</button>
      </div>
    </div>
  </form>
</div>
<div class="container">
  <div class="pb-5 pt-5 pt-md-2">
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

    <div class="">
      <table class="table table-responsive table-hover" style="border-radius: 5px;">
        <thead class="table-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nombre</th>
            <th scope="col">Categoria</th>
            <th scope="col">Etapa Deportiva</th>
            <th scope="col">Adaptado</th>
            <th scope="col">Deporte Adaptado</th>
            <th scope="col">Otro Programa de Atención</th>
            <th scope="col">Centro</th>
            <th scope="col">Entrenador</th>
            <th scope="col">Fecha Ingreso</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody class="table-hover">
          @php
          $contador = 1;
          @endphp
          @if (count($atletas)<=0) <tr>
            <td colspan="11">SIN RESULTADOS</td>
            </tr>
            @else
            @foreach ($atletas as $atleta)
            <tr>
              <td>{{$contador}}</td>
              <td>
                <div class="d-flex px-2 py-1 bg-white">
                  <div>
                    <img src="{{ asset('uploads/alumnos/'.$atleta->alumno->foto) }}" class="avatar avatar-sm me-3">
                  </div>
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-xs"><strong>{{$atleta->alumno->nombre1 }} {{$atleta->alumno->nombre2}} {{$atleta->alumno->nombre3}} {{$atleta->alumno->apellido1}} {{$atleta->alumno->apellido2}}</strong></h6>
                    <p class="text-xs text-secondary mb-0">{{ $atleta->alumno->correo }}</p>
                  </div>
                </div>
              </td>
              <td>{{$atleta->categoria->tipo}}</td>
              <td>{{$atleta->etapa_deportiva->nombre}}</td>
              <td>{{$atleta->adaptado}}</td>
              <td>{{$atleta->deporte_adaptado->nombre}}</td>
              <td>{{$atleta->otro_programa->nombre}}</td>
              <td>{{$atleta->centro->nombre}}</td>
              <td>{{$atleta->entrenador->nombre1}} {{$atleta->entrenador->nombre2}} {{$atleta->entrenador->apellido1}} {{$atleta->entrenador->apellido2}}</td>
              <td>{{\Carbon\Carbon::parse($atleta->fecha_ingreso)->format('d-m-Y')}}</td>
              <td>
                <form action="{{route('atletas.edit',encrypt($atleta->id))}}" method="GET" role="form" enctype="multipart/form-data">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i></button>
                </form>
              </td>
              <td>
                <form action="{{route('atletas.show',encrypt($atleta->id))}}">
                  <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-regular fa-eye"></i></button>
                </form>
              </td>
              <td>
                <form action="{{route('atletas.destroy',encrypt($atleta->id))}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" onclick="return eliminarAtleta('Eliminar atleta')"><i class="fa fa-fw fa-regular fa-trash"></i></button>
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
      {{$atletas->appends(['buscarNombre'=>$buscarAtleta,'filtroCategoria'=>$filtrarCategoria])->links('vendor.pagination.custom')}}
    </div>
  </div>
</div>

@include('layouts.footers.auth')
</div>

<script type="text/javascript">
  function eliminarAtleta(value) {
    action = confirm(value) ? true : event.preventDefault();
  }

  function ShowSelected() {
    var combo = document.getElementById("filtroCategoria");
    var selected = combo.options[combo.selectedIndex].text;
    alert(selected);
  }



</script>

@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
@endpush
