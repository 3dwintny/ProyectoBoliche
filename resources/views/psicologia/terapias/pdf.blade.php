<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Evolutiva - PDF</title>
    <style>
        .table,td,th{
            border: 1px solid black;
        }
        #contenedor1{
            width: 100%;
            height: 2.5%;
        }
        .contenedor2{
            width: 100%;
            height: 2%;
        }
        .textoCentrado{
            text-align: center;
        }
        .tamanioFuente150{
            font-size: 150%;
        }
        #sesion{
            width: 10%;
            height: 100%;
            position: relative;
            float: left;
        }
        #alinearDerecha{
            position: relative;
            float: left;
            height: 2%;
            width: 74.15%;
        }
        #alinearDerecha2{
            position: relative;
            float: left;
            height: 2%;
            width: 57.5%;
        }
        #numeroSesion{
            width: 5%;
            height: 100%;
            border-left: 1px solid black;
            border-right: 1px solid black;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            text-align: center;
            float: left;
            position: relative;
        }
        #fecha{
            width: 17.3%;
            height: 100%;
            float: left;
            position: relative;
        }
        #hora{
            width: 20%;
            height: 100%;
            float: left;
            position: relative;
        }
        #espacio1{
            width: 100%;
            height: 0.5;
        }
        #impresion{
            width: 100%;
            height: 5%;
            border: 1px solid black;
            border-radius: 0.5%;
        }
        #analisis{
            width: 100%;
            height: 4%;
            border: 1px solid black;
            border-radius: 0.5%;
        }
        #desarrollo{
            width: 100%;
            height: 15%;
            border: 1px solid black;
            border-radius: 0.5%;
        }
        .contenido{
            margin-left:0.5%;
            height: 100%;
            width: 99.5%
        }
        #observaciones{
            width: 100%;
            height: 5%;
            border: 1px solid black;
            border-radius: 0.5%;
        }
        #tarea{
            width: 100%;
            height: 5%;
            border: 1px solid black;
            border-radius: 0.5%;
        }
        .tamanioFuente60{
            font-size: 70%;
        }
        .textoCentrado{
            text-align: center;
        }
        #alineacionDerecha{
            margin-left: 51.8%
        }
    </style>
</head>
<body>
    <div id="contenedor1" class="textoCentrado tamanioFuente150"><strong>NOTA EVOLUTIVA</strong></div>
    <div style="font-family: 'Source Sans Pro';text-align:center;">Licda. Isabel Rojas</div>
    <br>
    <br>
    <br>
    <div class="contenedor2">
        <div id="alinearDerecha"></div>
        <div id="sesion">Sesión No.</div>
        <div id="numeroSesion">{{$terapia->numero_terapia}}</div>
    </div>
    <div id="espacio1"></div>
    <div class="contenedor2">
        <div id="alinearDerecha2"></div>
        <div id="fecha"><strong>Fecha:</strong> {{\Carbon\Carbon::parse($terapia->fecha)->format('d/m/Y')}}</div>
        <div id="hora"><strong>Hora de Inicio:</strong> {{\Carbon\Carbon::parse($terapia->hora_inicio)->format('H:i')}}</div> 
    </div>
    <br>
    <br>
    @foreach($alumno as $item)
    <div><strong>Atleta:</strong> {{$item->nombre1}} {{$item->nombre2}} {{$item->nombre3}} {{$item->apellido1}} {{$item->apellido2}}</div>
    @endforeach
    <br>
    <div>Impresión Clínica</div>
    <div id="impresion">
        <div class="contenido">{{$terapia->impresion_clinica}}</div>
    </div>
    <div>Análisis semiológico (signos y síntomas)</div>
    <div id="analisis">
        <div class="contenido">{{$terapia->analisis_semiologico}}</div></div>
    <div>Desarrollo</div>
    <div id="desarrollo">
        <div class="contenido">{{$terapia->desarrollo}}</div>
    </div>
    <div>Observaciones</div>
    <div id="observaciones">
        <div class="contenido">{{$terapia->observaciones}}</div>
    </div>
    <div>Tarea</div>
    <div id="tarea">
        <div class="contenido">{{$terapia->tarea}}</div>
    </div>
    <br>
    <div>
        <table cellpading=0 cellspacing=0 style="width: 100%;">
            <thead>
                <tr>
                    <th colspan="2">FACTORES EMOCIONALES Y SENSORIALES</th>
                </tr>
                <tr>
                    <th>Factor</th>
                    <th>Indicativo</th>
                </tr>
            </thead>
            <tbody class="tamanioFuente60 textoCentrado">
                <tr>
                    <td style="background-color: white;">Conciencia Corporal</td>
                    @if($terapia->conciencia_corporal==null)
                        <td style="background-color: white;">-----</td>
                    @else
                        <td style="background-color: white;">{{$terapia->conciencia_corporal}}</td>
                    @endif
                </tr>
                <tr>
                    <td style="background-color: white;">Dominio Corporal</td>
                    @if($terapia->dominio_corporal==null)
                        <td style="background-color: white;">-----</td>
                    @else
                        <td style="background-color: white;">{{$terapia->dominio_corporal}}</td>
                    @endif
                </tr>
                <tr>
                    <td style="background-color: white;">Dominio de Respiración</td>
                    @if($terapia->dominio_respiracion==null)
                        <td style="background-color: white;">-----</td>
                    @else
                        <td style="background-color: white;">{{$terapia->dominio_respiracion}}</td>
                    @endif
                </tr>
                <tr>
                    <td style="background-color: white;">Diálogo Interno</td>
                    @if($terapia->dialogo_interno==null)
                        <td style="background-color: white;">-----</td>
                    @else
                        <td style="background-color: white;">{{$terapia->dialogo_interno}}</td>
                    @endif
                </tr>
                <tr>
                    <td style="background-color: white;">Atención</td>
                    @if($terapia->atencion==null)
                        <td style="background-color: white;">-----</td>
                    @else
                        <td style="background-color: white;">{{$terapia->atencion}}</td>
                    @endif
                </tr>
                <tr>
                    <td style="background-color: white;">Concentración</td>
                    @if($terapia->concentracion==null)
                        <td style="background-color: white;">-----</td>
                    @else
                        <td style="background-color: white;">{{$terapia->concentracion}}</td>
                    @endif
                </tr>
                <tr>
                    <td style="background-color: white;">Motivación</td>
                    @if($terapia->motivacion==null)
                        <td style="background-color: white;">-----</td>
                    @else
                        <td style="background-color: white;">{{$terapia->motivacion}}</td>
                    @endif
                </tr>
                <tr>
                    <td style="background-color: white;">Confianza</td>
                    @if($terapia->confianza==null)
                        <td style="background-color: white;">-----</td>
                    @else
                        <td style="background-color: white;">{{$terapia->confianza}}</td>
                    @endif
                </tr>
                <tr>
                    <td style="background-color: white;">Activación</td>
                    @if($terapia->activacion==null)
                        <td style="background-color: white;">-----</td>
                    @else
                        <td style="background-color: white;">{{$terapia->activacion}}</td>
                    @endif
                </tr>
                <tr>
                    <td style="background-color: white;">Relajación</td>
                    @if($terapia->relajacion==null)
                        <td style="background-color: white;">-----</td>
                    @else
                        <td style="background-color: white;">{{$terapia->relajacion}}</td>
                    @endif
                </tr>
                <tr>
                    <td style="background-color: white;">Estrés</td>
                    @if($terapia->estres==null)
                        <td style="background-color: white;">-----</td>
                    @else
                        <td style="background-color: white;">{{$terapia->estres}}</td>
                    @endif
                </tr>
                <tr>
                    <td style="background-color: white;">Ansiedad Cognitiva</td>
                    @if($terapia->ansiedad_cognitiva==null)
                        <td style="background-color: white;">-----</td>
                    @else
                        <td style="background-color: white;">{{$terapia->ansiedad_cognitiva}}</td>
                    @endif
                </tr>
                <tr>
                    <td style="background-color: white;">Ansiedad Física</td>
                    @if($terapia->ansiedad_fisica==null)
                        <td style="background-color: white;">-----</td>
                    @else
                        <td style="background-color: white;">{{$terapia->ansiedad_fisica}}</td>
                    @endif
                </tr>
                <tr>
                    <td style="background-color: white;">Miedo</td>
                    @if($terapia->miedo==null)
                        <td style="background-color: white;">-----</td>
                    @else
                        <td style="background-color: white;">{{$terapia->miedo}}</td>
                    @endif
                </tr>
                <tr>
                    <td style="background-color: white;">Frustración</td>
                    @if($terapia->frustracion==null)
                        <td style="background-color: white;">-----</td>
                    @else
                        <td style="background-color: white;">{{$terapia->frustracion}}</td>
                    @endif
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>