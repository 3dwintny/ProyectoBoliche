@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
  <div class="container-fluid">
      <div class="header-body">
          <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-10 col-sm-6">
                  <h1 class="text-white">Prácticas asignadas</h1>
              </div>
          </div>
      </div>
  </div>
</div>
<div class="container-fluid pt-2">
  <div class="header-body text-center mb-7">
    <div class="row justify-content-center">
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
      <div class="col-xl-12 col-lg-6 col-md-10 col-sm-8">
        <table class="table table-responsive table-hover" style="border-radius: 5px;">
          <thead class="table-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Fecha</th>
              <th>Actividad</th>
            </tr>
          </thead>
          <tbody class="table-hover">
            @php
                $contador = 1;
            @endphp
            @if (count($actividadesAsignadas)<=0)
              <tr>
                <td colspan="3" style="font-weight: bolder; font-size:100%;">SIN RESULTADOS</td>
              </tr>
            @else
              @foreach ($actividadesAsignadas as $item)
              <tr>
                <td>{{$contador}}</td>
                <td>{{\Carbon\Carbon::parse($item->fecha)->format("d-m-Y")}}</td>
                <td>{{$item->actividad}}</td>
                <td>
                  <form action="{{route('entreno-en-casa.edit',encrypt($item->id))}}" method="GET">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-regular fa-pen"></i></button>
                  </form>
                </td>
                <td>
                  <form action="{{route('entreno-en-casa.show',encrypt($item->id))}}" method="GET">
                    <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-regular fa-eye"></i></button>
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
      <div class="col-11">{{ $actividadesAsignadas->links('vendor.pagination.custom') }}</div>
      <div class="col-1">
        <form method="GET" action="{{ url()->current() }}">
          <select name="per_page" id="per_page" class="form-select form-select-sm" aria-label="Small select example" onchange="this.form.submit()">
              @foreach ($perPageOptions as $option)
                  <option value="{{ $option }}" {{ request('per_page') == $option ? 'selected' : '' }}>{{ $option }}</option>
              @endforeach
          </select>
        </form>
      </div>
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
