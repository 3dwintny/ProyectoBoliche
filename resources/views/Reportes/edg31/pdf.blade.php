<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF EDG-31</title>
    <style>
        #contenedor{
            width: 19.3cm;
            height: 0.8cm;
            border-bottom: 1px solid black;
            border-top: 1px solid black;
            border-left: 1px solid black;
            border-right: 1px solid black;
            margin-left: 0.05cm;
        }
        #foto{
            width: 0.5cm;
            height: 100%;
            border-right: 1px solid black;
            float: left;
            position: relative;
        }
        #inicial{
            width: 18.8cm;
            height: 62.5%;
            border-bottom: 1px solid black;
            float: left;
            position: relative;
        }
        #final{
            margin-top: 0.5cm;
            width: 96%;
            height: 28.9%;
            float: left;
            position: relative;
        }
        #formulario{
            margin-top: 0%;
            width: 100%;
            height: 50%;
        }
        #reporteMensual{
            margin-top: 0%;
            width: 100%;
            height: 50%;
        }
        #interno1{
            margin-top: 0.05%;
            margin-left: 4.5cm;
            width: 33%;
            height: 50%;
            float: left;
            position: relative;
        }
        #interno2{
            margin-top: 0.05%;
            margin-left: 8.6cm;
            width: 20%;
            height: 50%;
            float: left;
            position: relative;
        }
        #interno3{
            margin-top: 0.05%;
            margin-left: 11.1cm;
            width: 10%;
            height: 50%;
            float: left;
            position: relative;
        }
        #interno4{
            margin-top: 0.05%;
            margin-left: 12.5cm;
            width: 12.5%;
            height: 50%;
            float: left;
            position: relative;
        }
        #contenedor2{
            width: 100%;
            height: 3.75%;
        }
        #fadn{
            width: 45%;
            height: 100%;
            float: left;
            position: relative;
        }
        #depto{
            width: 35%;
            height: 100%;
            float: left;
            position: relative;
        }
        #mes{
            width: 20%;
            height: 100%;
            float: left;
            position: relative;
        }
        #contenedor3{
            width: 100%;
            height: 0.8cm;
            border: 1px dashed black;
        }
        #contenedorResumenMatricular{
            margin-top: 0.16cm;
            margin-left: 0.2cm;
            width: 1.43cm;
            height: 0.5cm;
            float: left;
            position: relative;
            font-size: 50%;
        }
        #contenedorSistem{
            width: 0.65cm;
            height: 35%;
            margin-top: 0.34cm;
            margin-left: 0.6cm;
            float: left;
            position: relative;
            font-size:49%; 
        }
        #contenedorPracticantes{
            width: 0.5cm;
            height: 35%;
            margin-top: 0.34cm;
            margin-left: 0.5cm;
            float: left;
            position: relative;
            font-size:49%; 
        }
        #contenedorDeporteAdaptado{
            width: 0.8cm;
            height: 35%;
            margin-top: 0.34cm;
            margin-left: 0.3cm;
            float: left;
            position: relative;
            font-size:49%; 
        }
        #contenedorTotal{
            width: 0.75cm;
            height: 35%;
            margin-top: 1.9%;
            margin-left: 0.38cm;
            float: left;
            position: relative;
            font-size: 48%;
        }
        .rInterno3{
            width: 100%;
            height: 0.14cm;
            margin-top: 0.05cm;
            text-align: center;
            font-size: 40%;
        }
        .rInterno4{
            width: 1.1cm;
            height: 0.4cm;
            text-align: center;
            margin-top: 0.09cm;
            border: 1px solid black;
            border-collapse: collapse;
        }
        .rInterno5{
            width: 1.1cm;
            height: 0.4cm;
            text-align: center;
            margin-top: 0.09cm;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-right: 1px solid black;
            border-collapse: collapse;
        }
        #rInterno7{
            width: 6%;
            height: 35%;
            margin-top: 1.6%;
            margin-left: 1%;
            float: left;
            position: relative;
        }
        #rInterno8{
            width: 1.1cm;
            height: 0.4cm;
            text-align: center;
            margin-top: 0.09cm;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-right: 1px solid black;
            border-left: 1px solid black;
            border-collapse: collapse;
        }
        .rInterno9{
            width: 1.1cm;
            height: 0.4cm;
            text-align: center;
            margin-top: 0.09cm;
            border: 1px solid black;
            border-collapse: collapse;
        }
        #rInterno10{
            width: 1.1cm;
            height: 0.4cm;
            text-align: center;
            margin-top: 0.09cm;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-right: 1px solid black;
            border-left: 1px solid black;
            background-color: #009CEA;
            color: white;
            border-collapse: collapse;
        }
        .rInterno11{
            width: 1.1cm;
            height: 0.4cm;
            text-align: center;
            margin-top: 0.09cm;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-right: 1px solid black;
            border-left: 1px solid black;
            background-color: #E5E7D5;
            border-collapse: collapse;
        }
        .contenedorInterno1{
            height: 100%;
            width: 1.1cm;
            float: left;
            position: relative;
        }
        .verticalCentrado{
            vertical-align: 87.5%;
        }
        .verticalCentrado2{
            vertical-align: 110%;
        }
        #instrucciones{
            width: 18.7cm;
            height: 0.5cm;
            margin-left: 0.1cm;
            font-size: 43.2%;
        }
        .cajonEncabezado1{
            margin-top: 0.1cm;
            width: 17.1cm;
            height: 0.6cm;
            border: black 0.7px solid;
            border-collapse: collapse;
        }
        .cajonEtapas{
            width: 2.8cm;
            border-right: black 0.7px solid;
            height: 100%;
            position: relative;
            float: left;
            border-collapse: collapse;
        }
        .textoEtapas{
            position: absolute; 
            margin-left: 0.6cm;
            font-weight: bolder;
            margin-top: 0.175cm;
            font-size: 47%;
        }
        .cajonFormacion{
            width: 4.4cm;
            border-right: black 0.7px solid;
            border-collapse: collapse;
            height: 100%;
            position: relative;
            float: left;
        }
        .textoFormacion{
            position: absolute;
            margin-top: 1.5%;
            font-weight: bolder;
        }
        .cajonPerfeccionamiento{
            width: 2.2cm;
            border-right: black 0.7px solid;
            border-collapse: collapse;
            height: 100%;
            position: relative;
            float: left;
        }
        .textoPerfeccionamiento{
            position: absolute; 
            margin-left: 0.21cm; 
            margin-top: 0.17cm;
            font-size: 47%;
            font-weight: bolder;
        }
        .cajonEspecializacion{
            width: 2.2cm;
            border-right: black 0.7px solid;
            border-collapse: collapse;
            height: 100%;
            position: relative;
            float: left;
        }
        .textoEspecializacion{
            position: absolute; 
            margin-left: 0.4cm; 
            margin-top: 0.17cm;
            font-size: 47%;
            font-weight: bolder;
        }
        .cajonAltoRendimiento{
            width: 2.2cm;
            border-right: black 0.7px solid;
            border-collapse: collapse;
            height: 100%;
            position: relative;
            float: left;
        }
        .textoAltoRendimiento{
            position: absolute; 
            margin-left: 0.3cm; 
            margin-top: 0.17cm;
            font-size: 47%;
            font-weight: bolder;
        }
        .cajonTotal{
            width: 3.3cm;
            height: 100%;
            position: relative;
            float: left;
        }
        .textoTotal{
            position: absolute; 
            margin-left: 1.3cm; 
            margin-top: 0.175cm;
            font-size: 47%;
            font-weight: bolder;
        }
        .tituloTablaSistematico{
            width: 17.1cm;
            height:0.4cm;
            border-bottom:black 0.7px solid;
            border-left:black 0.7px solid;
            border-right:black 0.7px solid;
            border-collapse: collapse;
        }
        #cajonTablaFederados{
            border-collapse: collapse;
            border-left: black 0.7px solid;
            border-right: black 0.7px solid;
            border-bottom: black 0.7px solid;
            width: 17.1cm;
            height: 2.65cm;
        }
        .cajonCategoriasGenero{
            width: 2.8cm;
            border-right: black 0.7px solid;
            height: 100%;
            position: relative;
            float: left;
        }
        .cajonGeneros{
            width: 1.1cm;
            border-right: black 0.008825cm solid;
            height: 100%;
            position: relative;
            float: left;
        }
        .categoriasGeneroSistematico{
            width: 17.1cm;
            height: 0.25cm;
            border-bottom: black 0.7px solid;
        }
        .textoCategoriasGenero{
            position: absolute; 
            margin-left: 0.5cm;
            font-weight: bolder;
            font-size: 47%;
        }
        .textoCategorias{
            position: absolute; 
            margin-left: 1.2cm;
            margin-top: 0.06cm;
            font-size: 38%; 
        }
        .textoSegundaFuerza{
            position: absolute; 
            margin-left: 0.8cm;
            margin-top: 0.06cm;
            font-size: 38%; 
        }
        .lineaDelgadaCategoria{
            width: 13.65cm;
            height: 0.3cm;
            border-bottom: black 0.01px solid;
            border-collapse: collapse;
        }
        .lineaDelgadaSegundaFuerza{
            width: 2.8cm;
            height: 0.3cm;
            border-bottom: black 0.01px solid;
            border-collapse: collapse;
        }
        .lineaFinalSistematico{
            width: 100%;
            height: 0.3cm;
        }
        #tituloFederados{
            color: white;
            text-align: center;
            font-size: 55%;
            position: absolute; 
            margin-left: 4.6cm; 
            margin-top: 0.05cm;
            font-weight: bolder;
        }
        .espacio{
            width: 100%;
            height: 0.5%;
        }
        .textoCentrado{
            text-align: center;
        }
        #tamanioFederados{
            width: 85.75%;
        }
        .encabezado{
            background-color: #7CC8DA;
            border: 2px solid black;
            border-collapse: collapse;
        }
        .todosBordesGruesos{
            border: 2px solid black;
            border-collapse: collapse;
        }
        .bordesExternosGruesos{
            border-left: 2px solid black;
            border-right: 2px solid black;
            border-collapse: collapse; 
        }
        .bordeInferiorDelgado{
            border-bottom: 1px solid black;
            border-collapse: collapse;
        }
        .cuerpoDelgado{
            border: 1px solid black;
            border-collapse: collapse;
        }
        .fondoGrisOscuro{
            background-color: #808080;
        }
        .fondoGrisClaro{
            background-color: #BFBFBF;
        }
        .fondoVerde{
            background-color: #7C691A;
        }
        .fondoNegro{
            background-color:black;
        }
        .fondoCelesteEncabezado{
            background-color: #7CC8DA;
        }
        .total{
            background-color: #E5E7D5;
            text-align: center;
        }
        .textoDerecha{
            text-align: right;
        }
        .anchoFull{
            width: 100%;
        }
        #tituloOtros{
            background-color: black;
            color: white;
            border-right: 2px solid black;
            border-left: 2px solid black;
            border-collapse: collapse; 
        }
        #tituloAdaptados{
            background-color: #962626;
            color: white;
            border-right: 2px solid black;
            border-left: 2px solid black;
            border-collapse: collapse; 
        }
        .encabezadoDelgado{
            background-color: #7CC8DA;
            border-right: 2px solid black;
            border-bottom: 1px solid black;
            border-top: 2px solid black;
            border-collapse: collapse;
        }
        .encabezadoDelgado2{
            background-color: #7CC8DA;
            border-bottom: 1px solid black;
            border-top: 2px solid black;
            border-collapse: collapse;
        }
        
        #recepcion{
            color: white;
            background-color: black;
        }
        #tamanio77{
            width: 77%;
        }
        .alto40{
            height: 40px;
        }
        .ancho39{
            width: 39%;
        }
        #ancho22{
            width: 22%;
        }
        #tamanioAdaptados{
            width: 85.75%;
        }
        .bordeInferiorGrueso{
            border-bottom: 2px solid black;
            border-collapse: collapse;
        }
        .fondoGrisAzulado{
            background-color: #D1E3F3;
        }
        .bDerecho{
            border-right: 1px solid black;
        }
        .cuerpo{
            border: 1px solid black; 
            border-collapse: collapse;
        }
        .tamanioFuente11{
            font-size: 53%;
        }
        .tamanioFuente10{
            font-size: 62.5%;
        }
        .tamanioFuente9{
            font-size: 56.25%;
        }
        .tamanioFuente13{
            font-size: 81.25%;
        }
        .tamanioFuente12{
            font-size: 75%;
        }
        .tamanioFuente14{
            font-size: 50%;
        }
        #contenedorPrincipal{
            width: 19.4cm;
            height: 100%;
            position: relative;
            top: -0.5cm;
            margin-left: 4.5cm;
        }
        .celdaReducida {
        padding-top: -20px;
        }
        .eliminarEspacios{
            padding: 0;
            border-spacing: 0;
        }
        .tipoFuente{
            font-family: "Century Gothic", sans-serif;
        }
        </style>
</head>
<body>
    <div id="contenedorPrincipal">
        <div id="contenedor">
            <div id="foto">
                <img src="storage/uploads/logo.jpeg" width="98%" height="98%">
            </div>
            <div id="inicial">
                <div id="formulario" class="textoCentrado tipoFuente tamanioFuente11">
                    FORMULARIO
                </div>
                <div id="reporteMensual" class="textoCentrado tipoFuente tamanioFuente11">
                    <strong>REPORTE MENSUAL DE MATRÍCULA DEPORTIVA</strong>
                </div>
            </div>
            <div id="final" class="tamanioFuente11 tipoFuente">
                <div id="interno1">
                    Del Proceso: Administración del MRD.
                </div>
                <div id="interno2">
                    Código:<strong>EDG-FOR-31.</strong>
                </div>
                <div id="interno3">
                    Versión: 1.
                </div>
                <div id="interno4">
                    Página: 1 de 1.
                </div>
            </div>
        </div>
        <div id="contenedor2">
            <div id="fadn">
                <strong class="tamanioFuente11">FEDERACIÓN/ASOCIACIÓN:</strong> <label clas="tamanioFuente14">{{$federacion->nombre}}</label>
            </div>
            <div id="depto">
                <strong class="tamanioFuente11">DEPARTAMENTO:</strong> <label clas="tamanioFuente14">{{$departamento->nombre}}</label>
            </div>
            <div id="mes">
                <strong class="tamanioFuente11">MES:</strong> {{$mostrarMes}}<strong> {{$anio}}</strong>
            </div>   
        </div>
        <div id="contenedor3">
            <div id="contenedorResumenMatricular">
                <strong>RESUMEN MATRICULAR</strong>
            </div>
            <div id="contenedorSistem">Sistem.</div>
            <div class="contenedorInterno1">
                <div class="rInterno3">F</div>
                <div class="rInterno4"><p class="verticalCentrado tamanioFuente10">{{$totalFemeninosFederados}}</p></div>
            </div>
            <div class="contenedorInterno1">
                <div class="rInterno3">M</div>
                <div class="rInterno5"><p class="verticalCentrado tamanioFuente10">{{$totalMasculinosFederados}}</p></div>
            </div>
            <div class="contenedorInterno1">
                <div class="rInterno3">Total</div>
                <div class="rInterno11"><strong><p class="verticalCentrado tamanioFuente11">{{$totalFederados}}</p></strong></div>
            </div>
            <div class="tamanioFuente11" id="contenedorPracticantes">Pract.</div>
            <div class="contenedorInterno1">
                <div class="rInterno3">F</div>
                <div class="rInterno4"><p class="verticalCentrado tamanioFuente10">{{$totalFemeninosOtros}}</p></div>
            </div>
            <div class="contenedorInterno1">
                <div class="rInterno3">M</div>
                <div class="rInterno5"><p class="verticalCentrado tamanioFuente10">{{$totalMasculinosOtros}}</p></div>
            </div>
            <div class="contenedorInterno1">
                <div class="rInterno3">Total</div>
                <div class="rInterno11"><strong><p class="verticalCentrado tamanioFuente11">{{$totalOtros}}</p></strong></div>
            </div>
            <div id="contenedorDeporteAdaptado" class="tamanioFuente11">Dep. Ad.</div>
            <div class="contenedorInterno1">
                <div class="rInterno3">F</div>
                <div class="rInterno4"><p class="verticalCentrado tamanioFuente10">{{$totalFemeninosAdaptados}}</p></div>
            </div>
            <div class="contenedorInterno1">
                <div class="rInterno3">M</div>
                <div class="rInterno5"><p class="verticalCentrado tamanioFuente10">{{$totalMasculinosAdaptados}}</p></div>
            </div>
            <div class="contenedorInterno1">
                <div class="rInterno3">Total</div>
                <div class="rInterno11"><strong><p class="verticalCentrado tamanioFuente11">{{$totalAdaptados}}</p></strong></div>
            </div>
            @php
                $totalFemeninos = $totalFemeninosFederados+$totalFemeninosOtros+$totalFemeninosAdaptados;
                $totalMasculinos = $totalMasculinosFederados+$totalMasculinosOtros+$totalMasculinosAdaptados;
                $totalAtletas = $totalFemeninos+$totalMasculinos;
            @endphp
            <div id="contenedorTotal" class="tamanioFuente14 tipoFuente"><strong>TOTAL</strong></div>
            <div class="contenedorInterno1">
                <div class="rInterno3"><strong>F</strong></div>
                <div class="fondoGrisAzulado rInterno9 tamanioFuente14"><strong><p class="verticalCentrado2">{{$totalFemeninos}}</p></strong></div>
            </div>
            <div class="contenedorInterno1">
                <div class="rInterno3"><strong>M</strong></div>
                <div class="fondoGrisAzulado tamanioFuente14" id="rInterno8"><strong><p class="verticalCentrado2">{{$totalMasculinos}}</p></strong></div>
            </div>
            <div class="contenedorInterno1">
                <div class="rInterno3"><strong>Total</strong></div>
                <div id="rInterno10"><strong><p class="verticalCentrado2 tamanioFuente14">{{$totalAtletas}}</p></strong></div>
            </div>
        </div>
        <div class="espacio"></div>
        <div id="instrucciones" class="tipoFuente">
            <strong>INSTRUCCIONES:</strong> Registre la cantidad de atletas matriculados en la Asociación Deportiva Departamental, según Tipo de Atleta,categorías, género, etapas. Esta debe coherencia con el formulario Registro Nominal de Atletas 
            en Proceso Sistemático <strong>(EDG-FOR-27)</strong> y Practicantes del Deporte <strong>(EDG-FOR-27.2)</strong>, además deberán registrarse en la <strong>Base de Datos</strong> con fotografía y documento de identificación.
        </div>
        <div class="cajonEncabezado1 fondoCelesteEncabezado">
            <div class="cajonEtapas">
                <span class="textoEtapas tipoFuente">Etapas Deportivas</span>
            </div>
            <div class="cajonFormacion"></div>
            <div class="cajonPerfeccionamiento">
                <span class="textoPerfeccionamiento tipoFuente">Perfeccionamiento</span>
            </div>
            <div class="cajonEspecializacion">
                <span class="textoEspecializacion tipoFuente">Especialización</span>
            </div>
            <div class="cajonAltoRendimiento">
                <span class="textoAltoRendimiento tipoFuente">Alto Rendimiento</span>
            </div>
            <div class="cajonTotal">
                <span class="textoTotal tipoFuente">TOTAL</span>
            </div>
        </div>
        <div class="tituloTablaSistematico fondoNegro">
            <span id="tituloFederados" class="tipoFuente">ATLETAS EN PROCESO SISTEMATICO DE ENTRENAMIENTO "FEDERADOS"</span>             
        </div>
        <div id="cajonTablaFederados">
            <div class="categoriasGeneroSistematico">
                <div class="cajonCategoriasGenero fondoCelesteEncabezado">
                    <span class="textoCategoriasGenero tipoFuente">Categorías / Género</span>
                </div>
                <div class="cajonGeneros">
                    <span class="textoCategoriasGenero tipoFuente">F</span>
                </div>
                <div class="cajonGeneros">
                    <span class="textoCategoriasGenero tipoFuente">M</span>
                </div>
                <div class="cajonGeneros">
                    <span class="textoCategoriasGenero tipoFuente">F</span>
                </div>
                <div class="cajonGeneros">
                    <span class="textoCategoriasGenero tipoFuente">M</span>
                </div>
                <div class="cajonGeneros">
                    <span class="textoCategoriasGenero tipoFuente">F</span>
                </div>
                <div class="cajonGeneros">
                    <span class="textoCategoriasGenero tipoFuente">M</span>
                </div>
                <div class="cajonGeneros">
                    <span class="textoCategoriasGenero tipoFuente">F</span>
                </div>
                <div class="cajonGeneros">
                    <span class="textoCategoriasGenero tipoFuente">M</span>
                </div>
                <div class="cajonGeneros">
                    <span class="textoCategoriasGenero tipoFuente">F</span>
                </div>
                <div class="cajonGeneros">
                    <span class="textoCategoriasGenero tipoFuente">M</span>
                </div>
                <div class="cajonGeneros">
                    <span class="textoCategoriasGenero tipoFuente">F</span>
                </div>
                <div class="cajonGeneros">
                    <span class="textoCategoriasGenero tipoFuente">M</span>
                </div>
                <div class="cajonGeneros">
                    <span class="textoCategoriasGenero tipoFuente">T</span>
                </div>
            </div>
        
            <div class="lineaDelgadaCategoria">
                <div class="cajonCategoriasGenero">
                    <span class="textoCategorias tipoFuente">Sub 09</span>
                </div>
            </div>
            <div class="lineaDelgadaCategoria">
                <div class="cajonCategoriasGenero">
                    <span class="textoCategorias tipoFuente">Sub 11</span>
                </div>
            </div>
            <div class="lineaDelgadaCategoria">
                <div class="cajonCategoriasGenero">
                    <span class="textoCategorias tipoFuente">Sub 13</span>
                </div>
            </div>
            <div class="lineaDelgadaCategoria">
                <div class="cajonCategoriasGenero">
                    <span class="textoCategorias tipoFuente">Sub 16</span>
                </div>
            </div>
            <div class="lineaDelgadaCategoria">
                <div class="cajonCategoriasGenero">
                    <span class="textoCategorias tipoFuente">Sub 18</span>
                </div>
            </div>
            <div class="lineaDelgadaCategoria">
                <div class="cajonCategoriasGenero">
                    <span class="textoCategorias tipoFuente">Sub 21</span>
                </div>
            </div>
            <div class="lineaDelgadaSegundaFuerza">
                <div class="cajonCategoriasGenero">
                    <span class="textoSegundaFuerza tipoFuente">Segunda Fuerza</span>
                </div>
            </div>
            <div class="lineaFinalSistematico">
                <div class="cajonCategoriasGenero">
                    <span class="textoSegundaFuerza tipoFuente">Mayores</span>
                </div>
            </div>
        </div>
        {{-- <table cellpading=0 cellspacing=0 id="tamanioFederados">
            <thead>
                <tr>
                    <th rowspan="2" class="encabezado textoCentrado tamanioFuente11">Etapas Deportivas</th>
                    <th colspan="4" class="encabezado textoCentrado tamanioFuente11">Formación</th>
                    <th colspan="2" rowspan="2" class="encabezado textoCentrado tamanioFuente11">Perfeccionamiento</th>
                    <th rowspan="2" colspan="2" class="encabezado textoCentrado tamanioFuente11">Especialización</th>
                    <th rowspan="2" colspan="2" class="encabezado textoCentrado tamanioFuente11">Alto Rendimiento</th>
                    <th colspan="3" rowspan="2" class="encabezado textoCentrado tamanioFuente11">TOTAL</th>
                </tr>
                <tr>
                    <th colspan="2" class="encabezado textoCentrado tamanioFuente11">Iniciación</th>
                    <th colspan="2" class="encabezado textoCentrado tamanioFuente11">Desarrollo</th>
                </tr>
                <tr>
                    <th colspan="14" class="bordesExternosGruesos tamanioFuente14" id="tituloFederados">ATLETAS EN PROCESO SITEMÁTICO DE ENTRENAMIENTO "FEDERADOS"</th>
                </tr>
                <tr>
                    <th class="encabezado textoCentrado tamanioFuente11">Categorías/Género</th>
                    <th class="encabezado textoCentrado tamanioFuente11">F</th>
                    <th class="encabezado textoCentrado tamanioFuente11">M</th>
                    <th class="encabezado textoCentrado tamanioFuente11">F</th>
                    <th class="encabezado textoCentrado tamanioFuente11">M</th>
                    <th class="encabezado textoCentrado tamanioFuente11">F</th>
                    <th class="encabezado textoCentrado tamanioFuente11">M</th>
                    <th class="encabezado textoCentrado tamanioFuente11">F</th>
                    <th class="encabezado textoCentrado tamanioFuente11">M</th>
                    <th class="encabezado textoCentrado tamanioFuente11">F</th>
                    <th class="encabezado textoCentrado tamanioFuente11">M</th>
                    <th class="todosBordesGruesos tamanioFuente11 fondoGrisClaro">F</th>
                    <th class="todosBordesGruesos tamanioFuente11 fondoGrisClaro">M</th>
                    <th class="todosBordesGruesos tamanioFuente11 fondoGrisClaro">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="textoCentrado bordesExternosGruesos bordeInferiorDelgado tamanioFuente9" >Sub 09</td>
                    @foreach($s9 as $item)
                    <td class="textoCentrado cuerpoDelgado tamanioFuente13" style="margin-left:90%;">{{$item}}</td>
                    @endforeach
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 fondoGrisClaro"><strong>{{$f9}}</strong></td>
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 fondoGrisClaro"><strong>{{$m9}}</strong></td>
                    <td class="total todosBordesGruesos tamanioFuente12"><strong>{{$tS9}}</strong></td>
                </tr>
                <tr>
                    <td class="textoCentrado bordesExternosGruesos bordeInferiorDelgado tamanioFuente9">Sub 11</td>
                    @foreach($s11 as $item)
                    <td class="textoCentrado cuerpoDelgado tamanioFuente13">{{$item}}</td>
                    @endforeach
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 fondoGrisClaro"><strong>{{$f11}}</strong></td>
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 fondoGrisClaro"><strong>{{$m11}}</strong></td>
                    <td class="total todosBordesGruesos tamanioFuente12"><strong>{{$tS11}}</strong></td>
                </tr>
                <tr>
                    <td class="textoCentrado bordesExternosGruesos bordeInferiorDelgado tamanioFuente9">Sub 13</td>
                    @foreach($s13 as $item)
                    <td class="textoCentrado cuerpoDelgado tamanioFuente13">{{$item}}</td>
                    @endforeach
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 fondoGrisClaro"><strong>{{$f13}}</strong></td>
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 fondoGrisClaro"><strong>{{$m13}}</strong></td>
                    <td class="total todosBordesGruesos tamanioFuente12"><strong>{{$tS13}}</strong></td>
                </tr>
                <tr>
                    <td class="textoCentrado bordesExternosGruesos bordeInferiorDelgado tamanioFuente9">Sub 16</td>
                    @foreach($s16 as $item)
                    <td class="textoCentrado cuerpoDelgado tamanioFuente13">{{$item}}</td>
                    @endforeach
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 fondoGrisClaro"><strong>{{$f16}}</strong></td>
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 fondoGrisClaro"><strong>{{$m16}}</strong></td>
                    <td class="total todosBordesGruesos tamanioFuente12"><strong>{{$tS16}}</strong></td>
                </tr>
                <tr>
                    <td class="textoCentrado bordesExternosGruesos bordeInferiorDelgado tamanioFuente9">Sub 18</td>
                    @foreach($s18 as $item)
                    <td class="textoCentrado cuerpoDelgado tamanioFuente13">{{$item}}</td>
                    @endforeach
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 fondoGrisClaro"><strong>{{$f18}}</strong></td>
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 fondoGrisClaro"><strong>{{$m18}}</strong></td>
                    <td class="total todosBordesGruesos tamanioFuente12"><strong>{{$tS18}}</strong></td>
                </tr>
                <tr>
                    <td class="textoCentrado bordesExternosGruesos bordeInferiorDelgado tamanioFuente9">Sub 21</td>
                    @foreach($s21 as $item)
                    <td class="textoCentrado cuerpoDelgado tamanioFuente13">{{$item}}</td>
                    @endforeach
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 fondoGrisClaro"><strong>{{$f21}}</strong></td>
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 fondoGrisClaro"><strong>{{$m21}}</strong></td>
                    <td class="total todosBordesGruesos tamanioFuente12"><strong>{{$tS21}}</strong></td>
                </tr>
                <tr>
                    <td class="textoCentrado bordesExternosGruesos bordeInferiorDelgado tamanioFuente9">Segunda Fuerza</td>
                    @foreach($sSF as $item)
                    <td class="textoCentrado bordeInferiorGrueso bDerecho tamanioFuente13">{{$item}}</td>
                    @endforeach
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 fondoGrisClaro"><strong>{{$fF}}</strong></td>
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 fondoGrisClaro"><strong>{{$mF}}</strong></td>
                    <td class="total todosBordesGruesos tamanioFuente12"><strong>{{$tSF}}</strong></td>
                </tr>
                <tr>
                    <td class="textoCentrado bordesExternosGruesos bordeInferiorGrueso tamanioFuente9">Mayores</td>
                    @foreach($sM as $item)
                    <td class="textoCentrado cuerpoDelgado tamanioFuente12">{{$item}}</td>
                    @endforeach
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 fondoGrisClaro"><strong>{{$fM}}</strong></td>
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 fondoGrisClaro"><strong>{{$mM}}</strong></td>
                    <td class="total todosBordesGruesos tamanioFuente12"><strong>{{$tM}}</strong></td>
                </tr>
                <tr>
                    <td class="textoDerecha tamanioFuente12"><strong>TOTAL</strong></td>
                    @foreach($columnasFederados as $item)
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 fondoGrisClaro"><strong>{{$item}}</strong></td>
                    @endforeach
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 fondoGrisOscuro"><strong>{{$totalFemeninosFederados}}</strong></td>
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 fondoGrisOscuro"><strong>{{$totalMasculinosFederados}}</strong></td>
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 fondoVerde"><strong>{{$totalFederados}}</strong></td>
                </tr>
            </tbody>
        </table>
        <table cellpading=0 cellspacing=0 class="anchoFull">
            <thead>
                <tr>
                    <tr>
                        <th class="encabezado textoCentrado tamanioFuente11">EDADES</th>
                        <th colspan="2" class="encabezado textoCentrado tamanioFuente11">Menores de 12</th>
                        <th colspan="2" class="encabezado textoCentrado tamanioFuente11">13-17</th>
                        <th colspan="2" class="encabezado textoCentrado tamanioFuente11">18-21</th>
                        <th colspan="2" class="encabezado textoCentrado tamanioFuente11">22-35</th>
                        <th colspan="2" class="encabezado textoCentrado tamanioFuente11">36-50</th>
                        <th colspan="2" class="encabezado textoCentrado tamanioFuente11">Mas de 50</th>
                        <th colspan="3" class="encabezado textoCentrado tamanioFuente11">TOTALES</th>
                    </tr>
                    <tr>
                        <th colspan="16" id="tituloOtros" class="tamanioFuente14">OTROS PROGRAMAS DE ATENCIÓN</th>
                    </tr>
                    <tr>
                        <th class="encabezado textoCentrado tamanioFuente11">Categorías/Género</th>
                        <th class="encabezadoDelgado textoCentrado tamanioFuente11">F</th>
                        <th class="encabezadoDelgado textoCentrado tamanioFuente11">M</th>
                        <th class="encabezadoDelgado textoCentrado tamanioFuente11">F</th>
                        <th class="encabezadoDelgado textoCentrado tamanioFuente11">M</th>
                        <th class="encabezadoDelgado textoCentrado tamanioFuente11">F</th>
                        <th class="encabezadoDelgado textoCentrado tamanioFuente11">M</th>
                        <th class="encabezadoDelgado textoCentrado tamanioFuente11">F</th>
                        <th class="encabezadoDelgado textoCentrado tamanioFuente11">M</th>
                        <th class="encabezadoDelgado textoCentrado tamanioFuente11">F</th>
                        <th class="encabezadoDelgado textoCentrado tamanioFuente11">M</th>
                        <th class="encabezadoDelgado textoCentrado tamanioFuente11">F</th>
                        <th class="encabezadoDelgado2 textoCentrado tamanioFuente11">M</th>
                        <th class="todosBordesGruesos tamanioFuente11 fondoGrisClaro">F</th>
                        <th class="todosBordesGruesos tamanioFuente11 fondoGrisClaro">M</th>
                        <th class="todosBordesGruesos tamanioFuente11 fondoGrisClaro">TOTAL</th>
                    </tr>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="bordesExternosGruesos bordeInferiorDelgado textoCentrado tamanioFuente10">Practicantes del Deporte</td>
                    @foreach($practicantes as $item)
                    <td class="cuerpoDelgado textoCentrado tamanioFuente12">{{$item}}</td>
                    @endforeach
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 fondoGrisClaro"><strong>{{$fPracticantes}}</strong></td>
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 fondoGrisClaro"><strong>{{$mPracticantes}}</strong></td>
                    <td class="total todosBordesGruesos tamanioFuente12"><strong>{{$tPracticantes}}</strong></td>
                </tr>
                <tr>
                    <td class="bordesExternosGruesos bordeInferiorDelgado textoCentrado tamanioFuente10">Discapacidad</td>
                    @foreach($discapacidad as $item)
                        <td class="cuerpoDelgado textoCentrado tamanioFuente12">{{$item}}</td>
                    @endforeach
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 fondoGrisClaro"><strong>{{$fDiscapacidad}}</strong></td>
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 fondoGrisClaro"><strong>{{$mDiscapacidad}}</strong></td>
                    <td class="total todosBordesGruesos tamanioFuente12"><strong>{{$tDiscapacidad}}</strong></td>
                </tr>
                <tr>
                    <td class="bordesExternosGruesos bordeInferiorGrueso textoCentrado tamanioFuente10">Master/Veteranos</td>
                    @php
                        $controlVeteranos = 1;
                    @endphp
                    @foreach($veteranos as $item)
                    @if($controlVeteranos<7)
                        <td class="bDerecho textoCentrado tamanioFuente12" style="background:black;">{{$item}}</td>
                    @else
                        <td class="bDerecho textoCentrado tamanioFuente12">{{$item}}</td>
                    @endif
                    @php
                        $controlVeteranos++;
                    @endphp
                    @endforeach
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 fondoGrisClaro"><strong>{{$fVeteranos}}</strong></td>
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 fondoGrisClaro"><strong>{{$mVeteranos}}</strong></td>
                    <td class="total todosBordesGruesos tamanioFuente12"><strong>{{$tVeteranos}}</strong></td>
                </tr>
                <tr>
                    <td class="tamanioFuente12 textoDerecha"><strong>TOTAL</strong></td>
                    @foreach($columnasOtros as $item)
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 fondoGrisClaro"><strong>{{$item}}</strong></td>
                    @endforeach
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 fondoGrisOscuro"><strong>{{$totalFemeninosOtros}}</strong></td>
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 fondoGrisOscuro"><strong>{{$totalMasculinosOtros}}</strong></td>
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 fondoVerde"><strong>{{$totalOtros}}</strong></td>
                </tr>
            </tbody>
        </table>
        <table cellpading=0 cellspacing=0 class="eliminarEspacios" id="tamanioAdaptados">
            <thead>
                <tr>
                    <th rowspan="2" class="encabezado textoCentrado tamanioFuente11">Etapas Deportivas</th>
                    <th colspan="4" class="encabezado textoCentrado tamanioFuente11">Formación</th>
                    <th colspan="2" rowspan="2" class="encabezado textoCentrado tamanioFuente11">Perfeccionamiento</th>
                    <th rowspan="2" colspan="2" class="encabezado textoCentrado tamanioFuente11">Especialización</th>
                    <th rowspan="2" colspan="2" class="encabezado textoCentrado tamanioFuente11">Alto Rendimiento</th>
                    <th colspan="3" rowspan="2" class="encabezado textoCentrado tamanioFuente11">TOTAL</th>
                </tr>
                <tr>
                    <th colspan="2" class="encabezado textoCentrado tamanioFuente11">Iniciación</th>
                    <th colspan="2" class="encabezado textoCentrado tamanioFuente11">Desarrollo</th>
                </tr>
                <tr>
                    <th colspan="14" class="bordesExternosGruesos tamanioFuente14" id="tituloAdaptados">ATLETAS EN PROCESO SITEMÁTICO DE ENTRENAMIENTO "DEPORTE ADAPTADO"</th>
                </tr>
                <tr>
                    <th class="encabezado textoCentrado tamanioFuente11">Categorías/Género</th>
                    <th class="encabezado textoCentrado tamanioFuente11">F</th>
                    <th class="encabezado textoCentrado tamanioFuente11">M</th>
                    <th class="encabezado textoCentrado tamanioFuente11">F</th>
                    <th class="encabezado textoCentrado tamanioFuente11">M</th>
                    <th class="encabezado textoCentrado tamanioFuente11">F</th>
                    <th class="encabezado textoCentrado tamanioFuente11">M</th>
                    <th class="encabezado textoCentrado tamanioFuente11">F</th>
                    <th class="encabezado textoCentrado tamanioFuente11">M</th>
                    <th class="encabezado textoCentrado tamanioFuente11">F</th>
                    <th class="encabezado textoCentrado tamanioFuente11">M</th>
                    <th class="todosBordesGruesos tamanioFuente11 fondoGrisClaro">F</th>
                    <th class="todosBordesGruesos tamanioFuente11 fondoGrisClaro">M</th>
                    <th class="todosBordesGruesos tamanioFuente11 fondoGrisClaro">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="bordesExternosGruesos bordeInferiorDelgado textoCentrado tamanioFuente10">Visuales</td>
                    @foreach ($visuales as $item)
                    <td class="textoCentrado bordeInferiorGrueso bDerecho tamanioFuente12 celdaReducida">{{$item}}</td>
                    @endforeach
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 fondoGrisClaro"><strong>{{$fvisuales}}</strong></td>
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 fondoGrisClaro"><strong>{{$mvisuales}}</strong></td>
                    <td class="total todosBordesGruesos tamanioFuente12"><strong>{{$tvisuales}}</strong></td>
                </tr>
                <tr>
                    <td class="bordesExternosGruesos bordeInferiorDelgado textoCentrado tamanioFuente10">Intelectuales</td>
                    @foreach ($intelecto as $item)
                    <td class="textoCentrado bordeInferiorGrueso bDerecho tamanioFuente12">{{$item}}</td>
                    @endforeach
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 fondoGrisClaro"><strong>{{$fintelecto}}</strong></td>
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 fondoGrisClaro"><strong>{{$mintelecto}}</strong></td>
                    <td class="total todosBordesGruesos tamanioFuente12"><strong>{{$tintelecto}}</strong></td>
                </tr>
                <tr>
                    <td class="bordesExternosGruesos bordeInferiorDelgado textoCentrado tamanioFuente10">Síndrome de Down</td>
                    @foreach ($sindrome as $item)
                    <td class="textoCentrado bordeInferiorGrueso bDerecho tamanioFuente12">{{$item}}</td>
                    @endforeach
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 fondoGrisClaro"><strong>{{$fsindrome}}</strong></td>
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 fondoGrisClaro"><strong>{{$msindrome}}</strong></td>
                    <td class="total todosBordesGruesos tamanioFuente12"><strong>{{$tsindrome}}</strong></td>
                </tr>
                <tr>
                    <td class="bordesExternosGruesos bordeInferiorDelgado textoCentrado tamanioFuente10">Parálisis Cerebral</td>
                    @foreach ($paralisis as $item)
                    <td class="textoCentrado bordeInferiorGrueso bDerecho tamanioFuente12">{{$item}}</td>
                    @endforeach
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 fondoGrisClaro"><strong>{{$fparalisis}}</strong></td>
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 fondoGrisClaro"><strong>{{$mparalisis}}</strong></td>
                    <td class="total todosBordesGruesos tamanioFuente12"><strong>{{$tparalisis}}</strong></td>
                </tr>
                <tr>
                    <td class="bordesExternosGruesos bordeInferiorDelgado textoCentrado tamanioFuente10">Amputados</td>
                    @foreach ($amputados as $item)
                    <td class="textoCentrado bordeInferiorGrueso bDerecho tamanioFuente12">{{$item}}</td>
                    @endforeach
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 fondoGrisClaro"><strong>{{$famputados}}</strong></td>
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 fondoGrisClaro"><strong>{{$mamputados}}</strong></td>
                    <td class="total todosBordesGruesos tamanioFuente12"><strong>{{$tamputados}}</strong></td>
                </tr>
                <tr>
                    <td class="bordesExternosGruesos bordeInferiorDelgado textoCentrado tamanioFuente10">Sillas de Ruedas</td>
                    @foreach ($ruedas as $item)
                    <td class="textoCentrado bordeInferiorGrueso bDerecho tamanioFuente12">{{$item}}</td>
                    @endforeach
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 fondoGrisClaro"><strong>{{$fruedas}}</strong></td>
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 fondoGrisClaro"><strong>{{$mruedas}}</strong></td>
                    <td class="total todosBordesGruesos tamanioFuente12"><strong>{{$truedas}}</strong></td>
                </tr>
                <tr>
                    <td class="bordesExternosGruesos bordeInferiorGrueso textoCentrado tamanioFuente10">Auditivos</td>
                    @foreach ($auditivos as $item)
                    <td class="textoCentrado bDerecho tamanioFuente12">{{$item}}</td>
                    @endforeach
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 fondoGrisClaro"><strong>{{$fauditivos}}</strong></td>
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 fondoGrisClaro"><strong>{{$mauditivos}}</strong></td>
                    <td class="total todosBordesGruesos tamanioFuente12"><strong>{{$tauditivos}}</strong></td>
                </tr>
                <tr>
                    <td class="tamanioFuente12 textoDerecha"><strong>TOTAL</strong></td>
                    @foreach($columnasAdaptados as $item)
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 fondoGrisClaro"><strong>{{$item}}</strong></td>
                    @endforeach
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 fondoGrisOscuro"><strong>{{$totalFemeninosAdaptados}}</strong></td>
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 fondoGrisOscuro"><strong>{{$totalMasculinosAdaptados}}</strong></td>
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 fondoVerde"><strong>{{$totalAdaptados}}</strong></td>
                </tr>
            </tbody>
        </table> --}}
        <br>
        <table cellpading=0 cellspacing=0 id="tamanio77">
            <tbody>
                <tr>
                    <th colspan="5" class="textoCentrado todosBordesGruesos tamanioFuente12" id="recepcion">RECEPCIÓN DE INFORMES</th>
                </tr>
                <tr>
                    <th class="todosBordesGruesos fondoNegro" id="ancho22"></th>
                    <th class="todosBordesGruesos fondoCelesteClaro tamanioFuente12 ancho39" colspan="2">NOMBRES Y APELLIDOS</th>
                    <th class="todosBordesGruesos fondoCelesteClaro tamanioFuente12 ancho39" colspan="2">FIRMA Y SELLO</th>
                </tr>
                <tr>
                    <th class="cuerpo fondoCelesteClaro tamanioFuente14 alto40">Persona que entrega</th>
                    <td class="cuerpo tamanioFuente14 textoCentrado" colspan="2">{{$entrega}}</td>
                    <th class="cuerpo" colspan="2"></th>
                </tr>
                <tr>
                    <th class="cuerpo fondoCelesteClaro tamanioFuente14 alto40">Persona que recibe</th>
                    <td class="cuerpo" colspan="2"></td>
                    <td class="cuerpo" colspan="2"></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>