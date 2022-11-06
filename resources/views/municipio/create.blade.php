<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ingresar Municipio</title>
</head>
<body>
    <form method="POST" role="form" action="{{route('municipio.store')}}" enctype="multipart/form-data">
        <label>Nombre</label>
        <input type="text" name="nombre" id="" placeholder="Nombre" required>
        <label>Departamento</label>
        <select name="departamento_id">
            <option selected disabled>Departamento</option>
            @foreach ($departamentos as $item)
            <option value="{{$item->id}}">{{$item->nombre}}</option>
            @endforeach
        </select>   
        <input type="submit" value="Guardar">
    </form>
</body>
</html>