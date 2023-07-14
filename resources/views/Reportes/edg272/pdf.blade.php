<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF EDG-27.2</title>
    <link href="css/edg272/pdf.css" rel="stylesheet">
</head>
<body>
    <div id="contenedor">
        <div id="foto">
            <img src="storage/uploads/logo.jpeg" width="98%" height="98%">
        </div>
        <div id="inicial">
            <div class="formulario" class="textoCentrado tamanioFuente10">
                FORMULARIO
            </div>
            <div class="formulario" class="textoCentrado tamanioFuente10">
                <strong>REGISTRO NOMINAL DE ATLETAS PRACTICANTES DEL DEPORTE</strong>
            </div>
        </div>
        <div id="final" class="tamanioFuente10">
            <div id="interno1">
                Del Proceso: Administración del MRD.
            </div>
            <div id="interno2">
                Código:<strong>EDG-FOR-27.2.</strong>
            </div>
            <div id="interno3">
                Versión: 6.
            </div>
            <div id="interno4">
                Página: 1 de 1.
            </div>
        </div>
    </div>
    <br>
    <div id="contenedor2">
        <div id="fadn" class="tamanioFuente11">
            <span id="lineaFADN">_______________________________________________________</span>
            <strong>FADN:</strong> {{$deporte->nombre}}
        </div>
        <div id="depto">
            <span id="lineaDepartamento">________________________</span>
            <strong class="tamanioFuente11">DEPARTAMENTO:</strong><label class="tamanioFuente11"> {{$departamento->nombre}}</label>
            <div id="mes">
                <span id="posicionMes" class="tamanioFuente11">{{$mostrarMes}}</span>
                <strong class="tamanioFuente11">MES:</strong>___________________<strong class="tamanioFuente14"> {{$anio}}</strong>
            </div>
        </div>   
    </div>
    <div id="espacio1"></div>
    <div id="contenedor3" class="tamanioFuente9">
        <strong>INSTRUCCIONES:</strong> El presente formato pretende recopilar información específica de los atletas <strong>Practicantes del Deporte</strong> de las Asociaciones
        Deportivas Departamentales. La ADD, debe indicar la información que se solicita. La cantidad de deportistas identificadas en el presente
        formato, deben coincidir con las indicadas en el formato <strong> EDG-FOR-31</strong>(Reporte Mensual de Matrícula Deportiva). 
    </div>
    <div id="espacio2"></div>
    <table id="anchoFull" cellpading=0 cellspacing=0>
        @php
            $contador = 1;   
            $control=0;
        @endphp
        <thead>
            <tr>
                <th colspan="6" id="tituloTabla" class="tamanioFuente11">ATLETAS "PRACTICANTES DEL DEPORTE"</th>
            </tr>
            <tr>
                <th class="fondo bordeDerechoGruesoBlanco tamanioFuente10">No.</th>
                <th class="fondo bordeDerechoGruesoBlanco tamanioFuente10">Nombre(s) Apellido(s) completos</th>
                <th class="fondo bordeDerechoGruesoBlanco tamanioFuente10">Fecha de Nacimiento</th>
                <th class="fondo bordeDerechoGruesoBlanco tamanioFuente10">Edad</th>
                <th class="fondo bordeDerechoGruesoBlanco tamanioFuente10">Género</th>
                <th class="fondo tamanioFuente10">Categoría</th>
            </tr>
        </thead>
        <tbody >
            @foreach ($atletas as $item)
            <tr class="tamanioFuente9">
                <td class="cuerpo textoCentrado" id="no">{{$contador}}</td>
                <td class="cuerpo">
                    {{$item->alumno->nombre1}} {{$item->alumno->nombre2}} {{$item->alumno->nombre3}}
                    {{$item->alumno->apellido1}} {{$item->alumno->apellido2}}
                </td>
                <td class="cuerpo textoCentrado" id="nacimiento">{{$fechasNacimiento[$control]}}</td>
                <td class="cuerpo textoCentrado" id="edad">{{$item->alumno->edad}}</td>
                <td class="cuerpo textoCentrado" id="genero">{{$item->alumno->genero}}</td>
                <td class="cuerpo textoCentrado" id="categoria">{{$item->categoria->tipo}}</td>
                @php
                    $contador++;
                    $control++;
                @endphp
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>