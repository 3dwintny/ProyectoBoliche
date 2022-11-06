@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
<div class="header bg-gradient-primary py-7 py-lg-5">
    <div class="contaimer mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Slider
                        <a href="{{ url('slider/create') }}" class="btn btn-primary btn-sm float-right"> Agregar nuevo slider</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Encabezado</th>
                                <th>Imagen</th>
                                <th>Estado</th>
                                <th>Editar</th>
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
        </div>
    </div>
</div>
</div>



@endsection
