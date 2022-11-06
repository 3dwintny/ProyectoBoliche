<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ingresar Categoría</title>
</head>
<body>
    <form method="POST" role="form" enctype="multipart/form-data" action="{{route('categorias.store')}}">
        @csrf
        <label>Categoría</label>
        <input type="text" name="tipo" id="" placeholder="Categoría" required>
        <label>Rango de Edades</label>
        <input type="text" name="rango_edades" id="" placeholder="Rango de Edades" required>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>