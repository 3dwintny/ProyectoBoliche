
    @extends('layouts.app')    
    @section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12 ">
            <div class="card">

            <h1 class="container-fluid">Formulario para registrar Alumnos</h1>
        <form action="" method="post" class="container col-md-8">
            
    <h1>Formulario de Inscripción</h1>
    <h3>Información Personal</h3>
    <form method="posts" role="form" enctype="multipart/form-data">
        <label>Primer Nombre</label>
        <input  type="text" name="nombre1" placeholder="Primer Nombre">
        <label>Segundo Nombre</label>
        <input  type="text" name="nombre2" placeholder="Segundo Nombre">
        <label>Tercer Nombre</label>
        <input  type="text" name="nombre3" placeholder="Tercer Nombre">
        <label>Primer Apellido</label>
        <input  type="text" name="apellido1" placeholder="Primer Apellido">
        <label>Segundo Apellido</label>
        <input  type="text" name="apellido2" placeholder="Segundo Apellido">
        <label>CUI</label>
        <input  type="text" name="cui" placeholder="CUI">
        <label>Fecha de Nacimiento</label>
        <input  type="date" name="fecha">
        <label>Peso</label>
        <input  type="text" name="peso" placeholder="Peso">
        <label>Altura</label>
        <input  type="text" name="altura" placeholder="Altura">
        <label>Género</label>
        <select name="genero">
            <option selected disabled>Género</option>
            <option>Femenino</option>
            <option>Masculino</option>
        </select>
        <label>Dirección</label>
        <input type="text" name="direccion" placeholder="Dirección">
        <label>Teléfono de Casa</label>
        <input type="tel" name="telefono_casa" placeholder="Teléfono Residencial">
        <label>Celular</label>
        <input type="tel"  name="celular" placeholder="Celular">
        <label>Correo</label>
        <input type="email" name="correo" placeholder="Correo">
        <label>Contacto de Emergencia</label>
        <input type="tel" name="contacto_emergencia" placeholder="Contacto de Emergencia">
        <label>Fotografía</label>
        <input type="file" name="foto">
        <label>NIT</label>
        <input type="text" name="nit" placeholder="NIT">
        <label>Pasaporte</label>
        <input type="text" name="pasaporte" placeholder="Pasaporte">
        <label>Departamento de Nacimiento</label>
        <select name="id_departamento" id="_departamento">
            <option selected disabled>Departamento</option>
            @foreach ($departamentos as $item)
            <option value="{{$item->id}}">{{$item->nombre}}</option>
            @endforeach
        </select>
        <label>Municipio de Nacimiento</label>
        <select name="id_municipio" id="_municipio"></select>
        <label>Departamento de Residencia</label>
        <select name="id_departamento_residencia" id="_departamentoR">
            <option selected disabled>Departamento</option>
            @foreach ($departamentos as $item)
            <option value="{{$item->id}}">{{$item->nombre}}</option>
            @endforeach
        </select>
        <label>Municipio de Nacimiento de Residencia</label>
        <select name="id_municipio_residencia" id="_municipioR"></select>
        <label>Nacionalidad</label>
        <select name="nacionalidad" id="">
            <option selected disabled>Nacionalidad</option>
            @foreach ($nacionalidades as $item)
            <option value="{{$item->id}}">{{$item->descripcion}}</option>
            @endforeach
        </select>
        </form>
        </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript">
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

