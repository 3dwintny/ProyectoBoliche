@extends('layouts.app')

@section('content')
@include('layouts.headers.cards', ['texto' => 'Categorias'])
<div class="container">
<div class="pb-5 pt-5 pt-md-2">
  <div class="">
    <table class="table table-responsive table-hover" style="border-radius: 5px;">
      <thead class="table-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Categoría</th>
          <th>Rango de Edades</th>
        </tr>
      </thead>
      <tbody class="table-hover">
        @php
            $contador = 1;
        @endphp
        @foreach ($categoria as $item)
        <tr>
          <td>{{$contador}}</td>
          <td>{{$item->tipo}}</td>
          <td>{{$item->rango_edades}}</td>
          <td>
            <form action="{{route('categoria.edit',encrypt($item->id))}}" method="GET">
              <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-regular fa-pen"></i></button>
            </form>
          </td>
          <td>
            <form action="{{route('categoria.destroy',encrypt($item->id))}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger" onclick="return eliminarCategoria('Eliminar categoría')"><i class="fa fa-fw fa-regular fa-trash"></i></button>
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
  function eliminarCategoria(value){
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
