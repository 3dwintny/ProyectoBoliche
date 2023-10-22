@extends('layouts.app')

@section('content')
<link href="{{ asset('/css/terapias/show.css') }}" rel="stylesheet">
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
  <div class="container-fluid">
      <div class="header-body">
          <div class="row">
              <div class="col-xl-11 col-lg-11 col-md-12 col-sm-12">
                  <h1 class="text-white">Historial clínico de {{$completo}}</h1>
              </div>
          </div>
      </div>
  </div>
</div>

<div class="container-fluid pt-2">
  <div class="header-body text-center mb-7">
    <form action="{{route('busquedaFecha')}}" method="GET" role="form">
      @csrf
      <input type="hidden" id="idAtleta" name="idAtleta" value="{{$guardarAtleta}}">
      <div class="row justify-content-center">
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 mb-2">
          <div class="form-floating">
              <input class="form-control text-dark" aria-describedby="basic-addon2" id="fechaInicial" type="date" name="fechaInicial" required>
              <label for="fechaInicial">Fecha inicial</label>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 mb-2">
          <div class="form-floating">
              <input class="form-control text-dark" aria-describedby="basic-addon2" id="fechaFinal" type="date" name="fechaFinal" required>
              <label for="fechaFinal">Fecha final</label>
          </div>
        </div>
        <div class="col-xl-1 col-lg-2 col-md-2 col-sm-2 mb-2">
          <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
        <div class="col-xl-1 col-lg-2 col-md-2 col-sm-2 mb-2">
          <a href="{{route('sesiones.show',$guardarAtleta)}}" class="btn btn-light">Cancelar</a>
        </div>
      </div>
    </form>
      <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-1 col-sm-3">
          <form action="{{route('tareaPendiente')}}" method="GET">
            @csrf
            <input type="hidden" id="idAtleta" name="idAtleta" value="{{$guardarAtleta}}">
            <input type="hidden" id="nombreAtleta" name="nombreAtleta" value="{{$completo}}">
              <input type="submit" value="Tareas pendientes" class="btn btn-outline-info">
          </form>
        </div>
      </div>
    <div class="row justify-content-center">
      @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12">
        <table class="table table-hover table-responsive" style="border-radius: 5px;">
          <thead class="table-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Fecha</th>
              <th scope="col">Impresión Clínica</th>
              <th scope="col">Observaciones</th>
              <th scope="col">Tarea</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody class="table-hover">
            @if(count($historial)<=0)
            <tr>
              <td colspan="6" id="sinResultados">NO SE ENCONTRARON RESULTADOS</td>
            </tr>
            @else
            @foreach ($historial as $item)
            <tr>
              <td>{{$item->numero_terapia}}</td>
              <td>{{\Carbon\Carbon::parse($item->fecha)->format("d-m-Y")}}</td>
              <td>{{$item->impresion_clinica}}</td>
              <td>{{$item->observaciones}}</td>
              @if($item->estado_tarea=="pendiente")
              <td style="color:red; background-color:#fff3ef;">{{$item->tarea}}</td>
              @else
              <td style="color:rgb(0, 141, 0); background-color:#f2ffef;">{{$item->tarea}}</td>
              @endif
              <td>
                <a href="{{route('sesiones.edit',encrypt($item->id))}}" style="text-decoration: none; font-weight:bolder;" class="btn btn-primary"><i class="fa fa-fw fa-regular fa-pen"></i></a>
                <a href="{{route('detallesTerapia',encrypt($item->id))}}" style="text-decoration: none; font-weight:bolder;" class="btn btn-success"><i class="fa fa-fw fa-regular fa-eye"></i></a>
                <a href="{{route('historialPDF',encrypt($item->id))}}" style="text-decoration: none; font-weight:bolder;" class="btn btn-info" target="_blank"><i class="fa fa-fw fa-regular fa-file-pdf"></i></a>
              </td>
            </tr>
            @endforeach
            @endif
          </tbody>
        </table>
      </div>
      <div class="col-11">
        {{$historial->appends(['idAtleta'=>$guardarAtleta,'fechaInicial'=>$inicial,'fechaFinal'=>$final,'per_page'=>$perPage])->links('vendor.pagination.custom')}}
      </div>
      <div class="col-1">
        <form action="{{ url()->current() }}" method="GET">
          <select name="per_page" id="per_page" class="form-select form-select-sm" aria-label="Small select example" onchange="this.form.submit()">
            @foreach($perPageOptions as $option)
              <option value="{{$option}}"{{request('per_page')==$option ? 'selected':''}}>{{$option}}</option>
            @endforeach
          </select>
        </form>
      </div>
    </div>
  </div>
</div>

@include('layouts.footers.auth')
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
