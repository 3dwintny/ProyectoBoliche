<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Centros de Entrenamiento</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Fecha de Registro</th>
                <th>Institución</th>
                <th>Accesibilidad</th>
                <th>Implementación</th>
                <th>Espacio Físico</th>
                <th>Hora de Inicio</th>
                <th>Hora de Fin</th>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miércoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
                <th>Sábado</th>
                <th>Domingo</th>
                <th>Departamento</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($centros as $item)
            <tr>
                <td>{{$item->nombre}}</td>
                <td>{{$item->direccion}}</td>
                <td>{{$item->fecha_registro}}</td>
                <td>{{$item->institucion}}</td>
                <td>{{$item->accesibilidad}}</td>
                <td>{{$item->implementacion}}</td>
                <td>{{$item->espacio_fisico}}</td>
                <td>{{$item->horario->hora_inicio}}</td>
                <td>{{$item->horario->hora_fin}}</td>
                <td>{{$item->horario->lunes}}</td>
                <td>{{$item->horario->martes}}</td>
                <td>{{$item->horario->miercoles}}</td>
                <td>{{$item->horario->jueves}}</td>
                <td>{{$item->horario->viernes}}</td>
                <td>{{$item->horario->sabado}}</td>
                <td>{{$item->horario->domingo}}</td>
                <td>{{$item->departamento->nombre}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
