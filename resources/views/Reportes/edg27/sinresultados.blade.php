@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />

<script type="text/javascript" src="DataTables/datatables.min.js"></script>

<div class="header bg-dark pb-4 pt-5 pt-md-6">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <h1 class="text-white">Reporte EDG-27.2 </h1>
                </div>
            </div>
        </div>
    </div>
</div>
<table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tipo de Atleta</th>
                <th>Nombre(s) Apellido(s)</th>
                <th>Edad</th>
                <th>Género</th>
                <th>Modalidad</th>
                <th>Categoría</th>
                <th>Etapa Deportiva</th>
                <th>Años de Experiencia</th>
                <th>Meses de Experiencia</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="10" style="text-align: center">
                <div class="alert alert-danger" role="alert">
                    <strong>NO SE ENCONTRARON RESULTADOS</strong> 
                </div>
                </td>
            </tr>
        </tbody>
    </table>
    @endsection