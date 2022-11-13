<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Categorías</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Categoría</th>
                <th>Rango de Edades</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $item)
            <tr>
                <td>{{$item->tipo}}</td>
                <td>{{$item->rango_edades}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>