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
        <div id="contenedor">
            <div id="foto">
                <img src="storage/uploads/logo.jpeg" width="98%" height="98%" id="margen1">
            </div>
            <div id="inicial">
                <div class="formulario textoCentrado tamanioFuente10">
                    FORMULARIO
                </div>
                <div class="formulario textoCentrado tamanioFuente10">
                    <strong>REGISTRO NOMINAL DE ATLETAS EN PROCESO SISTEMÁTICO</strong> 
                </div>
            </div>
            <div id="final" class="tamanioFuente10">
                <div id="interno1" >
                    Del Proceso: Administración del MRD.
                </div>
                <div id="interno2" >
                    Código:<strong>EDG-FOR-27.</strong>
                </div>
                <div id="interno3">
                    Versión: 6.
                </div>
                <div id="interno4">
                    Página: 1 de 1.
                </div>
            </div>
        </div>
        <div id="contenedor2">
            <div id="fadn">
                <span id="lineaFADN">______________________</span>
                <strong class="tamanioFuente8">FEDERACIÓN/ASOCIACIÓN:</strong><label class="tamanioFuente11"> {{$federacion->nombre}}</label>
            </div>
            <div id="depto">
                <span id="lineaDepartamento">______________________</span>
                <strong class="tamanioFuente9">DEPARTAMENTO:</strong><label class="tamanioFuente11"> {{$departamento->nombre}}</label>
            </div>
            <div id="mes">
                <span id="mostrarMes" class="tamanioFuente11">{{$mostrarMes}}</span>
                <strong class="tamanioFuente105">MES:</strong>_____________<strong class="tamanioFuente14"> {{$anio}}</strong>
            </div>   
        </div>
        <div id="espacio1"></div>
        <div id="contenedor3" class="tamanioFuente9">
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
                    <th colspan="10" id="tituloTabla" class="tamanioFuente11">ATLETAS EN PROCESO SISTEMATICO DE ENTRENAMIENTO "SISTEMÁTICOS"</th>
                </tr>
                <tr>
                    <th class="fondo bordeDerechoGruesoBlanco tamanioFuente10 tamanioFuente10" rowspan="2">No</th>
                    <th class="fondo bordeDerechoGruesoBlanco tamanioFuente10" rowspan="2">Tipo de Atleta</th>
                    <th class="fondo bordeDerechoGruesoBlanco tamanioFuente10" rowspan="2">Nombre(s) Apellido(s)</th>
                    <th class="fondo bordeDerechoGruesoBlanco tamanioFuente10" rowspan="2">Edad</th>
                    <th class="fondo bordeDerechoGruesoBlanco tamanioFuente10" rowspan="2">Género</th>
                    <th class="fondo bordeDerechoGruesoBlanco tamanioFuente10" rowspan="2">Modalidad</th>
                    <th class="fondo bordeDerechoGruesoBlanco tamanioFuente10" rowspan="2">Categoría</th>
                    <th class="fondo bordeDerechoGruesoBlanco tamanioFuente10" rowspan="2">Etapa Deportiva</th>
                    <th class="fondo bordeDerechoGruesoBlanco tamanioFuente8 bordeInferiorGruesoBlanco" colspan="2">Experiencia Deportiva</th>
                </tr>
                <tr>
                    <th class="fondoBajo bordeDerechoGruesoBlanco tamanioFuente10">Años</th>
                    <th class="fondoBajo bordeDerechoGruesoBlanco tamanioFuente10">Meses</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($atletas as $item)
                <tr>
                    <td class="cuerpo textoCentrado tamanioFuente9" id="ancho4">{{$contador}}</td>
                    <td class="cuerpo tamanioFuente9 ancho115">{{$item->federado}}</td>
                    <td class="cuerpo tamanioFuente9">
                        {{$item->alumno->nombre1}} {{$item->alumno->nombre2}} {{$item->alumno->nombre3}}
                        {{$item->alumno->apellido1}} {{$item->alumno->apellido2}}
                    </td>
                    <td class="cuerpo tamanioFuente9" id="edad">{{$item->alumno->edad}}</td>
                    <td class="cuerpo tamanioFuente9" id="ancho105">{{$item->alumno->genero}}</td>
                    <td class="cuerpo tamanioFuente9" id="ancho11">{{$item->modalidad->nombre}}</td>
                    <td class="cuerpo tamanioFuente10" id="ancho10">{{$item->categoria->tipo}}</td>
                    <td class="cuerpo tamanioFuente9 ancho115">{{$item->etapa_deportiva->nombre}}</td>
                    <td class="cuerpo tamanioFuente9 textoCentrado ancho7">{{$item->anios}}</td>
                    <td class="cuerpo tamanioFuente9 textoCentrado ancho7">{{$item->meses}}</td>
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