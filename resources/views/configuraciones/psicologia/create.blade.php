@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-9 pt-5 pt-md-5">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <h1 class="text-white">Psicología</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--8">
    <div class="header-body text-center  mb-2 container">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-md-10">
                <form action="{{ route('psicologia.store') }}"   id="register_form" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="card-body bg-light">
                        <div class="form-group">
                            <div class="card">
                                <div class="card-header bg-light mb-2">
                                    <div class="row justify-content-center">
                                        <div class="col-md-10 mb-3">
                                            <h3 class="card-title text-dark">Registrar nueva(o)</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body bg-light">
                                    <h2 class="mb-2">Información personal</h2>
                                    <div class="row">
                                        <div class="col-md-4 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="nombre1" placeholder="Primer Nombre" name="nombre1" value="{{old('nombre1')}}" required>
                                                <label for="nombre1">Primer Nombre</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="nombre2" placeholder="Segundo Nombre" value="{{old('nombre2')}}" name="nombre2">
                                                <label for="nombre2">Segundo Nombre</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="nombre3" placeholder="Tercer Nombre" value="{{old('nombre3')}}" name="nombre3">
                                                <label for="nombre3">Tercer Nombre</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="apellido1" placeholder="Primer Apellido" value="{{old('apellido1')}}" name="apellido1" required>
                                                <label for="apellido1">Primer Apellido</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="apellido2" placeholder="Segundo Apellido" value="{{old('apellido2')}}" name="apellido2">
                                                <label for="apellido2">Segundo Apellido</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="apellido_casada" placeholder="Apellido de Casada" name="apellido_casada" value="{{old('apellido_casada')}}">
                                                <label for="apellido_casada">Apellido de Casada</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="form-floating">
                                              <input type="number" name="colegiado" id="colegiado" class="form-control text-dark @error('colegiado') is-invalid @enderror" aria-describedby="basic-addon2" placeholder="{{ __('Colegiado') }}" value="{{ old('colegiado') }}">
                                              <label for="colegiado">Colegiado</label>
                                              @error('colegiado')
                                                <div class="invalid-tooltip">{{ $message }}</div>
                                              @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="form-floating">
                                              <input type="tel" name="telefono" id="telefono" class="form-control text-dark @error('telefono') is-invalid @enderror" aria-describedby="basic-addon2" placeholder="{{ __('Teléfono') }}" value="{{ old('telefono') }}" pattern="[0-9]{4}[-][0-9]{4}" title="Formato aceptado: 0000-0000 o 0000 0000">
                                              <label for="telefono">Teléfono</label>
                                              @error('telefono')
                                                <div class="invalid-tooltip">{{ $message }}</div>
                                              @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <div class="form-floating">
                                              <input type="email" name="correo" id="correo" class="form-control text-dark @error('correo') is-invalid @enderror" aria-describedby="basic-addon2" placeholder="{{ __('Correo electrónico') }}" value="{{ old('correo') }}">
                                              <label for="correo">Correo electrónico</label>
                                              @error('correo')
                                                <div class="invalid-tooltip">{{ $message }}</div>
                                              @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="direccion" placeholder="Dirección" name="direccion" value="{{old('direccion')}}">
                                                <label for="direccion">Dirección</label>
                                            </div>
                                        </div>
                                        <div class="col-md-8 mb-2">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Fecha de Inicio de Labores</span>
                                                <input class="form-control text-dark" type="date" name="fecha_inicio_labores"
                                                    id="fecha_inicio_labores" value="{{$hoy->format('Y-m-d')}}" value="{{old('fecha_inicio_labores')}}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="submit" class="btn btn-outline-primary" value="Registrar" />
                    </fieldset>
                </form>     
            </div>
        </div>
    </div>
</div>


<style type="text/css">
#register_form fieldset:not(:first-of-type) {
    display: none;
}
</style>
@endsection