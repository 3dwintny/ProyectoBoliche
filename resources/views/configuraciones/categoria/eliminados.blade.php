@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-2 pt-5 pt-md-10">
  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-6 col-lg-6">
          <h1 class="text-white">Categorías</h1>
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
            <th scope="col">Categoría</th>
            <th scope="col">Rango de edades</th>
          </tr>
        </thead>
        <tbody class="table-hover">
          @php
              $contador = 1;
          @endphp
          @if (count($eliminar)<=0)
            <tr>
              <td colspan="3">SIN RESULTADOS</td>
            </tr>
          @else
            @foreach ($eliminar as $item)
              @php
                $hashid = new Hashids\Hashids();
                $idCategoria = $hashid->encode($item->id);
              @endphp
              <tr>
                <td>{{$contador}}</td>
                <td>{{$item->tipo}}</td>
                <td>{{$item->rango_edades}}</td>
                <td>
                  <form action="{{route('restaurandoCategoria')}}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$idCategoria}}" name="e" id="e">
                    <button type="submit" class="btn btn-primary">Restaurar</button>
                  </form>
                </td>
                @php
                  $contador++;
                @endphp
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
@include('layouts.footers.auth')
</div>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush