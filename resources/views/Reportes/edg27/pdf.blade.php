<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF EDG-27</title>
    <style>
        #contenedor{
            width: 100%;
            height: 5.7%;
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
            margin-top: 2.88%;
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
            margin-top: 0.65%;
            margin-left: 18%;
            width: 33%;
            height: 50%;
            float: left;
            position: relative;
        }
        #interno2{
            margin-top: 0.65%;
            margin-left: 45.5%;
            width: 20%;
            height: 50%;
            float: left;
            position: relative;
        }
        #interno3{
            margin-top: 0.65%;
            margin-left: 63.75%;
            width: 10%;
            height: 50%;
            float: left;
            position: relative;
        }
        #interno4{
            margin-top: 0.65%;
            margin-left: 73.5%;
            width: 12.5%;
            height: 50%;
            float: left;
            position: relative;
        }
        #contenedor2{
            margin-top: 1.6%;
            width: 100%;
            height: 1.7%;
        }
        #fadn{
            width: 40%;
            height: 100%;
            float: left;
            position: relative;
            margin-left: 2.25%;
        }
        #depto{
            width: 33%;
            height: 100%;
            float: left;
            position: relative;
            margin-left: 2%;
        }
        #mes{
            width: 20%;
            height: 100%;
            float: left;
            position: relative;
        }
        #contenedor3{
            width: 90%;
            margin-top: 1%;
        }
        .fondo{
            border-top: 2px solid white;
            background-color: #00B0F0; 
            color:white;
            font-family: Century;
        }
        .fondoBajo{
            background-color: #00B0F0; 
            color:white;
            font-family: Century;
        }
        #tituloTabla{
            background-color: #002060; 
            color:white;
            font-family: Century;
            border-top: 1px solid #002060;  
            border-collapse: collapse;
        }
        .cuerpo{
            border: 1px solid black; 
            border-collapse: collapse;
        }
        #espacio1{
            height: 1.3%;
            width: 100%;
        }
        #espacio2{
            height: 0.5%;
            width: 100%;
        }
        .textoCentrado{
            text-align: center;
        }
        .bordeDerechoGruesoBlanco{
            border-right: 2px solid white;
            border-collapse: collapse;
        }
        .bordeInferiorGruesoBlanco{
            border-bottom: 2px solid white;
            border-collapse: collapse;
        }
        .anchoFull{
            width: 100%;
        }
        .tamanioFuente10{
            font-size: 62.5%;
        }
        .tamanioFuente11{
            font-size: 68.75%;
        }
        .tamanioFuente8{
            font-size: 50%;
        }
        .tamanioFuente9{
            font-size: 56.25%;
        }
        .tamanioFuente105{
            font-size: 65.625%;
        }
        .tamanioFuente14{
            font-size: 87.5%;
        }
        #edad{
            text-align:right;
            width: 6%;
        }
        #contenedorPrincipal{
            margin-left: 10%;
            margin-right: 8%;
            width: 86%;
        }
        #margen1{
            margin-left: 1%;
        }
        #ancho4{
            width: 4%;
        }
        .ancho115{
            width: 11.5%;
        }
        #ancho105{
            width: 10.5%;
        }
        #ancho10{
            width: 10%;
        }
        #ancho11{
            width: 11%;
        }
        .ancho7{
            width: 7%;
        }
    </style>
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
                <span style="position: absolute; margin-left: 33.25%; margin-top: 0.02%;">______________________</span>
                <strong class="tamanioFuente8">FEDERACIÓN/ASOCIACIÓN:</strong><label class="tamanioFuente11"> {{$federacion->nombre}}</label>
            </div>
            <div id="depto">
                <span style="position: absolute; margin-left: 29.75%; margin-top: 0.02%;">______________________</span>
                <strong class="tamanioFuente9">DEPARTAMENTO:</strong><label class="tamanioFuente11"> {{$departamento->nombre}}</label>
            </div>
            <div id="mes">
                <span style="position: absolute; margin-left: 32.5%; margin-top: 2.75%;" class="tamanioFuente11">{{$mostrarMes}}</span>
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