<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ingresar PRT</title>
</head>
<body>
    <form method="POST" action="{{route('prt.store')}}" enctype="multipart/form-data" role="form">
        @csrf
        <label>PRT</label>
        <input type="text" name="nombre" placeholder="PRT" id="" required>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>