@extends('layouts.app')

@section('content')
<link href="{{ asset('/css/terapias/show.css') }}" rel="stylesheet">
<div class="header bg-dark pb-2 pt-5 pt-md-10">
  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-6 col-lg-6">
          <h1 class="text-white">Historial clínico de {{$completo}}</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="contanier"></div>
<form action="{{route('busquedaFecha')}}" method="GET">
  @csrf
  <input type="hidden" id="idAtleta" name="idAtleta" value="{{$guardarAtleta}}">
  <div id="contenedor">
    <h3></h3>
    <div class="centrar"><div class="input-group mb-2"></div></div>
    <div class="contenedorFlotante">
      <div class="input-group mb-2">
        <span class="input-group-text" id="inputGroup-sizing-sm">Fecha Inicial</span>
        <input type="date" class=" container form-control text-center" name="fechaInicial" id="fechaInicial">
      </div>
    </div>
    <div class="espacioIzquierda"><div class="input-group mb-2"></div></div>
    <div class="contenedorFlotante">
      <div class="input-group mb-2">
        <span class="input-group-text" id="inputGroup-sizing-sm">Fecha Final</span>
        <input type="date" class=" container form-control text-center" name="fechaFinal" id="fechaFinal">
      </div>
    </div>
    <div class="espacioIzquierda"><div class="input-group mb-2"></div></div>
    <div id="botonBusqueda">
      <input type="submit" value="Buscar" class="btn btn-outline-warning">
    </div>
    <div class="centrar"><div class="input-group mb-2"></div></div>
  </div>
</form>

<div class="container">
<div class="pb-5 pt-5 pt-md-2">
  <div class="">
    <table class="table table-responsive table-hover" style="border-radius: 5px;">
      <thead class="table-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Fecha</th>
          <th scope="col">Hora de Inicio</th>
          <th scope="col">Impresión Clínica</th>
          <th scope="col">Análisis Semiológico</th>
          <th scope="col">Desarrollo</th>
          <th scope="col">Observaciones</th>
          <th scope="col">Tarea</th>
          <th scope="col">Conciencia Corporal</th>
          <th scope="col">Dominio Corporal</th>
          <th scope="col">Dominio de Respiración</th>
          <th scope="col">Diálogo Interno</th>
          <th scope="col">Atención</th>
          <th scope="col">Concentración</th>
          <th scope="col">Motivación</th>
          <th scope="col">Confianza</th>
          <th scope="col">Activación</th>
          <th scope="col">Relajación</th>
          <th scope="col">Estrés</th>
          <th scope="col">Ansiedad Cognitiva</th>
          <th scope="col">Ansiedad Física</th>
          <th scope="col">Miedo</th>
          <th scope="col">Frustración</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody class="table-hover">
        @if(count($historial)<=0)
        <tr>
          <td colspan="24" id="sinResultados">NO SE ENCONTRARON RESULTADOS</td>
        </tr>
        @else
        @foreach ($historial as $item)
        <tr>
          <td>{{$item->numero_terapia}}</td>
          <td>{{\Carbon\Carbon::parse($item->fecha)->format("d-m-Y")}}</td>
          <td>{{\Carbon\Carbon::parse($item->hora_inicio)->format("H:i")}}</td>
          <td>{{$item->impresion_clinica}}</td>
          <td>{{$item->analisis_semiologico}}</td>
          <td>{{$item->desarrollo}}</td>
          <td>{{$item->observaciones}}</td>
          <td>{{$item->tarea}}</td>
          <td>{{$item->conciencia_corporal}}</td>
          <td>{{$item->dominio_corporal}}</td>
          <td>{{$item->dominio_respiracion}}</td>
          <td>{{$item->dialogo_interno}}</td>
          <td>{{$item->atencion}}</td>
          <td>{{$item->concentracion}}</td>
          <td>{{$item->motivacion}}</td>
          <td>{{$item->confianza}}</td>
          <td>{{$item->activacion}}</td>
          <td>{{$item->relajacion}}</td>
          <td>{{$item->estres}}</td>
          <td>{{$item->ansiedad_cognitiva}}</td>
          <td>{{$item->ansiedad_fisica}}</td>
          <td>{{$item->miedo}}</td>
          <td>{{$item->frustracion}}</td>
          <td>
            <a href="{{route('terapias.edit',$item->id)}}" style="text-decoration: none; font-weight:bolder;" class="btn btn-primary"><i class="fa fa-fw fa-regular fa-pen"></i></a>
            <a href="{{route('historialPDF',$item->id)}}" style="text-decoration: none; font-weight:bolder;" class="btn btn-primary" target="_blank"><i class="fa fa-fw fa-regular fa-file-pdf"></i></a>
          </td>
        </tr>
        @endforeach
        @endif
      </tbody>
    </table>
    {{$historial->appends(['idAtleta'=>$guardarAtleta,'fechaInicial'=>$inicial,'fechaFinal'=>$final])->links('vendor.pagination.custom')}}
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