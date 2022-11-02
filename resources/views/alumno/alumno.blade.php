@extends('layouts.app')

@section('content')


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="body pb-8 pt-5 pt-lg-1 d-flex align-items-center" >
<!--div class="body pb-8 pt-5 pt-lg-1 d-flex align-items-center" style="background-image: url(../argon/img/theme/bol.jpg); background-size: cover; background-position: center top;"!-->
        <div class="container-fluid">
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-8">
                        <div class="card">
                            <div class="card-header text-bold ">
                               <strong><h1> Formulario de Inscripción</h1></strong>
                            </div> 
                            <div class="card-body bg-light">
                            @foreach($formularios as $item)
                            <label>
                                {{$item->titulo_principal}} {{$item->año_logo}}
                            </label>
                            <br>
                            <label>{{$item->subtitulo}}</label>
                            <br>
                            <label>{{$item->titulo_ficha}}</label>
                            @endforeach
                            </div>
                           </div>
    <form method="posts" role="form" enctype="multipart/form-data">
    
        <div class="form-group">
            <div class="card">
            <div class="card-body bg-light">
            <h2 class="mb-2">Información Personal</h2>
                <div class="row">
                    <div class="col-md-4 mb-2"><input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Primer Nombre') }}" type="text" name="nombre1" value="{{ old('Primer Nombre') }}" required></div>
                    <div class="col-md-4 mb-2"><input class="form-control text-dark" placeholder="{{ __('Segundo Nombre') }}" type="text" name="nombre2" value="{{ old('Segundo Nombre') }}" required></div>
                    <div class="col-md-4 mb-2"><input class="form-control text-dark" placeholder="{{ __('Tercer Nombre') }}" type="text" name="nombre3" value="{{ old('Tercer Nombre') }}" required></div>
                    <div class="col-md-6 mb-2"><input class="form-control text-dark" type="text" name="apellido1" placeholder="Primer Apellido"></div>
                    <div class="col-md-6 mb-2"> <input class="form-control text-dark" type="text" name="apellido2" placeholder="Segundo Apellido"></div>
                    <div class="col-md-12 mb-2"> <input class="form-control text-dark" type="text" name="cui" placeholder="CUI"></div>

                    <div class="col-md-6 mb-2"><div class="input-group mb-2">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Fecha Nacimiento</span>
                        <input class="form-control text-dark" type="date" name="fecha" id="fecha">
                    </div></div>
                    <div class="col-md-6 mb-2"><div class="input-group mb-2">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Edad</span>
                        <input class="form-control text-dark" type="text" name="edad" aria-label="edad" id="_edad" value="" aria-describedby="basic-addon1" readonly>
                    </div></div>
                    <div class="col-md-4 mb-2"><input class="form-control text-dark" type="text" name="peso" placeholder="Peso"></div>
                <div class="col-md-4 mb-2"><input class="form-control text-dark" type="text" name="altura" placeholder="Altura"></div>
                <div class="col-md-4 mb-2"><select class="form-control text-dark" name="genero">
                        <option selected disabled>Género</option>
                        <option>Femenino</option>
                        <option>Masculino</option>
                    </select></div>
                
                    <div class="col-md-12 mb-2"><input class="form-control text-dark"  type="text" name="direccion" placeholder="Dirección"></div>
                    <div class="col-md-4 mb-2"><input  class="form-control text-dark" type="tel" name="telefono_casa" placeholder="Teléfono Residencial"></div>
                    <div class="col-md-4 mb-2"><input class="form-control text-dark"  type="tel"  name="celular" placeholder="Celular"></div>
                    <div class="col-md-4 mb-2"><input class="form-control text-dark"  type="tel" name="contacto_emergencia" placeholder="Numero Contacto de Emergencia"></div>
                    <div class="col-md-6 mb-2"><input class="form-control text-dark"  type="email" name="correo" placeholder="Correo"></div>                
                    <div class="col-md-6 mb-2"><input class="form-control text-dark "  type="file" name="foto"></div>
                    <div class="col-md-4 mb-2"><input class="form-control text-dark"  type="text" name="nit" placeholder="NIT"></div>
                    <div class="col-md-4 mb-2"><input class="form-control text-dark"  type="text" name="pasaporte" placeholder="Pasaporte"></div>
                    <div class="col-md-4 mb-2"><select class="form-control text-dark"  name="nacionalidad" id="">
                    <div class="col-md-4 mb-2"><option selected disabled>Nacionalidad</option>
                        @foreach ($nacionalidades as $item)
                        <option value="{{$item->id}}">{{$item->descripcion}}</option>
                        @endforeach
                    </select></div>

                    <label class="col-md-12 mb-2">Lugar de Nacimiento</label>
                    <div class="col-md-6 mb-2"><select class="form-control"  name="id_departamento" id="_departamento">
                        <option selected disabled>Departamento</option>
                        @foreach ($departamentos as $item)
                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                        @endforeach
                    </select></div>
                    <div class="col-md-6 mb-2"><select class="form-control"  name="id_municipio" id="_municipio"></select></div>

                    <label class="col-md-12 mb-2">Lugar de Residencia</label>
                    <div class="col-md-6 mb-2"><select class="form-control"  name="id_departamento_residencia" id="_departamentoR">
                        <option selected disabled>Departamento</option>
                        @foreach ($departamentos as $item)
                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                        @endforeach
                    </select></div>
                    <div class="col-md-6 mb-2"><select class="form-control"  name="id_municipio_residencia" id="_municipioR"></select></div>

                    
                </div>   
        
                </form>

                
                <form method="posts" role="form" enctype="multipart/form-data">
                <h2>Información de Encargados</h2>
                <div class="form-group">
                <div class="row">
                    <div class="col-md-4 mb-2"><input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Primer Nombre') }}" type="text" name="nombre1" value="{{ old('Primer Nombre') }}" required></div>
                    <div class="col-md-4 mb-2"><input class="form-control text-dark" placeholder="{{ __('Segundo Nombre') }}" type="text" name="nombre2" value="{{ old('Segundo Nombre') }}" required></div>
                    <div class="col-md-4 mb-2"><input class="form-control text-dark" placeholder="{{ __('Tercer Nombre') }}" type="text" name="nombre3" value="{{ old('Tercer Nombre') }}" required></div>
                    <div class="col-md-4 mb-2"><input class="form-control text-dark" type="text" name="apellido1" placeholder="Primer Apellido"></div>
                    <div class="col-md-4 mb-2"> <input class="form-control text-dark" type="text" name="apellido2" placeholder="Segundo Apellido"></div>
                    <div class="col-md-4 mb-2"> <input class="form-control"  type="text" name="apellido_casada" placeholder="Apellido de Casada"></div>
                    
                    <div class="col-md-12 mb-2"><select  class="form-control"  name="id_parentezco" id="id_parentezco">
                        <option selected disabled>Parentezco</option>
                        @foreach ($parentezcos as $item){
                            <option value="{{$item->id}}">{{$item->tipo}}</option>
                        }
                        @endforeach
                    </select></div>
                </form>
                
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
        <div class="col-md-4 mb-10 center"><button type="submit" class="btn btn-outline-primary">Enviar</button></div>
        </div>
        
    </div>

    

<script type="text/javascript">

$(document).ready(function () {
        $('#fecha').on('change', function () {
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
        document.getElementById('_edad').value=calcularEdad(document.getElementById('fecha').value);
        });
    });

    $(document).ready(function () {
        $('#_departamento').on('change', function () {
            var dptoId = this.value;
            $('#_municipio').html('');
            $.ajax({
                url: '{{ route('municipios') }}?id_departamento='+dptoId,
                type: 'get',
                success: function (res) {
                    $('#_municipio').html('<option value="">Municipio</option>');
                    $.each(res, function (key, value) {
                        $('#_municipio').append('<option value="' + value.id
                            + '">' + value.nombre + '</option>');
                    });
                }
            });
        });
    });

    $(document).ready(function () {
        $('#_departamentoR').on('change', function () {
            var dptoId = this.value;
            $('#_municipioR').html('');
            $.ajax({
                url: '{{ route('municipios') }}?id_departamento='+dptoId,
                type: 'get',
                success: function (res) {
                    $('#_municipioR').html('<option value="">Municipio</option>');
                    $.each(res, function (key, value) {
                        $('#_municipioR').append('<option value="' + value.id
                            + '">' + value.nombre + '</option>');
                    });
                }
            });
        });
    });
</script>

@endsection