<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deporte Adaptado - Listado de Categorías</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Categoría</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deportes_adaptados as $item)
            <tr>
                <td>{{$item->nombre}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
