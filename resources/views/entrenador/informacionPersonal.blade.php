@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-10 col-sm-6">
                    <h1 class="text-white">Entrenadores</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pt-2">
    <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
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
            <div class="col-xl-8 col-lg-9 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header text-bold ">
                        <strong>
                            <h2>Editar</h2>
                        </strong>
                    </div>
                    @can('Perfil de entrenador')
                    <form method="post" role="form" enctype="multipart/form-data" action="{{route('actualizar')}}">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <div>Fecha <input type="text" class=" container form-control text-center" name="fecha_registro" id="fecha_sistema" value="{{$entrenador->fecha_registro}}" readonly>
                        </div>
                        <div class="card">
                            <div class="card-body bg-light">
                                <h3 class="mb-2">Información personal</h3>
                                <div class="col-12 mb-2">
                                    <img src="{{ asset('uploads/alumnos/'.$entrenador->foto) }}" class="img-thumbnail" alt="50" height="50" width="50">
                                    <input type="hidden" name="pic" value="{{$entrenador->foto}}">
                                </div>
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Primer nombre') }}" id="nombre1" type="text" name="nombre1" value="{{$entrenador->nombre1}}" required>
                                            <label for="nombre1">Primer nombre</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Segundo nombre') }}" id="nombre2" type="text" name="nombre2" value="{{$entrenador->nombre2}}">
                                            <label for="nombre2">Segundo nombre</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Tercer nombre') }}" id="nombre3" type="text" name="nombre3" value="{{$entrenador->nombre3}}">
                                            <label for="nombre3">Tercer nombre</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Primer apellido') }}" id="apellido1" type="text" name="apellido1" value="{{$entrenador->apellido1}}" required>
                                            <label for="apellido1">Primer apellido</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Segundo apellido') }}" id="apellido2" type="text" name="apellido2" value="{{$entrenador->apellido2}}">
                                            <label for="apellido2">Segundo apellido</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Apellido de casada') }}" id="apellido_casada" type="text" name="apellido_casada" value="{{$entrenador->apellido_casada}}">
                                            <label for="apellido_casada">Apellido de casada</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-2">
                                        <div class="form-floating">
                                            <input type="tel" name="celular"  id="celular" class="form-control text-dark" aria-describedby="basic-addon2" value="{{$entrenador->celular}}" placeholder="{{ __('Celular') }}" pattern="[0-9]{4}[-][0-9]{4}" title="FORMATOS ACEPTADOS 0000-0000 o 0000 0000">
                                            <label for="celular">Celular</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-2">
                                        <div class="form-floating">
                                            <input type="tel" name="telefono_casa"  id="telefono_casa" class="form-control text-dark" aria-describedby="basic-addon2" value="{{$entrenador->telefono_casa}}" placeholder="{{ __('Teléfono de casa') }}" pattern="[0-9]{4}[-][0-9]{4}" title="FORMATOS ACEPTADOS 0000-0000 o 0000 0000">
                                            <label for="telefono_casa">Teléfono de casa</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('CUI') }}" id="cui" type="text" name="cui" value="{{$entrenador->cui}}">
                                            <label for="cui">CUI</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Pasaporte') }}" id="pasaporte" type="text" name="pasaporte" value="{{$entrenador->pasaporte}}">
                                            <label for="pasaporte">Pasaporte</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('NIT') }}" id="nit" type="text" name="nit" value="{{$entrenador->nit}}">
                                            <label for="nit">NIT</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-5 col-sm-6 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Fecha nacimiento') }}" id="fecha_nacimiento" type="date" name="fecha_nacimiento" value="{{$entrenador->fecha_nacimiento}}" required>
                                            <label for="fecha_nacimiento">Fecha nacimiento</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Edad') }}" id="_edad" type="text" name="edad" value="{{$entrenador->edad}}" readonly required>
                                            <label for="_edad">Edad</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-3 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Años de Experiencia') }}" id="años_experiencia" type="number" name="años_experiencia" value="{{$entrenador->años_experiencia}}">
                                            <label for="celular">Años de exp.</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6 mb-2">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Fotografía</span>
                                            <input class="form-control text-dark" type="file" name="foto" id="foto" accept=".jpg, .jpeg, .png">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Correo') }}" id="correo" type="email" name="correo" value="{{$entrenador->correo}}">
                                            <label for="correo">Correo electrónico</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-2">
                                        <div class="form-floating">
                                            <select class="form-control text-dark" name="genero" id="genero" required>
                                                <option value="" selected></option>
                                                    <option {{$entrenador->genero == "Femenino" ? 'selected':''}}>Femenino</option>
                                                    <option {{$entrenador->genero == "Masculino" ? 'selected':''}}>Masculino</option>
                                            </select>
                                            <label for="genero">Género</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-2">
                                        <div class="form-floating">
                                            <select name="estado_civil" id="estado_civil" class="form-control text-dark" required>
                                                <option value="Soltera/o" {{$entrenador->estado_civil == "Soltera/o" ? 'selected':''}}>Soltera/o</option>
                                                <option value="Casada/o" {{$entrenador->estado_civil == "Casada/o" ? 'selected':''}}>Casada/o</option>
                                                <option value="Unión Libre" {{$entrenador->estado_civil == "Unión Libre" ? 'selected':''}}>Unión Libre</option>
                                                <option value="Unión de Hecho" {{$entrenador->estado_civil == "Unión de Hecho" ? 'selected':''}}>Unión de Hecho</option>
                                                <option value="Separada/o" {{$entrenador->estado_civil == "Separada/o" ? 'selected':''}}>Separada/o</option>
                                                <option value="Divorciada/o" {{$entrenador->estado_civil == "Divorciada/o" ? 'selected':''}}>Divorciada/o</option>
                                                <option value="Viuda/o" {{$entrenador->estado_civil == "Viuda/o" ? 'selected':''}}>Viuda/o</option>
                                            </select>
                                            <label for="estado_civil">Estado civil</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Dirección') }}" id="direccion" type="text" name="direccion" value="{{$entrenador->direccion}}">
                                            <label for="direccion">Dirección</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
                                        <div class="form-floating">
                                            <select name="escolaridad" id="escolaridad" class="form-control text-dark" required>
                                                <option value="Primaria" {{$entrenador->escolaridad == "Primaria" ? 'selected':''}}>Primaria</option>
                                                <option value="Básico" {{$entrenador->escolaridad == "Básico" ? 'selected':''}}>Básico</option>
                                                <option value="Diversificado" {{$entrenador->escolaridad == "Diversificado" ? 'selected':''}}>Diversificado</option>
                                                <option value="Licenciatura" {{$entrenador->escolaridad == "Licenciatura" ? 'selected':''}}>Licenciatura</option>
                                                <option value="Maestría" {{$entrenador->escolaridad == "Maestría" ? 'selected':''}}>Maestría</option>
                                                <option value="Doctorado" {{$entrenador->escolaridad == "Doctorado" ? 'selected':''}}>Doctorado</option>
                                            </select>
                                            <label for="escolaridad">Nivel académico</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
                                        <div class="form-floating">
                                            <select class="form-control text-dark" name="nivel_cdag_id" id="nivel_cdag_id" readonly required>
                                                @foreach ($niveles_cdag as $item)
                                                    <option value="{{encrypt($item->id)}}" {{$item->id == $entrenador->nivel_cdag_id ? 'selected':''}}>{{$item->nombre}}</option>
                                                @endforeach
                                            </select>
                                            <label for="nivel_cdag_id">Nivel CDAG</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
                                        <div class="form-floating">
                                            <select name="nivel_fadn_id" class="form-control text-dark" id="nivel_fadn_id" readonly required>
                                                @foreach ($niveles_fadn as $item)
                                                    <option value="{{encrypt($item->id)}}" {{$item->id == $entrenador->nivel_fadn_id ? 'selected':''}}>{{$item->tipo}}</option>
                                                @endforeach
                                            </select>
                                            <label for="nivel_fadn_id">Nivel FADN</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
                                        <div class="form-floating">
                                            <select name="departamento_id" class="form-control text-dark" id="departamento_id" readonly required>
                                                @foreach ($departamentos as $item)
                                                    <option value="{{encrypt($item->id)}}" {{$item->id == $entrenador->departamento_id ? 'selected' : ''}}>{{$item->nombre}}</option>
                                                @endforeach
                                            </select>
                                            <label for="departamento_id">Departamento</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
                                        <div class="form-floating">
                                            <select name="deporte_id" class="form-control text-dark" id="deporte_id" readonly required>
                                                @foreach ($deportes as $item)
                                                <option value="{{encrypt($item->id)}}" {{$item->id == $entrenador->deporte_id ? 'selected' : ''}}>{{$item->nombre}}</option>
                                                @endforeach
                                            </select>
                                            <label for="estado_civil">FADN</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
                                        <div class="form-floating">
                                            <select name="tipo_contrato_id" class="form-control text-dark" id="tipo_contrato_id" readonly required>
                                                @foreach ($tipos_contratos as $item)
                                                <option value="{{encrypt($item->id)}}" {{$item->id == $entrenador->tipo_contrato_id ? 'selected':''}}>{{$item->descripcion}}</option>
                                                @endforeach
                                            </select>
                                            <label for="tipo_contrato_id">Tipo de contrato</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2">
                                        <div class="form-floating">
                                            <select name="nacionalidad_id" class="form-control text-dark" id="nacionalidad_id" required>
                                                    @foreach ($nacionalidades as $item)
                                                    <option value="{{encrypt($item->id)}}" {{$item->id == $entrenador->nacionalidad_id ? 'selected' : ''}}>{{$item->descripcion}}</option>
                                                    @endforeach
                                            </select>
                                            <label for="nacionalidad_id">Nacionalidad</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="col-md-4 mb-10 center">
                                        <button type="submit" class="btn btn-outline-primary">Actualizar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    let contadorCuatro = 0;
    let contadorCinco = 0;
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
    $(document).ready(function() {
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
