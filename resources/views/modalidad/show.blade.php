<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Modalidad de Entrenamientos</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Modalidad</th>
                <th>Medio de Comunicación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($modalidades as $item)
            <tr>
                <td>{{$item->nombre}}</td>
                <td><a href="{{$item->medio_comunicacion}}">{{$item->medio_comunicacion}}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
