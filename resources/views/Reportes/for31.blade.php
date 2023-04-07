<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Inicio</title>
    <!-- Favicon -->
    <!-- Uso de css para el Slider de bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Extra details for Live View on GitHub Pages -->

    <!-- Icons -->
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
    <!-- //Agregado manualmente los estilos de css para bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>

<body class="{{ $class ?? '' }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!--div class="body pb-8 pt-5 pt-lg-1 d-flex align-items-center" style="background-image: url(../argon/img/theme/bol.jpg); background-size: cover; background-position: center top;"!-->
    <div class="header bg-dark pb-2 pt-2 pt-md-2">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <a class="h6 mb-3 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('home') }}">{{ __('home') }}</a>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <h4 class="text-white"> Reporte Asistencia</h4>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Atleta</th>
                                <th>Edad</th>
                                <th>Género</th>
                                <th>Categoría</th>
                                <th>Modalidad</th>
                                @for ($i=0;$i<count($fs);$i++) <th>{{$fs[$i]}}</th>
                                    @endfor
                                    <th>Días Entrenados</th>
                                    <th>% de Asistencia</th>
                                    <th>Etapa Deportiva</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $s=0;
                            $c=0;
                            @endphp
                            @foreach($atleta as $item)

                            <tr id="{{$c}}">
                                <!--Filas-->
                                <td>
                                    <!--Columnas-->
                                    {{$item->atleta->alumno->nombre1}} {{$item->atleta->alumno->nombre2}} {{$item->atleta->alumno->nombre3}}
                                    {{$item->atleta->alumno->apellido1}} {{$item->atleta->alumno->apellido2}}
                                </td>
                                <td>{{$item->atleta->alumno->edad}}</td>
                                <td>{{$item->atleta->alumno->genero}}</td>
                                <td>{{$item->atleta->categoria->tipo}}</td>
                                <td>{{$item->atleta->modalidad->nombre}}</td>

                                @for($i=$s;$i<count($fs)+$s;$i++) <td>{{$estado[$i]}}</td>
                                    @endfor
                                    <td></td>
                                    <td></td>
                                    <td>{{$item->atleta->etapa_deportiva->nombre}}</td>
                            </tr>

                            @php
                            $c=$c+1;
                            $s=$s+count($fs)
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</body>

</html>