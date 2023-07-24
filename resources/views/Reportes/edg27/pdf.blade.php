<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF EDG-27</title>
    <link href="css/edg27/pdf.css" rel="stylesheet">
</head>
<body>
    <div id="contenedorPrincipal">
        <div id="contenedorEncabezado">
            <div id="foto">
                <img src="storage/uploads/logo.jpeg" width="98%" height="98%" id="margen1">
            </div>
            <div id="inicial">
                <div class="formulario textoCentrado tipoFuente margenSuperiorFormulario" id="tamanioFuenteFormulario">
                    FORMULARIO
                </div>
                <div class="formulario textoCentrado tipoFuente" id="tamanioFuenteRegistroNominal">
                    <strong>REGISTRO NOMINAL DE ATLETAS EN PROCESO SISTEMÁTICO</strong> 
                </div>
            </div>
            <div id="final" class="tipoFuente">
                <div id="interno1" class="tamanioFuenteMRD">
                    Del Proceso: Administración del MRD.
                </div>
                <div id="interno2" class="tamanioFuenteCodigo">
                    Código:<strong> EDG-FOR-27.</strong>
                </div>
                <div id="interno3" class="tamanioFuenteVersion">
                    Versión: 6.
                </div>
                <div id="interno4" class="tamanioFuentePagina">
                    Página: 1 de 1.
                </div>
            </div>
        </div>
        <div id="espacio0Punto4"></div>
        <div id="contenedorFDM" class="tipoFuente">
            <div id="fadn">
                <span id="lineaFADN">_________________</span>
                <strong id="tamanioFuenteFederacion">FEDERACIÓN/ASOCIACIÓN:</strong><label id="tamanioNombreDeporte"> {{$federacion->nombre}}</label>
            </div>
            <div id="depto">
                <span id="lineaDepartamento">__________________</span>
                <strong id="tamanioFuenteDepartamento">DEPARTAMENTO:</strong><label id="tamanioNombreDepartamento"> {{$departamento->nombre}}</label>
            </div>
            <div id="mes">
                <span id="mostrarMes" class="tamanioFuenteNombreMes">{{$mostrarMes}}</span>
                <strong id="tamanioFuenteMes">MES:</strong>&nbsp;_________<strong id="tamanioAnio"> {{$anio}}</strong>
            </div>   
        </div>
        <div id="espacio1"></div>
        <div id="contenedorInstrucciones" class="tipoFuente tamanioFuenteInstrucciones">
            <strong>INSTRUCCIONES:</strong> El presente formato pretende recopilar información específica de los atletas de proceso Sistemático de las Asociaciones Deportivas Departamentales. La ADD, debe
            indicar la información que se solicita. La cantidad de deportistas identificadas en el presente formato, deben coincidir con las indicadas en el formato <strong> EDG-FOR-31</strong> (Reporte Mensual de
            Matrícula Deportiva). 
        </div>
        <div id="espacio2"></div>
        <table class="anchoFull" cellpading=0 cellspacing=0>
            @php
                $contador = 1;   
            @endphp
            <thead>
                <tr>
                    <th colspan="10" class="tipoFuente" id="tituloTabla">ATLETAS EN PROCESO SISTEMATICO DE ENTRENAMIENTO "SISTEMÁTICOS"</th>
                </tr>
                <tr id="altoCampos" class="tipoFuente">
                    <th class="fondo bordeDerechoGruesoBlanco" rowspan="2">No</th>
                    <th class="fondo bordeDerechoGruesoBlanco" rowspan="2">Tipo de Atleta</th>
                    <th class="fondo bordeDerechoGruesoBlanco" rowspan="2">Nombre(s) Apellido(s)</th>
                    <th class="fondo bordeDerechoGruesoBlanco" rowspan="2">Edad</th>
                    <th class="fondo bordeDerechoGruesoBlanco" rowspan="2">Género</th>
                    <th class="fondo bordeDerechoGruesoBlanco" rowspan="2">Modalidad</th>
                    <th class="fondo bordeDerechoGruesoBlanco" rowspan="2">Categoría</th>
                    <th class="fondo bordeDerechoGruesoBlanco" rowspan="2">Etapa Deportiva</th>
                    <th class="fondo bordeDerechoGruesoBlanco bordeInferiorGruesoBlanco" colspan="2">Experiencia Deportiva</th>
                </tr>
                <tr id="altoCamposMesAnio" class="tipoFuente">
                    <th class="fondoBajo bordeDerechoGruesoBlanco">Años</th>
                    <th class="fondoBajo bordeDerechoGruesoBlanco">Meses</th>
                </tr>
            </thead>
            <tbody class="tipoFuente" id="altoInformacion">
                @foreach ($atletas as $item)
                <tr>
                    <td class="cuerpo textoCentrado" id="anchoNo">{{$contador}}</td>
                    <td class="cuerpo" id="anchoTipoAtleta">{{$item->federado}}</td>
                    <td class="cuerpo" id="anchoNombre">
                        {{$item->alumno->nombre1}} {{$item->alumno->nombre2}} {{$item->alumno->nombre3}}
                        {{$item->alumno->apellido1}} {{$item->alumno->apellido2}}
                    </td>
                    <td class="cuerpo" id="edad">{{$item->alumno->edad}}</td>
                    <td class="cuerpo" id="anchoGenero">{{$item->alumno->genero}}</td>
                    <td class="cuerpo anchoMCED">{{$item->modalidad->nombre}}</td>
                    <td class="cuerpo anchoMCED">{{$item->categoria->tipo}}</td>
                    <td class="cuerpo anchoMCED">{{$item->etapa_deportiva->nombre}}</td>
                    <td class="cuerpo textoCentrado anchoMA">{{$item->anios}}</td>
                    <td class="cuerpo textoCentrado anchoMA">{{$item->meses}}</td>
                    @php
                        $contador++;
                    @endphp
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>