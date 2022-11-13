<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Asistencia</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Atleta</th>
                <th>Edad</th>
                <th>Género</th>
                <th>Categoría</th>
                <th>Modalidad</th>
                @foreach ($fechas as $item)
                <th>{{$item->fecha}}</th>
                @endforeach
                <th>Días Entrenados</th>
                <th>% de Asistencia</th>
                <th>Etapa Deportiva</th>
            </tr>
        </thead>
        <tbody>
            @php 
                $s=0; 
                $c=0;
            @endphp
            @foreach($atleta as $item)
            
            <tr id="{{$c}}"><!--Filas-->
                <td><!--Columnas-->
                    {{$item->atleta->alumno->nombre1}} {{$item->atleta->alumno->nombre2}} {{$item->atleta->alumno->nombre3}}
                    {{$item->atleta->alumno->apellido1}} {{$item->atleta->alumno->apellido2}}
                </td>
                <td>{{$item->atleta->alumno->edad}}</td>
                <td>{{$item->atleta->alumno->genero}}</td>
                <td>{{$item->atleta->categoria->tipo}}</td>
                <td>{{$item->atleta->modalidad->nombre}}</td>

                @for($i=$s;$i<count($fechas)+$s;$i++)
                <td>{{$estado[$i]}}</td>
                @endfor
                <td></td>
                <td></td>
                <td>{{$item->atleta->etapa_deportiva->nombre}}</td>
            </tr>

            @php 
                $c=$c+1; 
                $s=$s+count($fechas) 
            @endphp
            @endforeach
        </tbody>
    </table>
</body>
</html>
