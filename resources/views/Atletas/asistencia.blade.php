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
                            <td colspan="{{ count($fechas) + 2 }}">SIN ASISTENCIA</td>
                            @else
                            @foreach($estado as $estadoDia)
                            <td>{{ $estadoDia }}</td>
                            @endforeach
                            <td>{{ $contarDias[0] }}</td>
                            <td>{{ $promedio[0] }}</td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
