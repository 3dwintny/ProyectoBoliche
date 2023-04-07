@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="header bg-dark pb-2 pt-5 pt-md-10">
  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-6 col-lg-6">
          <h1 class="text-white">Administradores del sistema</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="pb-5 pt-5 pt-md-2">
    @include('components.flash_alerts')
    <div class="">
      <table class="table table-responsive table-hover" style="border-radius: 5px;">
        <thead class="table-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nombre</th>
          </tr>
        </thead>
        <tbody class="table-hover">
          @php
          $contador = 1;
          @endphp
          @if (count($administracion)<=0) <tr>
            <td colspan="3">SIN RESULTADOS</td>
            </tr>
            @else
            @foreach ($administracion as $item)
            <tr>
              <td>{{$contador}}</td>
              <td>{{$item->user->name}}</td>
              <td>
                <form action="{{route('administradores.destroy',$item->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" onclick="return eliminarAdministrador('Eliminar administrador')"><i class="fa fa-fw fa-regular fa-trash"></i></button>
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
</div>

<script type="text/javascript">
  function eliminarAdministrador(value) {
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