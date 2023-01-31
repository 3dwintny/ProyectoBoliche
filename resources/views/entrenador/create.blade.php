@extends('layouts.app')

@section('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!--div class="body pb-8 pt-5 pt-lg-1 d-flex align-items-center" style="background-image: url(../argon/img/theme/bol.jpg); background-size: cover; background-position: center top;"!-->
<div class="header bg-dark pb-7 pt-5 pt-md-6">
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
                            <h2> Registrar Nuevo Entrenador </h2>
                        </strong>

                    </div>
                <form method="post" role="form" enctype="multipart/form-data" action="{{route('entrenadores.store')}}">
                    @csrf
                    <div class="form-group">
                        <div>Fecha <input type="text" class=" container form-control text-center" name="fecha_registro" id="fecha_sistema" readonly>
                    </div>
                    <div class="card">
                        <div class="card-body bg-light">
                            <h3 class="mb-2">Información Personal</h3>
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Primer Nombre') }}" id="nombre1" type="text" name="nombre1" value="{{ old('Primer Nombre') }}" required>
                                        <label for="nombre1">Primer Nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Segundo Nombre') }}" id="nombre2" type="text" name="nombre2" value="{{ old('Segundo Nombre') }}">
                                        <label for="nombre2">Segundo Nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Tercer Nombre') }}" id="nombre3" type="text" name="nombre3" value="{{ old('Tercer Nombre') }}">
                                        <label for="nombre3">Tercer Nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Primer Apellido') }}" id="apellido1" type="text" name="apellido1" value="{{ old('Primer Apellido') }}" required>
                                        <label for="apellido1">Primer Apellido</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Segundo Apellido') }}" id="apellido2" type="text" name="apellido2" value="{{ old('Segundo Apellido') }}">
                                        <label for="apellido2">Segundo Apellido</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Apellido de Casada') }}" id="apellido_casada" type="text" name="apellido_casada" value="{{ old('Apellido de Casada') }}">
                                        <label for="apellido_casada">Apellido de Casada</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Celular') }}" id="celular" type="tel" name="celular" value="{{ old('Celular') }}">
                                        <label for="celular">Celular</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Teléfono de Casa') }}" id="telefono_casa" type="tel" name="telefono_casa" value="{{ old('Teléfono de Casa') }}">
                                        <label for="telefono_casa">Teléfono de Casa</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('CUI') }}" id="cui" type="text" name="cui" value="{{ old('CUI') }}">
                                        <label for="cui">CUI</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Pasaporte') }}" id="pasaporte" type="text" name="pasaporte" value="{{ old('Pasaporte') }}">
                                        <label for="celular">Pasaporte</label>
                                    </div>
                                </div>



                                <div class="col-md-6 mb-2">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Fecha Nacimiento</span>
                                        <input class="form-control text-dark" type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Edad</span>
                                        <input class="form-control text-dark" type="text" name="edad" aria-label="edad" id="_edad" value="" aria-describedby="basic-addon1" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Correo') }}" id="correo" type="email" name="correo" value="{{ old('Correo') }}">
                                        <label for="correo">Correo</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Años de Experiencia') }}" id="años_experiencia" type="number" name="años_experiencia" value="{{ old('Años de Experiencia') }}">
                                        <label for="celular">Años de Experiencia</label>
                                    </div>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Fotografía</span>
                                        <input class="form-control text-dark" type="file" name="foto" id="foto" accept=".jpg, .jpeg, .png" required>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('NIT') }}" id="nit" type="text" name="nit" value="{{ old('nit') }}">
                                        <label for="nit">NIT</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2"><select class="form-control text-dark" name="genero">
                                        <option selected disabled>Género</option>
                                        <option>Femenino</option>
                                        <option>Masculino</option>
                                    </select></div>

                                <div class="col-md-6 mb-2">
                                    <select name="estado_civil" class="form-control text-dark" required>
                                        <option selected disabled>Estado Civil</option>
                                        <option value="Soltera/o">Soltera/o</option>
                                        <option value="Casada/o">Casada/o</option>
                                        <option value="Unión Libre">Unión Libre</option>
                                        <option value="Unión de Hecho">Unión de Hecho</option>
                                        <option value="Separada/o">Separada/o</option>
                                        <option value="Divorciada/o">Divorciada/o</option>
                                        <option value="Viuda/o">Viuda/o</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-12 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Dirección') }}" id="direccion" type="text" name="direccion" value="{{ old('Dirección') }}">
                                        <label for="direccion">Dirección</label>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-2"><select name="escolaridad" class="form-control text-dark" required>
                                        <option selected disabled>Nivel Académico</option>
                                        <option value="Primaria">Primaria</option>
                                        <option value="Básico">Básico</option>
                                        <option value="Diversificado">Diversificado</option>
                                        <option value="Licenciatura">Licenciatura</option>
                                        <option value="Maestría">Maestría</option>
                                        <option value="Doctorado">Doctorado</option>
                                    </select></div>

                                <div class="col-md-4 mb-2"><select class="form-control text-dark" name="nivel_cdag_id" required>
                                        <option selected disabled>Nivel CDAG</option>
                                        @foreach ($niveles_cdag as $item)
                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                        @endforeach
                                    </select></div>
                                <div class="col-md-4 mb-2"><select name="nivel_fadn_id" class="form-control text-dark" required>
                                        <option selected disabled>Nivel FADN</option>
                                        @foreach ($niveles_fadn as $item)
                                        <option value="{{$item->id}}">{{$item->tipo}}</option>
                                        @endforeach
                                    </select></div>
                                <div class="col-md-4 mb-2"><select name="departamento_id" class="form-control text-dark" required>
                                        <option selected disabled>Departamento</option>
                                        @foreach ($departamentos as $item)
                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                        @endforeach
                                    </select></div>
                                <div class="col-md-4 mb-2"><select name="deporte_id" class="form-control text-dark" required>
                                        <option selected disabled>Deporte</option>
                                        @foreach ($deportes as $item)
                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                        @endforeach
                                    </select></div>
                                <div class="col-md-4 mb-2"><select name="tipo_contrato_id" class="form-control text-dark" required>
                                        <option selected disabled>Tipo de Contrato</option>
                                        @foreach ($tipos_contratos as $item)
                                        <option value="{{$item->id}}">{{$item->descripcion}}</option>
                                        @endforeach
                                    </select></div>
                                <div class="col-md-12 mb-2">
                                    <select name="nacionalidad_id" class="form-control text-dark" required>
                                        <option selected disabled>Nacionalidad</option>
                                        @foreach ($nacionalidades as $item)
                                        <option value="{{$item->id}}">{{$item->descripcion}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="container">
                                <div class="col-md-4 mb-10 center"><button type="submit" class="btn btn-outline-primary">Registrar</button></div>
                            </div>
                </form>


            </div>
        </div>
    </div>
</div>

</div>




</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#fecha_nacimiento').on('change', function() {
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
            document.getElementById('_edad').value = calcularEdad(document.getElementById('fecha_nacimiento').value);
        });
    });
    date = new Date();
    year = date.getFullYear();
    month = date.getMonth() + 1;
    day = date.getDate();
    document.getElementById("fecha_sistema").value = year + "/" + month + "/" + day;
</script>
@endsection
