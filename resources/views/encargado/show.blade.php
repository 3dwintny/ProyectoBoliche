<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Encargados</title>
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
                <th>Dirección</th>
                <th>Celular</th>
                <th>Teléfono de Casa</th>
                <th>Correo</th>
                <th>CUI</th>
                <th>Parentesco</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($encargados as $item)
            <tr>
                <td>{{$item->nombre1}}</td>
                <td>{{$item->nombre2}}</td>
                <td>{{$item->nombre3}}</td>
                <td>{{$item->apellido1}}</td>
                <td>{{$item->apellido2}}</td>
                <td>{{$item->apellido_casada}}</td>
                <td>{{$item->direccion}}</td>
                <td>{{$item->celular}}</td>
                <td>{{$item->telefono_casa}}</td>
                <td>{{$item->correo}}</td>
                <td>{{$item->dpi}}</td>
                <td>{{$item->parentezco->tipo}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
