<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nueva Nacionalidad</title>
</head>
<body>
    <form method="POST" action="{{route('nacionalidades.store')}}" enctype="multipart/form-data" role="form">
        @csrf
        <label>Nacionalidad</label>
        <input type="text" name="descripcion" placeholder="Nacionalidad" id="" required>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
