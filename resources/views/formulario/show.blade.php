<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Encabezados de Formulario de Inscripción</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Título Principal</th>
                <th>Subtítulo</th>
                <th>Año</th>
                <th>Título de la Ficha</th>
                <th>Declaración</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($formularios as $item)
            <tr>
                <td>{{$item->titulo_principal}}</td>
                <td>{{$item->subtitulo}}</td>
                <td>{{$item->año_logo}}</td>
                <td>{{$item->titulo_ficha}}</td>
                <td>{{$item->declaracion}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
