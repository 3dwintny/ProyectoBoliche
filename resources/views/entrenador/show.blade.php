<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Entrenadores</title>
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
                <th>Celular</th>
                <th>Teléfono de Casa</th>
                <th>CUI</th>
                <th>Pasaporte</th>
                <th>Género</th>
                <th>Fecha de Nacimiento</th>
                <th>Edad</th>
                <th>Años de Experiencia</th>
                <th>Correo</th>
                <th>Dirección</th>
                <th>Fotografía</th>
                <th>Estado Civíl</th>
                <th>NIT</th>
                <th>Fecha de Registro</th>
                <th>Escolaridad</th>
                <th>Nivel CDAG</th>
                <th>Nivel FADN</th>
                <th>Departamento</th>
                <th>Nacionalidad</th>
                <th>Deporte</th>
                <th>Tipo de Contrato</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entrenadores as $item)
            <tr>
                <td>{{$item->nombre1}}</td>
                <td>{{$item->nombre2}}</td>
                <td>{{$item->nombre3}}</td>
                <td>{{$item->apellido1}}</td>
                <td>{{$item->apellido2}}</td>
                <td>{{$item->apellido_casada}}</td>
                <td>{{$item->celular}}</td>
                <td>{{$item->telefono_casa}}</td>
                <td>{{$item->cui}}</td>
                <td>{{$item->pasaporte}}</td>
                <td>{{$item->genero}}</td>
                <td>{{$item->fecha_nacimiento}}</td>
                <td>{{$item->edad}}</td>
                <td>{{$item->años_experiencia}}</td>
                <td>{{$item->correo}}</td>
                <td>{{$item->direccion}}</td>
                <td>{{$item->foto}}</td>
                <td>{{$item->estado_civil}}</td>
                <td>{{$item->nit}}</td>
                <td>{{$item->fecha_registro}}</td>
                <td>{{$item->escolaridad}}</td>
                <td>{{$item->nivel_cdag->nombre}}</td>
                <td>{{$item->nivel_fadn->tipo}}</td>
                <td>{{$item->departamento->nombre}}</td>
                <td>{{$item->nacionalidad->descripcion}}</td>
                <td>{{$item->deporte->nombre}}</td>
                <td>{{$item->tipo_contrato->descripcion}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
