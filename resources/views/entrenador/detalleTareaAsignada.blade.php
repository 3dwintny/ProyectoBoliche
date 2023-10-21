@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <h1 class="text-white">Detalle de actividad</h1>
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

            @if(session('warning'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('warning') }}
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
                    <table class="table table-hover">
                        <thead class="table-dark mt-2">
                            <tr>
                                <th style="text-align:center;">No</th>
                                <th style="text-align:center;">Atleta</th>
                                <th style="text-align:center;">Evidencia</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $contador = 1;
                                $control = 0;
                            @endphp
                            @if(count($atletas)>0)
                                @foreach($actividades as $item)
                                    <tr class="table-sm">
                                        <td>{{$contador}}</td>
                                        @if($item->estado=='pendiente')
                                            <td style="color:red;">{{$atletas[$control]}}</td>
                                        @else
                                            <td>{{$atletas[$control]}}</td>
                                        @endif
                                        @if($item->evidencia==NULL)
                                            <td></td>
                                        @else
                                            <td><img src="{{ asset('uploads/evidencia/'.$item->evidencia) }}" alt="" width="100" height="100"></td>
                                        @endif
                                    </tr>
                                    @php
                                    $contador++;
                                    $control++;
                                    @endphp
                                @endforeach
                            @else
                                <tr class="table-sm">
                                    <th colspan="3">NO HA SIDO ASIGNADA A NINGÚN ATLETA</th>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <label for="txtActividad">Actividad asignada</label>
                    <textarea  cols="40" rows="5" style="text-align:justify;resize:none;background-color:white;" class="form-control text-dark" aria-describedby="basic-addon2" readonly>{{$actividad}}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection