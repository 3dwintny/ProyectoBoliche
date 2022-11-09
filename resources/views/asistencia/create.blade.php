<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Asistencia</title>
</head>

<body>
    <form method="POST" action="{{route('asis')}}" enctype="multipart/form-data" role="form">
        @csrf
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Fecha</th>
                    <th>Atleta</th>
                    <th>Asistencia</th>
                    <th>Inasistencia</th>
                    <th>Permiso/Descanso</th>
                    <th>Enfermo</th>
                    <th>Lesión</th>
                    <th>Competencia</th>
                </tr>
            </thead>
            <tbody>
                @foreach($atletas as $item)
                <tr>
                    <td>
                        <input type="text" name="atleta_id[]" value="{{$item->id}}" readonly>
                    </td>
                    <td>
                        <input type="text" name="fecha[]" id="" value="{{$hoy->format('Y-m-d')}}" readonly>
                    </td>
                    <td>
                        <input type="text" value="{{$item->alumno->nombre1}} {{$item->alumno->nombre2}} {{$item->alumno->nombre3}} {{$item->alumno->apellido1}} {{$item->alumno->apellido2}}" readonly>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" id="estado" class="{{$item->id}}" name="estado[]" value="X" > <span></span>
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" id="estado" class="{{$item->id}}" name="estado[]" value="O" > <span></span>
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" id="estado" class="{{$item->id}}" name="estado[]" value="P" > <span></span>
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" id="estado" class="{{$item->id}}" name="estado[]" value="E" > <span></span>
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" id="estado" class="{{$item->id}}" name="estado[]" value="L" > <span></span>
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="checkbox" id="estado" class="{{$item->id}}" name="estado[]" value="C" > <span></span>
                        </label>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <input type="submit" value="Guardar Asistencia">
    </form>
</body>
</html>