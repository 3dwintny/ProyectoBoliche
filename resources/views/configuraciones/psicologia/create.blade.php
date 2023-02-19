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
                                            <h3 class="card-title text-dark">Registrar nueva(o) psicóloga(o)</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body bg-light">
                                    <h2 class="mb-2">Información personal</h2>
                                    <div class="row">
                                        <div class="col-md-4 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="nombre1" placeholder="Primer Nombre" name="nombre1" required>
                                                <label for="nombre1">Primer Nombre</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="nombre2" placeholder="Segundo Nombre" name="nombre2">
                                                <label for="nombre2">Segundo Nombre</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="nombre3" placeholder="Tercer Nombre" name="nombre3">
                                                <label for="nombre3">Tercer Nombre</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="apellido1" placeholder="Primer Apellido" name="apellido1" required>
                                                <label for="apellido1">Primer Apellido</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="apellido2" placeholder="Segundo Apellido" name="apellido2">
                                                <label for="apellido2">Segundo Apellido</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="apellido_casada" placeholder="Apellido de Casada" name="apellido_casada">
                                                <label for="apellido_casada">Apellido de Casada</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="colegiado" placeholder="Número de Colegiado" name="colegiado" required>
                                                <label for="colegiado">Número de Colegiado</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="tel" class="form-control" id="telefono" placeholder="Teléfono" name="telefono">
                                                <label for="telefono">Teléfono</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="correo" placeholder="Correo" name="correo" required>
                                                <label for="correo">Correo</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="direccion" placeholder="Dirección" name="direccion">
                                                <label for="direccion">Dirección</label>
                                            </div>
                                        </div>
                                        <div class="col-md-8 mb-2">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Fecha de Inicio de Labores</span>
                                                <input class="form-control text-dark" type="date" name="fecha_inicio_labores"
                                                    id="fecha_inicio_labores" value="{{$hoy->format('Y-m-d')}}" required>
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