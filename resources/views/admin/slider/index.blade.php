@extends('layouts.app')
@section('content')
@include('layouts.headers.cards', ['texto' => 'Preferencias'])
@include('configuraciones.varnav')
<div class="container mt--2">
<div class="card-body">
    <table class="table table-border" style="border-radius: 5px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Encabezado</th>
                <th>Imagen</th>
                <th>Estado</th>
                <th><a href="{{ route('slider.create') }}" class="btn btn-warning btn-sm">Agregar</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($slider as $item )

            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->heading }}</td>
                <td>
                    <img src="{{ asset('uploads/slider/'.$item->image) }}" width="100px" alt="Slider Image">
                </td>
                <td>
                    @if($item->status == '1')
                    hedden
                    @else
                    visible
                    @endif
                </td>
                <td>
                    <a href="{{ route('slider.edit',$item->id) }}" class="btn btn-success btn-sm">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>



@endsection