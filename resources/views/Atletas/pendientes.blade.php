@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="header bg-dark pb-4 pt-5 pt-md-6">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <h1 class="text-white">Tareas pendientes {{$nombre}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
=======
@include('layouts.headers.cards', ['texto' => 'Tareas pendientes'])
>>>>>>> 4d897f1638c5a10a34ad75523ea2220abe64ba3e
<div class="pb-4 pt-5 pt-md-3">
    <div class="container">
        <div class="card-body">
            @include('components.flash_alerts')
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
@endsection