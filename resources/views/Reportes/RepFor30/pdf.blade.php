<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF - EDG-30</title>

    <style>
        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
        }

        #contenedor{
            width: 100%;
            height: 9%;
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
            height: 50%;
            border-bottom: 1px solid black;
            float: left;
            position: relative;
        }
        #final{
            margin-top: 2.6%;
            width: 96%;
            height: 50%;
            float: left;
            position: relative;
        }
        .formulario{
            width: 100%;
            height: 50%;  
        }
        #interno1{
            margin-top: 0.5%;
            margin-left: 2%;
            width: 25%;
            height: 100%;
            float: left;
            position: relative;
        }
        #interno2{
            margin-top: 0.5%;
            margin-left: 30%;
            width: 25%;
            height: 100%;
            float: left;
            position: relative;
        }
        #interno3{
            margin-top: 0.5%;
            margin-left: 50%;
            width: 25%;
            height: 100%;
            float: left;
            position: relative;
        }
        #interno4{
            margin-top: 0.5%;
            margin-left: 72%;
            width: 25%;
            height: 100%;
            float: left;
            position: relative;
        }
        #interno5{
            margin-top: 0.5%;
            margin-left: 85%;
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
            margin-left: 30.5%;
            height: 100%;
            float: left;
            position: relative;
        }
        .visita{
            font-size: 98%;
        }
        </style>
</head>
<body>
    <div id="contenedor">
        <div id="foto">
            <img src="storage/uploads/logo.jpeg" width="100%" height="100%">
        </div>
        <div id="inicial">
            <div class="formulario" style="text-align: center; font-size:75%;">
                FORMULARIO
            </div>
            <div class="formulario" style="text-align: center; font-weight:bolder; font-size:75%;">
                REGISTRO DE ASISTENCIA DE ATLETAS FEDERADOS
            </div>
        </div>
        <div id="final">
            <div id="interno1">
                Del Proceso: Administración del MRD.
            </div>
            <div id="interno2">
                Código:<strong>EDG-FOR-30.</strong>
            </div>
            <div id="interno3">
                Fecha de aprob: 10/05/2023
            </div>
            <div id="interno4">
                Versión: 1.
            </div>
            <div id="interno5">
                Página: 1 de 1.
            </div>
        </div>
    </div>
    <br>
    <div id="contenedor2">
        <div id="hoja"><strong>Hoja No.</strong>______________ de ______</div>
        <div id="mesAnio"><strong>Mes y año a Reportar:</strong>______________ 2020</div>
    </div>
    <table style="width: 100%;">
        <thead>
            <tr>
                <th style="width: 30%">DATOS DE UBICACIÓN</th>
                <th style="width: 30%">DATOS DE ENTRENAMIENTO</th>
                <th style="width: 40%">MONITOREO Y EVALUACIÓN</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <p style="margin-left: 1.5%;">
                        FADN: .............................................................................. <br>
                        Depto.: ............................................................................. <br>
                        Mun.: ................................................................................ <br>
                        Centro de Entrenamiento: 
                    </p>
                </td>
                <td>
                    <p style="margin-left: 1.5%;">
                        Entrenador: ....................................................................... <br>
                        Horario: ............................................................................. <br>
                        Días entren. Prog.: ............................................................ <br>
                        Firma entrenador: 
                    </p>
                </td>
                <td>
                    <table style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="visita">PRIMERA VISITA</th>
                                <th class="visita">PRIMERA VISITA</th>
                                <th class="visita">PRIMERA VISITA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Fecha: ............................<br>
                                    Conteo: .......................... <br>
                                    F.Metodólogo: .............. <br>
                                    F.Entrenador: ................
                                </td>
                                <td>
                                    Fecha: ............................<br>
                                    Conteo: .......................... <br>
                                    F.Metodólogo: .............. <br>
                                    F.Entrenador: ................
                                </td>
                                <td>
                                    Fecha: ............................<br>
                                    Conteo: .......................... <br>
                                    F.Metodólogo: .............. <br>
                                    F.Entrenador: ................
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <table style="width:100%">
        <thead style="background-color: blue;">
            <tr>
                <th style="height: 7.3em;width:25%;" rowspan="2">NOMBRE COMPLETO DEL ATLETA</th>
                <th rowspan="2">
                    <p style="writing-mode: vertical-lr; transform: rotate(270deg);">EDAD</p> 
                </th>
                <th rowspan="2">
                    <p style="writing-mode: vertical-lr; transform: rotate(270deg);">GÉNERO</p>
                </th rowspan="2">
                <th rowspan="2">
                    <p style="writing-mode: vertical-lr; transform: rotate(270deg);">CATEGORÍA</p></th>
                <th rowspan="2">
                    <p style="writing-mode: vertical-lr; transform: rotate(270deg);">MODALIDAD</p>
                </th>
                <th colspan="{{count($fs)}}">Control de Asistencia</th>
                <th colspan="1" rowspan="2">
                    <p style="writing-mode: vertical-lr; transform: rotate(270deg);">DÍAS ENTRENADOS</p>
                </th>
                <th rowspan="2">
                    <p colspan="1" style="writing-mode: vertical-lr; transform: rotate(270deg);">% DE ASISTENCIA</p>
                </th>
                <th rowspan="2">
                    <p colspan="1" style="writing-mode: vertical-lr; transform: rotate(270deg);">ETAPA DEPORTIVA</p>
                </th>
            </tr>
        </thead>
        <tbody>
            @php
                $s=0;
                $c=0;
            @endphp
                @for ($i=0;$i<count($fs);$i++)
                <th>{{$fs[$i]}}</th>
                @endfor
            @foreach($atleta as $item)
            <tr id="{{$c}}" style="text-align: center;"><!--Filas-->
                <td ><!--Columnas-->
                    {{$item->atleta->alumno->nombre1}} {{$item->atleta->alumno->nombre2}} {{$item->atleta->alumno->nombre3}}
                    {{$item->atleta->alumno->apellido1}} {{$item->atleta->alumno->apellido2}}
                </td>
                <td>{{$item->atleta->alumno->edad}}</td>
                <td>{{$item->atleta->alumno->genero}}</td>
                <td>{{$item->atleta->categoria->tipo}}</td>
                <td>{{$item->atleta->modalidad->nombre}}</td>

                @for($i=$s;$i<count($fs)+$s;$i++)
                <td>{{$estado[$i]}}</td>
                @endfor
                <td>{{$contarDias[$c]}}</td>
                <td>{{$promedio[$c]}}</td>
                <td>{{$item->atleta->etapa_deportiva->nombre}}</td>
            </tr>

            @php
                $c=$c+1;
                $s=$s+count($fs)
            @endphp
            @endforeach
        </tbody>
    </table>
</body>
</html>