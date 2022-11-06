<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ingresar Parentezco</title>
</head>
<body>
    <form method="POST" action="{{route('parentezcos.store')}}" role="form" enctype="multipart/form-data">
        @csrf
        <label>Parentesco</label>
        <input type="text" name="tipo" id="" required placeholder="Parentesco">
        <input type="submit" value="Guardar">
    </form>
</body>
</html>