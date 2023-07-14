<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Asociación de Boliche de Quetzaltenango</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .animation-container {
            text-align: center;
            padding: 20px;
        }
    
        .loading-animation {
            display: inline-block;
            position: relative;
        }
    
        .loading-text {
            display: inline-block;
            animation: loading 1.5s infinite;
        }
    
        @keyframes loading {
            0% {
                opacity: 0.2;
            }
            20% {
                opacity: 1;
            }
            100% {
                opacity: 0.2;
            }
        }
    </style> 
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
                        <form method="POST" action="{{ route('verification.send') }}" class="nav-link d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-warning">
                                Enviar enlace de verificación
                            </button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="nav-link d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger text-gray-600">
                                Cerrar sesión
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="alert alert-primary mt-1" role="alert">
            <p>¡Gracias por registrarte! Antes de comenzar, queremos asegurarnos de que puedas acceder a tu cuenta. Por favor, verifica tu correo electrónico haciendo clic en el enlace que te hemos enviado. Si aún no has recibido el correo, no te preocupes, te lo enviaremos nuevamente. ¡Esperamos que disfrutes de nuestra plataforma!</p>
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success mb-4">
                <p>Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionaste durante el registro.</p>
            </div>
        @endif

        <div class="animation-container">
            <div class="loading-animation">
                <span class="loading-text">Prepárate...</span>
            </div>
        </div>  
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>