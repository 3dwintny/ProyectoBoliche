@extends('layouts.app')

@section('content')
@include('layouts.headers.cards', ['texto' => 'Entrenadores'])
<div class="container-fluid mt--5">
    <div class="header-body text-center  mb-7">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8">
                <div class="card">
                    <div class="card-header text-bold ">
                        <strong>
                            <h3>Información del entrenador {{$entrenador->nombre1}} {{$entrenador->nombre2}} {{$entrenador->nombre3}} {{$entrenador->apellido1}} {{$entrenador->apellido2}} {{$entrenador->apellido_casada}}</h3>
                        </strong>
                    </div>
                </div>
                    <div class="form-group">
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-body bg-light">
                            <div class="col-12 mb-2"><img src="{{ asset('uploads/alumnos/'.$entrenador->foto) }}" class="img-thumbnail" alt="50" height="50" width="50"></div>
                                <h5 class="mb-2">Información personal</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Fecha de nacimiento</span>
                                            <input type="text" class=" container form-control text-center" value="{{Carbon\Carbon::parse($entrenador->fecha_nacimiento)->format('d-m-Y')}}" readonly style="background-color: white;">
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Edad') }}" id="edad" type="text" value="{{$entrenador->edad}}" readonly style="background-color: white;">
                                            <label for="edad">Edad</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('NIT') }}" id="nit" type="text" value="{{$entrenador->nit}}" readonly style="background-color: white;">
                                            <label for="nit">NIT</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('CUI') }}" id="cui" type="text" value="{{$entrenador->cui}}" readonly style="background-color: white;">
                                            <label for="nombre1">CUI</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Pasaporte') }}" id="pasaporte" type="text" value="{{$entrenador->pasaporte}}" readonly style="background-color: white;">
                                            <label for="pasaporte">Pasaporte</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Celular') }}" id="celular" type="text" value="{{$entrenador->celular}}" readonly style="background-color: white;">
                                            <label for="celular">Celular</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Correo') }}" id="correo" type="text" value="{{$entrenador->correo}}" readonly style="background-color: white;">
                                            <label for="correo">Correo</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Teléfono de casa') }}" id="telCasa" type="text" value="{{$entrenador->telefono_casa}}" readonly style="background-color: white;">
                                            <label for="telCasa">Teléfono de casa</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Dirección') }}" id="telCasa" type="text" value="{{$entrenador->direccion}}" readonly style="background-color: white;">
                                            <label for="direccion">Dirección</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Depto. de residencia') }}" id="deptoResidencia" type="text" value="{{$departamento->nombre}}" readonly style="background-color: white;">
                                            <label for="deptoResidencia">Departamento de residencia</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Nacionalidad') }}" id="nacionalidad" type="text" value="{{$nacionalidad->descripcion}}" readonly style="background-color: white;">
                                            <label for="nacionalidad">Nacionalidad</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Género') }}" id="genero" type="text" value="{{$entrenador->genero}}" readonly style="background-color: white;">
                                            <label for="genero">Género</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Estado Civil') }}" id="civil" type="text" value="{{$entrenador->estado_civil}}" readonly style="background-color: white;">
                                            <label for="civil">Estado Civil</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Escolaridad') }}" id="escolaridad" type="text" value="{{$entrenador->escolaridad}}" readonly style="background-color: white;">
                                            <label for="escolaridad">Escolaridad</label>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="mb-2">Información profesional</h5>
                                <div class="row">
                                    <div class="col-md-5 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Años') }}" id="fechaIngreso" type="text" value="{{Carbon\Carbon::parse($entrenador->fecha_registro)->format('d-m-Y')}}" readonly style="background-color: white;">
                                            <label for="fechaIngreso">Fecha de ingreso</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Años') }}" id="anios" type="text" value="{{$entrenador->años_experiencia}}" readonly style="background-color: white;">
                                            <label for="anios">Años de exp.</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Meses') }}" id="tipo_contrato" type="text" value="{{$tipo_contrato->descripcion}}" readonly style="background-color: white;">
                                            <label for="tipo_contrato">Tipo de contrato</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Nivel CDAG') }}" id="nivel_cdag" type="text" value="{{$nivel_cdag->nombre}}" readonly style="background-color: white;">
                                            <label for="nivel_cdag">Nivel CDAG</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Nivel FADN') }}" id="nivel_fadn" type="text" value="{{$nivel_fadn->tipo}}" readonly style="background-color: white;">
                                            <label for="nivel_fadn">Nivel FADN</label>
                                        </div>
                                    </div>
                                </div>
            </div>
        </div>
    </div>
</div>

@endsection











