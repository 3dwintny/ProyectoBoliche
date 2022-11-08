<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario de Inscripciíon - Nueva Información</title>
</head>
<body>
    <form method="POST" action="{{route('formularios.store')}}" enctype="multipart/form-data" role="form">
        @csrf
        <label>Título Principal</label>
        <input type="text" name="titulo_principal" placeholder="Título Principal" id="" required>
        <label>Subtítulo</label>
        <input type="text" name="subtitulo" placeholder="Subtítulo" id="" required>
        <label>Año</label>
        <input type="text" name="año_logo" placeholder="Año" id="" required>
        <label>Título de la Ficha</label>
        <input type="text" name="titulo_ficha" placeholder="Título de la Ficha" id="" required>
        <textarea rows="10" cols="70" name="declaracion" id="" placeholder="Declaración" style="resize:none;" required></textarea>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>