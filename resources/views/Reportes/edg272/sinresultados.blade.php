@extends('layouts.app')

@section('content')
<style>
    #textoCentrado{
        text-align: center;
        font-weight: bolder;
    }
</style>
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
 
<script type="text/javascript" src="DataTables/datatables.min.js"></script>

<div class="header bg-dark pb-4 pt-5 pt-md-6 mt--5">
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
<div class="card">
    <div class="col-xl-12 col-lg-12 ">
        <div class="pb-4 pt-5 pt-md-1">
            <div class="card-body">
                <table class="table table-responsive table-bordered border-light" style="align-content: center;">
                    <thead class="table-dark ">
                        <tr>
                            <th>No</th>
                            <th>Nombre(s) Apellido(s) completos</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Edad</th>
                            <th>Género</th>
                            <th>Categoría</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="6" id="textoCentrado">SIN RESULTADOS</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection