<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF EDG-31</title>
    <style>
        #contenedor{
            width: 100%;
            height: 5.6%;
            border-bottom: 1px solid black;
            border-top: 1px solid black;
            border-left: 1px solid black;
            border-right: 1px solid black;
        }
        #foto{
            width: 4%;
            height: 100%;
            border-right: 1px solid black;
            float: left;
            position: relative;
        }
        #inicial{
            width: 96%;
            height: 70%;
            border-bottom: 1px solid black;
            float: left;
            position: relative;
        }
        #final{
            margin-top: 5.1%;
            width: 96%;
            height: 28.9%;
            float: left;
            position: relative;
        }
        .formulario{
            width: 100%;
            height: 50%;
        }
        #interno1{
            margin-top: 0.05%;
            margin-left: 6%;
            width: 33%;
            height: 50%;
            float: left;
            position: relative;
            font-size: 78%;
        }
        #interno2{
            margin-top: 0.05%;
            margin-left: 42%;
            width: 20%;
            height: 50%;
            float: left;
            position: relative;
            font-size: 78%;
        }
        #interno3{
            margin-top: 0.05%;
            margin-left: 66%;
            width: 10%;
            height: 50%;
            float: left;
            position: relative;
            font-size: 78%;
        }
        #interno4{
            margin-top: 0.05%;
            margin-left: 81%;
            width: 12.5%;
            height: 50%;
            float: left;
            position: relative;
            font-size: 78%;
        }
        #contenedor2{
            width: 100%;
            height: 1.6%;
        }
        #fadn{
            width: 45%;
            height: 100%;
            float: left;
            position: relative;
            font-size: 70%;
        }
        #depto{
            width: 35%;
            height: 100%;
            float: left;
            position: relative;
            font-size: 70%;
        }
        #mes{
            width: 20%;
            height: 100%;
            float: left;
            position: relative;
            font-size: 70%;
        }
        #contenedor3{
            width: 100%;
            height: 3.5%;
            border: 1px dashed black;
        }
        #rInterno1{
            margin-top: 0.3%;
            margin-left: 0.75%;
            width: 12.5%;
            height: 90%;
            float: left;
            position: relative;
            font-size: 78%;
        }
        .rInterno2{
            width: 4%;
            height: 35%;
            margin-top: 1.9%;
            margin-left: 2%;
            font-size: 60%;
            float: left;
            position: relative;
        }
        .rInterno3{
            width: 104%;
            height: 26.9%;
            margin-top: 0.07%;
            text-align: center;
            font-size: 60%;
        }
        .rInterno4{
            width: 100%;
            height: 45%;
            text-align: center;
            font-size: 60%;
            margin-top: 5%;
            border: 1px solid black;
        }
        .rInterno5{
            width: 100%;
            height: 45%;
            text-align: center;
            font-size: 60%;
            margin-top: 5%;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-right: 1px solid black;
        }
        #rInterno6{
            width: 5%;
            height: 35%;
            margin-top: 1.9%;
            margin-left: 1.5%;
            font-size: 60%;
            float: left;
            position: relative;
        }
        #rInterno7{
            width: 6%;
            height: 35%;
            margin-top: 1.6%;
            margin-left: 1%;
            font-size: 75%;
            float: left;
            position: relative;
        }
        #rInterno8{
            width: 100%;
            height: 45%;
            text-align: center;
            font-size: 90%;
            margin-top: 5%;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-right: 1px solid black;
            border-left: 1px solid black;
        }
        .rInterno9{
            width: 100%;
            height: 45%;
            text-align: center;
            font-size: 90%;
            margin-top: 5%;
            border: 1px solid black;
        }
        #rInterno10{
            width: 100%;
            height: 45%;
            text-align: center;
            font-size: 90%;
            margin-top: 5%;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-right: 1px solid black;
            border-left: 1px solid black;
            background-color: #009CEA;
            color: white;
        }
        .rInterno11{
            width: 100%;
            height: 45%;
            text-align: center;
            font-size: 60%;
            margin-top: 5%;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-right: 1px solid black;
            border-left: 1px solid black;
            background-color: #E5E7D5;
        }
        .contenedorInterno1{
            height: 100%;
            width: 5%;
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
            width: 100%;
            height: 2%;
            font-size: 49.5%;
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
            font-size: 60%;
        }
        .fondoGrisClaro{
            background-color: #BFBFBF;
        }
        #tituloFederados{
            background-color: black;
            color: white;
            border-right: 2px solid black;
            border-left: 2px solid black;
            border-collapse: collapse; 
            font-size: 75%;
        }
        .todosBordesGruesos{
            border: 2px solid black;
            border-collapse: collapse;
        }
        .tamanioFuente60{
            font-size: 60%;
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
        .tamanioFuente80{
            font-size: 80%;
        }
        .tamanioFuente65{
            font-size: 65%;
        }
        .fondoGrisOscuro{
            background-color: #808080;
        }
        .fondoVerde{
            background-color: #7C691A;
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
            font-size: 75%;
        }
        #tituloAdaptados{
            background-color: #962626;
            color: white;
            border-right: 2px solid black;
            border-left: 2px solid black;
            border-collapse: collapse; 
            font-size: 75%;
        }
        .encabezadoDelgado{
            background-color: #7CC8DA;
            border-right: 2px solid black;
            border-bottom: 1px solid black;
            border-top: 2px solid black;
            border-collapse: collapse;
            font-size: 60%;
        }
        .encabezadoDelgado2{
            background-color: #7CC8DA;
            border-bottom: 1px solid black;
            border-top: 2px solid black;
            border-collapse: collapse;
            font-size: 60%;
        }
        .fondoNegro{
            background-color: black;
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
        .fondoCelesteClaro{
            background-color: #7CC8DA;
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
        </style>
</head>
<body>
    <div id="contenedor">
        <div id="foto">
            <img src="storage/uploads/logo.jpeg" width="98%" height="98%">
        </div>
        <div id="inicial">
            <div class="formulario" class="textoCentrado">
                FORMULARIO
            </div>
            <div class="formulario" class="textoCentrado">
                <strong>REPORTE MENSUAL DE MATRÍCULA DEPORTIVA</strong>
            </div>
        </div>
        <div id="final">
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
    <br>
    <div id="contenedor2">
        <div id="fadn">
            <strong>FEDERACIÓN/ASOCIACIÓN:</strong>_______________________
        </div>
        <div id="depto">
            <strong>DEPARTAMENTO:</strong>_______________________
        </div>
        <div id="mes">
            <strong>MES:</strong>______________<strong>2022</strong>
        </div>   
    </div>
    <br>
    <div id="contenedor3">
        <div id="rInterno1">
            <strong>RESUMEN MATRICULAR</strong>
        </div>
        <div class="rInterno2">
            Sistem.
        </div>
        <div class="contenedorInterno1">
            <div class="rInterno3">F</div>
            <div class="rInterno4"><p class="verticalCentrado">{{$totalFemeninosFederados}}</p></div>
        </div>
        <div class="contenedorInterno1">
            <div class="rInterno3">M</div>
            <div class="rInterno5"><p class="verticalCentrado">{{$totalMasculinosFederados}}</p></div>
        </div>
        <div class="contenedorInterno1">
            <div class="rInterno3">Total</div>
            <div class="rInterno11"><strong><p class="verticalCentrado">{{$totalFederados}}</p></strong></div>
        </div>
        <div class="rInterno2">Pract.</div>
        <div class="contenedorInterno1">
            <div class="rInterno3">F</div>
            <div class="rInterno4"><p class="verticalCentrado">{{$totalFemeninosOtros}}</p></div>
        </div>
        <div class="contenedorInterno1">
            <div class="rInterno3">M</div>
            <div class="rInterno5"><p class="verticalCentrado">{{$totalMasculinosOtros}}</p></div>
        </div>
        <div class="contenedorInterno1">
            <div class="rInterno3">Total</div>
            <div class="rInterno11"><strong><p class="verticalCentrado">{{$totalOtros}}</p></strong></div>
        </div>
        <div id="rInterno6">Dep. Ad.</div>
        <div class="contenedorInterno1">
            <div class="rInterno3">F</div>
            <div class="rInterno4"><p class="verticalCentrado">{{$totalFemeninosAdaptados}}</p></div>
        </div>
        <div class="contenedorInterno1">
            <div class="rInterno3">M</div>
            <div class="rInterno5"><p class="verticalCentrado">{{$totalMasculinosAdaptados}}</p></div>
        </div>
        <div class="contenedorInterno1">
            <div class="rInterno3">Total</div>
            <div class="rInterno11"><strong><p class="verticalCentrado">{{$totalAdaptados}}</p></strong></div>
        </div>
        @php
            $totalFemeninos = $totalFemeninosFederados+$totalFemeninosOtros+$totalFemeninosAdaptados;
            $totalMasculinos = $totalMasculinosFederados+$totalMasculinosOtros+$totalMasculinosAdaptados;
            $totalAtletas = $totalFemeninos+$totalMasculinos;
        @endphp
        <div id="rInterno7"><strong>TOTAL</strong></div>
        <div class="contenedorInterno1">
            <div class="rInterno3"><strong>F</strong></div>
            <div class="fondoGrisAzulado rInterno9"><strong><p class="verticalCentrado2">{{$totalFemeninos}}</p></strong></div>
        </div>
        <div class="contenedorInterno1">
            <div class="rInterno3"><strong>M</strong></div>
            <div class="fondoGrisAzulado" id="rInterno8"><strong><p class="verticalCentrado2">{{$totalMasculinos}}</p></strong></div>
        </div>
        <div class="contenedorInterno1">
            <div class="rInterno3"><strong>Total</strong></div>
            <div id="rInterno10"><strong><p class="verticalCentrado2">{{$totalAtletas}}</p></strong></div>
        </div>
    </div>
    <div class="espacio"></div>
    <div id="instrucciones">
        <strong>INSTRUCCIONES:</strong> Registre la cantidad de atletas matriculados en la Asociación Deportiva Departamental, según Tipo de Atleta,categorías, género, etapas. Esta debe coherencia con el formulario Registro Nominal de Atletas 
        en Proceso Sistemático <strong>(EDG-FOR-27)</strong> y Practicantes del Deporte <strong>(EDG-FOR-27.2)</strong>, además deberán registrarse en la <strong>Base de Datos</strong> con fotografía y documento de identificación.
    </div>
    <div class="espacio"></div>
    <table cellpading=0 cellspacing=0 id="tamanioFederados">
        <thead>
            <tr>
                <th rowspan="2" class="encabezado textoCentrado">Etapas Deportivas</th>
                <th colspan="4" class="encabezado textoCentrado">Formación</th>
                <th colspan="2" rowspan="2" class="encabezado textoCentrado">Perfeccionamiento</th>
                <th rowspan="2" colspan="2" class="encabezado textoCentrado">Especialización</th>
                <th rowspan="2" colspan="2" class="encabezado textoCentrado">Alto Rendimiento</th>
                <th colspan="3" rowspan="2" class="encabezado textoCentrado">TOTAL</th>
            </tr>
            <tr>
                <th colspan="2" class="encabezado textoCentrado">Iniciación</th>
                <th colspan="2" class="encabezado textoCentrado">Desarrollo</th>
            </tr>
            <tr>
                <th colspan="14" class="bordesExternosGruesos" id="tituloFederados">ATLETAS EN PROCESO SITEMÁTICO DE ENTRENAMIENTO "FEDERADOS"</th>
            </tr>
            <tr>
                <th class="encabezado textoCentrado">Categorías/Género</th>
                <th class="encabezado textoCentrado">F</th>
                <th class="encabezado textoCentrado">M</th>
                <th class="encabezado textoCentrado">F</th>
                <th class="encabezado textoCentrado">M</th>
                <th class="encabezado textoCentrado">F</th>
                <th class="encabezado textoCentrado">M</th>
                <th class="encabezado textoCentrado">F</th>
                <th class="encabezado textoCentrado">M</th>
                <th class="encabezado textoCentrado">F</th>
                <th class="encabezado textoCentrado">M</th>
                <th class="todosBordesGruesos tamanioFuente60 fondoGrisClaro">F</th>
                <th class="todosBordesGruesos tamanioFuente60 fondoGrisClaro">M</th>
                <th class="todosBordesGruesos tamanioFuente60 fondoGrisClaro">TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="textoCentrado bordesExternosGruesos bordeInferiorDelgado tamanioFuente65">Sub 09</td>
                @foreach($s9 as $item)
                <td class="textoCentrado cuerpoDelgado tamanioFuente80">{{$item}}</td>
                @endforeach
                <td class="todosBordesGruesos textoCentrado tamanioFuente80 fondoGrisClaro"><strong>{{$f9}}</strong></td>
                <td class="todosBordesGruesos textoCentrado tamanioFuente80 fondoGrisClaro"><strong>{{$m9}}</strong></td>
                <td class="total todosBordesGruesos tamanioFuente80"><strong>{{$tS9}}</strong></td>
            </tr>
            <tr>
                <td class="textoCentrado bordesExternosGruesos bordeInferiorDelgado tamanioFuente65">Sub 11</td>
                @foreach($s11 as $item)
                <td class="textoCentrado cuerpoDelgado tamanioFuente80">{{$item}}</td>
                @endforeach
                <td class="todosBordesGruesos textoCentrado tamanioFuente80 fondoGrisClaro"><strong>{{$f11}}</strong></td>
                <td class="todosBordesGruesos textoCentrado tamanioFuente80 fondoGrisClaro"><strong>{{$m11}}</strong></td>
                <td class="total todosBordesGruesos tamanioFuente80"><strong>{{$tS11}}</strong></td>
            </tr>
            <tr>
                <td class="textoCentrado bordesExternosGruesos bordeInferiorDelgado tamanioFuente65">Sub 13</td>
                @foreach($s13 as $item)
                <td class="textoCentrado cuerpoDelgado tamanioFuente80">{{$item}}</td>
                @endforeach
                <td class="todosBordesGruesos textoCentrado tamanioFuente80 fondoGrisClaro"><strong>{{$f13}}</strong></td>
                <td class="todosBordesGruesos textoCentrado tamanioFuente80 fondoGrisClaro"><strong>{{$m13}}</strong></td>
                <td class="total todosBordesGruesos tamanioFuente80"><strong>{{$tS13}}</strong></td>
            </tr>
            <tr>
                <td class="textoCentrado bordesExternosGruesos bordeInferiorDelgado tamanioFuente65">Sub 16</td>
                @foreach($s16 as $item)
                <td class="textoCentrado cuerpoDelgado tamanioFuente80">{{$item}}</td>
                @endforeach
                <td class="todosBordesGruesos textoCentrado tamanioFuente80 fondoGrisClaro"><strong>{{$f16}}</strong></td>
                <td class="todosBordesGruesos textoCentrado tamanioFuente80 fondoGrisClaro"><strong>{{$m16}}</strong></td>
                <td class="total todosBordesGruesos tamanioFuente80"><strong>{{$tS16}}</strong></td>
            </tr>
            <tr>
                <td class="textoCentrado bordesExternosGruesos bordeInferiorDelgado tamanioFuente65">Sub 18</td>
                @foreach($s18 as $item)
                <td class="textoCentrado cuerpoDelgado tamanioFuente80">{{$item}}</td>
                @endforeach
                <td class="todosBordesGruesos textoCentrado tamanioFuente80 fondoGrisClaro"><strong>{{$f18}}</strong></td>
                <td class="todosBordesGruesos textoCentrado tamanioFuente80 fondoGrisClaro"><strong>{{$m18}}</strong></td>
                <td class="total todosBordesGruesos tamanioFuente80"><strong>{{$tS18}}</strong></td>
            </tr>
            <tr>
                <td class="textoCentrado bordesExternosGruesos bordeInferiorDelgado tamanioFuente65">Sub 21</td>
                @foreach($s21 as $item)
                <td class="textoCentrado cuerpoDelgado tamanioFuente80">{{$item}}</td>
                @endforeach
                <td class="todosBordesGruesos textoCentrado tamanioFuente80 fondoGrisClaro"><strong>{{$f21}}</strong></td>
                <td class="todosBordesGruesos textoCentrado tamanioFuente80 fondoGrisClaro"><strong>{{$m21}}</strong></td>
                <td class="total todosBordesGruesos tamanioFuente80"><strong>{{$tS21}}</strong></td>
            </tr>
            <tr>
                <td class="textoCentrado bordesExternosGruesos bordeInferiorDelgado tamanioFuente65">Segunda Fuerza</td>
                @foreach($sSF as $item)
                <td class="textoCentrado bordeInferiorGrueso bDerecho tamanioFuente80">{{$item}}</td>
                @endforeach
                <td class="todosBordesGruesos textoCentrado tamanioFuente80 fondoGrisClaro"><strong>{{$fF}}</strong></td>
                <td class="todosBordesGruesos textoCentrado tamanioFuente80 fondoGrisClaro"><strong>{{$mF}}</strong></td>
                <td class="total todosBordesGruesos tamanioFuente80"><strong>{{$tSF}}</strong></td>
            </tr>
            <tr>
                <td class="textoCentrado bordesExternosGruesos bordeInferiorGrueso tamanioFuente65">Mayores</td>
                @foreach($sM as $item)
                <td class="textoCentrado cuerpoDelgado tamanioFuente80">{{$item}}</td>
                @endforeach
                <td class="todosBordesGruesos textoCentrado tamanioFuente80 fondoGrisClaro"><strong>{{$fM}}</strong></td>
                <td class="todosBordesGruesos textoCentrado tamanioFuente80 fondoGrisClaro"><strong>{{$mM}}</strong></td>
                <td class="total todosBordesGruesos tamanioFuente80"><strong>{{$tM}}</strong></td>
            </tr>
            <tr>
                <td class="tamanioFuente65 textoDerecha"><strong>TOTAL</strong></td>
                @foreach($columnasFederados as $item)
                <td class="todosBordesGruesos textoCentrado tamanioFuente80 fondoGrisClaro"><strong>{{$item}}</strong></td>
                @endforeach
                <td class="todosBordesGruesos textoCentrado tamanioFuente80 fondoGrisOscuro"><strong>{{$totalFemeninosFederados}}</strong></td>
                <td class="todosBordesGruesos textoCentrado tamanioFuente80 fondoGrisOscuro"><strong>{{$totalMasculinosFederados}}</strong></td>
                <td class="todosBordesGruesos textoCentrado tamanioFuente80 fondoVerde"><strong>{{$totalFederados}}</strong></td>
            </tr>
        </tbody>
    </table>
    <br>
    <table cellpading=0 cellspacing=0 class="anchoFull">
        <thead>
            <tr>
                <tr>
                    <th class="encabezado textoCentrado">EDADES</th>
                    <th colspan="2" class="encabezado textoCentrado">Menores de 12</th>
                    <th colspan="2" class="encabezado textoCentrado">13-17</th>
                    <th colspan="2" class="encabezado textoCentrado">18-21</th>
                    <th colspan="2" class="encabezado textoCentrado">22-35</th>
                    <th colspan="2" class="encabezado textoCentrado">36-50</th>
                    <th colspan="2" class="encabezado textoCentrado">Mas de 50</th>
                    <th colspan="3" class="encabezado textoCentrado">TOTALES</th>
                </tr>
                <tr>
                    <th colspan="16" id="tituloOtros">OTROS PROGRAMAS DE ATENCIÓN</th>
                </tr>
                <tr>
                    <th class="encabezado textoCentrado">Categorías/Género</th>
                    <th class="encabezadoDelgado textoCentrado">F</th>
                    <th class="encabezadoDelgado textoCentrado">M</th>
                    <th class="encabezadoDelgado textoCentrado">F</th>
                    <th class="encabezadoDelgado textoCentrado">M</th>
                    <th class="encabezadoDelgado textoCentrado">F</th>
                    <th class="encabezadoDelgado textoCentrado">M</th>
                    <th class="encabezadoDelgado textoCentrado">F</th>
                    <th class="encabezadoDelgado textoCentrado">M</th>
                    <th class="encabezadoDelgado textoCentrado">F</th>
                    <th class="encabezadoDelgado textoCentrado">M</th>
                    <th class="encabezadoDelgado textoCentrado">F</th>
                    <th class="encabezadoDelgado2 textoCentrado">M</th>
                    <th class="todosBordesGruesos tamanioFuente60 fondoGrisClaro">F</th>
                    <th class="todosBordesGruesos tamanioFuente60 fondoGrisClaro">M</th>
                    <th class="todosBordesGruesos tamanioFuente60 fondoGrisClaro">TOTAL</th>
                </tr>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="bordesExternosGruesos bordeInferiorDelgado textoCentrado tamanioFuente65">Practicantes del Deporte</td>
                @foreach($practicantes as $item)
                <td class="cuerpoDelgado textoCentrado tamanioFuente80">{{$item}}</td>
                @endforeach
                <td class="textoCentrado todosBordesGruesos tamanioFuente80 fondoGrisClaro"><strong>{{$fPracticantes}}</strong></td>
                <td class="textoCentrado todosBordesGruesos tamanioFuente80 fondoGrisClaro"><strong>{{$mPracticantes}}</strong></td>
                <td class="total todosBordesGruesos tamanioFuente80"><strong>{{$tPracticantes}}</strong></td>
            </tr>
            <tr>
                <td class="bordesExternosGruesos bordeInferiorDelgado textoCentrado tamanioFuente65">Discapacidad</td>
                @foreach($discapacidad as $item)
                    <td class="cuerpoDelgado textoCentrado tamanioFuente80">{{$item}}</td>
                @endforeach
                <td class="textoCentrado todosBordesGruesos tamanioFuente80 fondoGrisClaro"><strong>{{$fDiscapacidad}}</strong></td>
                <td class="textoCentrado todosBordesGruesos tamanioFuente80 fondoGrisClaro"><strong>{{$mDiscapacidad}}</strong></td>
                <td class="total todosBordesGruesos tamanioFuente80"><strong>{{$tDiscapacidad}}</strong></td>
            </tr>
            <tr>
                <td class="bordesExternosGruesos bordeInferiorGrueso textoCentrado tamanioFuente65">Master/Veteranos</td>
                @foreach($veteranos as $item)
                <td class="bDerecho textoCentrado tamanioFuente80">{{$item}}</td>
                @endforeach
                <td class="textoCentrado todosBordesGruesos tamanioFuente80 fondoGrisClaro"><strong>{{$fVeteranos}}</strong></td>
                <td class="textoCentrado todosBordesGruesos tamanioFuente80 fondoGrisClaro"><strong>{{$mVeteranos}}</strong></td>
                <td class="total todosBordesGruesos tamanioFuente80"><strong>{{$tVeteranos}}</strong></td>
            </tr>
            <tr>
                <td class="tamanioFuente65 textoDerecha"><strong>TOTAL</strong></td>
                @foreach($columnasOtros as $item)
                <td class="todosBordesGruesos textoCentrado tamanioFuente80 fondoGrisClaro"><strong>{{$item}}</strong></td>
                @endforeach
                <td class="textoCentrado todosBordesGruesos tamanioFuente80 fondoGrisOscuro"><strong>{{$totalFemeninosOtros}}</strong></td>
                <td class="textoCentrado todosBordesGruesos tamanioFuente80 fondoGrisOscuro"><strong>{{$totalMasculinosOtros}}</strong></td>
                <td class="textoCentrado todosBordesGruesos tamanioFuente80 fondoVerde"><strong>{{$totalOtros}}</strong></td>
            </tr>
        </tbody>
    </table>
    <br>
    <table cellpading=0 cellspacing=0 id="tamanioAdaptados">
        <thead>
            <tr>
                <th rowspan="2" class="encabezado textoCentrado">Etapas Deportivas</th>
                <th colspan="4" class="encabezado textoCentrado">Formación</th>
                <th colspan="2" rowspan="2" class="encabezado textoCentrado">Perfeccionamiento</th>
                <th rowspan="2" colspan="2" class="encabezado textoCentrado">Especialización</th>
                <th rowspan="2" colspan="2" class="encabezado textoCentrado">Alto Rendimiento</th>
                <th colspan="3" rowspan="2" class="encabezado textoCentrado">TOTAL</th>
            </tr>
            <tr>
                <th colspan="2" class="encabezado textoCentrado">Iniciación</th>
                <th colspan="2" class="encabezado textoCentrado">Desarrollo</th>
            </tr>
            <tr>
                <th colspan="14" class="bordesExternosGruesos" id="tituloAdaptados">ATLETAS EN PROCESO SITEMÁTICO DE ENTRENAMIENTO "DEPORTE ADAPTADO"</th>
            </tr>
            <tr>
                <th class="encabezado textoCentrado">Categorías/Género</th>
                <th class="encabezado textoCentrado">F</th>
                <th class="encabezado textoCentrado">M</th>
                <th class="encabezado textoCentrado">F</th>
                <th class="encabezado textoCentrado">M</th>
                <th class="encabezado textoCentrado">F</th>
                <th class="encabezado textoCentrado">M</th>
                <th class="encabezado textoCentrado">F</th>
                <th class="encabezado textoCentrado">M</th>
                <th class="encabezado textoCentrado">F</th>
                <th class="encabezado textoCentrado">M</th>
                <th class="todosBordesGruesos tamanioFuente60 fondoGrisClaro">F</th>
                <th class="todosBordesGruesos tamanioFuente60 fondoGrisClaro">M</th>
                <th class="todosBordesGruesos tamanioFuente60 fondoGrisClaro">TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="bordesExternosGruesos bordeInferiorDelgado textoCentrado tamanioFuente65">Visuales</td>
                @foreach ($visuales as $item)
                <td class="textoCentrado bordeInferiorGrueso bDerecho tamanioFuente80">{{$item}}</td>
                @endforeach
                <td class="textoCentrado todosBordesGruesos tamanioFuente80 fondoGrisClaro"><strong>{{$fvisuales}}</strong></td>
                <td class="textoCentrado todosBordesGruesos tamanioFuente80 fondoGrisClaro"><strong>{{$mvisuales}}</strong></td>
                <td class="total todosBordesGruesos tamanioFuente80"><strong>{{$tvisuales}}</strong></td>
            </tr>
            <tr>
                <td class="bordesExternosGruesos bordeInferiorDelgado textoCentrado tamanioFuente65">Intelectuales</td>
                @foreach ($intelecto as $item)
                <td class="textoCentrado bordeInferiorGrueso bDerecho tamanioFuente80">{{$item}}</td>
                @endforeach
                <td class="textoCentrado todosBordesGruesos tamanioFuente80 fondoGrisClaro"><strong>{{$fintelecto}}</strong></td>
                <td class="textoCentrado todosBordesGruesos tamanioFuente80 fondoGrisClaro"><strong>{{$mintelecto}}</strong></td>
                <td class="total todosBordesGruesos tamanioFuente80"><strong>{{$tintelecto}}</strong></td>
            </tr>
            <tr>
                <td class="bordesExternosGruesos bordeInferiorDelgado textoCentrado tamanioFuente65">Síndrome de Down</td>
                @foreach ($sindrome as $item)
                <td class="textoCentrado bordeInferiorGrueso bDerecho tamanioFuente80">{{$item}}</td>
                @endforeach
                <td class="textoCentrado todosBordesGruesos tamanioFuente80 fondoGrisClaro"><strong>{{$fsindrome}}</strong></td>
                <td class="textoCentrado todosBordesGruesos tamanioFuente80 fondoGrisClaro"><strong>{{$msindrome}}</strong></td>
                <td class="total todosBordesGruesos tamanioFuente80"><strong>{{$tsindrome}}</strong></td>
            </tr>
            <tr>
                <td class="bordesExternosGruesos bordeInferiorDelgado textoCentrado tamanioFuente65">Parálisis Cerebral</td>
                @foreach ($paralisis as $item)
                <td class="textoCentrado bordeInferiorGrueso bDerecho tamanioFuente80">{{$item}}</td>
                @endforeach
                <td class="textoCentrado todosBordesGruesos tamanioFuente80 fondoGrisClaro"><strong>{{$fparalisis}}</strong></td>
                <td class="textoCentrado todosBordesGruesos tamanioFuente80 fondoGrisClaro"><strong>{{$mparalisis}}</strong></td>
                <td class="total todosBordesGruesos tamanioFuente80"><strong>{{$tparalisis}}</strong></td>
            </tr>
            <tr>
                <td class="bordesExternosGruesos bordeInferiorDelgado textoCentrado tamanioFuente65">Amputados</td>
                @foreach ($amputados as $item)
                <td class="textoCentrado bordeInferiorGrueso bDerecho tamanioFuente80">{{$item}}</td>
                @endforeach
                <td class="textoCentrado todosBordesGruesos tamanioFuente80 fondoGrisClaro"><strong>{{$famputados}}</strong></td>
                <td class="textoCentrado todosBordesGruesos tamanioFuente80 fondoGrisClaro"><strong>{{$mamputados}}</strong></td>
                <td class="total todosBordesGruesos tamanioFuente80"><strong>{{$tamputados}}</strong></td>
            </tr>
            <tr>
                <td class="bordesExternosGruesos bordeInferiorDelgado textoCentrado tamanioFuente65">Sillas de Ruedas</td>
                @foreach ($ruedas as $item)
                <td class="textoCentrado bordeInferiorGrueso bDerecho tamanioFuente80">{{$item}}</td>
                @endforeach
                <td class="textoCentrado todosBordesGruesos tamanioFuente80 fondoGrisClaro"><strong>{{$fruedas}}</strong></td>
                <td class="textoCentrado todosBordesGruesos tamanioFuente80 fondoGrisClaro"><strong>{{$mruedas}}</strong></td>
                <td class="total todosBordesGruesos tamanioFuente80"><strong>{{$truedas}}</strong></td>
            </tr>
            <tr>
                <td class="bordesExternosGruesos bordeInferiorGrueso textoCentrado tamanioFuente65">Auditivos</td>
                @foreach ($auditivos as $item)
                <td class="textoCentrado bDerecho tamanioFuente80">{{$item}}</td>
                @endforeach
                <td class="textoCentrado todosBordesGruesos tamanioFuente80 fondoGrisClaro"><strong>{{$fauditivos}}</strong></td>
                <td class="textoCentrado todosBordesGruesos tamanioFuente80 fondoGrisClaro"><strong>{{$mauditivos}}</strong></td>
                <td class="total todosBordesGruesos tamanioFuente80"><strong>{{$tauditivos}}</strong></td>
            </tr>
            <tr>
                <td class="tamanioFuente65 textoDerecha"><strong>TOTAL</strong></td>
                @foreach($columnasAdaptados as $item)
                <td class="textoCentrado todosBordesGruesos tamanioFuente80 fondoGrisClaro"><strong>{{$item}}</strong></td>
                @endforeach
                <td class="textoCentrado todosBordesGruesos tamanioFuente80 fondoGrisOscuro"><strong>{{$totalFemeninosAdaptados}}</strong></td>
                <td class="textoCentrado todosBordesGruesos tamanioFuente80 fondoGrisOscuro"><strong>{{$totalMasculinosAdaptados}}</strong></td>
                <td class="textoCentrado todosBordesGruesos tamanioFuente80 fondoVerde"><strong>{{$totalAdaptados}}</strong></td>
            </tr>
        </tbody>
    </table>
    <br>
    <table cellpading=0 cellspacing=0 id="tamanio77">
        <tbody>
            <tr>
                <th colspan="5" class="textoCentrado todosBordesGruesos tamanioFuente80" id="recepcion">RECEPCIÓN DE INFORMES</th>
            </tr>
            <tr>
                <th class="todosBordesGruesos fondoNegro" id="ancho22"></th>
                <th class="todosBordesGruesos fondoCelesteClaro tamanioFuente60 ancho39" colspan="2">NOMBRES Y APELLIDOS</th>
                <th class="todosBordesGruesos fondoCelesteClaro tamanioFuente60 ancho39" colspan="2">FIRMA Y SELLO</th>
            </tr>
            <tr>
                <th class="cuerpo fondoCelesteClaro tamanioFuente80 alto40">Persona que entrega</th>
                <td class="cuerpo tamanioFuente80 textoCentrado" colspan="2">Romeo Danilo Calderón Santos</td>
                <th class="cuerpo" colspan="2"></th>
            </tr>
            <tr>
                <th class="cuerpo fondoCelesteClaro tamanioFuente80 alto40">Persona que recibe</th>
                <td class="cuerpo" colspan="2"></td>
                <td class="cuerpo" colspan="2"></td>
            </tr>
        </tbody>
    </table>
</body>
</html>