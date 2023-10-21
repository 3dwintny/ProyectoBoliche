@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 col-lg-8 col-md-10 col-sm-12">
                    <h1 class="text-white">Asistencia de {{ $mostrarMes }} de {{ $obtenerAnio }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="pb-4 pt-5 pt-md-3">
    <div class="container">
        <div class="card-body">
            <div class="table-responsive">
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            @foreach($fechas as $fecha)
                            <th>{{ Carbon\Carbon::parse($fecha)->format('d') }}</th>
                            @endforeach
                            <th>Días Entrenados</th>
                            <th>% de Asistencia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @if(count($estado) <= 0)
                            <td colspan="{{ count($fechas) + 2 }}" class="textoCentrado textoNegrita" >SIN ASISTENCIA</td>
                            @else
                            @foreach($estado as $estadoDia)
                            <td>{{ $estadoDia }}</td>
                            @endforeach
                            <td>{{ $contarDias[0] }}</td>
                            <td>
                                @if($promedio[0]>=0 && $promedio[0]<=30)
                                    <div class="d-flex align-items-center justify-content-center">
                                    <span class="me-2 text-xs font-weight-bold">{{$promedio[0]}}</span>
                                    <div>
                                        <div class="progress">
                                        <div class="progress-bar bg-gradient-danger" role="progressbar" 
                                            aria-valuenow="{{$promedio[0]}}" aria-valuemin="0" 
                                            aria-valuemax="{{$promedio[0]}}" style="width: {{$promedio[0]}}%;">
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                @elseif($promedio[0]>=31 && $promedio[0]<=50)
                                    <div class="d-flex align-items-center justify-content-center">
                                        <span class="me-2 text-xs font-weight-bold">{{$promedio[0]}}</span>
                                        <div>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-warning" role="progressbar" 
                                            aria-valuenow="{{$promedio[0]}}" aria-valuemin="0" 
                                            aria-valuemax="{{$promedio[0]}}" style="width: {{$promedio[0]}}%;">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                @elseif($promedio[0]>=51 && $promedio[0]<=80)
                                    <div class="d-flex align-items-center justify-content-center">
                                        <span class="me-2 text-xs font-weight-bold">{{$promedio[0]}}</span>
                                        <div>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-info" role="progressbar" 
                                            aria-valuenow="{{$promedio[0]}}" aria-valuemin="0" 
                                            aria-valuemax="{{$promedio[0]}}" style="width: {{$promedio[0]}}%;">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="d-flex align-items-center justify-content-center">
                                        <span class="me-2 text-xs font-weight-bold">{{$promedio[0]}}</span>
                                        <div>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-success" role="progressbar" 
                                            aria-valuenow="{{$promedio[0]}}" aria-valuemin="0" 
                                            aria-valuemax="{{$promedio[0]}}" style="width: {{$promedio[0]}}%;">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                @endif  
                            </td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('styles')
    <link rel="stylesheet" href="css/general.css">
@endpush
