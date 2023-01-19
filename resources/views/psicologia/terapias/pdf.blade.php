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
                    <td>Conciencia Corporal</td>
                    <td>{{$terapia->conciencia_corporal}}</td>
                </tr>
                <tr>
                    <td>Dominio Corporal</td>
                    <td>{{$terapia->dominio_corporal}}</td>
                </tr>
                <tr>
                    <td>Dominio de Respiración</td>
                    <td>{{$terapia->dominio_respiracion}}</td>
                </tr>
                <tr>
                    <td>Diálogo Interno</td>
                    <td>{{$terapia->dialogo_interno}}</td>
                </tr>
                <tr>
                    <td>Atención</td>
                    <td>{{$terapia->atencion}}</td>
                </tr>
                <tr>
                    <td>Concentración</td>
                    <td>{{$terapia->concentracion}}</td>
                </tr>
                <tr>
                    <td>Motivación</td>
                    <td>{{$terapia->motivacion}}</td>
                </tr>
                <tr>
                    <td>Confianza</td>
                    <td>{{$terapia->confianza}}</td>
                </tr>
                <tr>
                    <td>Activación</td>
                    <td>{{$terapia->activacion}}</td>
                </tr>
                <tr>
                    <td>Relajación</td>
                    <td>{{$terapia->relajacion}}</td>
                </tr>
                <tr>
                    <td>Estrés</td>
                    <td>{{$terapia->estres}}</td>
                </tr>
                <tr>
                    <td>Ansiedad Cognitiva</td>
                    <td>{{$terapia->ansiedad_cognitiva}}</td>
                </tr>
                <tr>
                    <td>Ansiedad Física</td>
                    <td>{{$terapia->ansiedad_fisica}}</td>
                </tr>
                <tr>
                    <td>Miedo</td>
                    <td>{{$terapia->miedo}}</td>
                </tr>
                <tr>
                    <td>Frustración</td>
                    <td>{{$terapia->estres}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>