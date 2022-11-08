<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nueva Terapia</title>
</head>
<body>
    <form method="POST" action="{{route('terapias.store')}}" enctype="multipart/form-data" role="form">
        <label>Fecha</label>
        <input type="text" name="fecha" id="fecha_sistema" readonly>
        <input type="time" name="hora_inicio" id="">
        <br>
        @csrf
        <label>Psicologa(o)</label>
        <select name="psicologia_id">
            <option selected disabled>Psicologa(o)</option>
            @foreach ($psicologos as $item)
            <option value="{{$item->id}}">{{$item->nombre1}} {{$item->nombre2}} {{$item->apellido1}} {{$item->apellido2}} {{$item->apellido_casada}}</option>
            @endforeach
        </select>
        <select name="atleta_id">
            <option selected disabled>Atleta</option>
            @foreach ($atletas as $item)
            <option value="{{$item->id}}">{{$item->alumno->nombre1}} {{$item->alumno->nombre2}} {{$item->alumno->apellido1}} {{$item->alumno->apellido2}}</option>
            @endforeach
        </select>
        <label>Número de Sesión</label>
        <input type="text" name="numero_terapia" placeholder="Número de Sesión" id="">
        <label>Impresión Clínica</label>
        <textarea rows="10" cols="70" name="impresion_clinica" placeholder="Impresión Clínica" style="resize:none;"></textarea>
        <label>Análisis Semiológico (Signos y Síntomas)</label>
        <textarea rows="10" cols="70" name="analisis_semiologico" placeholder="Análisis Semiológico (Signos y Síntomas)" style="resize:none;"></textarea>
        <label>Desarrollo</label>
        <textarea rows="10" cols="70" name="desarrollo" placeholder="Desarrollo" style="resize:none;"></textarea>
        <label>Observaciones</label>
        <textarea rows="10" cols="70" name="observaciones" placeholder="Observaciones" style="resize:none;"></textarea>
        <label>Tarea</label>
        <textarea rows="10" cols="70" name="tarea" placeholder="Tarea" style="resize:none;"></textarea>
        <label>Conciencia Corporal</label>
        <select name="conciencia_corporal" id="">
            <option selected disabled>Conciencia Corporal</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <label>Dominio Corporal</label>
        <select name="dominio_corporal" id="">
            <option selected disabled>Dominio Corporal</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <label>Dominio de Respiración</label>
        <select name="dominio_respiracion" id="">
            <option selected disabled>Dominio de Respiración</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <label>Diálogo Interno</label>
        <select name="dialogo_interno" id="">
            <option selected disabled>Diálogo Interno</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <label>Atención</label>
        <select name="atencion" id="">
            <option selected disabled>Atención</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <label>Concentración</label>
        <select name="concentracion" id="">
            <option selected disabled>Concentración</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <label>Motivación</label>
        <select name="motivacion" id="">
            <option selected disabled>Motivación</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <label>Confianza</label>
        <select name="confianza" id="">
            <option selected disabled>Confianza</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <label>Activación</label>
        <select name="activacion" id="">
            <option selected disabled>Activación</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <label>Relajación</label>
        <select name="relajacion" id="">
            <option selected disabled>Relajación</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <label>Estrés</label>
        <select name="estres" id="">
            <option selected disabled>Estrés</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <label>Ansiedad Cognitiva</label>
        <select name="ansiedad_cognitiva" id="">
            <option selected disabled>Ansiedad Cognitiva</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <label>Ansiedad Física</label>
        <select name="ansiedad_fisica" id="">
            <option selected disabled>Ansiedad Física</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <label>Miedo</label>
        <select name="miedo" id="">
            <option selected disabled>Miedo</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <label>Frustración</label>
        <select name="frustracion" id="">
            <option selected disabled>Frustración</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
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
</script>

</html>