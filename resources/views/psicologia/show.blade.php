<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Psicologo/a(s)</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Primer Nombre</th>
                <th>Segundo Nombre</th>
                <th>Tercer Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Apellido de Casada</th>
                <th>Número de Colegiado</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Dirección</th>
                <th>Fecha de Inicio de Labores</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($psicologos as $item)
            <tr>
                <td>{{$item->nombre1}}</td>
                <td>{{$item->nombre2}}</td>
                <td>{{$item->nombre3}}</td>
                <td>{{$item->apellido1}}</td>
                <td>{{$item->apellido2}}</td>
                <td>{{$item->apellido_casada}}</td>
                <td>{{$item->colegiado}}</td>
                <td>{{$item->telefono}}</td>
                <td>{{$item->correo}}</td>
                <td>{{$item->direccion}}</td>
                <td>{{$item->fecha_inicio_labores}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
