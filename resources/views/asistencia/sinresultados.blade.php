<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Asistencia</title>
</head>
<body>
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
