@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-4 pt-5 pt-md-12">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                <h1 class="text-white">Solicitud de {{ $alumno->nombre1}} {{$alumno->apellido1}}</h1>
                <img src="{{$alumno->foto}}" alt="" width="200">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
    <div class="card-body">
            <div class="form-group">
              <strong>Nombre1</strong>
                {{ $alumno->nombre1 }}</div>
                <div class="form-group">
              <strong>Nombre2</strong>
                {{ $alumno->nombre2 }}</div>
                <div class="form-group">
              <strong>Nombre3</strong>
                {{ $alumno->nombre3 }}</div>
                <div class="form-group">
              <strong>Apellido1</strong>
                {{ $alumno->apellido1 }}</div>
                <div class="form-group">
              <strong>Apellido2</strong>
                {{ $alumno->apellido2 }}</div>
                <div class="form-group">
              <strong>CUI</strong>
                {{ $alumno->cui }}</div>
                <div class="form-group">
              <strong>Fecha Registro</strong>
                {{ $alumno->fecha }}</div>
                <div class="form-group">
                <strong>Edad</strong>
                {{ $alumno->edad }}</div>
                <div class="form-group">
                <strong>Celular</strong>
                {{ $alumno->celular }}</div>
                <div class="form-group">
                <strong>Telefono Casa</strong>
                {{ $alumno->telefono_casa }}</div>
                <div class="form-group">
                <strong>Correo</strong>
                {{ $alumno->correo }}</div>
                <div class="form-group">
                <strong>Telefono Emergencia</strong>
                {{ $alumno->contacto_emergencia }}</div>
                <div class="form-group">
                <strong>Departamento Residencia</strong>
                {{ $alumno->departamento_residencia_id }}</div>
                <div class="form-group">
                <strong>Departamento Residencia</strong>
                {{ $alumno->municipio_residencia_id }}</div>

  </div>                     
  </div>                     
  </div>                     
@include('layouts.footers.auth')

@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush