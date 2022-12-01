<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Asistencia</title>
</head>
<body>
    <form method="POST" action="{{route('buscar')}}">
        @csrf
        <label>Mes</label>
        <select name="mes" id="mes">
            <option value="1">Enero</option>
            <option value="2">Febrero</option>
            <option value="3">Marzo</option>
            <option value="4">Abril</option>
            <option value="5">Mayo</option>
            <option value="6">Junio</option>
            <option value="7">Julio</option>
            <option value="8">Agosto</option>
            <option value="9">Septiembre</option>
            <option value="10">Octubre</option>
            <option value="11">Noviembre</option>
            <option value="12">Diciembre</option>
        </select>
        <label>Año</label>
        <input type="number" name="anio" id="anio" required>
        <input type="submit" value="Buscar">
    </form>

    <table>
        <thead>
            <tr>
                <th>Atleta</th>
                <th>Edad</th>
                <th>Género</th>
                <th>Categoría</th>
                <th>Modalidad</th>
                <th>Días Entrenados</th>
                <th>% de Asistencia</th>
                <th>Etapa Deportiva</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="8" style="text-align: center">NO SE ENCONTRARON RESULTADOS</td>
            </tr>
        </tbody>
    </table>
    <button type="submit" onclick="window.location='{{ url('asistencias') }}'">Regresar</button>
</body>
</html>
