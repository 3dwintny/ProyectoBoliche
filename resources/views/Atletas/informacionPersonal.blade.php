@extends('layouts.app')

@section('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!--div class="body pb-8 pt-5 pt-lg-1 d-flex align-items-center" style="background-image: url(../argon/img/theme/bol.jpg); background-size: cover; background-position: center top;"!-->
@include('layouts.headers.cards', ['texto' => 'Atletas'])
<div class="container-fluid mt--6">
    <div class="header-body text-center  mb-7">
        <div class="row justify-content-right">
            <div class="col-lg-6 col-md-6">
                <a class="btn btn-outline-warning" target="_blank" href="{{route('reinscripcionPDF')}}">PDF reinscripción</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8">
                <div class="card">
                    <div class="card-header text-bold ">
                        <strong>
                            <h2>Editar atleta</h2>
                        </strong>
                    </div>
                @can('atletaPerfil')
                <form method="post" role="form" enctype="multipart/form-data" action="{{route('actualizarAtleta')}}">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <div>Fecha fotografía<input type="text" class=" container form-control text-center" name="fecha_fotografia" id="fecha_sistema" value="{{$atleta->fecha_fotografia}}" readonly>
                    </div>
                    <div class="card">
                        <div class="card-body bg-light">
                            <h3 class="mb-2">Información personal</h3>
                            <div class="col-12 mb-2">
                                <img src="{{ asset('storage/uploads/'.$atleta->foto) }}" class="img-thumbnail" alt="50" height="50" width="50">
                                <input type="hidden" name="pic" value="{{$atleta->foto}}">
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Primer nombre') }}" id="nombre1" type="text" name="nombre1" value="{{$atleta->nombre1}}" required>
                                        <label for="nombre1">Primer nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Segundo nombre') }}" id="nombre2" type="text" name="nombre2" value="{{$atleta->nombre2}}">
                                        <label for="nombre2">Segundo nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Tercer nombre') }}" id="nombre3" type="text" name="nombre3" value="{{$atleta->nombre3}}">
                                        <label for="nombre3">Tercer nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Primer apellido') }}" id="apellido1" type="text" name="apellido1" value="{{$atleta->apellido1}}" required>
                                        <label for="apellido1">Primer apellido</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Segundo apellido') }}" id="apellido2" type="text" name="apellido2" value="{{$atleta->apellido2}}">
                                        <label for="apellido2">Segundo apellido</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('CUI') }}" id="cui" type="text" name="cui" value="{{$atleta->cui}}">
                                        <label for="cui">CUI</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Fecha nacimiento</span>
                                        <input class="form-control text-dark" type="date" name="fecha" id="fecha" value="{{$atleta->fecha}}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Edad</span>
                                        <input class="form-control text-dark" type="text" name="edad" aria-label="edad" id="_edad" value="{{$atleta->edad}}" aria-describedby="basic-addon1" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Peso(libras)') }}" id="peso" type="text" name="peso" value="{{$atleta->peso}}">
                                        <label for="peso">Peso(libras)</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Altura(metros)') }}" id="altura" type="text" name="altura" value="{{$atleta->altura}}">
                                        <label for="altura">Altura(metros)</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-floating">
                                        <select class="form-control text-dark" name="genero" id="genero" required>
                                            <option value="" selected></option>
                                                <option {{$atleta->genero == "Femenino" ? 'selected':''}}>Femenino</option>
                                                <option {{$atleta->genero == "Masculino" ? 'selected':''}}>Masculino</option>
                                        </select>
                                        <label for="genero">Género</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-floating">
                                        <select name="alergia_id" class="form-control text-dark" id="alergia_id" required>
                                            <option selected value=""></option>
                                            @foreach ($alergias as $item)
                                                <option value="{{encrypt($item->id)}}" {{$item->id == $atleta->alergia_id ? 'selected' : ''}}>{{$item->nombre}}</option>
                                            @endforeach
                                        </select>
                                        <label for="alergia_id">Alergia</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Dirección') }}" id="direccion" type="text" name="direccion" value="{{$atleta->direccion}}">
                                        <label for="direccion">Dirección</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <input type="tel" name="telefono_casa"  id="telefono_casa" class="form-control text-dark" aria-describedby="basic-addon2" value="{{$atleta->telefono_casa}}" placeholder="{{ __('Teléfono de casa') }}" pattern="[0-9]{4}[-][0-9]{4}" title="FORMATOS ACEPTADOS 0000-0000 o 0000 0000">
                                        <label for="telefono_casa">Teléfono residencial</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <input type="tel" name="celular"  id="celular" class="form-control text-dark" aria-describedby="basic-addon2" value="{{$atleta->celular}}" placeholder="{{ __('Celular') }}" pattern="[0-9]{4}[-][0-9]{4}" title="FORMATOS ACEPTADOS 0000-0000 o 0000 0000">
                                        <label for="celular">Celular</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <input type="tel" name="contacto_emergencia"  id="contacto_emergencia" class="form-control text-dark" aria-describedby="basic-addon2" value="{{$atleta->contacto_emergencia}}" placeholder="{{ __('Contacto de emergencia') }}" pattern="[0-9]{4}[-][0-9]{4}" title="FORMATOS ACEPTADOS 0000-0000 o 0000 0000">
                                        <label for="contacto_emergencia">Contacto de emergencia</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Fotografía</span>
                                        <input class="form-control text-dark" type="file" name="foto" id="foto" accept=".jpg, .jpeg, .png">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Correo') }}" id="correo" type="email" name="correo" value="{{$atleta->correo}}">
                                        <label for="correo">Correo electrónico</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('NIT') }}" id="nit" type="text" name="nit" value="{{$atleta->nit}}">
                                        <label for="nit">NIT</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Pasaporte') }}" id="pasaporte" type="text" name="pasaporte" value="{{$atleta->pasaporte}}">
                                        <label for="pasaporte">Pasaporte</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <div class="form-floating">
                                        <select name="nacionalidad_id" class="form-control text-dark" id="nacionalidad_id" required>
                                                @foreach ($nacionalidades as $item)
                                                <option value="{{encrypt($item->id)}}" {{$item->id == $atleta->nacionalidad_id ? 'selected' : ''}}>{{$item->descripcion}}</option>
                                                @endforeach
                                        </select>
                                        <label for="nacionalidad_id">Nacionalidad</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-floating">
                                        <select name="departamento_id" class="form-control text-dark" id="departamento_id" required>
                                                @foreach ($departamentos as $item)
                                                <option value="{{encrypt($item->id)}}" {{$item->id == $atleta->departamento_id ? 'selected' : ''}}>{{$item->nombre}}</option>
                                                @endforeach
                                        </select>
                                        <label for="departamento_id">Departamento de nacimiento</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-floating">
                                        <select name="municipio_id" class="form-control text-dark" id="municipio_id" required>
                                                @foreach ($municipioNacimiento as $item)
                                                <option value="{{encrypt($item->id)}}" {{$item->id == $atleta->municipio_id ? 'selected' : ''}}>{{$item->nombre}}</option>
                                                @endforeach
                                        </select>
                                        <label for="municipio_id">Municipio de nacimiento</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-floating">
                                        <select name="departamento_residencia_id" class="form-control text-dark" id="departamento_residencia_id" required>
                                                @foreach ($departamentos as $item)
                                                <option value="{{encrypt($item->id)}}" {{$item->id == $atleta->departamento_residencia_id ? 'selected' : ''}}>{{$item->nombre}}</option>
                                                @endforeach
                                        </select>
                                        <label for="departamento_residencia_id">Departamento de residencia</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-floating">
                                        <select name="municipio_residencia_id" class="form-control text-dark" id="municipio_residencia_id" required>
                                                @foreach ($municipioResidencia as $item)
                                                <option value="{{encrypt($item->id)}}" {{$item->id == $atleta->municipio_residencia_id ? 'selected' : ''}}>{{$item->nombre}}</option>
                                                @endforeach
                                        </select>
                                        <label for="municipio_residencia_id">Municipio de residencia</label>
                                    </div>
                                </div>

                            </div>
                            <div class="container">
                                <div class="col-md-4 mb-10 center"><button type="submit" class="btn btn-outline-primary">Actualizar</button></div>
                            </div>
                </form>
                @endcan
            </div>
        </div>
    </div>
</div>

</div>




</div>
<script type="text/javascript">
    let contadorCuatro = 0;
    let contadorCinco = 0;
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
    $(document).ready(function () {
        $('#departamento_id').on('change', function () {
            var dptoId = this.value;
            $('#municipio_id').html('');
            $.ajax({
                url: '{{ route("municipios") }}?departamento_id='+dptoId,
                type: 'get',
                success: function (res) {
                    $('#municipio_id').html('<option value="">Municipio</option>');
                    $.each(res, function (key, value) {
                        $('#municipio_id').append('<option value="' + value.id
                            + '">' + value.nombre + '</option>');
                    });
                }
            });
        });
    });
    $(document).ready(function () {
        $('#departamento_residencia_id').on('change', function () {
            var dptoId = this.value;
            $('#municipio_residencia_id').html('');
            $.ajax({
                url: '{{ route("municipios") }}?departamento_id='+dptoId,
                type: 'get',
                success: function (res) {
                    $('#municipio_residencia_id').html('<option value="">Municipio</option>');
                    $.each(res, function (key, value) {
                        $('#municipio_residencia_id').append('<option value="' + value.id
                            + '">' + value.nombre + '</option>');
                    });
                }
            });
        });
    });
</script>
@endsection
