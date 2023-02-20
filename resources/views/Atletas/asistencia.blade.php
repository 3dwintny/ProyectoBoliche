@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-4 pt-5 pt-md-6">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <h1 class="text-white">Asistencia de {{$mostrarMes}} de {{$obtenerAnio}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pb-4 pt-5 pt-md-3">
    <div class="container">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            @for($i=0;$i<count($fechas);$i++) <th>{{Carbon\Carbon::parse($fechas[$i]->fecha)->format('d')}}</th> @endfor
                            <th>Días Entrenados</th>
                            <th>% de Asistencia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @if(count($estado)<=0)
                            @php
                            $sR = count($fechas)+2
                            @endphp
                            <td colspan="{{$sR}}">SIN ASISTENCIA</td>
                            @else
                            @for($i=0;$i<count($fechas);$i++) <td>{{$estado[$i]}}</td>
                                    @endfor
                                    <td>{{$contarDias[0]}}</td>
                                    <td>{{$promedio[0]}}</td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection