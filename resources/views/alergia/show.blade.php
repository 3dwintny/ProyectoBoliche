<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Alergias</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alergias as $item)
            <tr>
                <td>{{$item->nombre}}</td>
                <td>{{$item->descripcion}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>