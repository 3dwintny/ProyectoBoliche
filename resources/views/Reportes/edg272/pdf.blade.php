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
    <div id="contenedorPrincipal">
        <div id="contenedorEncabezado">
            <div id="foto">
                <img src="storage/uploads/logo.jpeg" width="98%" height="98%">
            </div>
            <div id="inicial">
                <div class="formulario textoCentrado margenSuperiorFormulario" id="tamanioFuenteFormulario">
                    FORMULARIO
                </div>
                <div class="registroNominal" id="tamanioFuenteRegistroNominal">
                    <strong>REGISTRO NOMINAL DE ATLETAS PRACTICANTES DEL DEPORTE</strong>
                </div>
            </div>
            <div id="final">
                <div id="contenedorMRD" class="tamanioFuenteMRDCVP">
                    Del Proceso: Administración del MRD.
                </div>
                <div id="contenedorCodigo" class="tamanioFuenteMRDCVP">
                    Código:<strong>EDG-FOR-27.2.</strong>
                </div>
                <div id="contenedorVersion" class="textoVP">
                    Versión: 6.
                </div>
                <div id="contenedorPagina" class="textoVP">
                    Página: 1 de 1.
                </div>
            </div>
        </div>
        <br>
        <div id="contenedorFDM">
            <div id="fadn" class="tamanioFuente11">
                <span id="lineaFADN">__________________________________________</span>
                <strong>FADN:</strong> {{$deporte->nombre}}
            </div>
            <div id="depto">
                <span id="lineaDepartamento">_________________________</span>
                <strong class="tamanioFuente11">DEPARTAMENTO:</strong><label class="tamanioFuente11"> {{$departamento->nombre}}</label>
                <div id="mes">
                    <span id="posicionMes" class="tamanioFuente11 textoCentrado">{{$mostrarMes}}</span>
                    <strong class="tamanioFuente11">MES:</strong>___________________<strong class="tamanioFuente14"> {{$anio}}</strong>
                </div>
            </div>   
        </div>
        <div id="espacio1"></div>
        <div id="contenedorInstrucciones" class="tamanioFuenteInstrucciones">
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
                    <th class="fondo bordeDerechoGruesoBlanco tamanioFuenteNacimiento">Fecha de Nacimiento</th>
                    <th class="fondo bordeDerechoGruesoBlanco tamanioFuente10">Edad</th>
                    <th class="fondo bordeDerechoGruesoBlanco tamanioFuente10">Género</th>
                    <th class="fondo tamanioFuente10">Categoría</th>
                </tr>
            </thead>
            <tbody >
                @foreach ($atletas as $item)
                <tr class="tamanioFuente9">
                    <td class="cuerpo textoCentrado" id="no">{{$contador}}</td>
                    <td class="cuerpo" id="nombreAtleta">
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
    </div>
</body>
</html>