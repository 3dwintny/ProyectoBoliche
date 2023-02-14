@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-2 pt-5 pt-md-10">
    <div class="container-fluid">
      <div class="header-body">
        <!-- Card stats -->
        <div class="row">
          <div class="col-xl-6 col-lg-6">
            <h1 class="text-white">Entrenadores</h1>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="header-body text-center  mb-7">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8">
                <div class="card">
                    <div class="card-header text-bold ">
                        <strong>
                            <h3>Información del entrenador</h3>
                        </strong>
                    </div>
                </div>
                    <div class="form-group">
                        <div class="card">
                            <div class="card-body bg-light">
                            <div class="col-12 mb-2"><img src="" class="img-thumbnail" alt="50" height="50" width="50"></div>
                                <h5 class="mb-2">Información personal</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Fecha de nacimiento</span>
                                            <input type="text" class=" container form-control text-center" value="" readonly style="background-color: white;">
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Edad') }}" id="edad" type="text" value="" readonly style="background-color: white;">
                                            <label for="edad">Edad</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Peso') }}" id="peso" type="text" value="" readonly style="background-color: white;">
                                            <label for="peso">Peso</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Altura') }}" id="altura" type="text" value="" readonly style="background-color: white;">
                                            <label for="altura">Altura</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('CUI') }}" id="cui" type="text" value="" readonly style="background-color: white;">
                                            <label for="nombre1">CUI</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('NIT') }}" id="nit" type="text" value="" readonly style="background-color: white;">
                                            <label for="nit">NIT</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Pasaporte') }}" id="pasaporte" type="text" value="" readonly style="background-color: white;">
                                            <label for="pasaporte">Pasaporte</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Celular') }}" id="celular" type="text" value="" readonly style="background-color: white;">
                                            <label for="celular">Celular</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Correo') }}" id="correo" type="text" value="" readonly style="background-color: white;">
                                            <label for="correo">Correo</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Teléfono de casa') }}" id="telCasa" type="text" value="" readonly style="background-color: white;">
                                            <label for="telCasa">Teléfono de casa</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Dirección') }}" id="telCasa" type="text" value="" readonly style="background-color: white;">
                                            <label for="direccion">Dirección</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Depto. de residencia') }}" id="deptoResidencia" type="text" value="" readonly style="background-color: white;">
                                            <label for="deptoResidencia">Depto. de residencia</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Municipio de residencia') }}" id="munResidencia" type="text" value="" readonly style="background-color: white;">
                                            <label for="munResidencia">Municipio de residencia</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Nacionalidad') }}" id="nacionalidad" type="text" value="" readonly style="background-color: white;">
                                            <label for="nacionalidad">Nacionalidad</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Género') }}" id="genero" type="text" value="" readonly style="background-color: white;">
                                            <label for="genero">Género</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Estado Civil') }}" id="civil" type="text" value="" readonly style="background-color: white;">
                                            <label for="civil">Estado Civil</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Etnia') }}" id="etnia" type="text" value="" readonly style="background-color: white;">
                                            <label for="etnia">Etnia</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Escolaridad') }}" id="escolaridad" type="text" value="" readonly style="background-color: white;">
                                            <label for="escolaridad">Escolaridad</label>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="mb-2">Información deportiva</h5>
                                <div class="row">
                                    <div class="col-md-3 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Años') }}" id="fechaIngreso" type="text" value="" readonly style="background-color: white;">
                                            <label for="fechaIngreso">Ingreso</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Años') }}" id="anios" type="text" value="" readonly style="background-color: white;">
                                            <label for="anios">Años de exp.</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Meses') }}" id="meses" type="text" value="" readonly style="background-color: white;">
                                            <label for="meses">Meses de exp.</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Federado') }}" id="federado" type="text" value="" readonly style="background-color: white;">
                                            <label for="federado">Federado</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Adaptado') }}" id="adaptado" type="text" value="" readonly style="background-color: white;">
                                            <label for="adaptado">Adaptado</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Deporte Adaptado') }}" id="deporteAdaptado" type="text" value="" readonly style="background-color: white;">
                                            <label for="deporteAdaptado">Deporte Adaptado</label>
                                        </div>
                                    </div>
                                    <div class="col-md-5 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Otro Programa de Atención') }}" id="otro" type="text" value="" readonly style="background-color: white;">
                                            <label for="otro">Otro Programa de Atención</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Categoria') }}" id="categoria" type="text" value="" readonly style="background-color: white;">
                                            <label for="categoria">Categoria</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Etapa Deportiva') }}" id="etapa_deportiva" type="text" value="" readonly style="background-color: white;">
                                            <label for="etapa_deportiva">Etapa Deportiva</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('PRT') }}" id="prt" type="text" value="" readonly style="background-color: white;">
                                            <label for="prt">PRT</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Línea de desarrollo ') }}" id="prt" type="text" value="" readonly style="background-color: white;">
                                            <label for="prt">Línea de desarrollo</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Entrenador') }}" id="entrenador" type="text" value="" readonly style="background-color: white;">
                                            <label for="entrenador">Entrenador</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Centro de entrenamiento') }}" id="centro" type="text" value="" readonly style="background-color: white;">
                                            <label for="centro">Centro de entrenamiento</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Modalidad') }}" id="modalidad" type="text" value="" readonly style="background-color: white;">
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











