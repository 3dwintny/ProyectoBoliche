@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 col-lg-8 col-md-12 col-sm-8">
                    <h1 class="text-white">Centros de entrenamiento</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pt-2">
    <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-xl-8 col-lg-9 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header text-bold ">
                        <strong>
                            <h2>Editar</h2>
                        </strong>
                    </div>
                    <form method="post" role="form" enctype="multipart/form-data" action="{{route('centro.update',$centro->id)}}">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <div class="col-xl-4 col-lg-4 col-md-5 col-sm-4 mb-10 center">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="fecha_registro" placeholder="Fecha de registro" name="fecha_registro" value="{{$centro->fecha_registro}}" required>
                                    <label for="fecha_registro">Fecha de registro</label>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body bg-light">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Nombre') }}" id="nombre" type="text" name="nombre" value="{{$centro->nombre}}" required>
                                            <label for="nombre">Nombre</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Dirección') }}" id="direccion" type="text" name="direccion" value="{{$centro->direccion}}" required>
                                            <label for="direccion">Dirección</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Institución') }}" id="institucion" type="text" name="institucion" value="{{$centro->institucion}}">
                                            <label for="institucion">Institución</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Accesibilidad') }}" id="accesibilidad" type="text" name="accesibilidad" value="{{$centro->accesibilidad}}">
                                            <label for="accesibilidad">Accesibilidad</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Implementación') }}" id="implementacion" type="text" name="implementacion" value="{{$centro->implementacion}}">
                                            <label for="implementacion">Implementación</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Espacio Físico') }}" id="espacio_fisico" type="text" name="espacio_fisico" value="{{$centro->espacio_fisico}}">
                                            <label for="espacio_fisico">Espacio físico</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-2">
                                        <div class="form-floating">
                                            <select class="form-control" name="departamento_id" id="departamento_id" required>
                                                <option selected disabled></option>
                                                @foreach ($departamento as $item)
                                                <option value="{{$item->id}}">{{$item->nombre}}</option>
                                                    @if ($item->id==$centro->departamento_id)
                                                        <option selected value="{{$item->id}}">{{$item->nombre}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <label for="departamento_id">Departamento</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-10 center"><button type="submit" class="btn btn-outline-primary">Actualizar</button></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection