@extends('layouts.app')

@section('content')
@include('layouts.headers.cards', ['texto' => 'Tareas pendientes'])
<div class="pb-4 pt-5 pt-md-3">
    <div class="container">
        <div class="card-body">
            @include('components.flash_alerts')
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