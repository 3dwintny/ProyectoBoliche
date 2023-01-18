<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF EDG-27.2</title>
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
        .textoCentrado{
            text-align: center;
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
            height: 4.5%;
        }
        #fadn{
            width: 50%;
            height: 100%;
            float: left;
            position: relative;
        }
        #depto{
            width: 50%;
            height: 100%;
            float: left;
            position: relative;
        }
        #mes{
            margin-left: 3%;
        }
        #contenedor3{
            width: 90%;
        }
        .fondo{
            border-top: 4px solid white;
            background-color: #00B0F0; 
            color:white;
            font-family: Century;
        }
        #tituloTabla{
            background-color: #757171; 
            color:white;
            font-family: Century;
            border-top: 1px solid #757171;  
            border-collapse: collapse;
        }
        .cuerpo{
            border: 1px solid black; 
            border-collapse: collapse;
        }
        #bIzq{
            border-left: 1px solid #00B0F0;
        }
        #bDer{
            border-right: 1px solid #00B0F0;
        }
        #espacio1{
            width: 100%;
            height: 1.2%;
        }
        #espacio2{
            width: 100%;
            height: 0.5%;
        }
        #anchoFull{
            width: 100%;
        }
        #textoCentrado{
            text-align: center;
        }
        .bordeDerechoGruesoBlanco{
            border-right: 2px solid white;
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
                <strong>REGISTRO NOMINAL DE ATLETAS PRACTICANTES DEL DEPORTE</strong>
            </div>
        </div>
        <div id="final">
            <div id="interno1">
                Del Proceso: Administración del MRD.
            </div>
            <div id="interno2">
                Código:<strong>EDG-FOR-27.2.</strong>
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
            <strong>FADN:</strong>_______________________________
        </div>
        <div id="depto">
            <strong>DEPARTAMENTO:</strong>___________________________
            <div id="mes">
                <strong>MES:</strong>________________________<strong>2022</strong>
            </div>
        </div>   
    </div>
    <div id="espacio1"></div>
    <div id="contenedor3" style="font-size: 70%;">
        <strong>INSTRUCCIONES:</strong> El presente formato pretende recopilar información específica de los atletas <strong>Practicantes del Deporte</strong> de las Asociaciones
        Deportivas Departamentales. La ADD, debe indicar la información que se solicita. La cantidad de deportistas identificadas en el presente
        formato, deben coincidir con las indicadas en el formato <strong>EDG-FOR-31</strong>(Reporte Mensual de Matrícula Deportiva). 
    </div>
    <div id="espacio2"></div>
    <table id="anchoFull" cellpading=0 cellspacing=0>
        @php
            $contador = 1;   
        @endphp
        <thead>
            <tr>
                <th colspan="6" id="tituloTabla">ATLETAS "PRACTICANTES DEL DEPORTE"</th>
            </tr>
            <tr>
                <th class="fondo bordeDerechoGruesoBlanco">No</th>
                <th class="fondo bordeDerechoGruesoBlanco">Nombre(s) Apellido(s) completos</th>
                <th class="fondo bordeDerechoGruesoBlanco">Fecha de Nacimiento</th>
                <th class="fondo bordeDerechoGruesoBlanco">Edad</th>
                <th class="fondo bordeDerechoGruesoBlanco">Género</th>
                <th class="fondo">Categoría</th>
            </tr>
        </thead>
        <tbody >
            @foreach ($atletas as $item)
            <tr id="textoCentrado">
                <td class="cuerpo">{{$contador}}</td>
                <td class="cuerpo">
                    {{$item->alumno->nombre1}} {{$item->alumno->nombre2}} {{$item->alumno->nombre3}}
                    {{$item->alumno->apellido1}} {{$item->alumno->apellido2}}
                </td>
                <td class="cuerpo">{{$item->alumno->fecha}}</td>
                <td class="cuerpo">{{$item->alumno->edad}}</td>
                <td class="cuerpo">{{$item->alumno->genero}}</td>
                <td class="cuerpo">{{$item->categoria->tipo}}</td>
                @php
                    $contador++;
                @endphp
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>