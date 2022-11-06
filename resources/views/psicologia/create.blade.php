<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ingresar Psicologa(o)</title>
</head>
<body>
    <form method="post" action="{{route('psicologia.store')}}" role="form" enctype="multipart/form-data">
        @csrf
        <label>Primer Nombre</label>
        <input type="text" name="nombre1" placeholder="Primer Nombre" id="" required>
        <label>Segundo Nombre</label>
        <input type="text" name="nombre2" placeholder="Segundo Nombre" id="">
        <label>Tercer Nombre</label>
        <input type="text" name="nombre3" placeholder="Tercer Nombre" id="">
        <label>Primer Apellido</label>
        <input type="text" name="apellido1" placeholder="Primer Apellido" id="" required>
        <label>Segundo Apellido</label>
        <input type="text" name="apellido2" placeholder="Segundo Apellido" id="" required>
        <label>Apellido de Casada</label>
        <input type="text" name="apellido_casada" placeholder="Apellido de Casada" id="">
        <label>Número de Colegiado</label>
        <input type="text" name="colegiado" placeholder="Número de Colegiado" id="" required>
        <label>Celular</label>
        <input type="text" name="telefono" placeholder="Celular" id="" required>
        <label>Correo</label>
        <input type="email" name="correo" placeholder="Correo" id="" required>
        <label>Dirección</label>
        <input type="text" name="direccion" placeholder="Dirección de Residencia" id="" required>
        <label>Fecha de Inicio de Labores</label>
        <input type="date" name="fecha_inicio_labores" id="" required>
        <input type="submit" value="Registrar Psicologa/o">
    </form>
</body>
</html>