@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-4 pt-5 pt-md-8">
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
<div class="pt-md-2 pb-4 pt-5">
<div class="">
<table class="table table-sm">
  <thead class="table-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">CUI</th>
      <th scope="col">Celular</th>
      <th scope="col">Correo</th>
      <th scope="col">Edad</th>
      <th scope="col">Direccion</th>
      <th scope="col">Deporte</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($entrenadores as $entrenador)
    <tr>
      <td>{{ ++$i }}</td>
      <td>{{$entrenador->nombre1}}</td>
      <td>{{$entrenador->apellido1}}</td>
      <td>{{$entrenador->cui}}</td>
      <td>{{$entrenador->celular}}</td>
      <td>{{$entrenador->correo}}</td>
      <td >{{$entrenador->edad}}</td>
      <td>{{$entrenador->direccion}}</td>
      <td>{{$entrenador->deporte_id}}</td>
      <td>
      <form action="" method="POST">
       <a class="btn btn-sm btn-primary " href="{{ route('entrenadores.edit',$entrenador->id) }}"><i class="fa fa-fw fa-edit"></i>Modificar</a>
        <a class="btn btn-sm btn-danger" href="{{ route('entrenadores.destroy',$entrenador->id)}}"><i class="fa fa-fw fa-trash"></i>Eliminar</a>
      </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
