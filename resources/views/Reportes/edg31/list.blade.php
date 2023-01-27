@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>

<script type="text/javascript" src="DataTables/datatables.min.js"></script>

<div class="header bg-dark pb-4 pt-5 pt-md-6">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <h1 class="text-white">Reporte EDG-31 </h1>
                </div>
            </div>
        </div>
    </div>
</div>
<form method="GET" action="{{route('edg31PDF')}}" enctype="multipart/form-data" role="form" target="_blank">
    @csrf
    <input class="btn btn-outline-info" type="submit" value="Generar PDF">
    <input type="hidden" name="carta" id="carta">
</form>
<div class="card">
    <div class="col-xl-12 col-lg-12 ">
        <div class="pb-4 pt-5 pt-md-1">
            <div class="card-body">
            <table class="table table-responsive table-bordered border-light">
        <thead class="table-dark ">
            <tr>
                <th rowspan="2">Etapas Deportivas</th>
                <th colspan="4" style="text-align: center;">Formación</th>
                <th colspan="2" rowspan="2">Perfeccionamiento</th>
                <th rowspan="2" colspan="2">Especialización</th>
                <th rowspan="2" colspan="2">Alto Rendimiento</th>
                <th colspan="3" rowspan="2" style="text-align: center;">Total</th>
            </tr>
            <tr>
                <th colspan="2">Iniciación</th>
                <th colspan="2">Desarrollo</th>
            </tr>
            <tr>
                <th colspan="14" style="text-align: center;">ATLETAS EN PROCESO SITEMÁTICO DE DESARROLLO "FEDERADOS"</th>
            </tr>
            <tr>
                <th>Categorías/Género</th>
                <th>F</th>
                <th>M</th>
                <th>F</th>
                <th>M</th>
                <th>F</th>
                <th>M</th>
                <th>F</th>
                <th>M</th>
                <th>F</th>
                <th>M</th>
                <th>F</th>
                <th>M</th>
                <th>TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Sub 09</td>
                @foreach($s9 as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$f9}}</td>
                <td>{{$m9}}</td>
                <td>{{$tS9}}</td>
            </tr>
            <tr>
                <td>Sub 11</td>
                @foreach($s11 as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$f11}}</td>
                <td>{{$m11}}</td>
                <td>{{$tS11}}</td>
            </tr>
            <tr>
                <td>Sub 13</td>
                @foreach($s13 as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$f13}}</td>
                <td>{{$m13}}</td>
                <td>{{$tS13}}</td>
            </tr>
            <tr>
                <td>Sub 16</td>
                @foreach($s16 as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$f16}}</td>
                <td>{{$m16}}</td>
                <td>{{$tS16}}</td>
            </tr>
            <tr>
                <td>Sub 18</td>
                @foreach($s18 as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$f18}}</td>
                <td>{{$m18}}</td>
                <td>{{$tS18}}</td>
            </tr>
            <tr>
                <td>Sub 21</td>
                @foreach($s21 as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$f21}}</td>
                <td>{{$m21}}</td>
                <td>{{$tS21}}</td>
            </tr>
            <tr>
                <td>Segunda Fuerza</td>
                @foreach($sSF as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$fF}}</td>
                <td>{{$mF}}</td>
                <td>{{$tSF}}</td>
            </tr>
            <tr>
                <td>Mayores</td>
                @foreach($sM as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$fM}}</td>
                <td>{{$mM}}</td>
                <td>{{$tM}}</td>
            </tr>
            <tr>
                <td style="text-align: right;">TOTAL</td>
                @foreach($columnasFederados as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$totalFemeninosFederados}}</td>
                <td>{{$totalMasculinosFederados}}</td>
                <td>{{$totalFederados}}</td>
            </tr>
        </tbody>
    </table>
    <br>
    <table class="table table-responsive table-bordered border-light">
        <thead class="table-dark ">
            <tr>
                <tr>
                    <th>Edades</th>
                    <th colspan="2">Menores de 12</th>
                    <th colspan="2">13-17</th>
                    <th colspan="2">18-21</th>
                    <th colspan="2">22-35</th>
                    <th colspan="2">36-50</th>
                    <th colspan="2">Mas de 50</th>
                    <th colspan="3" style="text-align: center;">Total</th>
                </tr>
                <tr>
                    <th colspan="16" style="text-align: center;">OTROS PROGRAMAS DE ATENCIÓN</th>
                </tr>
                <tr>
                    <th>Categorías/Género</th>
                    <th>F</th>
                    <th>M</th>
                    <th>F</th>
                    <th>M</th>
                    <th>F</th>
                    <th>M</th>
                    <th>F</th>
                    <th>M</th>
                    <th>F</th>
                    <th>M</th>
                    <th>F</th>
                    <th>M</th>
                    <th>F</th>
                    <th>M</th>
                    <th>TOTAL</th>
                </tr>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Practicantes del Deporte</td>
                @foreach($practicantes as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$fPracticantes}}</td>
                <td>{{$mPracticantes}}</td>
                <td>{{$tPracticantes}}</td>
            </tr>
            <tr>
                <td>Discapacidad</td>
                @foreach($discapacidad as $item)
                    <td>{{$item}}</td>
                @endforeach
                <td>{{$fDiscapacidad}}</td>
                <td>{{$mDiscapacidad}}</td>
                <td>{{$tDiscapacidad}}</td>
            </tr>
            <tr>
                <td>Master/Veteranos</td>
                @foreach($veteranos as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$fVeteranos}}</td>
                <td>{{$mVeteranos}}</td>
                <td>{{$tVeteranos}}</td>
            </tr>
            <tr>
                <td style="text-align: right;">TOTAL</td>
                @foreach($columnasOtros as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$totalMasculinosOtros}}</td>
                <td>{{$totalFemeninosOtros}}</td>
                <td>{{$totalOtros}}</td>
            </tr>
        </tbody>
    </table>
    <br>
    <table class="table table-responsive table-bordered border-light">
        <thead class="table-dark ">
            <tr>
                <th rowspan="2">Etapas Deportivas</th>
                <th colspan="4" style="text-align: center;">Formación</th>
                <th colspan="2" rowspan="2">Perfeccionamiento</th>
                <th rowspan="2" colspan="2">Especialización</th>
                <th rowspan="2" colspan="2">Alto Rendimiento</th>
                <th colspan="3" rowspan="2" style="text-align: center;">Total</th>
            </tr>
            <tr>
                <th colspan="2">Iniciación</th>
                <th colspan="2">Desarrollo</th>
            </tr>
            <tr>
                <th colspan="14" style="text-align: center;">ATLETAS EN PROCESO SITEMÁTICO DE ENTRENAMIENTO "DEPORTE ADAPTADO"</th>
            </tr>
            <tr>
                <th>Categorías/Género</th>
                <th>F</th>
                <th>M</th>
                <th>F</th>
                <th>M</th>
                <th>F</th>
                <th>M</th>
                <th>F</th>
                <th>M</th>
                <th>F</th>
                <th>M</th>
                <th>F</th>
                <th>M</th>
                <th>TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Visuales</td>
                @foreach ($visuales as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$fvisuales}}</td>
                <td>{{$mvisuales}}</td>
                <td>{{$tvisuales}}</td>
            </tr>
            <tr>
                <td>Intelectuales</td>
                @foreach ($intelecto as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$fintelecto}}</td>
                <td>{{$mintelecto}}</td>
                <td>{{$tintelecto}}</td>
            </tr>
            <tr>
                <td>Síndrome de Down</td>
                @foreach ($sindrome as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$fsindrome}}</td>
                <td>{{$msindrome}}</td>
                <td>{{$tsindrome}}</td>
            </tr>
            <tr>
                <td>Parálisis Cerebral</td>
                @foreach ($paralisis as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$fparalisis}}</td>
                <td>{{$mparalisis}}</td>
                <td>{{$tparalisis}}</td>
            </tr>
            <tr>
                <td>Amputados</td>
                @foreach ($amputados as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$famputados}}</td>
                <td>{{$mamputados}}</td>
                <td>{{$tamputados}}</td>
            </tr>
            <tr>
                <td>Sillas de Ruedas</td>
                @foreach ($ruedas as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$fruedas}}</td>
                <td>{{$mruedas}}</td>
                <td>{{$truedas}}</td>
            </tr>
            <tr>
                <td>Auditivos</td>
                @foreach ($auditivos as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$fauditivos}}</td>
                <td>{{$mauditivos}}</td>
                <td>{{$tauditivos}}</td>
            </tr>
            <tr>
                <td style="text-align: right;">TOTAL</td>
                @foreach($columnasAdaptados as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$totalFemeninosAdaptados}}</td>
                <td>{{$totalMasculinosAdaptados}}</td>
                <td>{{$totalAdaptados}}</td>
            </tr>
        </tbody>
    </table>
            </div>
        </div>
    </div>
</div>
@endsection
