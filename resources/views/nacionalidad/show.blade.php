<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Nacionalidades</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Deporte</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nacionalidades as $item)
            <tr>
                <td>{{$item->descripcion}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
