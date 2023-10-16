@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-10 col-sm-6">
                    <h1 class="text-white">Prácticas pendientes</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pt-2">
    <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Fecha de asignación</th>
                                <th>Práctica</th>
                                <th>Finalizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $contador = 1;
                            @endphp
                            @if(count($practicas)<=0)
                                <tr>
                                    <th colspan="4" style="text-align: center;">SIN PRÁCTICAS PENDIENTES</th>
                                </tr>
                            @else
                                @foreach($practicas as $item)
                                <tr>
                                    <td>{{$contador}}</td>
                                    <td>{{Carbon\Carbon::parse($item->actividad_entreno->fecha)->format('d-m-Y')}}</td>
                                    <td>{{$item->actividad_entreno->actividad}}</td>
                                    <td>
                                        <form action="{{route('finalizarActividad')}}" method="POST" role="form">
                                            @csrf
                                            <input type="hidden" value="{{encrypt($item->id)}}" name="actividad" id="actividad">
                                            <button class="btn btn-primary">Subir evidencia</button>
                                        </form>
                                    </td>
                                </tr>
                                    @php
                                    $contador++;
                                    @endphp
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection