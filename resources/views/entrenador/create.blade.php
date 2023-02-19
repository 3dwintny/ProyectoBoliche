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
                            <h2> Registrar nuevo entrenador </h2>
                        </strong>

                    </div>
                <form method="post" role="form" enctype="multipart/form-data" action="{{route('entrenadores.store')}}">
                    @csrf
                    <div class="form-group">
                        <div>Fecha <input type="text" class=" container form-control text-center" name="fecha_registro" id="fecha_sistema" value="{{Carbon\Carbon::parse($hoy)->format('Y-m-d')}}" readonly>
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
                                        <input type="tel" name="celular"  id="celular" class="form-control text-dark" aria-describedby="basic-addon2" value="{{ old('Celular') }}" placeholder="{{ __('Celular') }}" pattern="[0-9]{4}[-][0-9]{4}" title="FORMATOS ACEPTADOS 0000-0000 o 0000 0000">
                                        <label for="celular">Celular</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-floating">
                                        <input type="tel" name="telefono_casa"  id="telefono_casa" class="form-control text-dark" aria-describedby="basic-addon2" value="{{ old('Teléfono de casa') }}" placeholder="{{ __('Teléfono de casa') }}" pattern="[0-9]{4}[-][0-9]{4}" title="FORMATOS ACEPTADOS 0000-0000 o 0000 0000">
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
                                        <label for="correo">Correo electrónico</label>
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
                                <div class="col-md-6 mb-2">
                                    <div class="form-floating">
                                        <select class="form-control text-dark" name="genero" id="genero" required>
                                            <option value="" selected></option>
                                            <option>Femenino</option>
                                            <option>Masculino</option>
                                        </select>
                                        <label for="genero">Género</label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <div class="form-floating">
                                        <select name="estado_civil" id="estado_civil" class="form-control text-dark" required>
                                            <option selected value=""></option>
                                            <option value="Soltera/o">Soltera/o</option>
                                            <option value="Casada/o">Casada/o</option>
                                            <option value="Unión Libre">Unión Libre</option>
                                            <option value="Unión de Hecho">Unión de Hecho</option>
                                            <option value="Separada/o">Separada/o</option>
                                            <option value="Divorciada/o">Divorciada/o</option>
                                            <option value="Viuda/o">Viuda/o</option>
                                        </select>
                                        <label for="estado_civil">Estado Civil</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-12 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Dirección') }}" id="direccion" type="text" name="direccion" value="{{ old('Dirección') }}">
                                        <label for="direccion">Dirección</label>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <select name="escolaridad" id="escolaridad" class="form-control text-dark" required>
                                            <option selected value=""></option>
                                            <option value="Primaria">Primaria</option>
                                            <option value="Básico">Básico</option>
                                            <option value="Diversificado">Diversificado</option>
                                            <option value="Licenciatura">Licenciatura</option>
                                            <option value="Maestría">Maestría</option>
                                            <option value="Doctorado">Doctorado</option>
                                        </select>
                                        <label for="escolaridad">Nivel académico</label>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <select class="form-control text-dark" name="nivel_cdag_id" id="nivel_cdag_id" required>
                                            <option selected value=""></option>
                                            @foreach ($niveles_cdag as $item)
                                                <option value="{{$item->id}}">{{$item->nombre}}</option>
                                            @endforeach
                                        </select>
                                        <label for="nivel_cdag_id">Nivel CDAG</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <select name="nivel_fadn_id" class="form-control text-dark" id="nivel_fadn_id" required>
                                            <option selected value=""></option>
                                            @foreach ($niveles_fadn as $item)
                                                <option value="{{$item->id}}">{{$item->tipo}}</option>
                                            @endforeach
                                        </select>
                                        <label for="nivel_fadn_id">Nivel FADN</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <select name="departamento_id" class="form-control text-dark" id="departamento_id" required>
                                            @foreach ($departamentos as $item)
                                                <option value="{{$item->id}}" {{$item->nombre == "Quetzaltenango" ? 'selected' : ''}}>{{$item->nombre}}</option>
                                            @endforeach
                                        </select>
                                        <label for="departamento_id">Departamento</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <select name="deporte_id" class="form-control text-dark" id="deporte_id" required>
                                            @foreach ($deportes as $item)
                                            <option value="{{$item->id}}" {{$item->nombre == "Boliche" ? 'selected' : ''}}>{{$item->nombre}}</option>
                                            @endforeach
                                        </select>
                                        <label for="estado_civil">Estado Civil</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <select name="tipo_contrato_id" class="form-control text-dark" id="tipo_contrato_id" required>
                                            <option selected value=""></option>
                                            @foreach ($tipos_contratos as $item)
                                            <option value="{{$item->id}}">{{$item->descripcion}}</option>
                                            @endforeach
                                        </select>
                                        <label for="tipo_contrato_id">Tipo de contrato</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <div class="form-floating">
                                        <select name="nacionalidad_id" class="form-control text-dark" id="nacionalidad_id" required>
                                            <option selected value=""></option>
                                                @foreach ($nacionalidades as $item)
                                                <option value="{{$item->id}}" {{$item->descripcion == "Guatemalteca(o)" ? 'selected' : ''}}>{{$item->descripcion}}</option>
                                                @endforeach
                                        </select>
                                        <label for="nacionalidad_id">Nacionalidad</label>
                                    </div>
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
    let contadorCuatro = 0;
    let contadorCinco = 0;
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
        $('#cui').on('keydown',function(){
            var obtenerCui = document.getElementById('cui');
            var codigo = event.which || event.keyCode;
            console.log(codigo);
            if(obtenerCui.value.length <=14){
                if(codigo >=96 && codigo <= 105 || codigo >=48 && codigo <= 57){
                    if(obtenerCui.value.length<=4){
                        contadorCuatro++;
                    }
                    if(obtenerCui.value.length>5 && obtenerCui.value.length<=10){
                        contadorCinco++;
                    }
                }
                else if(codigo == 8){
                    if(contadorCuatro > 0 && contadorCuatro < 5){
                        contadorCuatro--;
                    }
                    if(contadorCinco > 0 && contadorCinco < 5){
                        contadorCinco--;
                    }
                }
                if(obtenerCui.value.length==4 && contadorCuatro==5){
                    document.getElementById('cui').value = document.getElementById('cui').value+"-";
                    if(contadorCuatro==5){
                        contadorCuatro = 0;
                    }
                }
                if(obtenerCui.value.length==10 && contadorCinco==5){
                    document.getElementById('cui').value = document.getElementById('cui').value+"-";
                    if(contadorCinco==5)
                    {
                        contadorCinco = 0;
                    }
                }
            }
            else{
                document.getElementById('cui').readOnly = true;
            }

            if(codigo == 8 && document.getElementById('cui').readOnly == true){
                document.getElementById('cui').readOnly = false;
            }
        });
    });
</script>
@endsection
