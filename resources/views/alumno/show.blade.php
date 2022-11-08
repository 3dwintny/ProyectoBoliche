<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Alumnos</title>
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
                <th>CUI</th>
                <th>Fecha de Nacimiento</th>
                <th>Edad</th>
                <th>Peso</th>
                <th>Altura</th>
                <th>Género</th>
                <th>Dirección</th>
                <th>Teléfono de Casa</th>
                <th>Celular</th>
                <th>Correo</th>
                <th>Contacto de Emergencia</th>
                <th>Fotografía</th>
                <th>Fecha de Fotografía</th>
                <th>Estado</th>
                <th>NIT</th>
                <th>Pasaporte</th>
                <th>Encargado</th>
                <th>Alergias</th>
                <th>Departamento de Nacimiento</th>
                <th>Municipio de Nacimiento</th>
                <th>Departamento de Residencia</th>
                <th>Municipio de Residencia</th>
                <th>Nacionalidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumnos as $item)
            <tr>
                <td>{{$item->nombre1}}</td>
                <td>{{$item->nombre2}}</td>
                <td>{{$item->nombre3}}</td>
                <td>{{$item->apellido1}}</td>
                <td>{{$item->apellido2}}</td>
                <td>{{$item->cui}}</td>
                <td>{{$item->fecha}}</td>
                <td>{{$item->edad}}</td>
                <td>{{$item->peso}}</td>
                <td>{{$item->altura}}</td>
                <td>{{$item->genero}}</td>
                <td>{{$item->direccion}}</td>
                <td>{{$item->telefono_casa}}</td>
                <td>{{$item->celular}}</td>
                <td>{{$item->correo}}</td>
                <td>{{$item->contacto_emergencia}}</td>
                <td>{{$item->foto}}</td>
                <td>{{$item->fecha_fotografia}}</td>
                <td>{{$item->estado}}</td>
                <td>{{$item->nit}}</td>
                <td>{{$item->pasaporte}}</td>
                <td>{{$item->encargado->nombre1}}</td>
                <td>{{$item->alergia->nombre}}</td>
                <td>{{$item->departamento->nombre}}</td>
                <td>{{$item->municipio->nombre}}</td>
                <td>{{$item->departamento_residencia->nombre}}</td>
                <td>{{$item->municipio_residencia->nombre}}</td>
                <td>{{$item->nacionalidad->descripcion}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
