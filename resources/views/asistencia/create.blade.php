<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Asistencia</title>
</head>
<body>
    <form method="POST" action="{{route('asistencias.store')}}" enctype="multipart/form-data" role="form">
        @csrf
        <label>Fecha</label>
        <table>
            <thead>
                <tr>
                    <th>Atleta</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($atletas as $item)
                <tr>
                    <td>{{$item->alumno->nombre1}} {{$item->alumno->nombre2}} {{$item->alumno->nombre3}} {{$item->alumno->apellido1}} {{$item->alumno->apellido2}}</td>
                    <td><input type="checkbox" value="Asistencia" name="estado" id=""></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>