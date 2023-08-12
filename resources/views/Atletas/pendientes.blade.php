@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-10 col-sm-6">
                    <h1 class="text-white">Tareas pendientes</h1>
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
                <form method="POST" action="{{route('finalizarTarea')}}" enctype="multipart/form-data" role="form">
                    @csrf
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Tarea</th>
                                    <th>Finalizada</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $contador = 1;
                                @endphp
                                @if(count($tarea)<=0)
                                    <tr>
                                        <th colspan="3" style="text-align: center;">SIN TAREAS PENDIENTES</th>
                                    </tr>
                                @else
                                    @foreach($tarea as $item)
                                    <tr>
                                        <td>{{$contador}}</td>
                                        <td>{{$item->tarea}}</td>
                                        <td><input type="checkbox" name="id[]" value="{{encrypt($item->id)}}"/></td>
                                    </tr>
                                        @php
                                        $contador++;
                                        @endphp
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        @if(count($tarea)<=0)
                            <button type="submit" class="btn btn-primary" @disabled(true)>Aceptar</button>
                        @else
                            <button type="submit" class="btn btn-primary">Aceptar</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection