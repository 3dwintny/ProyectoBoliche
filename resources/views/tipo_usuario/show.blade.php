<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Tipos de Usuarios</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Tipo de Usuario</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tipo_usuarios as $item)
            <tr>
                <td>{{$item->tipo}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
