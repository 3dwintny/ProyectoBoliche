<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ingresar Alergias</title>
</head>
<body>
    <form method="POST" role="form" action="{{route('alergias.store')}}" enctype="multipart/form-data">
        @csrf
        <label>Nombre</label>
        <input type="text" name="nombre" id="" required>
        <label>Descripción</label>
        <textarea rows="10" cols="30" name="descripcion" id=""></textarea>
        <input type="submit" value="Ingresar">
    </form>
</body>
</html>