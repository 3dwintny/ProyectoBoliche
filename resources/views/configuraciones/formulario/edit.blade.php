@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-10 col-lg-10 col-md-11 col-sm-10">
                    <h1 class="text-white">Encabezado de formulario de inscripción</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@include('configuraciones.varnav')
<div class="container-fluid pt-2">
    <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header text-bold ">
                        <strong>
                            <h2>
                                Editar
                                <a href="{{ url('formulario-inscripcion') }}" class="btn btn-danger btn-sm float-right">Regresar</a>
                            </h2>
                        </strong>
                    </div>
                    <form method="post" role="form" enctype="multipart/form-data" action="{{route('formulario-inscripcion.update',encrypt($formulario->id))}}">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="card">
                            <div class="card-body bg-light">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Título principal') }}" id="titulo_principal" type="text" name="titulo_principal" value="{{$formulario->titulo_principal}}">
                                            <label for="titulo_principal">Título principal</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Título ficha') }}" id="titulo_ficha" type="text" name="titulo_ficha" value="{{$formulario->titulo_ficha}}">
                                            <label for="titulo_ficha">Título ficha</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Subtítulo') }}" id="subtitulo" type="text" name="subtitulo" value="{{$formulario->subtitulo}}">
                                            <label for="subtitulo">Subtítulo</label>
                                        </div>
                                    </div>
                                    <label for="titulo_ficha">Declaración</label>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2">
                                        <textarea class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Declaración') }}" id="declaracion" name="declaracion" style="text-align:justify;resize:none;" rows="8">{{$formulario->declaracion}}</textarea>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="col-md-4 mb-10 center"><button type="submit" class="btn btn-outline-primary">Actualizar</button></div>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection