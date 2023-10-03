@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>

<script type="text/javascript" src="DataTables/datatables.min.js"></script>

<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-10 col-sm-6">
                    <h1 class="text-white">Reporte EDG-31</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid pt-2">
    <div class="header-body text-center mb-7">
        <div class="row">
            <div class="col-xl-4 col-lg-2 col-md-1 col-sm-1">
                <div class="d-flex">
                    <form method="GET" action="{{route('edg31PDF')}}" enctype="multipart/form-data" role="form" target="_blank">
                        @csrf
                        <button class="btn btn-outline-info" type="submit"><i class="fa fa-fw fa-regular fa-file-pdf"></i></button>
                    </form>
                    <a href="{{route('exportarEDG31')}}" target="_blank" type="button" class="btn btn-outline-success"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12">
                <table class="table table-responsive">
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
                        @for($i=0;$i<9;$i++)
                            <tr>
                                @for($j=0;$j<14;$j++)
                                    @if($j==0)
                                        @switch($i)
                                            @case (0)
                                                <td>Sub 09</td>
                                                @break
                                            @case (1)
                                                <td>Sub 11</td>
                                                @break
                                            @case (2)
                                                <td>Sub 13</td>
                                                @break
                                            @case (3)
                                                <td>Sub 16</td>
                                                @break
                                            @case (4)
                                                <td>Sub 18</td>
                                                @break
                                            @case (5)
                                                <td>Sub 21</td>
                                                @break
                                            @case (6)
                                                <td>Segunda Fuerza</td>
                                                @break
                                            @case (7)
                                                <td>Mayores</td>
                                                @break
                                            @case (8)
                                                <td style="text-align: right;">TOTAL</td>
                                                @break
                                        @endswitch
                                    @else
                                        <td>{{$atletasFederados[$i][$j-1]}}</td>
                                    @endif
                                @endfor
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12">
                <table class="table table-responsive">
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
                        @for($i=0;$i<4;$i++)
                            <tr>
                                @for($j=0;$j<16;$j++)
                                    @if($j==0)
                                        @switch($i)
                                            @case (0)
                                                <td>Practicantes del Deporte</td>
                                                @break
                                            @case (1)
                                                <td>Discapacidad</td>
                                                @break
                                            @case (2)
                                                <td>Master/Veteranos</td>
                                                @break
                                            @case (3)
                                                <td style="text-align: right;">TOTAL</td>
                                                @break
                                        @endswitch
                                    @else
                                        @if($i==2 && ($j>=0 && $j<=6))
                                            <td style="background: black;">{{$atletasOtrosProgramasAtenction[$i][$j-1]}}</td>
                                        @else
                                            <td>{{$atletasOtrosProgramasAtenction[$i][$j-1]}}</td>    
                                        @endif()
                                    @endif
                                @endfor
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12">
                <table class="table table-responsive">
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
                        @for($i=0;$i<8;$i++)
                            <tr>
                                @for($j=0;$j<14;$j++)
                                    @if($j==0)
                                        @switch($i)
                                            @case (0)
                                                <td>Visuales</td>
                                                @break
                                            @case (1)
                                                <td>Intelectuales</td>
                                                @break
                                            @case (2)
                                                <td>Síndrome de Down</td>
                                                @break
                                            @case (3)
                                                <td>Parálisis Cerebral</td>
                                                @break
                                            @case (4)
                                                <td>Amputados</td>
                                                @break
                                            @case (5)
                                                <td>Sillas de Ruedas</td>
                                                @break
                                            @case (6)
                                                <td>Auditivos</td>
                                                @break
                                            @case (7)
                                                <td style="text-align: right;">TOTAL</td>
                                                @break
                                        @endswitch
                                    @else
                                        <td>{{$atletasDeporteAdaptado[$i][$j-1]}}</td>
                                    @endif
                                @endfor
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
