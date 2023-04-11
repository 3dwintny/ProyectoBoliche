<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Inscripción</title>
    <style>
        #contenedor{
            width: 100%;
            height: 20%;
        }
        #logoFederacion{
            float: left;
            position: relative;
            height: 75%;
            width: 17%;
        }
        #federacion{
            float: left;
            position: relative;
            height: 100%;
            width: 61%;
            text-align: center;
        }
        #fotoAlumno{
            position: relative;
            float: left;
            width: 22%;
            height: 100%;
        }
        .tamanio130{
            font-size: 140%;
        }
        #tamanio60{
            font-size: 73%;
        }
        #espacio1{
            width: 100%;
            height: 25.5%;
        }
        #espacio2{
            width: 100%;
            height: 22.5%;
        }
        #datosPersonales{
            border: 2px solid black;
            width: 100%;
            height: 25%;
        }
        #datosEncargados{
            border-left: 2px solid black;
            border-right: 2px solid black;
            border-top: 2px solid black;
            border-bottom: 1px solid black;
            width: 100%;
            height: 25%;
        }
        #declaracion{
            border-left: 2px solid black;
            border-right: 2px solid black;
            border-bottom: 1px solid black;
            width: 100%;
            height: 26%;
        }
        #declaratoria{
            margin-left: 2%;
            width: 94%;
            height: 32%;
            font-size: 85%;
        }
        #espacio3{
            width: 100%;
            height: 1.25%;
        }
        #tituloAlumno{
            width: 40%;
            height: 6.75%;
            border-bottom: 2px solid black;
            border-right: 2px solid black;
        }
        .textoCentrado{
            text-align: center;
        }
        .tamanio80{
            font-size: 80%;
        }
        .tamanio65{
            font-size: 65%;
        }
        #espacio4{
            width: 100%;
            height: 2.5%;
        }
        #espacio5{
            width: 100%;
            height: 1%;
        }
        #espacio6{
            width: 100%;
            height: 12%;
        }
        .contenedorTitulos{
            width: 100%;
            height: 7.2%;
        }
        .nombres{
            width: 95%;
            height: 7.2%;
        }
        .contenedorIzquierdo{
            width: 27%;
            height: 81.75%;
            float: left;
            position: relative;
        }
        .contenedorDerecho{
            width: 71.3%;
            height: 81.75%;
            float: left;
            position: relative;
        }
        .edad{
            width: 16%;
            height: 7.2%;
            float: left;
            position: relative;
        }
        .mes{
            width: 20%;
            height: 7.2%;
            float: left;
            position: relative;
            margin-left: 16%;
        }
        .cui{
            width: 22%;
            height: 7.2%;
            float: left;
            position: relative;
            margin-left: 36%;
        }
        .day{
            border-top: 1px solid black;
            width: 16%;
            height: 7.2%;
            float: left;
            position: relative;
        }
        .month{
            border-top: 1px solid black;
            width: 20%;
            height: 7.2%;
            float: left;
            position: relative;
            margin-left: 16%;
        }
        .year{
            border-top: 1px solid black;
            width: 22%;
            height: 7.2%;
            float: left;
            position: relative;
            margin-left: 36%;
        }
        .noCui{
            width: 24%;
            height: 7.2%;
            float: left;
            position: relative;
            margin-left: 58%;
        }
        .correo{
            width: 8.5%;
            height: 7.2%;
            float: left;
            position: relative;
            margin-left: 58%;
        }
        .margenIzquierdo{
            margin-left: 1.7%;
        }
        .tamanio70{
            font-size: 70%;
        }
        .espacioDerecho1{
            width: 18%;
            height: 7.2%;
            float: left;
            position: relative;
            margin-left: 82%;
        }
        .espacioDerecho2{
            width: 28.5%;
            height: 7.2%;
            float: left;
            position: relative;
            margin-left: 66.5%;
        }
        .emergencia{
            width: 50.5%;
            height: 7.2%;
            float: left;
            position: relative;
            margin-left: 16%;
        }
        .telEmergencia{
            width: 16.8%;
            height: 7.2%;
            float: left;
            position: relative;
            margin-left: 66.5%;
        }
        .telefonoEmergencia{
            width: 11.7%;
            height: 7.2%;
            float: left;
            position: relative;
            margin-left: 83.2%;
        }
        #espacio7{
            width: 100%;
            height: 45%;
        }
        #contenedorFinal{
            width: 100%;
            height: 7%;
        }
        #firmaAtleta{
            margin-left: 2.5%;
            width: 35%;
            height: 100%;
            float: left;
            position: relative;
            border-top: 1px solid black;
            font-size: 65%;
        }
        #firmaPresidente{
            margin-right: 2.5%;
            width: 35%;
            height: 100%;
            float: left;
            position: relative;
            border-top: 1px solid black;
            font-size: 65%;
        }
        #espacioFirmas{
            width: 25%;
            height: 100%;
            float: left;
            position: relative;
        }
    </style>
</head>
<body>
    <div id="contenedor">
        <div id="logoFederacion">
            <img src="storage/uploads/logoBoliche.jpeg" width="98%" height="98%">
        </div>
        <div id="federacion">
            @foreach($formularios as $item)
            <strong class="tamanio130">{{$item->titulo_principal}}</strong>
            <strong class="tamanio130">{{$anio}}</strong>
            <div id="espacio1"></div>
            <strong id="tamanio60">{{$item->subtitulo}}</strong>
            <div id="espacio2"></div>
            <strong class="tamanio130">{{$item->titulo_ficha}}</strong>
            @endforeach
        </div>
        <div id="fotoAlumno">
            @foreach($alumno as $item)
                <img src="storage/uploads/{{$item->foto}}" width="98%" height="98%">
            @endforeach
        </div>
    </div>
    <div id="espacio3"></div>
    <div id="datosPersonales">
        <div id="tituloAlumno" class="textoCentrado tamanio80"><strong>DATOS DEL ALUMNO</strong></div>
        <div id="espacio4"></div>
        <div class="contenedorIzquierdo margenIzquierdo">
            <div class="contenedorTitulos tamanio70">NOMBRE COMPLETO:</div>
            <div class="contenedorTitulos tamanio70"></div>
            <div class="contenedorTitulos tamanio70">EDAD (el 1 de enero de 2022):</div>
            <div class="contenedorTitulos tamanio70"></div>
            <div class="contenedorTitulos tamanio70">RAMA:</div>
            <div class="contenedorTitulos tamanio70"></div>
            <div class="contenedorTitulos tamanio70">FECHA DE NACIMIENTO:</div>
            <div class="contenedorTitulos tamanio70"></div>
            <div class="contenedorTitulos tamanio70"></div>
            <div class="contenedorTitulos tamanio70">PESO (en lbs.):</div>
            <div class="contenedorTitulos tamanio70"></div>
            <div class="contenedorTitulos tamanio70">DIRECCIÓN DE DOMICILIO:</div>
            <div class="contenedorTitulos tamanio70"></div>
            <div class="contenedorTitulos tamanio70">TELÉFONO DE CASA:</div>
        </div>
        <div class="contenedorDerecho">
            @foreach($alumno as $item)
            <div class="nombres tamanio70">{{$item->nombre1}} {{$item->nombre2}} {{$item->nombre3}} {{$item->apellido1}} {{$item->apellido2}}</div>
            
            <div class="contenedorTitulos tamanio70"></div>

            <div class="edad tamanio70 textoCentrado">{{$item->edad}}</div>
            <div class="mes"></div>
            <div class="cui tamanio70">No. DE CUI:</div>
            <div class="noCui tamanio70 textoCentrado">{{$item->cui}}</div>
            <div class="espacioDerecho1 tamanio70"></div>

            <div class="contenedorTitulos tamanio70"></div>
            <div class="contenedorTitulos tamanio70"></div>

            <div class="edad tamanio70 textoCentrado">{{$item->genero}}</div>
            <div class="mes"></div>
            <div class="cui tamanio70">CATEGORÍA:</div>
            <div class="noCui tamanio70 textoCentrado">SUB-11</div>
            <div class="espacioDerecho1 tamanio70"></div>

            
            <div class="contenedorTitulos tamanio70"></div>
            <div class="contenedorTitulos tamanio70"></div>

            <div class="edad tamanio70 textoCentrado">{{\Carbon\Carbon::parse($item->fecha)->day}}</div>
            <div class="mes tamanio70 textoCentrado">{{\Carbon\Carbon::parse($item->fecha)->month}}</div>
            <div class="cui tamanio70 textoCentrado">{{\Carbon\Carbon::parse($item->fecha)->year}}</div>
            <div class="noCui tamanio70"></div>
            <div class="espacioDerecho1 tamanio70"></div>

            <div class="contenedorTitulos tamanio70"></div>
            
            <div class="day tamanio70 textoCentrado">DÍA</div>
            <div class="month tamanio70 textoCentrado">MES</div>
            <div class="year tamanio70 textoCentrado">AÑO</div>
            <div class="noCui tamanio70"></div>
            <div class="espacioDerecho1 tamanio70"></div>

            <div class="contenedorTitulos tamanio70"></div>
            <div class="contenedorTitulos tamanio70"></div>

            <div class="edad tamanio70 textoCentrado">{{$item->peso}}</div>
            <div class="mes"></div>
            <div class="cui tamanio70">ALTURA (en cm.):</div>
            <div class="noCui tamanio70 textoCentrado">{{$item->altura}}</div>
            <div class="espacioDerecho1 tamanio70"></div>
            
            <div class="contenedorTitulos tamanio70"></div>
            <div class="contenedorTitulos tamanio70"></div>

            <div class="nombres tamanio70">{{$item->direccion}}</div>
            <div class="contenedorTitulos tamanio70"></div>

            <div class="edad tamanio70 textoCentrado">{{$item->telefono_casa}}</div>
            <div class="mes tamanio70" style="text-align: right;">CELULAR:</div>
            <div class="cui tamanio70 textoCentrado">{{$item->celular}}</div>
            <div class="correo tamanio70">E-MAIL:</div>
            <div class="espacioDerecho2 tamanio70">{{$item->correo}}</div>
            @endforeach
        </div>
    </div>

    <div id="espacio5"></div>

    <div id="datosEncargados">
        <div id="tituloAlumno" class="textoCentrado tamanio80"><strong>DATOS DE LOS PADRES/ENCARGADOS</strong></div>
        <div id="espacio4"></div>
        <div class="contenedorIzquierdo margenIzquierdo">
            <div class="contenedorTitulos tamanio65">NOMBRE DEL PADRE/ENCARGADO:</div>
            <div class="contenedorTitulos tamanio65"></div>
            <div class="contenedorTitulos tamanio65">TELÉFONO DE CASA:</div>
            <div class="contenedorTitulos tamanio65"></div>
            <div class="contenedorTitulos tamanio65">DIRECCIÓN DE DOMICILIO:</div>
            <div class="contenedorTitulos tamanio65"></div>
            <div class="contenedorTitulos tamanio65">NOMBRE DE LA MADRE/ENCARGADA:</div>
            <div class="contenedorTitulos tamanio65"></div>
            <div class="contenedorTitulos tamanio65">TELÉFONO DE CASA:</div>
            <div class="contenedorTitulos tamanio65"></div>
            <div class="contenedorTitulos tamanio65">DIRECCIÓN DOMICILIO:</div>
            <div class="contenedorTitulos tamanio65"></div>
            <div class="contenedorTitulos tamanio65">EN CASO DE EMERGENCIA, LLAMAR A:</div>
            <div class="contenedorTitulos tamanio65"></div>
            <div class="contenedorTitulos tamanio65">EL ATLETA ES ALÉRGICO A:</div>
        </div>
        <div class="contenedorDerecho">
                <div class="nombres tamanio70">{{$encargado[0]->nombre1p}} {{$encargado[0]->nombre2p}} {{$encargado[0]->nombre3p}} {{$encargado[0]->apellido1p}} {{$encargado[0]->apellido2p}} {{$encargado[0]->apellido_casada}}</div>
            
            <div class="contenedorTitulos tamanio70"></div>

            <div class="edad tamanio70 textoCentrado">{{$encargado[0]->telefono_casap}}</div>
            <div class="mes tamanio70" style="text-align: right;">CELULAR:</div>
            <div class="cui tamanio70 textoCentrado">{{$encargado[0]->celularp}}</div>
            <div class="correo tamanio70">E-MAIL:</div>
            <div class="espacioDerecho2 tamanio70">{{$encargado[0]->correop}}</div>

            <div class="contenedorTitulos tamanio70"></div>
            <div class="contenedorTitulos tamanio70"></div>

            <div class="nombres tamanio70">{{$encargado[0]->direccionp}}</div>

            <div class="contenedorTitulos tamanio70"></div>
            <div class="nombres tamanio70">NOMBRE DE LA MADRE</div>

            <div class="contenedorTitulos tamanio70"></div>
            
            <div class="edad tamanio70 textoCentrado">7785-4521</div>
            <div class="mes tamanio70" style="text-align: right;">CELULAR:</div>
            <div class="cui tamanio70 textoCentrado">4648-1545</div>
            <div class="correo tamanio70">E-MAIL:</div>
            <div class="espacioDerecho2 tamanio70">correo.encargado2@dominio.com</div>

            <div class="contenedorTitulos tamanio70"></div>
            <div class="contenedorTitulos tamanio70"></div>

            <div class="nombres tamanio70">DIRECCIÓN DEL ENCARGADO2</div>

            <div class="contenedorTitulos tamanio70"></div>

            <div class="edad tamanio70"></div>
            <div class="tamanio70 emergencia">María López</div>
            <div class="tamanio70 telEmergencia" style="text-align: right;">TELÉFONO:</div>
            <div class="tamanio70 textoCentrado telefonoEmergencia">{{$encargado[0]->celularp}}</div>

            <div class="contenedorTitulos tamanio70"></div>
            <div class="contenedorTitulos tamanio70"></div>

            <div class="edad tamanio70"></div>
            <div class="tamanio70 emergencia">Penicilina</div>
            <div class="tamanio70 telEmergencia"></div>
            <div class="tamanio70 textoCentrado telefonoEmergencia">Lactantes</div>
        </div>
    </div>
    <div id="declaracion">
        <div id="espacio6"></div>
        <div id="declaratoria" class="textoCentrado">
            @foreach($formularios as $item)
                {{$item->declaracion}}
            @endforeach
        </div>
        <div id="espacio7"></div>
        <div id="contenedorFinal">
            <div id="firmaAtleta" class="textoCentrado">Firma del Atleta o Representante Legal</div>
            <div id="espacioFirmas"></div>
            <div id="firmaPresidente" class="textoCentrado">Firma y sello del Presidente de la Asociación Departamental</div>
        </div>
    </div>
</body>
</html>