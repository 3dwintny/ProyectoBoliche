<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Probando</title>

    <style>
        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
        }
        </style>
</head>
<body>
    <table>
        <thead style="background-color: blue;">
            <tr>
                <th rowspan="3">Atleta</th>
                <th rowspan="3"><p style="writing-mode: vertical-lr;
                    transform: rotate(270deg);">Edad</p> </th>
                <th rowspan="3"><p style="writing-mode: vertical-lr;
                    transform: rotate(270deg);">Género</p></th>
                <th rowspan="3"><p style="writing-mode: vertical-lr;
                    transform: rotate(270deg);">Categoría</p></th>
                <th rowspan="3"><p style="writing-mode: vertical-lr;
                    transform: rotate(270deg);">Modalidad</p></th>
                <th colspan="{{count($fs)}}" rowspan="2">Control de Asistencia</th>
                <th rowspan="3"><p style="writing-mode: vertical-lr;
                    transform: rotate(270deg);">Días Entrenados</p></th>
                <th rowspan="3"><p style="writing-mode: vertical-lr;
                    transform: rotate(270deg);">% de Asistencia</p></th>
                <th rowspan="3"><p style="writing-mode: vertical-lr;
                    transform: rotate(270deg);">Etapa Deportiva</p></th>
            </tr>
            <tr>
                @for ($i=0;$i<count($fs);$i++)
                <th>{{$fs[$i]}}</th>
                @endfor
            </tr>
        </thead>
        <tbody>
            @php
                $s=0;
                $c=0;
            @endphp
            @foreach($atleta as $item)

            <tr id="{{$c}}" style="text-align: center;"><!--Filas-->
                <td ><!--Columnas-->
                    {{$item->atleta->alumno->nombre1}} {{$item->atleta->alumno->nombre2}} {{$item->atleta->alumno->nombre3}}
                    {{$item->atleta->alumno->apellido1}} {{$item->atleta->alumno->apellido2}}
                </td>
                <td>{{$item->atleta->alumno->edad}}</td>
                <td>{{$item->atleta->alumno->genero}}</td>
                <td>{{$item->atleta->categoria->tipo}}</td>
                <td>{{$item->atleta->modalidad->nombre}}</td>

                @for($i=$s;$i<count($fs)+$s;$i++)
                <td>{{$estado[$i]}}</td>
                @endfor
                <td></td>
                <td></td>
                <td>{{$item->atleta->etapa_deportiva->nombre}}</td>
            </tr>

            @php
                $c=$c+1;
                $s=$s+count($fs)
            @endphp
            @endforeach
        </tbody>
    </table>
</body>
</html>
