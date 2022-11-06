<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Deportes</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Deporte</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deportes as $item)
            <tr>
                <td>{{$item->nombre}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>