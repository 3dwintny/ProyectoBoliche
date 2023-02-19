@extends('layouts.app')

@section('content')
<link href="{{ asset('/css/atletas/show.css') }}" rel="stylesheet">
<style>
    .prueba {
        background-color: white;
    }
</style>
<div class="header bg-dark pb-2 pt-5 pt-md-10">
    <div class="container-fluid">
      <div class="header-body">
        <!-- Card stats -->
        <div class="row">
          <div class="col-xl-6 col-lg-6">
            <h1 class="text-white">Atletas</h1>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="container-fluid mt--4">
    <div class="header-body text-center  mb-7">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8">
                <div class="card">
                    <div class="card-header text-bold ">
                        <strong>
                            <h3>Información del atleta {{$alumno->nombre1}} {{$alumno->nombre2}} {{$alumno->nombre3}} {{$alumno->apellido1}} {{$alumno->apellido2}}</h3>
                        </strong>
                    </div>
                </div>
                    <div class="form-group">
                        <div class="card">
                            <div class="card-body bg-light">
                            <div class="col-12 mb-2"><img src="{{ asset('storage/uploads/'.$alumno->foto) }}" class="img-thumbnail" alt="50" height="50" width="50"></div>
                                <h5 class="mb-2">Información personal</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Fecha de nacimiento</span>
                                            <input type="text" class=" container form-control text-center" value="{{Carbon\Carbon::parse($alumno->fecha)->format('d-m-Y')}}" readonly style="background-color: white;">
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Edad') }}" id="edad" type="text" value="{{ $alumno->edad }}" readonly style="background-color: white;">
                                            <label for="edad">Edad</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Peso') }}" id="peso" type="text" value="{{ $alumno->peso }}" readonly style="background-color: white;">
                                            <label for="peso">Peso</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Altura') }}" id="altura" type="text" value="{{ $alumno->altura }}" readonly style="background-color: white;">
                                            <label for="altura">Altura</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('CUI') }}" id="cui" type="text" value="{{ $alumno->cui }}" readonly style="background-color: white;">
                                            <label for="nombre1">CUI</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('NIT') }}" id="nit" type="text" value="{{ $alumno->nit }}" readonly style="background-color: white;">
                                            <label for="nit">NIT</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Pasaporte') }}" id="pasaporte" type="text" value="{{ $alumno->pasaporte }}" readonly style="background-color: white;">
                                            <label for="pasaporte">Pasaporte</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Celular') }}" id="celular" type="text" value="{{ $alumno->celular }}" readonly style="background-color: white;">
                                            <label for="celular">Celular</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Correo') }}" id="correo" type="text" value="{{ $alumno->correo }}" readonly style="background-color: white;">
                                            <label for="correo">Correo</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Teléfono de casa') }}" id="telCasa" type="text" value="{{ $alumno->telefono_casa }}" readonly style="background-color: white;">
                                            <label for="telCasa">Teléfono de casa</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Dirección') }}" id="telCasa" type="text" value="{{ $alumno->direccion }}" readonly style="background-color: white;">
                                            <label for="direccion">Dirección</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Depto. de residencia') }}" id="deptoResidencia" type="text" value="{{ $departamento->nombre }}" readonly style="background-color: white;">
                                            <label for="deptoResidencia">Depto. de residencia</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Municipio de residencia') }}" id="munResidencia" type="text" value="{{ $municipio->nombre }}" readonly style="background-color: white;">
                                            <label for="munResidencia">Municipio de residencia</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Nacionalidad') }}" id="nacionalidad" type="text" value="{{ $nacionalidad->descripcion }}" readonly style="background-color: white;">
                                            <label for="nacionalidad">Nacionalidad</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Género') }}" id="genero" type="text" value="{{ $alumno->genero }}" readonly style="background-color: white;">
                                            <label for="genero">Género</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Estado Civil') }}" id="civil" type="text" value="{{ $atleta->estado_civil }}" readonly style="background-color: white;">
                                            <label for="civil">Estado Civil</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Etnia') }}" id="etnia" type="text" value="{{ $atleta->etnia }}" readonly style="background-color: white;">
                                            <label for="etnia">Etnia</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Escolaridad') }}" id="escolaridad" type="text" value="{{ $atleta->escolaridad }}" readonly style="background-color: white;">
                                            <label for="escolaridad">Escolaridad</label>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="mb-2">Información deportiva</h5>
                                <div class="row">
                                    <div class="col-md-5 mb-2">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Fecha de ingreso</span>
                                            <input type="text" class="container form-control text-center" value="{{Carbon\Carbon::parse($atleta->fecha_ingreso)->format('d-m-Y')}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Años') }}" id="anios" type="text" value="{{ $atleta->anios }}" readonly style="background-color: white;">
                                            <label for="anios">Años</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Meses') }}" id="meses" type="text" value="{{ $atleta->meses }}" readonly style="background-color: white;">
                                            <label for="meses">Meses</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Adaptado') }}" id="adaptado" type="text" value="{{ $atleta->adaptado }}" readonly style="background-color: white;">
                                            <label for="adaptado">Adaptado</label>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="mb-2">Información de encargados</h5>
                                <div class="row"></div>
            </div>
        </div>
    </div>
</div>

@endsection











