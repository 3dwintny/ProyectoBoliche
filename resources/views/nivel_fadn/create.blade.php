<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{route('niveles-fadn.store')}}" enctype="multipart/form-data" role="form">
        @csrf
        <label>Nivel FADN</label>
        <input type="text" name="tipo" placeholder="Nivel FADN" id="" required>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>