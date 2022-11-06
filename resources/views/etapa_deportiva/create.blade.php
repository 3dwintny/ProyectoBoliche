<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nueva Etapa Deportiva</title>
</head>
<body>
    <form method="POST" action="{{route('etapas-deportivas.store')}}" enctype="multipart/form-data" role="form">
        @csrf
        <label>Etapa Deportiva</label>
        <input type="text" name="nombre" placeholder="Etapa Deportiva" id="" required>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
