
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')    
    @section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12 ">
            <div class="card">

            <h1 class="container-fluid">Formulario para registrar Alumnos</h1>
        <form action="" method="post" class="container col-md-8">
            
            <div class="mb-3">
            <label for="">Ingresar Nombre</label>
            <input type="text" name="" id="">
            <label for="">Ingresar Apellidos</label>
            <input type="text" name="" id="">
            </div>  
            <div class="mb-5">
            <label for="">Ingresar Fecha nacimiento</label>
            <input type="date" name="" id="">
            <label for="">Ingresar Nombre</label>
            <input type="text" name="" id="">
            </div>
        </form>
        </div>
        </div>
    </div>
</div>
@endsection
</body>
</html>