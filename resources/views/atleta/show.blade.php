<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Atletas</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Nombre del Atleta</th>
                <th>Fecha de Ingreso</th>
                <th>Adaptado</th>
                <th>Estado Civíl</th>
                <th>Etnia</th>
                <th>Escolaridad</th>
                <th>Centro de Entrenamiento</th>
                <th>Entrenador</th>
                <th>Categoría</th>
                <th>Etapa Deportiva</th>
                <th>Deporte Adaptado</th>
                <th>Otro Programa</th>
                <th>Línea de Desarrollo</th>
                <th>Deporte</th>
                <th>Modalidad</th>
                <th>PRT</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($atletas as $item)
            <tr>
                <td>{{$item->alumno->nombre1}} {{$item->alumno->nombre2}} {{$item->alumno->apellido1}} {{$item->alumno->apellido2}}</td>
                <td>{{$item->fecha_ingreso}}</td>
                <td>{{$item->adaptado}}</td>
                <td>{{$item->estado_civil}}</td>
                <td>{{$item->etnia}}</td>
                <td>{{$item->escolaridad}}</td>
                <td>{{$item->centro->nombre}}</td>
                <td>{{$item->entrenador->nombre1}} {{$item->entrenador->nombre2}} {{$item->entrenador->apellido1}} {{$item->entrenador->apellido2}}</td>
                <td>{{$item->categoria->tipo}}</td>
                <td>{{$item->etapa_deportiva->nombre}}</td>
                <td>{{$item->deporte_adaptado->nombre}}</td>
                <td>{{$item->otro_programa->nombre}}</td>
                <td>{{$item->linea_desarrollo->tipo}}</td>
                <td>{{$item->deporte->nombre}}</td>
                <td>{{$item->modalidad->nombre}}</td>
                <td>{{$item->prt->nombre}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
