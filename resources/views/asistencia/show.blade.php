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
                @foreach ($fechas as $item)
                <th>{{$item->fecha}}</th>
                @endforeach
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

                @for($i=$s;$i<count($fechas)+$s;$i++)
                <td>{{$estado[$i]}}</td>
                @endfor
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