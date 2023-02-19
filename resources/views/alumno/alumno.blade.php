@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<div class="header bg-gradient-white py-4 py-lg-8">
    <div class="body pb-8 pt-5 pt-lg-1 d-flex align-items-center">
        <!--div class="body pb-8 pt-5 pt-lg-1 d-flex align-items-center" style="background-image: url(../argon/img/theme/bol.jpg); background-size: cover; background-position: center top;"!-->
        <div class="container-fluid">
            <div class="header-body text-center mt-2 mb-2">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-8">
                        <div class="card">
                            <div class="card-header text-bold ">
                                <strong>
                                    <h1> Formulario de inscripción</h1>
                                </strong>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped active" style="background-color: primary ;" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body bg-light">
                                @foreach($formularios as $item)
                                <label>
                                    {{$item->titulo_principal}} {{$anio}}
                                </label>
                                <br>
                                <label>{{$item->subtitulo}}</label>
                                <br>
                                <label>{{$item->titulo_ficha}}</label>
                                @endforeach
                                <!-- <input type="text" class="form-control text-center" name="fecha_registro" id="fecha_sistema" readonly> -->
                            </div>
                        </div>

                        <form action="{{ route('alumnos.store') }}" id="register_form" method="POST" role="form" enctype="multipart/form-data">
                            @csrf
                            <fieldset class="card-body bg-light">
                                <div class="form-group">
                                    <div class="card">
                                        <div class="card-body bg-light">
                                            <h2 class="mb-2">Información personal</h2>
                                            <div class="row">
                                                <!-- Esto es para tener el formulario Ordenado -->
                                                <div class="col-md-4 mb-2">
                                                    <!-- Para segir viendo el nombre del placeholder -->
                                                    <div class="form-floating">
                                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Primer nombre') }}" id="formIns" type="text" name="nombre1" value="{{ old('Primer nombre') }}" required>
                                                        <!-- Esto es lo que aparece como placeholder, en el fomulario -->
                                                        <label for="formIns">Primer nombre</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-floating">
                                                        <input class="form-control text-dark" id="formIns" placeholder="{{ __('Segundo nombre') }}" type="text" name="nombre2" value="{{ old('Segundo nombre') }}">
                                                        <label for="formIns">Segundo nombre</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-floating">
                                                        <input class="form-control text-dark" id="formIns" placeholder="{{ __('Tercer nombre') }}" type="text" name="nombre3" value="{{ old('Tercer nombre') }}">
                                                        <label for="formIns">Tercer nombre</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <div class="form-floating">
                                                        <input class="form-control text-dark" id="formIns" type="text" name="apellido1" placeholder="Primer apellido">
                                                        <label for="formIns">Primer apellido</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <div class="form-floating">
                                                        <input class="form-control text-dark" id="formIns" type="text" name="apellido2" placeholder="Segundo apellido">
                                                        <label for="formIns">Segundo apellido</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <div class="form-floating">
                                                        <input class="form-control text-dark" id="formIns" type="number" name="cui" placeholder="CUI">
                                                        <label for="formIns">CUI</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-2">
                                                    <div class="input-group mb-2">
                                                        <span class="input-group-text" id="inputGroup-sizing-sm">Fecha de nacimiento</span>
                                                        <input class="form-control text-dark" type="date" name="fecha" id="fecha">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <div class="input-group mb-2">
                                                        <span class="input-group-text" id="inputGroup-sizing-sm">Edad</span>
                                                        <input class="form-control text-dark" type="text" name="edad" aria-label="edad" id="_edad" value="" aria-describedby="basic-addon1" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-floating">
                                                        <input class="form-control text-dark" id="formIns" type="number" name="peso" placeholder="Peso">
                                                        <label for="formIns">Peso (libras)</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-floating">
                                                        <input class="form-control text-dark" id="formIns" type="number" name="altura" placeholder="Altura">
                                                        <label for="formIns">Altura (metros)</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2"><select class="form-control text-dark" id="formIns" name="genero">
                                                        <option selected disabled>Género</option>
                                                        <option>Femenino</option>
                                                        <option>Masculino</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <div class="form-floating">
                                                        <input class="form-control text-dark" id="formIns" type="text" name="direccion" placeholder="Dirección">
                                                        <label for="formIns">Dirección</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-floating">
                                                        <input class="form-control text-dark" id="formIns" type="tel" name="telefono_casa" placeholder="Teléfono residencial">
                                                        <label for="formIns">Teléfono residencial</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-floating">
                                                        <input class="form-control text-dark" id="formIns" type="tel" name="celular" placeholder="Celular">
                                                        <label for="formIns">Celular</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-floating">
                                                        <input class="form-control text-dark" id="formIns" type="tel" name="contacto_emergencia" placeholder="Contacto de emergencia">
                                                        <label for="formIns">Contacto de emergencia</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <div class="form-floating">
                                                        <input class="form-control text-dark" id="formIns" type="email" name="correo" placeholder="Correo electrónico">
                                                        <label for="formIns">Correo electrónico</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="ft">Seleccionar fotografía:</label>
                                                    <input class="form-control text-dark" id="ft" type="file" name="foto" accept=".jpg,.png,.jpeg">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control text-dark" placeholder="Fecha Fotografia" name="fecha_fotografia" id="fecha_sistema" readonly>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-floating">
                                                        <input class="form-control text-dark" id="formIns" type="text" name="nit" placeholder="NIT">
                                                        <label for="formIns">NIT</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-floating">
                                                        <input class="form-control text-dark" id="formIns" type="number" name="pasaporte" placeholder="Pasaporte">
                                                        <label for="formIns">Pasaporte</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2"><select class="form-control text-dark" name="alergia_id" id="formIns">
                                                        <div class="col-md-4 mb-2">
                                                            <option selected disabled>Alergia</option>
                                                            @foreach ($alergia as $item)
                                                            <option value="{{$item->id}}">{{$item->nombre}}
                                                            </option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <select class="form-control text-dark" name="nacionalidad_id">
                                                        <div class="col-md-4 mb-2">
                                                            <option selected disabled>Nacionalidad</option>
                                                            @foreach ($nacionalidades as $item)
                                                            <option value="{{$item->id}}">{{$item->descripcion}}
                                                            </option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                                <label class="col-md-12 mb-2">Lugar de nacimiento</label>
                                                <div class="col-md-6 mb-2"><select class="form-control" name="departamento_id" id="_departamento">
                                                        <option selected disabled>Departamento</option>
                                                        @foreach ($departamentos as $item)
                                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-2"><select class="form-control" name="municipio_id" id="_municipio"></select>
                                                </div>
                                                <label class="col-md-12 mb-2">Lugar de residencia</label>
                                                <div class="col-md-6 mb-2"><select class="form-control" name="departamento_residencia_id" id="_departamentoR">
                                                        <option selected disabled>Departamento</option>
                                                        @foreach ($departamentos as $item)
                                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-2"><select class="form-control" name="municipio_residencia_id" id="_municipioR" required></select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="button" class="next-form btn btn-outline-primary" value="Siguiente" />
                            </fieldset>
                            <fieldset class="card-body bg-light">
                                <div class="form-group">
                                    <div class="card">
                                        <div class="card-body bg-light">
                                            <div class="row">
                                                <div class="col-md-11"><h2>Información de encargados</h2></div>
                                                <div class="col-md-1"><input type="button" id="agregarEncargado" name="submit" class="submit btn btn-outline-warning" value="+"   data-toggle="tooltip" data-original-title="Agregar Encargado"/></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 mb-2">
                                                    <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Primer nombre') }}" type="text" name="nombre1p[]" value="{{ old('Primer nombre') }}" required>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <input class="form-control text-dark" placeholder="{{ __('Segundo nombre') }}" type="text" name="nombre2p" value="{{ old('Segundo nombre') }}">
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <input class="form-control text-dark" placeholder="{{ __('Tercer nombre') }}" type="text" name="nombre3p" value="{{ old('Tercer nombre') }}">
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <input class="form-control text-dark" type="text" name="apellido1p" placeholder="Primer apellido" required>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <input class="form-control text-dark" type="text" name="apellido2p" placeholder="Segundo apellido">
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <input class="form-control" type="text" name="apellido_casada" placeholder="Apellido de casada">
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <input class="form-control" type="text" name="direccionp" placeholder="Direccion" required>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <input class="form-control" type="text" name="celularp" placeholder="Celular" required>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <input class="form-control" type="text" name="telefono_casap" placeholder="Teléfono residencial">
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <input class="form-control" type="text" name="correop" placeholder="Correo electrónico">
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <input class="form-control" type="text" name="dpi" placeholder="DPI" required>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <select class="form-control" name="parentezco_id" required>
                                                        <option selected disabled>Parentesco</option>
                                                        @foreach ($parentezcos as $item)
                                                        <option value="{{$item->id}}">{{$item->tipo}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 mb-2">
                                                    <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Primer nombre') }}" type="text" name="nombre1p[]" id="nombre1p[]" value="{{ old('Primer nombre') }}" style="visibility:hidden;">
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <input class="form-control text-dark" placeholder="{{ __('Segundo nombre') }}" type="text" name="nombre2p" value="{{ old('Segundo nombre') }}">
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <input class="form-control text-dark" placeholder="{{ __('Tercer nombre') }}" type="text" name="nombre3p" value="{{ old('Tercer nombre') }}">
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <input class="form-control text-dark" type="text" name="apellido1p" placeholder="Primer apellido" required>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <input class="form-control text-dark" type="text" name="apellido2p" placeholder="Segundo apellido">
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <input class="form-control" type="text" name="apellido_casada" placeholder="Apellido de casada">
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <input class="form-control" type="text" name="direccionp" placeholder="Direccion" required>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <input class="form-control" type="text" name="celularp" placeholder="Celular" required>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <input class="form-control" type="text" name="telefono_casap" placeholder="Teléfono residencial">
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <input class="form-control" type="text" name="correop" placeholder="Correo electrónico">
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <input class="form-control" type="text" name="dpi" placeholder="DPI" required>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <select class="form-control" name="parentezco_id" required>
                                                        <option selected disabled>Parentesco</option>
                                                        @foreach ($parentezcos as $item)
                                                        <option value="{{$item->id}}">{{$item->tipo}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-md-8 mb-3">
                                            <div class="card">
                                                <div class="card-body text-justify bg-light">
                                                    @foreach($formularios as $item)
                                                    {{$item->declaracion}}
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="button" name="previous" class="previous-form btn btn-outline-warning" value="Atras" />
                                <input type="submit" name="submit" class="submit btn btn-outline-success" value="Registrar Información" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
</div>


<style type="text/css">
    #register_form fieldset:not(:first-of-type) {
        display: none;
    }
</style>

<script>
    $(document).ready(function() {
        var form_count = 1,
            previous_form, next_form, total_forms;
        total_forms = $("fieldset").length;
        $(".next-form").click(function() {
            previous_form = $(this).parent();
            next_form = $(this).parent().next();
            next_form.show();
            previous_form.hide();
            setProgressBarValue(++form_count);
        });
        $(".previous-form").click(function() {
            previous_form = $(this).parent();
            next_form = $(this).parent().prev();
            next_form.show();
            previous_form.hide();
            setProgressBarValue(--form_count);
        });
        setProgressBarValue(form_count);

        function setProgressBarValue(value) {
            var percent = parseFloat(100 / total_forms) * value;
            percent = percent.toFixed();
            $(".progress-bar")
                .css("width", percent + "%")
                .html(percent + "%");
        }
        // Handle form submit and validation
        $("#register_form").submit(function(event) {
            var error_message = '';
            // Display error if any else submit form
            if (error_message) {
                $('.alert-success').removeClass('hide').html(error_message);
                return false;
            } else {
                return true;
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#fecha').on('change', function() {
            function calcularEdad(fechas) {
                var hoy = new Date();
                var cumpleanos = new Date(fechas);
                var edad = hoy.getFullYear() - cumpleanos.getFullYear();
                var m = hoy.getMonth() - cumpleanos.getMonth();
                if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                    edad--;
                }
                return edad;
            }
            document.getElementById('_edad').value = calcularEdad(document.getElementById('fecha').value);
        });
    });
    $(document).ready(function() {
        $('#_departamento').on('change', function() {
            var dptoId = this.value;
            $('#_municipio').html('');
            $.ajax({
                url: '{{ route("municipios") }}?departamento_id=' + dptoId,
                type: 'get',
                success: function(res) {
                    $('#_municipio').html('<option value="">Municipio</option>');
                    $.each(res, function(key, value) {
                        $('#_municipio').append('<option value="' + value.id +
                            '">' + value.nombre + '</option>');
                    });
                }
            });
        });
    });
    $(document).ready(function() {
        $('#_departamentoR').on('change', function() {
            var dptoId = this.value;
            $('#_municipioR').html('');
            $.ajax({
                url: '{{ route("municipios") }}?departamento_id=' + dptoId,
                type: 'get',
                success: function(res) {
                    $('#_municipioR').html('<option value="">Municipio</option>');
                    $.each(res, function(key, value) {
                        $('#_municipioR').append('<option value="' + value.id +
                            '">' + value.nombre + '</option>');
                    });
                }
            });
        });
    });
    $(document).ready(function() {
        $('#agregarEncargado').on('click', function() {
            if(document.getElementById('nombre1p[]').style.visibility == 'hidden'){
                document.getElementById('nombre1p[]').style.visibility = 'visible';
                document.getElementById('nombre1p[]').required = true;
            }
            else{
                document.getElementById('nombre1p[]').style.visibility = 'hidden';
                document.getElementById('nombre1p[]').required = false;
            }
        });
    });
    date = new Date();
    year = date.getFullYear();
    month = date.getMonth() + 1;
    day = date.getDate();
    document.getElementById("fecha_sistema").value = year + "/" + month + "/" + day;
</script>
@endsection