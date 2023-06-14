@extends('layouts.app')

@section('content')
@include('layouts.headers.cards', ['texto' => 'Atletas'])
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
                                    <div class="col-md-3 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Años') }}" id="fechaIngreso" type="text" value="{{Carbon\Carbon::parse($atleta->fecha_ingreso)->format('d-m-Y')}}" readonly style="background-color: white;">
                                            <label for="fechaIngreso">Ingreso</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Años') }}" id="anios" type="text" value="{{ $atleta->anios }}" readonly style="background-color: white;">
                                            <label for="anios">Años de exp.</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Meses') }}" id="meses" type="text" value="{{ $atleta->meses }}" readonly style="background-color: white;">
                                            <label for="meses">Meses de exp.</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Federado') }}" id="federado" type="text" value="{{ $atleta->federado }}" readonly style="background-color: white;">
                                            <label for="federado">Federado</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Adaptado') }}" id="adaptado" type="text" value="{{ $atleta->adaptado }}" readonly style="background-color: white;">
                                            <label for="adaptado">Adaptado</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Deporte Adaptado') }}" id="deporteAdaptado" type="text" value="{{ $deporte_adaptado->nombre }}" readonly style="background-color: white;">
                                            <label for="deporteAdaptado">Deporte Adaptado</label>
                                        </div>
                                    </div>
                                    <div class="col-md-5 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Otro Programa de Atención') }}" id="otro" type="text" value="{{ $otro_programa->nombre }}" readonly style="background-color: white;">
                                            <label for="otro">Otro Programa de Atención</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Categoria') }}" id="categoria" type="text" value="{{ $categoria->tipo }}" readonly style="background-color: white;">
                                            <label for="categoria">Categoria</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Etapa Deportiva') }}" id="etapa_deportiva" type="text" value="{{ $etapa_deportiva->nombre }}" readonly style="background-color: white;">
                                            <label for="etapa_deportiva">Etapa Deportiva</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('PRT') }}" id="prt" type="text" value="{{ $prt->nombre }}" readonly style="background-color: white;">
                                            <label for="prt">PRT</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Línea de desarrollo ') }}" id="prt" type="text" value="{{ $linea_desarrollo->tipo }}" readonly style="background-color: white;">
                                            <label for="prt">Línea de desarrollo</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Entrenador') }}" id="entrenador" type="text" value="{{ $entrenador->nombre1 }} {{ $entrenador->nombre2 }} {{ $entrenador->nombre3 }} {{ $entrenador->apellido1 }} {{ $entrenador->apellido2 }} {{ $entrenador->apellido_casada }}" readonly style="background-color: white;">
                                            <label for="entrenador">Entrenador</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Centro de entrenamiento') }}" id="centro" type="text" value="{{ $centro->nombre }}" readonly style="background-color: white;">
                                            <label for="centro">Centro de entrenamiento</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Modalidad') }}" id="modalidad" type="text" value="{{ $modalidad->nombre }}" readonly style="background-color: white;">
                                            <label for="modalidad">Modalidad</label>
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











