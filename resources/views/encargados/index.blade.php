@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-10 col-sm-10">
                    <h1 class="text-white">Encargados</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@include('configuraciones.varnav')
<div class="container">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" style="border-radius: 5px;">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Apellido</th>
                        <th class="text-center">Dirección</th>
                        <th class="text-center">Celular</th>
                        <th class="text-center">Correo</th>
                        <th class="text-center">DPI</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($encargados)<=0)
                        <tr>
                            <td colspan="7" class="textoCentrado textoNegrita">NO SE ENCONTRARON RESULTADOS</td>
                        </tr>
                    @else
                        @foreach ($encargados as $item )
                        <tr>
                            <td>{{ $item->nombre1p }}</td>
                            <td>{{ $item->apellido1p }}</td>
                            <td>{{ $item->direccionp }}</td>
                            <td>{{ $item->celularp }}</td>
                            <td>{{ $item->correop }}</td>
                            <td>{{ $item->dpi }}</td>
                            <td>
                                <a href="{{ route('encargados.edit',$item->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-edit"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('styles')
    <link rel="stylesheet" href="css/general.css">
@endpush