@extends('layouts.app')

@section('content')

<style>
    #centrado{
        text-align: center;
        font-weight: bolder;
    }
</style>
<div class="header bg-dark pb-2 pt-5 pt-md-10">
  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-6 col-lg-6">
          <h1 class="text-white">Solicitudes pendientes</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="pb-5 pt-5 pt-md-2">
  <div class="col-xl-12 col-lg-12">
    <table class="table table-responsive table-hover" style="border-radius: 5px;">
      <thead class="table-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nombre Completo</th>
          <th scope="col">CUI</th>
          <th scope="col">Celular</th>
          <th scope="col">Contacto de Emergencia</th>
          <th scope="col">Correo</th>
          <th scope="col">Estado</th>
          <th scope="col">Fecha</th>
          <th scope="col">Direccion</th>
        </tr>
      </thead>
      <tbody class="table-hover">
        <tr>
            <td colspan="9" id="centrado">NO HAY SOLICITUDES PENDIENTES</td>
        </tr>
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