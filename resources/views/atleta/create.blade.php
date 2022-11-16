<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscribir Atleta</title>
</head>
<body>
    <form method="POST" action="{{route('atletas.store')}}" enctype="multipart/form-data" role="form">
        @csrf
        <label>Atleta Federado</label>
        <div>
            <label>Si</label>
            <input type="radio" name="federado" id="federado0" value="SISTEMÁTICO" checked>
            <label>No</label>
            <input type="radio" name="federado" id="federado1" value="1">
        </div>
        <label>Fecha</label>
        <input type="text" name="fecha_ingreso" id="fecha_sistema" readonly>
        <br>
        <label>Adaptado</label>
        <select name="adaptado" required>
            <option selected disabled>Adaptado</option>
            <option value="SI">SI</option>
            <option value="NO">NO</option>
        </select>
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
        <label>Etnia</label>
        <select name="etnia" required>
            <option selected disabled>Etnia</option>
            <option value="Maya">Maya</option>
            <option value="Xinka">Xinka</option>
            <option value="Garífuna">Garífuna</option>
            <option value="Ladina">Ladina</option>
        </select>
        <label>Nivel Académico</label>
        <select name="escolaridad" required>
            <option selected disabled>Nivel Académico</option>
            <option value="Primaria">Primaria</option>
            <option value="Básico">Básico</option>
            <option value="Diversificado">Diversificado</option>
            <option value="Licenciatura">Licenciatura</option>
            <option value="Profesorado">Profesorado</option>
            <option value="Técnico">Técnico</option>
        </select>
        <label>Centro de Entrenamiento</label>
        <select name="centro_id" required>
            <option selected disabled>Centro de Entrenamiento</option>
            @foreach($centros as $item)
            <option value="{{$item->id}}">{{$item->nombre}}</option>
            @endforeach
        </select>
        <label>Entrenador</label>
        <select name="entrenador_id" required>
            <option selected disabled>Entrenador</option>
            @foreach($entrenadores as $item)
            <option value="{{$item->id}}">{{$item->nombre1}} {{$item->nombre2}} {{$item->apellido1}} {{$item->apellido2}} {{$item->apellido_casada}}</option>
            @endforeach
        </select>
        <label>Alumno</label>
        <select name="alumno_id" required>
            <option selected disabled>Alumno</option>
            @foreach($alumnos as $item)
            <option value="{{$item->id}}">{{$item->nombre1}} {{$item->nombre2}} {{$item->apellido1}} {{$item->apellido2}}</option>
            @endforeach
        </select>
        <label>Categoría</label>
        <select name="categoria_id" required>
            <option selected disabled>Categoría</option>
            @foreach($categorias as $item)
            <option value="{{$item->id}}">{{$item->tipo}}</option>
            @endforeach
        </select>
        <label>Etapa Deportiva</label>
        <select name="etapa_deportiva_id" required>
            <option selected disabled>Etapa Deportiva</option>
            @foreach($etapas_deportivas as $item)
            <option value="{{$item->id}}">{{$item->nombre}}</option>
            @endforeach
        </select>
        <label>Deporte Adaptado</label>
        <select name="deporte_adaptado_id" required>
            <option selected disabled>Deporte Adaptado</option>
            @foreach($deportes_adaptados as $item)
            <option value="{{$item->id}}">{{$item->nombre}}</option>
            @endforeach
        </select>
        <label>Otro Programa</label>
        <select name="otro_programa_id" id="otro_programa_id" disabled>
            <option selected disabled>Otro Programa</option>
            @foreach($otros_programas as $item)
            <option value="{{$item->id}}">{{$item->nombre}}</option>
            @endforeach
        </select>
        <label>Línea de Desarrollo</label>
        <select name="linea_desarrollo_id" required>
            <option selected disabled>Línea de Desarrollo</option>
            @foreach($lineas_desarrollo as $item)
            <option value="{{$item->id}}">{{$item->tipo}}</option>
            @endforeach
        </select>
        <label>Deporte</label>
        <select name="deporte_id" required>
            <option selected disabled>Deporte</option>
            @foreach($deportes as $item)
            <option value="{{$item->id}}">{{$item->nombre}}</option>
            @endforeach
        </select>
        <label>Modalidad</label>
        <select name="modalidad_id" required>
            <option selected disabled>Modalidad</option>
            @foreach($modalidades as $item)
            <option value="{{$item->id}}">{{$item->nombre}}</option>
            @endforeach
        </select>
        <label>PRT</label>
        <select name="prt_id" required>
            <option selected disabled>PRT</option>
            @foreach($prts as $item)
            <option value="{{$item->id}}">{{$item->nombre}}</option>
            @endforeach
        </select>
        <input type="submit" value="Guardar">
    </form>
</body>
<script type="text/javascript">
     date = new Date();
     year = date.getFullYear();
     month = date.getMonth()+1;
     day = date.getDate();
     document.getElementById("fecha_sistema").value = year+"/"+month+"/"+day;

     $(document).ready(function () {
        $('#federado0').on('change', function () {
            document.getElementById('otro_programa_id').disabled = true;
        });
        $('#federado1').on('change', function () {
            document.getElementById('otro_programa_id').disabled = false;
        });
    });
</script>
</html>