<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF EDG-31</title>
    <link href="css/edg31/pdf.css" rel="stylesheet">
</head>
<body>
    <div id="contenedorPrincipal">
        <div id="contenedorEncabezado">
            <div id="foto">
                <img src="storage/uploads/logo.jpeg" width="98%" height="98%">
            </div>
            <div id="primerContenedorEncabezado">
                <div id="textoFormulario" class="textoCentrado tipoFuente tamanioFuente11">
                    FORMULARIO
                </div>
                <div id="reporteMensual" class="textoCentrado tipoFuente tamanioFuente11">
                    <strong>REPORTE MENSUAL DE MATRÍCULA DEPORTIVA</strong>
                </div>
            </div>
            <div id="segundoContenedorEncabezado" class="tamanioFuente11 tipoFuente">
                <div id="contenedorMRD">
                    Del Proceso: Administración del MRD.
                </div>
                <div id="contenedorCodigo">
                    Código:<strong>EDG-FOR-31.</strong>
                </div>
                <div id="contenedorVersion">
                    Versión: 1.
                </div>
                <div id="contenedorNumeroPagina">
                    Página: 1 de 1.
                </div>
            </div>
        </div>
        <div id="contenedorDatosAsociacion">
            <div id="contenedorFederacion">
                <span id="lineaFADN">______________________</span>
                <strong class="tipoFuente tamanioFuenteDatosAsociacion">FEDERACIÓN/ASOCIACIÓN:</strong><label id="fuenteAsociacion" class="tipoFuente">&nbsp;&nbsp;&nbsp;&nbsp;{{$federacion->nombre}}</label>
            </div>
            <div id="contenedorDepartamento">
                <span id="lineaDepartamento">________________</span>
                <strong class="tipoFuente tamanioFuenteDatosAsociacion">DEPARTAMENTO:</strong> <label id="fuenteDepartamento" class="tipoFuente">&nbsp;{{$departamento->nombre}}</label>
            </div>
            <div id="contenedorMes">
                <strong class="tipoFuente tamanioFuenteDatosAsociacion">MES:</strong>
            </div> 
            <div id="contenedorNombreMes">
                <span id="posicionMes" class="tipoFuente fuenteMes textoCentrado">{{$mostrarMes}}</span>
            </div>
            <div id="contenedorAnio"><strong id="fuenteAnio" class="tipoFuente">{{$anio}}</strong></div>
        </div>
        <div id="contenedorResumenCantidadAtletas">
            <div id="contenedorResumenMatricular">
                <strong>RESUMEN MATRICULAR</strong>
            </div>
            <div id="contenedorSistem">Sistem.</div>
            <div class="contenedorDatosResumen">
                <div class="contenedorGenerosTotalResumen">F</div>
                <div class="contenedorTotalesFemenino"><p class="centradoVerticalDatosPorCategoria tamanioFuente49">{{$totalFemeninosFederados}}</p></div>
            </div>
            <div class="contenedorDatosResumen">
                <div class="contenedorGenerosTotalResumen">M</div>
                <div class="contenedorTotalesMasculinos"><p class="centradoVerticalDatosPorCategoria tamanioFuente49">{{$totalMasculinosFederados}}</p></div>
            </div>
            <div class="contenedorDatosResumen">
                <div class="contenedorGenerosTotalResumen">Total</div>
                <div class="contenedorTotalPorPrograma"><strong><p class="centradoVerticalDatosPorCategoria tamanioFuente11">{{$totalFederados}}</p></strong></div>
            </div>
            <div class="tamanioFuente11" id="contenedorPracticantes">Pract.</div>
            <div class="contenedorDatosResumen">
                <div class="contenedorGenerosTotalResumen">F</div>
                <div class="contenedorTotalesFemenino"><p class="centradoVerticalDatosPorCategoria tamanioFuente49">{{$totalFemeninosOtros}}</p></div>
            </div>
            <div class="contenedorDatosResumen">
                <div class="contenedorGenerosTotalResumen">M</div>
                <div class="contenedorTotalesMasculinos"><p class="centradoVerticalDatosPorCategoria tamanioFuente49">{{$totalMasculinosOtros}}</p></div>
            </div>
            <div class="contenedorDatosResumen">
                <div class="contenedorGenerosTotalResumen">Total</div>
                <div class="contenedorTotalPorPrograma"><strong><p class="centradoVerticalDatosPorCategoria tamanioFuente11">{{$totalOtros}}</p></strong></div>
            </div>
            <div id="contenedorDeporteAdaptado" class="tamanioFuente11">Dep. Ad.</div>
            <div class="contenedorDatosResumen">
                <div class="contenedorGenerosTotalResumen">F</div>
                <div class="contenedorTotalesFemenino"><p class="centradoVerticalDatosPorCategoria tamanioFuente49">{{$totalFemeninosAdaptados}}</p></div>
            </div>
            <div class="contenedorDatosResumen">
                <div class="contenedorGenerosTotalResumen">M</div>
                <div class="contenedorTotalesMasculinos"><p class="centradoVerticalDatosPorCategoria tamanioFuente49">{{$totalMasculinosAdaptados}}</p></div>
            </div>
            <div class="contenedorDatosResumen">
                <div class="contenedorGenerosTotalResumen">Total</div>
                <div class="contenedorTotalPorPrograma"><strong><p class="centradoVerticalDatosPorCategoria tamanioFuente11">{{$totalAdaptados}}</p></strong></div>
            </div>
            @php
                $totalFemeninos = $totalFemeninosFederados+$totalFemeninosOtros+$totalFemeninosAdaptados;
                $totalMasculinos = $totalMasculinosFederados+$totalMasculinosOtros+$totalMasculinosAdaptados;
                $totalAtletas = $totalFemeninos+$totalMasculinos;
            @endphp
            <div id="contenedorTotal" class="tamanioFuente14 tipoFuente"><strong>TOTAL</strong></div>
            <div class="contenedorDatosResumen">
                <div class="contenedorGenerosTotalResumen"><strong>F</strong></div>
                <div class="fondoGrisAzulado contenedorTotalFemenino tamanioFuente14"><strong><p class="centradoVerticalTotalAtletas">{{$totalFemeninos}}</p></strong></div>
            </div>
            <div class="contenedorDatosResumen">
                <div class="contenedorGenerosTotalResumen"><strong>M</strong></div>
                <div class="fondoGrisAzulado tamanioFuente14" id="contenedorTotalMasculino"><strong><p class="centradoVerticalTotalAtletas">{{$totalMasculinos}}</p></strong></div>
            </div>
            <div class="contenedorDatosResumen">
                <div class="contenedorGenerosTotalResumen"><strong>Total</strong></div>
                <div id="contenedorTotalAtletas"><strong><p class="centradoVerticalTotalAtletas tamanioFuente14">{{$totalAtletas}}</p></strong></div>
            </div>
        </div>
        <div class="espacio"></div>
        <div id="contenedorInstrucciones" class="tipoFuente">
            <strong>INSTRUCCIONES:</strong> Registre la cantidad de atletas matriculados en la Asociación Deportiva Departamental, según Tipo de Atleta,categorías, género, etapas. Esta debe coherencia con el formulario Registro Nominal de Atletas 
            en Proceso Sistemático <strong>(EDG-FOR-27)</strong> y Practicantes del Deporte <strong>(EDG-FOR-27.2)</strong>, además deberán registrarse en la <strong>Base de Datos</strong> con fotografía y documento de identificación.
        </div>
        <table cellpading=0 cellspacing=0 class="anchoTablasSistematicos">
            <thead>
                <tr>
                    <th rowspan="2" class="encabezado textoCentrado fuente47 tipoFuente anchoColumnaEtapaDeportiva">Etapas Deportivas</th>
                    <th colspan="4" class="encabezado textoCentrado fuente47 tipoFuente anchoColumna4Punto4">Formación</th>
                    <th colspan="2" rowspan="2" class="encabezado textoCentrado fuente47 tipoFuente anchoColumna2Punto2">Perfeccionamiento</th>
                    <th rowspan="2" colspan="2" class="encabezado textoCentrado fuente47 tipoFuente anchoColumna2Punto2">Especialización</th>
                    <th rowspan="2" colspan="2" class="encabezado textoCentrado fuente47 tipoFuente anchoColumna2Punto2">Alto Rendimiento</th>
                    <th colspan="3" rowspan="2" class="encabezado textoCentrado fuente47 tipoFuente anchoColumna3Punto3">TOTAL</th>
                </tr>
                <tr>
                    <th colspan="2" class="encabezado textoCentrado fuente47 tipoFuente anchoColumna2Punto2">Iniciación</th>
                    <th colspan="2" class="encabezado textoCentrado fuente47 tipoFuente anchoColumna2Punto2">Desarrollo</th>
                </tr>
                <tr>
                    <th colspan="14" class="bordesExternosGruesos textoCentrado tipoFuente fondoNegro textoBlanco tamanioFuente14">ATLETAS EN PROCESO SITEMÁTICO DE ENTRENAMIENTO "FEDERADOS"</th>
                </tr>
                <tr class="alturaEncabezadoCategoriasGeneros">
                    <th class="encabezado textoCentrado fuente36 tipoFuente">Categorías / Género</th>
                    <th class="encabezado textoCentrado fuente36 tipoFuente">F</th>
                    <th class="encabezado textoCentrado fuente36 tipoFuente">M</th>
                    <th class="encabezado textoCentrado fuente36 tipoFuente">F</th>
                    <th class="encabezado textoCentrado fuente36 tipoFuente">M</th>
                    <th class="encabezado textoCentrado fuente36 tipoFuente">F</th>
                    <th class="encabezado textoCentrado fuente36 tipoFuente">M</th>
                    <th class="encabezado textoCentrado fuente36 tipoFuente">F</th>
                    <th class="encabezado textoCentrado fuente36 tipoFuente">M</th>
                    <th class="encabezado textoCentrado fuente36 tipoFuente">F</th>
                    <th class="encabezado textoCentrado fuente36 tipoFuente">M</th>
                    <th class="todosBordesGruesos fuente36 fondoGrisClaro tipoFuente">F</th>
                    <th class="todosBordesGruesos fuente36 fondoGrisClaro tipoFuente">M</th>
                    <th class="todosBordesGruesos fuente36 fondoGrisClaro tipoFuente">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <tr class="filasDatos">
                    <td class="textoCentrado bordesExternosGruesos bordeInferiorDelgado tamanioFuente9 tipoFuente">Sub 09</td>
                    @foreach($s9 as $item)
                    <td class="textoCentrado todosBordesDelgados tamanioFuente13 tipoFuente">{{$item}}</td>
                    @endforeach
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 fondoGrisClaro tipoFuente"><strong>{{$f9}}</strong></td>
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 fondoGrisClaro tipoFuente"><strong>{{$m9}}</strong></td>
                    <td class="cantidadAtletasPorCategoria todosBordesGruesos tamanioFuente12 tipoFuente"><strong>{{$tS9}}</strong></td>
                </tr>
                <tr class="filasDatos">
                    <td class="textoCentrado bordesExternosGruesos bordeInferiorDelgado tamanioFuente9 tipoFuente">Sub 11</td>
                    @foreach($s11 as $item)
                    <td class="textoCentrado todosBordesDelgados tamanioFuente13 tipoFuente">{{$item}}</td>
                    @endforeach
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 tipoFuente fondoGrisClaro"><strong>{{$f11}}</strong></td>
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 tipoFuente fondoGrisClaro"><strong>{{$m11}}</strong></td>
                    <td class="cantidadAtletasPorCategoria todosBordesGruesos tipoFuente tamanioFuente12"><strong>{{$tS11}}</strong></td>
                </tr>
                <tr class="filasDatos">
                    <td class="textoCentrado bordesExternosGruesos bordeInferiorDelgado tamanioFuente9 tipoFuente">Sub 13</td>
                    @foreach($s13 as $item)
                    <td class="textoCentrado todosBordesDelgados tamanioFuente13 tipoFuente">{{$item}}</td>
                    @endforeach
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 tipoFuente fondoGrisClaro"><strong>{{$f13}}</strong></td>
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 tipoFuente fondoGrisClaro"><strong>{{$m13}}</strong></td>
                    <td class="cantidadAtletasPorCategoria todosBordesGruesos tipoFuente tamanioFuente12"><strong>{{$tS13}}</strong></td>
                </tr>
                <tr class="filasDatos">
                    <td class="textoCentrado bordesExternosGruesos bordeInferiorDelgado tamanioFuente9 tipoFuente">Sub 16</td>
                    @foreach($s16 as $item)
                    <td class="textoCentrado todosBordesDelgados tipoFuente tamanioFuente13">{{$item}}</td>
                    @endforeach
                    <td class="todosBordesGruesos textoCentrado tipoFuente tamanioFuente12 fondoGrisClaro"><strong>{{$f16}}</strong></td>
                    <td class="todosBordesGruesos textoCentrado tipoFuente tamanioFuente12 fondoGrisClaro"><strong>{{$m16}}</strong></td>
                    <td class="cantidadAtletasPorCategoria todosBordesGruesos tamanioFuente12 tipoFuente"><strong>{{$tS16}}</strong></td>
                </tr>
                <tr class="filasDatos">
                    <td class="textoCentrado bordesExternosGruesos bordeInferiorDelgado tamanioFuente9 tipoFuente">Sub 18</td>
                    @foreach($s18 as $item)
                    <td class="textoCentrado todosBordesDelgados tamanioFuente13 tipoFuente">{{$item}}</td>
                    @endforeach
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 tipoFuente fondoGrisClaro"><strong>{{$f18}}</strong></td>
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 tipoFuente fondoGrisClaro"><strong>{{$m18}}</strong></td>
                    <td class="cantidadAtletasPorCategoria todosBordesGruesos tamanioFuente12 tipoFuente"><strong>{{$tS18}}</strong></td>
                </tr>
                <tr class="filasDatos">
                    <td class="textoCentrado bordesExternosGruesos tipoFuente bordeInferiorDelgado tamanioFuente9">Sub 21</td>
                    @foreach($s21 as $item)
                    <td class="textoCentrado todosBordesDelgados tipoFuente tamanioFuente13">{{$item}}</td>
                    @endforeach
                    <td class="todosBordesGruesos textoCentrado tipoFuente tamanioFuente12 fondoGrisClaro"><strong>{{$f21}}</strong></td>
                    <td class="todosBordesGruesos textoCentrado tipoFuente tamanioFuente12 fondoGrisClaro"><strong>{{$m21}}</strong></td>
                    <td class="cantidadAtletasPorCategoria todosBordesGruesos tipoFuente tamanioFuente12"><strong>{{$tS21}}</strong></td>
                </tr>
                <tr class="filasDatos">
                    <td class="textoCentrado bordesExternosGruesos tipoFuente bordeInferiorDelgado tamanioFuente9">Segunda Fuerza</td>
                    @foreach($sSF as $item)
                    <td class="textoCentrado bordeInferiorGrueso tipoFuente bordeDerechoDelgado tamanioFuente13">{{$item}}</td>
                    @endforeach
                    <td class="todosBordesGruesos textoCentrado tipoFuente tamanioFuente12 fondoGrisClaro"><strong>{{$fF}}</strong></td>
                    <td class="todosBordesGruesos textoCentrado tipoFuente tamanioFuente12 fondoGrisClaro"><strong>{{$mF}}</strong></td>
                    <td class="cantidadAtletasPorCategoria todosBordesGruesos tamanioFuente12 tipoFuente"><strong>{{$tSF}}</strong></td>
                </tr>
                <tr class="filasDatos">
                    <td class="textoCentrado bordesExternosGruesos bordeInferiorGrueso tipoFuente tamanioFuente9">Mayores</td>
                    @foreach($sM as $item)
                    <td class="textoCentrado todosBordesDelgados tamanioFuente12 tipoFuente">{{$item}}</td>
                    @endforeach
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 tipoFuente fondoGrisClaro"><strong>{{$fM}}</strong></td>
                    <td class="todosBordesGruesos textoCentrado tamanioFuente12 tipoFuente fondoGrisClaro"><strong>{{$mM}}</strong></td>
                    <td class="cantidadAtletasPorCategoria todosBordesGruesos tamanioFuente12 tipoFuente"><strong>{{$tM}}</strong></td>
                </tr>
                <tr class="filasDatos">
                    <td class="textoAlineadoDerecha tamanioFuente12 tipoFuente"><strong>TOTAL</strong></td>
                    @foreach($columnasFederados as $item)
                    <td class="todosBordesGruesos textoCentrado tipoFuente tamanioFuente12 fondoGrisClaro"><strong>{{$item}}</strong></td>
                    @endforeach
                    <td class="todosBordesGruesos textoCentrado tipoFuente tamanioFuente12 fondoGrisOscuro"><strong>{{$totalFemeninosFederados}}</strong></td>
                    <td class="todosBordesGruesos textoCentrado tipoFuente tamanioFuente12 fondoGrisOscuro"><strong>{{$totalMasculinosFederados}}</strong></td>
                    <td class="todosBordesGruesos textoCentrado tipoFuente tamanioFuente12 fondoVerde"><strong>{{$totalFederados}}</strong></td>
                </tr>
            </tbody>
        </table>
        <div class="espacio02Cetimetros"></div>
        <table cellpading=0 cellspacing=0 class="anchoCompletoPagina">
            <thead>
                <tr>
                    <tr>
                        <th class="encabezado textoCentrado fuente47 tipoFuente anchoColumnaEtapaDeportiva">EDADES</th>
                        <th colspan="2" class="encabezado textoCentrado tipoFuente fuente47 ancho2Punto145">Menores de 12</th>
                        <th colspan="2" class="encabezado textoCentrado fuente47 tipoFuente ancho2Punto15">13-17</th>
                        <th colspan="2" class="encabezado textoCentrado fuente47 tipoFuente ancho2Punto15">18-21</th>
                        <th colspan="2" class="encabezado textoCentrado fuente47 tipoFuente ancho2Punto145">22-35</th>
                        <th colspan="2" class="encabezado textoCentrado fuente47 tipoFuente ancho2Punto16">36-50</th>
                        <th colspan="2" class="encabezado textoCentrado fuente47 tipoFuente ancho2Punto14">Mas de 50</th>
                        <th colspan="3" class="encabezado textoCentrado fuente47 tipoFuente ancho3Punto36">TOTALES</th>
                    </tr>
                    <tr>
                        <th colspan="16" class="bordesExternosGruesos tamanioFuente14 tipoFuente textoBlanco fondoNegro textoCentrado">OTROS PROGRAMAS DE ATENCIÓN</th>
                    </tr>
                    <tr>
                        <th class="encabezado textoCentrado fuente36 tipoFuente">Categorías/Género</th>
                        <th class="contenedorEncabezadoGenerosTblSistematico textoCentrado tipoFuente fuente36">F</th>
                        <th class="contenedorEncabezadoGenerosTblSistematico textoCentrado fuente36 tipoFuente">M</th>
                        <th class="contenedorEncabezadoGenerosTblSistematico textoCentrado fuente36 tipoFuente">F</th>
                        <th class="contenedorEncabezadoGenerosTblSistematico textoCentrado fuente36 tipoFuente">M</th>
                        <th class="contenedorEncabezadoGenerosTblSistematico textoCentrado fuente36 tipoFuente">F</th>
                        <th class="contenedorEncabezadoGenerosTblSistematico textoCentrado fuente36 tipoFuente">M</th>
                        <th class="contenedorEncabezadoGenerosTblSistematico textoCentrado fuente36 tipoFuente">F</th>
                        <th class="contenedorEncabezadoGenerosTblSistematico textoCentrado fuente36 tipoFuente">M</th>
                        <th class="contenedorEncabezadoGenerosTblSistematico textoCentrado fuente36 tipoFuente">F</th>
                        <th class="contenedorEncabezadoGenerosTblSistematico textoCentrado fuente36 tipoFuente">M</th>
                        <th class="contenedorEncabezadoGenerosTblSistematico textoCentrado fuente36 tipoFuente">F</th>
                        <th class="contenedorEncabezadoGenerosTblSistematico textoCentrado fuente36 tipoFuente">M</th>
                        <th class="todosBordesGruesos fuente36 fondoGrisClaro tipoFuente">F</th>
                        <th class="todosBordesGruesos fuente36 fondoGrisClaro tipoFuente">M</th>
                        <th class="todosBordesGruesos fuente36 fondoGrisClaro tipoFuente">TOTAL</th>
                    </tr>
                </tr>
            </thead>
            <tbody>
                <tr class="filasDatos">
                    <td class="bordesExternosGruesos bordeInferiorDelgado textoCentrado tipoFuente tamanioFuente10">Practicantes del Deporte</td>
                    @foreach($practicantes as $item)
                    <td class="todosBordesDelgados textoCentrado tipoFuente tamanioFuente12">{{$item}}</td>
                    @endforeach
                    <td class="textoCentrado todosBordesGruesos tipoFuente tamanioFuente12 fondoGrisClaro"><strong>{{$fPracticantes}}</strong></td>
                    <td class="textoCentrado todosBordesGruesos tipoFuente tamanioFuente12 fondoGrisClaro"><strong>{{$mPracticantes}}</strong></td>
                    <td class="cantidadAtletasPorCategoria todosBordesGruesos tipoFuente tamanioFuente12"><strong>{{$tPracticantes}}</strong></td>
                </tr>
                <tr class="filasDatos">
                    <td class="bordesExternosGruesos bordeInferiorDelgado tipoFuente textoCentrado tamanioFuente10">Discapacidad</td>
                    @foreach($discapacidad as $item)
                        <td class="todosBordesDelgados textoCentrado tamanioFuente12 tipoFuente">{{$item}}</td>
                    @endforeach
                    <td class="textoCentrado todosBordesGruesos tipoFuente tamanioFuente12 fondoGrisClaro"><strong>{{$fDiscapacidad}}</strong></td>
                    <td class="textoCentrado todosBordesGruesos tipoFuente tamanioFuente12 fondoGrisClaro"><strong>{{$mDiscapacidad}}</strong></td>
                    <td class="cantidadAtletasPorCategoria todosBordesGruesos tipoFuente tamanioFuente12"><strong>{{$tDiscapacidad}}</strong></td>
                </tr>
                <tr class="filasDatos">
                    <td class="bordesExternosGruesos tipoFuente bordeInferiorGrueso textoCentrado tamanioFuente10">Master/Veteranos</td>
                    @php
                        $controlVeteranos = 1;
                    @endphp
                    @foreach($veteranos as $item)
                    @if($controlVeteranos<7)
                        <td class="bordeDerechoDelgado textoCentrado tamanioFuente12 fondoNegro">{{$item}}</td>
                    @else
                        <td class="bordeDerechoDelgado textoCentrado tipoFuente tamanioFuente12">{{$item}}</td>
                    @endif
                    @php
                        $controlVeteranos++;
                    @endphp
                    @endforeach
                    <td class="textoCentrado todosBordesGruesos tipoFuente tamanioFuente12 fondoGrisClaro"><strong>{{$fVeteranos}}</strong></td>
                    <td class="textoCentrado todosBordesGruesos tipoFuente tamanioFuente12 fondoGrisClaro"><strong>{{$mVeteranos}}</strong></td>
                    <td class="cantidadAtletasPorCategoria todosBordesGruesos tipoFuente tamanioFuente12"><strong>{{$tVeteranos}}</strong></td>
                </tr>
                <tr class="filasDatos">
                    <td class="tamanioFuente12 textoAlineadoDerecha tipoFuente"><strong>TOTAL</strong></td>
                    @foreach($columnasOtros as $item)
                    <td class="todosBordesGruesos textoCentrado tipoFuente tamanioFuente12 fondoGrisClaro"><strong>{{$item}}</strong></td>
                    @endforeach
                    <td class="textoCentrado todosBordesGruesos tipoFuente tamanioFuente12 fondoGrisOscuro"><strong>{{$totalFemeninosOtros}}</strong></td>
                    <td class="textoCentrado todosBordesGruesos tipoFuente tamanioFuente12 fondoGrisOscuro"><strong>{{$totalMasculinosOtros}}</strong></td>
                    <td class="textoCentrado todosBordesGruesos tipoFuente tamanioFuente12 fondoVerde"><strong>{{$totalOtros}}</strong></td>
                </tr>
            </tbody>
        </table>
        <div class="espacio02Cetimetros"></div>
        <table cellpading=0 cellspacing=0  class="anchoTablasSistematicos">
            <thead>
                <tr>
                    <th rowspan="2" class="encabezado textoCentrado tipoFuente fuente47 anchoColumnaEtapaDeportiva">Etapas Deportivas</th>
                    <th colspan="4" class="encabezado textoCentrado tipoFuente fuente47 anchoColumna4Punto4">Formación</th>
                    <th colspan="2" rowspan="2" class="encabezado textoCentrado tipoFuente fuente47 anchoColumna2Punto2">Perfeccionamiento</th>
                    <th rowspan="2" colspan="2" class="encabezado textoCentrado tipoFuente fuente47 anchoColumna2Punto2">Especialización</th>
                    <th rowspan="2" colspan="2" class="encabezado textoCentrado tipoFuente fuente47 anchoColumna2Punto2">Alto Rendimiento</th>
                    <th colspan="3" rowspan="2" class="encabezado textoCentrado tipoFuente fuente47 anchoColumna3Punto3">TOTAL</th>
                </tr>
                <tr>
                    <th colspan="2" class="encabezado textoCentrado fuente47 tipoFuente anchoColumna2Punto2">Iniciación</th>
                    <th colspan="2" class="encabezado textoCentrado fuente47 tipoFuente anchoColumna2Punto2">Desarrollo</th>
                </tr>
                <tr>
                    <th colspan="14" class="bordesExternosGruesos textoCentrado tipoFuente fondoRojo textoBlanco tamanioFuente14">ATLETAS EN PROCESO SITEMÁTICO DE ENTRENAMIENTO "DEPORTE ADAPTADO"</th>
                </tr>|
                <tr class="alturaEncabezadoCategoriasGeneros">
                    <th class="encabezado textoCentrado fuente36 tipoFuente">Categorías / Género</th>
                    <th class="encabezado textoCentrado fuente36 tipoFuente">F</th>
                    <th class="encabezado textoCentrado fuente36 tipoFuente">M</th>
                    <th class="encabezado textoCentrado fuente36 tipoFuente">F</th>
                    <th class="encabezado textoCentrado fuente36 tipoFuente">M</th>
                    <th class="encabezado textoCentrado fuente36 tipoFuente">F</th>
                    <th class="encabezado textoCentrado fuente36 tipoFuente">M</th>
                    <th class="encabezado textoCentrado fuente36 tipoFuente">F</th>
                    <th class="encabezado textoCentrado fuente36 tipoFuente">M</th>
                    <th class="encabezado textoCentrado fuente36 tipoFuente">F</th>
                    <th class="encabezado textoCentrado fuente36 tipoFuente">M</th>
                    <th class="todosBordesGruesos fuente36 fondoGrisClaro tipoFuente">F</th>
                    <th class="todosBordesGruesos fuente36 fondoGrisClaro tipoFuente">M</th>
                    <th class="todosBordesGruesos fuente36 fondoGrisClaro tipoFuente">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <tr class="filasDatos">
                    <td class="bordesExternosGruesos bordeInferiorDelgado tipoFuente textoCentrado tamanioFuente10">Visuales</td>
                    @foreach ($visuales as $item)
                    <td class="textoCentrado bordeInferiorGrueso bordeDerechoDelgado tipoFuente tamanioFuente12">{{$item}}</td>
                    @endforeach
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 tipoFuente fondoGrisClaro"><strong>{{$fvisuales}}</strong></td>
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 tipoFuente fondoGrisClaro"><strong>{{$mvisuales}}</strong></td>
                    <td class="cantidadAtletasPorCategoria todosBordesGruesos tipoFuente tamanioFuente12"><strong>{{$tvisuales}}</strong></td>
                </tr>
                <tr class="filasDatos">
                    <td class="bordesExternosGruesos bordeInferiorDelgado tipoFuente textoCentrado tamanioFuente10">Intelectuales</td>
                    @foreach ($intelecto as $item)
                    <td class="textoCentrado bordeInferiorGrueso bordeDerechoDelgado tipoFuente tamanioFuente12">{{$item}}</td>
                    @endforeach
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 tipoFuente fondoGrisClaro"><strong>{{$fintelecto}}</strong></td>
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 tipoFuente fondoGrisClaro"><strong>{{$mintelecto}}</strong></td>
                    <td class="cantidadAtletasPorCategoria todosBordesGruesos tamanioFuente12 tipoFuente"><strong>{{$tintelecto}}</strong></td>
                </tr>
                <tr class="filasDatos">
                    <td class="bordesExternosGruesos bordeInferiorDelgado textoCentrado tamanioFuente10 tipoFuente">Síndrome de Down</td>
                    @foreach ($sindrome as $item)
                    <td class="textoCentrado bordeInferiorGrueso bordeDerechoDelgado tamanioFuente12 tipoFuente">{{$item}}</td>
                    @endforeach
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 fondoGrisClaro tipoFuente"><strong>{{$fsindrome}}</strong></td>
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 fondoGrisClaro tipoFuente"><strong>{{$msindrome}}</strong></td>
                    <td class="cantidadAtletasPorCategoria todosBordesGruesos tamanioFuente12 tipoFuente"><strong>{{$tsindrome}}</strong></td>
                </tr>
                <tr class="filasDatos">
                    <td class="bordesExternosGruesos bordeInferiorDelgado tipoFuente textoCentrado tamanioFuente10">Parálisis Cerebral</td>
                    @foreach ($paralisis as $item)
                    <td class="textoCentrado bordeInferiorGrueso bordeDerechoDelgado tipoFuente tamanioFuente12">{{$item}}</td>
                    @endforeach
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 tipoFuente fondoGrisClaro"><strong>{{$fparalisis}}</strong></td>
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 tipoFuente fondoGrisClaro"><strong>{{$mparalisis}}</strong></td>
                    <td class="cantidadAtletasPorCategoria todosBordesGruesos tamanioFuente12 tipoFuente"><strong>{{$tparalisis}}</strong></td>
                </tr>
                <tr class="filasDatos">
                    <td class="bordesExternosGruesos bordeInferiorDelgado tipoFuente textoCentrado tamanioFuente10">Amputados</td>
                    @foreach ($amputados as $item)
                    <td class="textoCentrado bordeInferiorGrueso bordeDerechoDelgado tipoFuente tamanioFuente12">{{$item}}</td>
                    @endforeach
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 tipoFuente fondoGrisClaro"><strong>{{$famputados}}</strong></td>
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 tipoFuente fondoGrisClaro"><strong>{{$mamputados}}</strong></td>
                    <td class="cantidadAtletasPorCategoria todosBordesGruesos tamanioFuente12 tipoFuente"><strong>{{$tamputados}}</strong></td>
                </tr>
                <tr class="filasDatos">
                    <td class="bordesExternosGruesos bordeInferiorDelgado textoCentrado tipoFuente tamanioFuente10">Sillas de Ruedas</td>
                    @foreach ($ruedas as $item)
                    <td class="textoCentrado bordeInferiorGrueso bordeDerechoDelgado tamanioFuente12 tipoFuente">{{$item}}</td>
                    @endforeach
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 tipoFuente fondoGrisClaro"><strong>{{$fruedas}}</strong></td>
                    <td class="textoCentrado todosBordesGruesos tamanioFuente12 tipoFuente fondoGrisClaro"><strong>{{$mruedas}}</strong></td>
                    <td class="cantidadAtletasPorCategoria todosBordesGruesos tamanioFuente12 tipoFuente"><strong>{{$truedas}}</strong></td>
                </tr>
                <tr class="filasDatos">
                    <td class="bordesExternosGruesos bordeInferiorGrueso tipoFuente textoCentrado tamanioFuente10">Auditivos</td>
                    @foreach ($auditivos as $item)
                    <td class="textoCentrado bordeDerechoDelgado tamanioFuente12 tipoFuente">{{$item}}</td>
                    @endforeach
                    <td class="textoCentrado todosBordesGruesos tipoFuente tamanioFuente12 fondoGrisClaro"><strong>{{$fauditivos}}</strong></td>
                    <td class="textoCentrado todosBordesGruesos tipoFuente tamanioFuente12 fondoGrisClaro"><strong>{{$mauditivos}}</strong></td>
                    <td class="cantidadAtletasPorCategoria todosBordesGruesos tipoFuente tamanioFuente12"><strong>{{$tauditivos}}</strong></td>
                </tr>
                <tr class="filasDatos">
                    <td class="tamanioFuente12 textoAlineadoDerecha tipoFuente"><strong>TOTAL</strong></td>
                    @foreach($columnasAdaptados as $item)
                    <td class="textoCentrado todosBordesGruesos tipoFuente tamanioFuente12 fondoGrisClaro"><strong>{{$item}}</strong></td>
                    @endforeach
                    <td class="textoCentrado todosBordesGruesos tipoFuente tamanioFuente12 fondoGrisOscuro"><strong>{{$totalFemeninosAdaptados}}</strong></td>
                    <td class="textoCentrado todosBordesGruesos tipoFuente tamanioFuente12 fondoGrisOscuro"><strong>{{$totalMasculinosAdaptados}}</strong></td>
                    <td class="textoCentrado todosBordesGruesos tipoFuente tamanioFuente12 fondoVerde"><strong>{{$totalAdaptados}}</strong></td>
                </tr>
            </tbody>
        </table>
        <div class="espacio01Centimetros"></div>
        <table cellpading=0 cellspacing=0 id="anchoTblRecepcionInformes">
            <tbody>
                <tr>
                    <th colspan="3" class="textoCentrado todosBordesGruesos tamanioFuente12 tipoFuente" id="recepcion">RECEPCIÓN DE INFORMES</th>
                </tr>
                <tr class="filasDatos">
                    <th class="todosBordesGruesos fondoNegro"></th>
                    <th class="todosBordesGruesos fondoCelesteClaro tamanioFuente12 tipoFuente anchoNombresApellidosInforme">NOMBRES Y APELLIDOS</th>
                    <th class="todosBordesGruesos fondoCelesteClaro tamanioFuente12 tipoFuente">FIRMA Y SELLO</th>
                </tr>
                <tr>
                    <th class="bordesDelgadosTblRecepcion fondoCelesteClaro tamanioFuente14 alto08 tipoFuente anchoColumnaEtapaDeportiva">Persona que entrega</th>
                    <td class="bordesDelgadosTblRecepcion tamanioFuente14 textoCentrado tipoFuente">{{$entrega}}</td>
                    <th class="bordesDelgadosTblRecepcion"></th>
                </tr>
                <tr>
                    <th class="bordesDelgadosTblRecepcion fondoCelesteClaro tamanioFuente14 tipoFuente alto08 anchoColumnaEtapaDeportiva">Persona que recibe</th>
                    <td class="bordesDelgadosTblRecepcion"></td>
                    <td class="bordesDelgadosTblRecepcion"></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>