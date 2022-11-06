<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ingresar Nuevo Horario</title>
</head>
<body>
    <form method="POST" action="{{route('horarios.store')}}" enctype="multipart/form-data" role="form">
        @csrf
        <label>Hora de Inicio</label>
        <input type="time" name="hora_inicio"  id="" required>
        <label>Hora Final</label>
        <input type="time" name="hora_fin"  id="" required>
        <label>Lunes</label>
        <input type="checkbox" value="X" name="lunes"  id="">
        <label>Martes</label>
        <input type="checkbox" value="X" name="martes"  id="">
        <label>Miércoles</label>
        <input type="checkbox" value="X" name="miercoles"  id="">
        <label>Jueves</label>
        <input type="checkbox" value="X" name="jueves"  id="">
        <label>Viernes</label>
        <input type="checkbox" value="X" name="viernes"  id="">
        <label>Sábado</label>
        <input type="checkbox" value="X" name="sabado"  id="">
        <label>Domingo</label>
        <input type="checkbox" value="X" name="domingo"  id="">
        <input type="submit" value="Guardar">
    </form>
</body>
</html>