<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuevo Tipo de Contrato</title>
</head>
<body>
    <form role="form" enctype="multipart/form-data" action="{{route('tipo-contratos.store')}}" method="POST">
        @csrf
        <label>Tipo de Contrato</label>
        <input type="text" name="descripcion" id="" placeholder="Tipo de Contrato" required>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>