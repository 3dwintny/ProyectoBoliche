@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />

<script type="text/javascript" src="DataTables/datatables.min.js"></script>

@include('layouts.headers.cards', ['texto' => 'Reporte EDG-27'])
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
                    <td colspan="6" id="textoCentrado">SIN RESULTADOS</td>
                </td>
            </tr>
        </tbody>
    </table>
    @endsection