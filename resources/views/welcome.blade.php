<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Página Principal</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->

        <style>
            a{
                text-decoration: none;
                font-size: 16px;
                margin-left:2%;
            }

            .barra{
                width: 100%;
                background-color: black;
                border-color: #024089;
                border-style: outset;
            }
        </style>
    </head>
    <body>
        <div class="barra">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" style="color: #FFC619;">Iniciar Sesión</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register')}}" style="color: #FA841A";>Registrarse</a>
                        @endif
                        <a href="{{route('alumnos.create')}}" style="color: #FFC619;">Formulario Inscripción</a>
                    @endauth
                </div>
            @endif
        </div>
    </body>
</html>
