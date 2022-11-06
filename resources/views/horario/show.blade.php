<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Horarios</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Hora Inicial</th>
                <th>Hora Final</th>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miércoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
                <th>Sábado</th>
                <th>Domingo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($horarios as $item)
            <tr>
                <td>{{$item->hora_inicio}}</td>
                <td>{{$item->hora_fin}}</td>
                <td>{{$item->lunes}}</td>
                <td>{{$item->martes}}</td>
                <td>{{$item->miercoles}}</td>
                <td>{{$item->jueves}}</td>
                <td>{{$item->viernes}}</td>
                <td>{{$item->sabado}}</td>
                <td>{{$item->domingo}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
