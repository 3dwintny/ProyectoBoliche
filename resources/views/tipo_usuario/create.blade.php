<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ingresar Tipo de Usuario</title>
</head>
<body>
    <form method="POST" action="{{route('tipo-usuarios.store')}}" enctype="multipart/form-data" role="form">
        @csrf
        <label>Tipo de Usuario</label>
        <input type="text" name="tipo" placeholder="Tipo de Usuario" id="" required>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>