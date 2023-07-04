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
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header text-bold ">
                        <strong>
                            <h2>Registrar nuevo entrenador</h2>
                        </strong>
                    </div>
                    <form method="post" role="form" enctype="multipart/form-data" action="{{route('entrenadores.store')}}">
                        @csrf
                        <div class="form-group">
                            <div>Fecha
                                <input type="text" class="container form-control text-center" name="fecha_registro" id="fecha_sistema" value="{{Carbon\Carbon::parse($hoy)->format('Y-m-d')}}" readonly>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body bg-light">
                                <h3 class="mb-2">Información Personal</h3>
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Primer nombre') }}" id="nombre1" type="text" name="nombre1" value="{{ old('nombre1') }}" required>
                                            <label for="nombre1">Primer nombre</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Segundo nombre') }}" id="nombre2" type="text" name="nombre2" value="{{ old('nombre2') }}">
                                            <label for="nombre2">Segundo nombre</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Tercer nombre') }}" id="nombre3" type="text" name="nombre3" value="{{ old('nombre3') }}">
                                            <label for="nombre3">Tercer nombre</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Primer apellido') }}" id="apellido1" type="text" name="apellido1" value="{{ old('apellido1') }}" required>
                                            <label for="apellido1">Primer apellido</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Segundo apellido') }}" id="apellido2" type="text" name="apellido2" value="{{ old('apellido2') }}">
                                            <label for="apellido2">Segundo apellido</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Apellido de casada') }}" id="apellido_casada" type="text" name="apellido_casada" value="{{ old('apellido_casada') }}">
                                            <label for="apellido_casada">Apellido de casada</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-2">
                                        <div class="form-floating">
                                        <input type="tel" name="celular" id="celular" class="form-control text-dark @error('celular') is-invalid @enderror" aria-describedby="basic-addon2" placeholder="{{ __('Celular') }}" value="{{ old('celular') }}" pattern="[0-9]{4}[-][0-9]{4}" title="Formato aceptado: 0000-0000 o 0000 0000">
                                        <label for="celular">Celular</label>
                                        @error('celular')
                                            <div class="invalid-tooltip">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>                                  
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-2">
                                        <div class="form-floating">
                                        <input type="tel" name="telefono_casa" id="telefono_casa" class="form-control text-dark @error('telefono_casa') is-invalid @enderror" aria-describedby="basic-addon2" placeholder="{{ __('Teléfono de casa') }}" value="{{ old('telefono_casa') }}" pattern="[0-9]{4}[-][0-9]{4}" title="Formato aceptado: 0000-0000 o 0000 0000">
                                        <label for="telefono_casa">Teléfono de casa</label>
                                        @error('telefono_casa')
                                            <div class="invalid-tooltip">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-2">
                                        <div class="form-floating">
                                        <input type="text" name="cui" id="cui" class="form-control text-dark @error('cui') is-invalid @enderror" aria-describedby="basic-addon2" placeholder="{{ __('CUI') }}" value="{{ old('cui') }}">
                                        <label for="cui">CUI</label>
                                        @error('cui')
                                            <div class="invalid-tooltip">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Pasaporte') }}" id="pasaporte" type="text" name="pasaporte" value="{{ old('pasaporte') }}">
                                            <label for="pasaporte">Pasaporte</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-8 mb-2">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Fecha de nacimiento</span>
                                            <input class="form-control text-dark" type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{old('fecha_nacimiento')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 mb-2">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Edad</span>
                                            <input class="form-control text-dark" type="text" name="edad" aria-label="edad" id="_edad" value="" aria-describedby="basic-addon1" value="{{old('edad')}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-8 col-md-9 col-sm-8 mb-2">
                                        <div class="form-floating">
                                        <input type="email" name="correo" id="correo" class="form-control text-dark @error('correo') is-invalid @enderror" aria-describedby="basic-addon2" placeholder="{{ __('Correo electrónico') }}" value="{{ old('correo') }}">
                                        <label for="correo">Correo electrónico</label>
                                        @error('correo')
                                            <div class="invalid-tooltip">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Años de experiencia') }}" id="años_experiencia" type="number" name="años_experiencia" value="{{ old('años_experiencia') }}">
                                            <label for="celular">Años de experiencia</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-9 col-md-8 col-sm-9 mb-2">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Foto</span>
                                            <input class="form-control text-dark" type="file" name="foto" id="foto" accept=".jpg, .jpeg, .png" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-3 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('NIT') }}" id="nit" type="text" name="nit" value="{{ old('nit') }}">
                                            <label for="nit">NIT</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-2">
                                        <div class="form-floating">
                                            <select class="form-control text-dark" name="genero" id="genero" required>
                                                <option value="" selected></option>
                                                <option>Femenino</option>
                                                <option>Masculino</option>
                                            </select>
                                            <label for="genero">Género</label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-2">
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
                                    
                                    <div class="col-12 mb-2">
                                        <div class="form-floating">
                                            <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Dirección') }}" id="direccion" type="text" name="direccion" value="{{ old('direccion') }}">
                                            <label for="direccion">Dirección</label>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
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

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
                                        <div class="form-floating">
                                            <select class="form-control text-dark" name="nivel_cdag_id" id="nivel_cdag_id" required>
                                                <option selected value=""></option>
                                                @foreach ($niveles_cdag as $item)
                                                    <option value="{{encrypt($item->id)}}">{{$item->nombre}}</option>
                                                @endforeach
                                            </select>
                                            <label for="nivel_cdag_id">Nivel CDAG</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
                                        <div class="form-floating">
                                            <select name="nivel_fadn_id" class="form-control text-dark" id="nivel_fadn_id" required>
                                                <option selected value=""></option>
                                                @foreach ($niveles_fadn as $item)
                                                    <option value="{{encrypt($item->id)}}">{{$item->tipo}}</option>
                                                @endforeach
                                            </select>
                                            <label for="nivel_fadn_id">Nivel FADN</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-2">
                                        <div class="form-floating">
                                            <select name="deporte_id" class="form-control text-dark" id="deporte_id" required>
                                                @foreach ($deportes as $item)
                                                <option value="{{encrypt($item->id)}}" {{$item->nombre == "Boliche" ? 'selected' : ''}}>{{$item->nombre}}</option>
                                                @endforeach
                                            </select>
                                            <label for="deporte_id">FADN</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-2">
                                        <div class="form-floating">
                                            <select name="tipo_contrato_id" class="form-control text-dark" id="tipo_contrato_id" required>
                                                <option selected value=""></option>
                                                @foreach ($tipos_contratos as $item)
                                                <option value="{{encrypt($item->id)}}">{{$item->descripcion}}</option>
                                                @endforeach
                                            </select>
                                            <label for="tipo_contrato_id">Tipo de contrato</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-2">
                                        <div class="form-floating">
                                            <select name="nacionalidad_id" class="form-control text-dark" id="nacionalidad_id" required>
                                                <option selected value=""></option>
                                                    @foreach ($nacionalidades as $item)
                                                    <option value="{{encrypt($item->id)}}" {{$item->descripcion == "Guatemalteca(o)" ? 'selected' : ''}}>{{$item->descripcion}}</option>
                                                    @endforeach
                                            </select>
                                            <label for="nacionalidad_id">Nacionalidad</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-2">
                                        <div class="form-floating">
                                            <select name="departamento_id" class="form-control text-dark" id="departamento_id" required>
                                                @foreach ($departamentos as $item)
                                                    <option value="{{encrypt($item->id)}}" {{$item->nombre == "Quetzaltenango" ? 'selected' : ''}}>{{$item->nombre}}</option>
                                                @endforeach
                                            </select>
                                            <label for="departamento_id">Departamento</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="col-4 mb-10 center">
                                        <button type="submit" class="btn btn-outline-primary">Registrar</button>
                                    </div>
                                </div>
                    </form>
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
