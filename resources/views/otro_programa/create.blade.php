<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Otros Programas de Atención - Nueva Categoría</title>
</head>
<body>
    <form method="POST" action="{{route('otros-programas.store')}}" enctype="multipart/form-data" role="form">
        @csrf
        <label>Nueva Categoría</label>
        <input type="text" name="nombre" placeholder="Nueva Categoría" id="" required>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
