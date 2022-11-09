<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Asistencia</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Atleta</th>
                @foreach ($arreglo as $item)
                <th>{{$item->fecha}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($atletas as $item)
            <tr>
                <td>
                    {{$item->alumno->nombre1}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
