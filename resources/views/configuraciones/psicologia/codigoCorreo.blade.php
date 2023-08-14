<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Asociación de Boliche de Quetzaltenango</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="nav-link d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger text-gray-600">
                                Cerrar sesión
                            </button>
                        </form>
                    </li>
                    <li>
                        <a href="https://youtu.be/z_0CJaH4LSQ" style="text-decoration: none; color:white;" target="_blank">¿Cómo generar el código del correo?</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="alert alert-primary mt-1" role="alert">
            <p style="text-align: center;">¡Gracias por registrarte! Antes de comenzar, queremos asegurarnos de que puedas enviar el correo con la tarea asignada al paciente. Por favor, ingresa el código de tu correo. ¡Esperamos que disfrutes de nuestra plataforma!</p>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                    <form action="{{route('actualizarCodigoCorreo')}}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="codigo_correo" name="codigo_correo" placeholder="Código de correo" required>
                            <label for="codigo_correo">Código de correo</label>
                        </div>
                        <div class="text-center"> <!-- Agregamos la clase text-center -->
                            <button type="submit" class="btn btn-outline-primary">Aceptar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>