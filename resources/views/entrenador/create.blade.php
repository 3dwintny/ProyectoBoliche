<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar Entrenador</title>
</head>
<body>
    <form method="post" role="form" enctype="multipart/form-data" action="{{route('entrenadores.store')}}">
        @csrf
        <div style="margin-left: 76.78%"><label>Fecha</label> <input type="text" name="fecha_registro" id="fecha_sistema" readonly></div>
        <br>
        <label>Primer Nombre</label>
        <input type="text" name="nombre1" placeholder="Primer Nombre" id="" required>
        <label>Segundo Nombre</label>
        <input type="text" name="nombre2" placeholder="Segundo Nombre" id="">
        <label>Tercer Nombre</label>
        <input type="text" name="nombre3" placeholder="Tercer Nombre" id="">
        <label>Primer Apellido</label>
        <input type="text" name="apellido1" placeholder="Primer Apellido" id="" required>
        <label>Segundo Apellido</label>
        <input type="text" name="apellido2" placeholder="Segundo Apellido" id="" required>
        <label>Apellido de Casada</label>
        <input type="text" name="apellido_casada" placeholder="Apellido de Casada" id="">
        <label>Celular</label>
        <input type="text" name="celular" placeholder="Celular" id="">
        <label>Telefono de Casa</label>
        <input type="text" name="telefono_casa" placeholder="Telefono de Casa" id="">
        <label>CUI</label>
        <input type="text" name="cui" placeholder="CUI" id="" required>
        <label>Número de Pasaporte</label>
        <input type="text" name="pasaporte" placeholder="Número de Pasaporte" id="">
        <label>Género</label>
        <select name="genero" required>
            <option selected disabled>Género</option>
            <option value="Femenino">Femenino</option>
            <option value="Masculino">Masculino</option>
        </select>
        <label>Fecha de Nacimiento</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>
        <label>Edad</label>
        <input  type="text" name="edad" id="_edad" value="" readonly>
        <label>Años de Experienia</label>
        <input type="text" name="años_experiencia" placeholder="Años de Experiencia" id="">
        <label>Correo</label>
        <input type="email" name="correo" placeholder="Correo" id="" required>
        <label>Dirección de Residencia</label>
        <input type="text" name="direccion" placeholder="Dirección de Residencia" id="" required>
        <label>Fotografía</label>
        <input type="file" name="foto" id="" required>
        <label>Estado Civil</label>
        <select name="estado_civil" required>
            <option selected disabled>Estado Civil</option>
            <option value="Soltera/o">Soltera/o</option>
            <option value="Casada/o">Casada/o</option>
            <option value="Unión Libre">Unión Libre</option>
            <option value="Unión de Hecho">Unión de Hecho</option>
            <option value="Separada/o">Separada/o</option>
            <option value="Divorciada/o">Divorciada/o</option>
            <option value="Viuda/o">Viuda/o</option>
            <option value="Comprometida/o">Comprometida/o</option>
        </select>
        <label>NIT</label>
        <input type="text" name="nit" placeholder="NIT" id="">
        <label>Nivel Académico</label>
        <select name="escolaridad" required>
            <option selected disabled>Nivel Académico</option>
            <option value="Primaria">Primaria</option>
            <option value="Básico">Básico</option>
            <option value="Diversificado">Diversificado</option>
            <option value="Licenciatura">Licenciatura</option>
            <option value="Maestría">Maestría</option>
            <option value="Doctorado">Doctorado</option>
            <option value="Profesorado">Profesorado</option>
            <option value="Técnico">Técnico</option>
        </select>
        <label>Nivel CDAG</label>
        <select name="nivel_cdag_id" required>
            <option selected disabled>Nivel CDAG</option>
            @foreach ($niveles_cdag as $item)
            <option value="{{$item->id}}">{{$item->nombre}}</option>
            @endforeach
        </select>
        <label>Nivel FADN</label>
        <select name="nivel_fadn_id" required>
            <option selected disabled>Nivel FADN</option>
            @foreach ($niveles_fadn as $item)
            <option value="{{$item->id}}">{{$item->tipo}}</option>
            @endforeach
        </select>
        <label>Departamento</label>
        <select name="departamento_id" required>
            <option selected disabled>Departamento</option>
            @foreach ($departamentos as $item)
            <option value="{{$item->id}}">{{$item->nombre}}</option>
            @endforeach
        </select>
        <label>Nacionalidad</label>
        <select name="nacionalidad_id" required>
            <option selected disabled>Nacionalidad</option>
            @foreach ($nacionalidades as $item)
            <option value="{{$item->id}}">{{$item->descripcion}}</option>
            @endforeach
        </select>
        <label>Deporte</label>
        <select name="deporte_id" required>
            <option selected disabled>Deporte</option>
            @foreach ($deportes as $item)
            <option value="{{$item->id}}">{{$item->nombre}}</option>
            @endforeach
        </select>
        <label>Tipo de Contrato</label>
        <select name="tipo_contrato_id" required>
            <option selected disabled>Tipo de Contrato</option>
            @foreach ($tipos_contratos as $item)
            <option value="{{$item->id}}">{{$item->descripcion}}</option>
            @endforeach
        </select>
        <input type="submit" value="Registrar Entrenador">
    </form>
</body>
<script type="text/javascript">

    $(document).ready(function () {
            $('#fecha_nacimiento').on('change', function () {
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
            document.getElementById('_edad').value=calcularEdad(document.getElementById('fecha_nacimiento').value);
            });
        });
        date = new Date();
        year = date.getFullYear();
        month = date.getMonth()+1;
        day = date.getDate();
        document.getElementById("fecha_sistema").value = year+"/"+month+"/"+day;
</script>
</html>




