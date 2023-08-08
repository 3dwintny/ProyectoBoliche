<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF EDG-30</title>
    <style>
        #contenedorPrincipal{
            width: 24.6cm;
            height: 100%;
        }
        #contenedorEncabezado{
            width: 100%;
            height: 1.25cm;
            border-bottom: 0.3px solid black;
            border-top: 0.3px solid black;
            border-left: 0.3px solid black;
            border-right: 0.3px solid black;
        }
        #contenedorLogotipo{
            width: 0.85cm;
            height: 100%;
            border-right: 0.3px solid black;
            float: left;
            position: relative;
        }
        #contenedorPrincipalEncabezado{
            width: 23.75cm;
            height: 0.8cm;
            border-bottom: 0.3px solid black;
            float: left;
            position: relative;
        }
        #contenedorSecundarioEncabezado{
            margin-top: 2.70%;
            width: 23.75cm;
            height: 0.45cm;
            float: left;
            position: relative;
        }
        #separacionCeroPuntoCincoCm{
            width: 100%;
            height: 0.5cm;
        }
        .separacionCeroPuntoCuatroCm{
            width: 100%;
            height: 0.4cm;
        }
        #contenedorTextoFormulario{
            width: 100%;
            height: 50%;
            font-size: 67%;
        }
        #contenedorTextoRegistroAsistencia{
            width: 100%;
            height: 50%;
            font-size: 67%;
        }
        #contenedorTextoProcesoAdministrativo{
            margin-left: 1.9cm;
            width: 2.6cm;
            height: 50%;
            float: left;
            position: relative;
            margin-top: 0.15cm;
            font-size: 35.75%;
            transform-origin: 0 0;
            transform: scaleX(2) scaleY(2);
        }
        #contenedorTextoCodigo{
            margin-left: 8.1cm;
            width: 1.5cm;
            height: 50%;
            float: left;
            position: relative;
            margin-top: 0.15cm;
            font-size: 35.75%;
            transform-origin: 0 0;
            transform: scaleX(2) scaleY(2);
        }
        #contenedorTextoFechaAprobacion{
            margin-left: 12cm;
            width: 1.96cm;
            height: 50%;
            float: left;
            position: relative;
            margin-top: 0.15cm;
            font-size: 35.75%;
            transform-origin: 0 0;
            transform: scaleX(2) scaleY(2);
        }
        #contenedorTextoVersion{
            margin-left: 16.9cm;
            width: 0.73cm;
            height: 50%;
            float: left;
            position: relative;
            margin-top: 0.15cm;
            font-size: 35.75%;
            transform-origin: 0 0;
            transform: scaleX(2) scaleY(2);
        }
        #contenedorTextoNumeroPagina{
            margin-left: 19cm;
            width: 1.05cm;
            height: 50%;
            float: left;
            position: relative;
            margin-top: 0.15cm;
            font-size: 35.75%;
            transform-origin: 0 0;
            transform: scaleX(2) scaleY(2);
        }
        #contenedorHojaNoMesAnio{
            width: 100%;
            height: 0.4cm;
        }
        #contenedorTextoHojaNo{
            margin-left: 5.1cm;
            height: 100%;
            float: left;
            position: relative;
            width: 5.52cm;
        }
        #contenedorTextoMesAnio{
            margin-left: 6.47cm;
            height: 100%;
            float: left;
            position: relative;
            width: 6.5cm;
        }
        .textoAlineadoAlCentro{
            text-align: center;
        }
        .rotacionVerticalTexto{
            writing-mode: vertical-lr; 
            transform: rotate(270deg);
            width: 100%;
        }
        #dimensionesEncabezadoNombreAtletaTbl{
            height: 1.57cm;
        }
        .margenIzquierdoDinamico{
            margin-left:auto;
        }
        .anchoTotalTablas{
            width: 100%;
        }
        #anchoContenedorDatosUbicacion{
            width: 6.37708333333cm;
        }
        .tipoFuente{
            font-family: "Century Gothic", sans-serif; 
        }
        .altoFilasDatosUbicacionEntrenamientoMonitoreoEvaluacion{
            height: 0.42cm;
        }
        .anchoContenedorTextoPrimeraVisita{
            width: 3.64708333333cm;
        }
        #anchoContenedorDatosEntrenamiento{
            width: 6.57708333333cm;
        }
        .anchoDinamico{
            width:auto;
        }
        .altoFilaTblAsistencia{
            height: 0.3420625cm;
        }
        .altoEncabezadoTextoControlAsistencia{
            height: 0.9cm;
        }
        #posicionMes{
            position: absolute; 
            margin-left: 3.05cm; 
            margin-top: -0.05cm;
            width: 2.65cm;
            text-align: center;
        }
        .posicionBordeFechaTblControl{
            position: absolute; 
            margin-left: 0.45cm; 
            margin-top: 0.22cm;
            width: 2.5cm;
            border-bottom: black 0.1px solid;
        }
        .posicionBordeConteoTblControl{
            position: absolute; 
            margin-left: 0.42cm; 
            margin-top: 0.22cm;
            width: 2.5cm;
            border-bottom: black 0.1px solid;
        }
        .posicionBordeFirmaMetodologo{
            position: absolute; 
            margin-left: 0.23cm; 
            margin-top: 0.22cm;
            width: 2.02cm;
            border-bottom: black 0.1px solid;
        }
        .posicionBordeDeporteDeptoMunicipioTblControl{
            position: absolute; 
            margin-left: 1cm; 
            margin-top: 0.25cm;
            width: 5.5cm;
            border-bottom: black 0.1px solid;
        }
        #posicionBordeNombreEntrenador{
            position: absolute; 
            margin-left: 2.2cm; 
            margin-top: 0.25cm;
            width: 4.48cm;
            border-bottom: black 0.1px solid;
        }
        #posicionNombreEntrenador{
            position: absolute; 
            margin-left: 1.04cm; 
            margin-top: 0cm;
            width: 4.48cm;
            text-align: center;
        }
        #posicionBordeHorario{
            position: absolute; 
            margin-left: 1.48cm; 
            margin-top: 0.25cm;
            width: 5.2cm;
            border-bottom: black 0.1px solid;
        }
        #posicionBordeDiasEntreno{
            position: absolute; 
            margin-left: 2.98cm; 
            margin-top: 0.25cm;
            width: 3.7cm;
            border-bottom: black 0.1px solid;
        }
        #posicionDiasEntreno{
            position: absolute; 
            margin-left: 1.15cm; 
            margin-top: 0cm;
            width: 3.7cm;
            text-align: center;
        }
        #bordesTablaControl{
            border-left: 1px solid black;
            border-bottom: 1px solid black;
            border-collapse: collapse;
            height: 0.4cm;
        }
        .bordeDerechoBlancoUnPixel{
            border-right: 1px solid white;
        }
        .bordeDerechoNegroUnPixel{
            border-right: 1px solid black;
        }
        #bordeInferiorBlancoUnPixel{
            border-bottom:  1px solid white;
        }
        .bordeInferiorGruesoNegroUnPixel{
            border-bottom: black 1px solid;
        }
        #bordeInferiorGruesoBlancoUnPixel{
            border-bottom: white 1px solid;
        }
        .todosBordesCeroPuntoTresPixels{
            border: 0.3px solid black; 
            border-collapse: collapse;
        }
        .tamanioFuenteOchoPuntos{
            font-size:50%;
        }
        .tamanioFuenteOncePuntos{
            font-size:68.75%;
        }
        .tamanioFuenteDiezPuntos{
            font-size:62.5%;
        }
        .tamanioFuenteSietePuntos{
            font-size:43.75%;
        }
        .fondoAzulObscuro{
            color: white;
            background-color: #002060;
        }
        .fondoCeleste{
            color: white;
            background-color: #00B0F0;
        }
        th {
            white-space: nowrap;
        }
        td {
            white-space: nowrap;
        }
    </style>
    {{-- <link href="css/edg30/pdf.css" rel="stylesheet"> --}}
</head>
<body>
    <div id="contenedorPrincipal" class="tipoFuente">
        <div id="contenedorEncabezado">
            <div id="contenedorLogotipo">
                <img src="storage/uploads/logo.jpeg" width="96%" height="96%">
            </div>
            <div id="contenedorPrincipalEncabezado">
                <div class="textoAlineadoAlCentro" id="contenedorTextoFormulario">
                    FORMULARIO
                </div>
                <div id="contenedorTextoRegistroAsistencia" class="textoAlineadoAlCentro">
                    <strong>REGISTRO DE ASISTENCIA DE ATLETAS FEDERADOS</strong>
                </div>
            </div>
            <div id="contenedorSecundarioEncabezado">
                <div id="contenedorTextoProcesoAdministrativo">
                    Del Proceso: Administración del MRD.
                </div>
                <div id="contenedorTextoCodigo">
                    Código:<strong>EDG-FOR-30.</strong>
                </div>
                <div id="contenedorTextoFechaAprobacion">
                    Fecha de aprob: {{Carbon\Carbon::parse($aprobacion)->format('d/m/Y')}}
                </div>
                <div id="contenedorTextoVersion">
                    Versión: 1.
                </div>
                <div id="contenedorTextoNumeroPagina">
                    Página: 1 de 1.
                </div>
            </div>
        </div>
        <div id="separacionCeroPuntoCincoCm"></div>
        <div id="contenedorHojaNoMesAnio" class="tamanioFuenteOncePuntos">
            <div id="contenedorTextoHojaNo">
                <strong>
                    Hoja No.
                </strong>______________ 
                &nbsp;&nbsp; de &nbsp;&nbsp; ______
            </div>
            <div id="contenedorTextoMesAnio">
                <span id="posicionMes">{{$mostrarMes}}</span>
                <strong>Mes y año a Reportar:</strong>_________________{{$obtenerAnio}}
            </div>
        </div>
        <div class="separacionCeroPuntoCuatroCm"></div>
        <table class="anchoTotalTablas" cellpading=0 cellspacing=0>
            <thead>
                <tr>
                    <th class="fondoAzulObscuro bordeDerechoBlancoUnPixel tamanioFuenteOncePuntos bordeInferiorGruesoNegroUnPixel">
                        DATOS DE UBICACIÓN
                    </th>
                    <th class="fondoAzulObscuro bordeDerechoBlancoUnPixel tamanioFuenteOncePuntos bordeInferiorGruesoNegroUnPixel">
                        DATOS DE ENTRENAMIENTO
                    </th>
                    <th class="fondoAzulObscuro tamanioFuenteOncePuntos" id="bordeInferiorGruesoBlancoUnPixel" colspan="3">
                        MONITOREO Y EVALUACIÓN
                    </th>
                </tr>
            </thead>
            <tbody id="bordesTablaControl" class="tamanioFuenteOchoPuntos">
                <tr class="altoFilasDatosUbicacionEntrenamientoMonitoreoEvaluacion">
                    <td class="bordeDerechoNegroUnPixel" id="anchoContenedorDatosUbicacion">
                        <span class="posicionBordeDeporteDeptoMunicipioTblControl"></span>
                        FADN: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Boliche
                    </td>
                    <td class="bordeDerechoNegroUnPixel" id="anchoContenedorDatosEntrenamiento">
                        <span id="posicionBordeNombreEntrenador"></span>
                        Entrenador: <span id="posicionNombreEntrenador">{{$entrenador}}</span> 
                    </td>
                    <th class="bordeDerechoBlancoUnPixel textoAlineadoAlCentro fondoCeleste bordeInferiorGruesoNegroUnPixel anchoContenedorTextoPrimeraVisita">
                        PRIMERA VISITA
                    </th>
                    <th class="bordeDerechoBlancoUnPixel textoAlineadoAlCentro fondoCeleste bordeInferiorGruesoNegroUnPixel anchoContenedorTextoPrimeraVisita">
                        PRIMERA VISITA
                    </th>
                    <th class="textoAlineadoAlCentro fondoCeleste bordeInferiorGruesoNegroUnPixel anchoContenedorTextoPrimeraVisita">
                        PRIMERA VISITA
                    </th>
                </tr>
                <tr class="altoFilasDatosUbicacionEntrenamientoMonitoreoEvaluacion">
                    <td class="bordeDerechoNegroUnPixel">
                        <span class="posicionBordeDeporteDeptoMunicipioTblControl"></span>
                        Depto.: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$departamento}}
                    </td>
                    <td class="bordeDerechoNegroUnPixel">
                        <span id="posicionBordeHorario"></span>
                        Horario: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$horario}}
                    </td>
                    <td class="bordeDerechoNegroUnPixel">
                        Fecha:&nbsp;
                        <span class="posicionBordeFechaTblControl"></span>
                    </td>
                    <td class="bordeDerechoNegroUnPixel">
                        Fecha:&nbsp;
                        <span class="posicionBordeFechaTblControl"></span>
                    </td>
                    <td class="bordeDerechoNegroUnPixel">
                        Fecha:&nbsp;
                        <span class="posicionBordeFechaTblControl"></span>
                    </td>
                </tr>
                <tr class="altoFilasDatosUbicacionEntrenamientoMonitoreoEvaluacion">
                    <td class="bordeDerechoNegroUnPixel">
                        <span class="posicionBordeDeporteDeptoMunicipioTblControl"></span>
                        Mun.: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$municipio}}
                    </td>
                    <td class="bordeDerechoNegroUnPixel">
                        <span id="posicionBordeDiasEntreno"></span>
                        Días entren. Prog.: 
                        <span id="posicionDiasEntreno">{{$dias}}</span>
                    </td>
                    <td class="bordeDerechoNegroUnPixel">
                        Conteo:
                        <span class="posicionBordeConteoTblControl"></span>
                    </td>
                    <td class="bordeDerechoNegroUnPixel">
                        Conteo:
                        <span class="posicionBordeConteoTblControl"></span>
                    </td>
                    <td class="bordeDerechoNegroUnPixel">
                        Conteo:
                        <span class="posicionBordeConteoTblControl"></span>
                    </td>
                </tr>
                <tr class="altoFilasDatosUbicacionEntrenamientoMonitoreoEvaluacion">
                    <td class="bordeDerechoNegroUnPixel">
                        Centro de Entrenamiento:
                    </td>
                    <td class="bordeDerechoNegroUnPixel">
                        Firma entrenador:
                    </td>
                    <td class="bordeDerechoNegroUnPixel">
                        F. Metodólogo:
                        <span class="posicionBordeFirmaMetodologo"></span>
                    </td>
                    <td class="bordeDerechoNegroUnPixel">
                        F. Metodólogo:
                        <span class="posicionBordeFirmaMetodologo"></span>
                    </td>
                    <td class="bordeDerechoNegroUnPixel">
                        F. Metodólogo:
                        <span class="posicionBordeFirmaMetodologo"></span>
                    </td>
                </tr>
                <tr class="altoFilasDatosUbicacionEntrenamientoMonitoreoEvaluacion">
                    <td class="bordeDerechoNegroUnPixel">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$centro}}
                    </td>
                    <td class="bordeDerechoNegroUnPixel"></td>
                    <td class="bordeDerechoNegroUnPixel">
                        F. Entrenador:
                    </td>
                    <td class="bordeDerechoNegroUnPixel">
                        F. Entrenador:
                    </td>
                    <td class="bordeDerechoNegroUnPixel">
                        F. Entrenador:
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="separacionCeroPuntoCuatroCm"></div>
        <table class="anchoTotalTablas" cellpading=0 cellspacing=0>
            @php
                $contador = 1;   
            @endphp
            <thead class="fondoAzulObscuro">
                <tr>
                    <th rowspan="2" class="bordeDerechoBlancoUnPixel anchoDinamico tamanioFuenteOncePuntos">
                        No.
                    </th>
                    <th rowspan="2" class="bordeDerechoBlancoUnPixel tamanioFuenteDiezPuntos" id="dimensionesEncabezadoNombreAtletaTbl">
                        NOMBRE COMPLETO DEL ATLETA
                    </th>
                    <th rowspan="2" class=" bordeDerechoBlancoUnPixel tamanioFuenteOchoPuntos anchoDinamico">
                        <p class="rotacionVerticalTexto margenIzquierdoDinamico">
                            EDAD
                        </p> 
                    </th>
                    <th rowspan="2" class="bordeDerechoBlancoUnPixel tamanioFuenteOchoPuntos anchoDinamico">
                        <p class="rotacionVerticalTexto margenIzquierdoDinamico">
                            GÉNERO
                        </p>
                    </th>
                    <th rowspan="2" class="bordeDerechoBlancoUnPixel tamanioFuenteOchoPuntos anchoDinamico">
                        <p class="rotacionVerticalTexto margenIzquierdoDinamico">
                            CATEGORÍA
                        </p>
                    </th>
                    <th rowspan="2" class="bordeDerechoBlancoUnPixel tamanioFuenteOchoPuntos anchoDinamico">
                        <p class="rotacionVerticalTexto margenIzquierdoDinamico">
                            MODALIDAD
                        </p>
                    </th>
                    <th colspan="{{count($fechas)}}" class="bordeDerechoBlancoUnPixel anchoDinamico tamanioFuenteOncePuntos altoEncabezadoTextoControlAsistencia" id="bordeInferiorBlancoUnPixel">
                        CONTROL DE ASISTENCIA A ENTRENAMIENTO
                    </th>
                    <th colspan="1" rowspan="2" class="tamanioFuenteOchoPuntos bordeDerechoBlancoUnPixel anchoDinamico">
                        <p class="rotacionVerticalTexto margenIzquierdoDinamico">
                            DÍAS 
                            <br/> 
                            ENTRENADOS
                        </p>
                    </th>
                    <th rowspan="2" class="bordeDerechoBlancoUnPixel tamanioFuenteOchoPuntos anchoDinamico">
                        <p colspan="1" class="rotacionVerticalTexto margenIzquierdoDinamico">
                            % DE 
                            <br/> 
                            ASISTENCIA
                        </p>
                    </th>
                    <th rowspan="2" class="tamanioFuenteOchoPuntos anchoDinamico">
                        <p colspan="1" class="rotacionVerticalTexto margenIzquierdoDinamico">
                            ETAPA 
                            <br/> 
                            DEPORTIVA
                        </p>
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $s=0;
                    $c=0;
                    // $anchoColumnaFecha = 12.8/count($fechas)-(0.3*2.54*(7+count($fechas)))/96;
                @endphp
                @for ($i=0;$i<count($fechas);$i++)
                    <th class="fondoCeleste  bordeDerechoBlancoUnPixel tamanioFuenteSietePuntos">
                        {{Carbon\Carbon::parse($fechas[$i])->format('d')}}
                    </th>
                @endfor
                @foreach($atleta as $item)
                    <tr id="{{$c}}" class="">
                        <td class="todosBordesCeroPuntoTresPixels tamanioFuenteDiezPuntos textoAlineadoAlCentro altoFilaTblAsistencia">
                            {{$contador}}
                        </td>
                        <td class="todosBordesCeroPuntoTresPixels tamanioFuenteDiezPuntos anchoDinamico altoFilaTblAsistencia">
                            {{$item->alumno->nombre1}} {{$item->alumno->nombre2}} {{$item->alumno->nombre3}}
                            {{$item->alumno->apellido1}} {{$item->alumno->apellido2}}
                        </td>
                        <td class="todosBordesCeroPuntoTresPixels tamanioFuenteDiezPuntos textoAlineadoAlCentro anchoDinamico altoFilaTblAsistencia">
                            {{$item->alumno->edad}}
                        </td>
                        @if($item->alumno->genero=="Femenino")
                            <td class="todosBordesCeroPuntoTresPixels tamanioFuenteDiezPuntos textoAlineadoAlCentro anchoDinamico altoFilaTblAsistencia">
                                F
                            </td>
                        @else
                            <td class="todosBordesCeroPuntoTresPixels tamanioFuenteDiezPuntos textoAlineadoAlCentro anchoDinamico altoFilaTblAsistencia">
                                M
                            </td>
                        @endif
                        <td class="todosBordesCeroPuntoTresPixels tamanioFuenteDiezPuntos anchoDinamico altoFilaTblAsistencia">
                            {{$item->categoria->tipo}}
                        </td>
                        <td class="todosBordesCeroPuntoTresPixels tamanioFuenteDiezPuntos anchoDinamico altoFilaTblAsistencia">
                            {{$item->modalidad->nombre}}
                        </td>
                        {{-- {{$anchoColumnaFecha}}cm --}}
                        @for($i=$s;$i<count($fechas)+$s;$i++)
                            <td class="todosBordesCeroPuntoTresPixels tamanioFuenteDiezPuntos textoAlineadoAlCentro altoFilaTblAsistencia">
                                {{$estado[$i]}}
                            </td>
                        @endfor
                        <td class="todosBordesCeroPuntoTresPixels tamanioFuenteDiezPuntos textoAlineadoAlCentro anchoDinamico altoFilaTblAsistencia">
                            {{$contarDias[$c]}}
                        </td>
                        <td class="todosBordesCeroPuntoTresPixels tamanioFuenteDiezPuntos textoAlineadoAlCentro anchoDinamico altoFilaTblAsistencia">
                            {{$promedio[$c]}}%
                        </td>
                        <td class="todosBordesCeroPuntoTresPixels tamanioFuenteDiezPuntos anchoDinamico altoFilaTblAsistencia">
                            {{$item->etapa_deportiva->nombre}}
                        </td>
                        @php
                            $contador++;
                        @endphp
                    </tr>
        
                    @php
                        $c=$c+1;
                        $s=$s+count($fechas)
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>