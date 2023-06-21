<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF - EDG-30</title>

    <style>
        #contenedor{
            width: 100%;
            height: 5.25%;
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
            margin-top: 2.70%;
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
            margin-left: 6.5%;
            width: 33%;
            height: 50%;
            float: left;
            position: relative;
        }
        #interno2{
            margin-left: 35.9%;
            width: 25%;
            height: 100%;
            float: left;
            position: relative;
        }
        #interno3{
            margin-left: 57.3%;
            width: 25%;
            height: 100%;
            float: left;
            position: relative;
        }
        #interno4{
            margin-left: 76%;
            width: 25%;
            height: 100%;
            float: left;
            position: relative;
        }
        #interno5{
            margin-left: 84.5%;
            width: 25%;
            height: 100%;
            float: left;
            position: relative;
        }
        #contenedor2{
            width: 100%;
            height: 5.5%;
        }
        #hoja{
            margin-left: 20%;
            height: 100%;
            float: left;
            position: relative;
        }
        #mesAnio{
            margin-left: 33%;
            height: 100%;
            float: left;
            position: relative;
        }
        .visita{
            font-size: 98%;
        }
        .textoCentrado{
            text-align: center;
        }
        .rotacion{
            writing-mode: vertical-lr; transform: rotate(270deg);
        }
        #tamanioEncabezado{
            height: 7.3em; width:90%;
        }
        .anchoFull{
            width: 100%;
        }
        .margen15{
            margin-left: 1.5%;
        }
        .ancho30{
            width: 30%
        }
        #ancho40{
            width: 40%
        }
        .tamanioFuente11{
            font-size:68.75%;
        }
        .tamanioFuente10{
            font-size:62.5%;
        }
        .tamanioFuente8{
            font-size:50%;
        }
        .tamanioFuente7{
            font-size:43.75%;
        }
        .fondoAzul{
            color: white;
            background-color: #002060;
        }
        .fondoCeleste{
            color: white;
            background-color: #00B0F0;
        }
        .cuerpo{
            border: 1px solid black; 
            border-collapse: collapse;
        }
        .bDerecho{
            border-right: 1px solid white;
        }
        .cuerpo2{
            border-right: 1px solid black;
            border-collapse: collapse;
        }
        .bInferior{
            border-bottom:  1px solid black;
        }
        #bInferiorBlanco{
            border-bottom:  1px solid white;
        }
        #espacio{
            width: 100%;
            height: 0.9%;
        }
        </style>
</head>
<body>
    <div id="contenedor">
        <div id="foto">
            <img src="storage/uploads/logo.jpeg" width="96%" height="96%">
        </div>
        <div id="inicial">
            <div class="formulario" class="textoCentrado tamanioFuente10">
                FORMULARIO
            </div>
            <div class="formulario" class="textoCentrado tamanioFuente10">
                <strong>REGISTRO DE ASISTENCIA DE ATLETAS FEDERADOS</strong>
            </div>
        </div>
        <div id="final" >
            <div id="interno1" class="tamanioFuente10">
                Del Proceso: Administración del MRD.
            </div>
            <div id="interno2" class="tamanioFuente10">
                Código:<strong>EDG-FOR-30.</strong>
            </div>
            <div id="interno3" class="tamanioFuente10">
                Fecha de aprob: {{Carbon\Carbon::parse($aprobacion)->format('d/m/Y')}}
            </div>
            <div id="interno4" class="tamanioFuente10">
                Versión: 1.
            </div>
            <div id="interno5" class="tamanioFuente10">
                Página: 1 de 1.
            </div>
        </div>
    </div>
    <br>
    <div id="contenedor2" class="tamanioFuente11">
        <div id="hoja"><strong>Hoja No.</strong>______________ de ______</div>
        <div id="mesAnio"><strong>Mes y año a Reportar:</strong> {{$mostrarMes}} {{$obtenerAnio}}</div>
    </div>
    <table class="anchoFull" cellpading=0 cellspacing=0>
        <thead>
            <tr>
                <th class="ancho30 fondoAzul bDerecho tamanioFuente11">DATOS DE UBICACIÓN</th>
                <th class="ancho30 fondoAzul bDerecho tamanioFuente11">DATOS DE ENTRENAMIENTO</th>
                <th id="ancho40" class="fondoAzul tamanioFuente11">MONITOREO Y EVALUACIÓN</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="cuerpo">
                    <p class="margen15 tamanioFuente8">
                        <span style="position: absolute; margin-left: 24.5px; margin-top: 1px;">...............................................................................................................................</span>
                        FADN: Boliche <br>
                        <span style="position: absolute; margin-left: 24.5px; margin-top: 2.8px;">...............................................................................................................................</span>
                        Depto.: {{$departamento}}<br>
                        <span style="position: absolute; margin-left: 19.5px; margin-top: 3px;">..................................................................................................................................</span>
                        Mun.: {{$municipio}}<br>
                        Centro de Entrenamiento: {{$centro}} 
                    </p>
                </td>
                <td class="cuerpo">
                    <p class="margen15 tamanioFuente8">
                        <span style="position: absolute; margin-left: 37.85px; margin-top: 3px;">.........................................................................................................................</span>
                        Entrenador: {{$entrenador}}<br>
                        <span style="position: absolute; margin-left: 27.5px; margin-top: 2.8px;">..............................................................................................................................</span>
                        Horario: {{$horario}}<br>
                        <span style="position: absolute; margin-left: 60.5px; margin-top: 3px;">.............................................................................................................</span>
                        Días entren. Prog.: {{$dias}}<br>
                        Firma entrenador: 
                    </p>
                </td>
                <td class="cuerpo">
                    <table cellpading=0 cellspacing=0 class="anchoFull">
                        <thead>
                            <tr>
                                <th class="visita fondoCeleste bDerecho bInferior tamanioFuente8">PRIMERA VISITA</th>
                                <th class="visita fondoCeleste bDerecho bInferior tamanioFuente8">PRIMERA VISITA</th>
                                <th class="visita fondoCeleste bInferior tamanioFuente8">PRIMERA VISITA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="cuerpo2 tamanioFuente8">
                                    Fecha: ..................................................<br>
                                    Conteo: .................................................<br>
                                    F.Metodólogo: ....................................<br>
                                    F.Entrenador: ......................................
                                </td>
                                <td class="cuerpo2 tamanioFuente8">
                                    Fecha: ..................................................<br>
                                    Conteo: ................................................<br>
                                    F.Metodólogo: .....................................<br>
                                    F.Entrenador: ......................................
                                </td>
                                <td class="tamanioFuente8">
                                    Fecha: ..................................................<br>
                                    Conteo: .................................................<br>
                                    F.Metodólogo: .....................................<br>
                                    F.Entrenador: ......................................
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <table class="anchoFull" cellpading=0 cellspacing=0>
        @php
            $contador = 1;   
        @endphp
        <thead class="fondoAzul">
            <tr>
                <th rowspan="2" class="bDerecho tamanioFuente11">No.</th>
                <th id="tamanioEncabezado" rowspan="2" class="bDerecho tamanioFuente10">NOMBRE COMPLETO DEL ATLETA</th>
                <th rowspan="2" class="bDerecho tamanioFuente8">
                    <p class="rotacion">EDAD</p> 
                </th>
                <th rowspan="2" class="bDerecho tamanioFuente8">
                    <p class="rotacion">GÉNERO</p>
                </th>
                <th rowspan="2" class="bDerecho tamanioFuente8">
                    <p class="rotacion">CATEGORÍA</p></th>
                <th rowspan="2" class="bDerecho tamanioFuente8">
                    <p class="rotacion">MODALIDAD</p>
                </th>
                <th colspan="{{count($fechas)}}" class="bDerecho tamanioFuente11" id="bInferiorBlanco">CONTROL DE ASISTENCIA A ENTRENAMIENTO</th>
                <th colspan="1" rowspan="2" class="bDerecho tamanioFuente8">
                    <p class="rotacion">DÍAS ENTRENADOS</p>
                </th>
                <th rowspan="2" class="bDerecho tamanioFuente8">
                    <p colspan="1" class="rotacion">% DE ASISTENCIA</p>
                </th>
                <th rowspan="2">
                    <p colspan="1" class="rotacion tamanioFuente8">ETAPA DEPORTIVA</p>
                </th>
            </tr>
        </thead>
        <tbody>
            @php
                $s=0;
                $c=0;
            @endphp
                @for ($i=0;$i<count($fechas);$i++)
                <th class="fondoCeleste bDerecho tamanioFuente7">{{Carbon\Carbon::parse($fechas[$i])->format('d')}}</th>
                @endfor
            @foreach($atleta as $item)
            <tr id="{{$c}}" class="textoCentrado">
                <td class="cuerpo tamanioFuente10">{{$contador}}</td>
                <td class="cuerpo tamanioFuente10">
                    {{$item->alumno->nombre1}} {{$item->alumno->nombre2}} {{$item->alumno->nombre3}}
                    {{$item->alumno->apellido1}} {{$item->alumno->apellido2}}
                </td>
                <td class="cuerpo tamanioFuente10">{{$item->alumno->edad}}</td>
                <td class="cuerpo tamanioFuente10">{{$item->alumno->genero}}</td>
                <td class="cuerpo tamanioFuente10">{{$item->categoria->tipo}}</td>
                <td class="cuerpo tamanioFuente10">{{$item->modalidad->nombre}}</td>

                @for($i=$s;$i<count($fechas)+$s;$i++)
                <td class="cuerpo tamanioFuente10">{{$estado[$i]}}</td>
                @endfor
                <td class="cuerpo tamanioFuente10">{{$contarDias[$c]}}</td>
                <td class="cuerpo tamanioFuente8">{{$promedio[$c]}}%</td>
                <td class="cuerpo tamanioFuente80">{{$item->etapa_deportiva->nombre}}</td>
                @php
                    $contador++;
                @endphp
            </tr>

            @php
                $c=$c+1;
                $s=$s+count($fechas)
            @endphp
            @endforeach
        </tbody>
    </table>
</body>
</html>