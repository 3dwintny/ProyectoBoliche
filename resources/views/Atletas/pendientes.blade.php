@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-4 pt-5 pt-md-6">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <h1 class="text-white">Tareas pendientes</h1>
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
                                <td colspan="3">SIN TAREAS PENDIENTES</td>
                            </tr>
                        @else
                            @foreach($tarea as $item)
                            <tr>
                                <input type="hidden" value="{{$item->id}}"/>
                                <td>{{$contador}}</td>
                                <td>{{$item->tarea}}</td>
                                <td><input type="checkbox"/></td>
                            </tr>
                                @php
                                $contador++;
                                @endphp
                            @endforeach
                        @endif
                    </tbody>
                </table>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </div>
    </div>
</div>
@endsection