@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-2 pt-5 pt-md-10">
  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-6 col-lg-6">
<<<<<<< HEAD
          <h1 class="text-white">Alergia</h1>
=======
          <h1 class="text-white">Alergias</h1>
>>>>>>> 03e7a231be7f35737b46212c52a6ad402453e6df
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
<<<<<<< HEAD
          <th scope="col">Alergia</th>

=======
          <th scope="col">Tipo</th>
          <th scope="col">Descripción</th>
>>>>>>> 03e7a231be7f35737b46212c52a6ad402453e6df
        </tr>
      </thead>
      <tbody class="table-hover">
        @php
            $contador = 1;
        @endphp
        @foreach ($alergia as $item)
        <tr>
          <td>{{$contador}}</td>
          <td>{{$item->nombre}}</td>
          <td>{{$item->descripcion}}</td>
          <td>
<<<<<<< HEAD
            <form action="{{route('alergias.destroy',$item->id)}}" method="POST">
              <a href="{{route('alergias.edit',$item->id)}}" style="text-decoration: none; font-weight:bolder;" class="btn btn-primary"><i class="fa fa-fw fa-regular fa-pen"></i></a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger" onclick="return eliminarNacionalidad('Eliminar Alergia')" style="color:#FFFFFF; font-weight:bolder;"><i class="fa fa-fw fa-regular fa-trash"></i></button>
          </form>
=======
            <form action="{{route('alergia.edit',encrypt($item->id))}}" method="GET">
              <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-regular fa-pen"></i></button>
            </form>
          </td>
          <td>
            <form action="{{route('alergia.destroy',encrypt($item->id))}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger" onclick="return eliminarAlergia('Eliminar alergia')"><i class="fa fa-fw fa-regular fa-trash"></i></button>
            </form>
>>>>>>> 03e7a231be7f35737b46212c52a6ad402453e6df
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
<script type="text/javascript">
  function eliminarAlergia(value){
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
