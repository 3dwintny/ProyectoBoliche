<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF EDG-27.2</title>
    <style>
        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
        }
    </style>
</head>
<body>
    <table class="table table-responsive table-bordered border-light">
        <thead class="table-dark ">
           
            <tr>
                <th>No</th>
                <th>Nombre(s) Apellido(s) completos</th>
                <th>Fecha de Nacimiento</th>
                <th>Edad</th>
                <th>Género</th>
                <th>Categoría</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($atletas as $item)
            <tr style="text-align: center;">
                <td>{{$item->id}}</td>
                <td>
                    {{$item->alumno->nombre1}} {{$item->alumno->nombre2}} {{$item->alumno->nombre3}}
                    {{$item->alumno->apellido1}} {{$item->alumno->apellido2}}
                </td>
                <td>{{$item->alumno->fecha}}</td>
                <td>{{$item->alumno->edad}}</td>
                <td>{{$item->alumno->genero}}</td>
                <td>{{$item->categoria->tipo}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>