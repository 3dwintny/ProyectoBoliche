@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-5 pt-5 pt-md-5">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <h1 class="text-white">Psicología</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid pt-2">
    <div class="header-body text-center  mb-2 container">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-md-10">
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
                <form action="{{route('actualizarPsicologia')}}"   id="register_form" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}
                    <fieldset class="card-body bg-light">
                        <div class="form-group">
                            <div class="card">

                                <div class="card-header bg-light mb-2">
                                    <div class="row justify-content-center">
                                        <div class="col-md-10 mb-3">
                                            <h3 class="card-title text-dark">Editar psicóloga(o)</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body bg-light">
                                    <h2 class="mb-2">Información Personal</h2>
                                    <div class="row">
                                        <div class="col-md-4 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="nombre1" placeholder="Primer Nombre" name="nombre1" value="{{$psicologo->nombre1}}" required>
                                                <label for="nombre1">Primer Nombre</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="nombre2" placeholder="Segundo Nombre" name="nombre2" value="{{$psicologo->nombre2}}">
                                                <label for="nombre2">Segundo Nombre</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="nombre3" placeholder="Tercer Nombre" name="nombre3" value="{{$psicologo->nombre3}}">
                                                <label for="nombre3">Tercer Nombre</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="apellido1" placeholder="Primer Apellido" name="apellido1" value="{{$psicologo->apellido1}}" required>
                                                <label for="apellido1">Primer Apellido</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="apellido2" placeholder="Segundo Apellido" name="apellido2" value="{{$psicologo->apellido2}}">
                                                <label for="apellido2">Segundo Apellido</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="apellido_casada" placeholder="Apellido de Casada" name="apellido_casada" value="{{$psicologo->apellido_casada}}">
                                                <label for="apellido_casada">Apellido de Casada</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="colegiado" placeholder="Número de Colegiado" name="colegiado" value="{{$psicologo->colegiado}}" required>
                                                <label for="colegiado">Número de Colegiado</label>
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
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="correo" placeholder="Correo" name="correo" value="{{$psicologo->correo}}" required>
                                                <label for="correo">Correo</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="direccion" placeholder="Dirección" name="direccion" value="{{$psicologo->direccion}}">
                                                <label for="direccion">Dirección</label>
                                            </div>
                                        </div>
                                        <div class="col-md-8 mb-2">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Fecha de inicio de labores</span>
                                                <input class="form-control text-dark" type="date" name="fecha_inicio_labores"
                                            id="fecha_inicio_labores" value="{{$psicologo->fecha_inicio_labores}}" readonly required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Actualizar</button>
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