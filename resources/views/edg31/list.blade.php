<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EDG 31</title>

    <style>
        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
        }
        </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th rowspan="2">Etapas Deportivas</th>
                <th colspan="4">Formación</th>
                <th colspan="2" rowspan="2">Perfeccionamiento</th>
                <th rowspan="2" colspan="2">Especialización</th>
                <th rowspan="2" colspan="2">Alto Rendimiento</th>
                <th colspan="3" rowspan="2">Total</th>
            </tr>
            <tr>
                <th colspan="2">Iniciación</th>
                <th colspan="2">Desarrollo</th>
            </tr>
            <tr>
                <th colspan="14">ATLETAS EN PROCESO SITEMÁTICO DE DESARROLLO "FEDERADOS"</th>
            </tr>
            <tr>
                <th>Categorías/Género</th>
                <th>F</th>
                <th>M</th>
                <th>F</th>
                <th>M</th>
                <th>F</th>
                <th>M</th>
                <th>F</th>
                <th>M</th>
                <th>F</th>
                <th>M</th>
                <th>F</th>
                <th>M</th>
                <th>TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Sub 09</td>
                @foreach($s9 as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$f9}}</td>
                <td>{{$m9}}</td>
                <td>{{$tS9}}</td>
            </tr>
            <tr>
                <td>Sub 11</td>
                @foreach($s11 as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$f11}}</td>
                <td>{{$m11}}</td>
                <td>{{$tS11}}</td>
            </tr>
            <tr>
                <td>Sub 13</td>
                @foreach($s13 as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$f13}}</td>
                <td>{{$m13}}</td>
                <td>{{$tS13}}</td>
            </tr>
            <tr>
                <td>Sub 16</td>
                @foreach($s16 as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$f16}}</td>
                <td>{{$m16}}</td>
                <td>{{$tS16}}</td>
            </tr>
            <tr>
                <td>Sub 18</td>
                @foreach($s18 as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$f18}}</td>
                <td>{{$m18}}</td>
                <td>{{$tS18}}</td>
            </tr>
            <tr>
                <td>Sub 21</td>
                @foreach($s21 as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$f21}}</td>
                <td>{{$m21}}</td>
                <td>{{$tS21}}</td>
            </tr>
            <tr>
                <td>Segunda Fuerza</td>
                @foreach($sSF as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$fF}}</td>
                <td>{{$mF}}</td>
                <td>{{$tSF}}</td>
            </tr>
            <tr>
                <td>Mayores</td>
                @foreach($sM as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$fM}}</td>
                <td>{{$mM}}</td>
                <td>{{$tM}}</td>
            </tr>
        </tbody>
    </table>
    <br>
    <table>
        <thead>
            <tr>
                <tr>
                    <th>Edades</th>
                    <th colspan="2">Menores de 12</th>
                    <th colspan="2">13-17</th>
                    <th colspan="2">18-21</th>
                    <th colspan="2">22-35</th>
                    <th colspan="2">36-50</th>
                    <th colspan="2">Mas de 50</th>
                    <th colspan="3">Total</th>
                </tr>
                <tr>
                    <th colspan="16">OTROS PROGRAMAS DE ATENCIÓN</th>
                </tr>
                <tr>
                    <th>Categorías/Género</th>
                    <th>F</th>
                    <th>M</th>
                    <th>F</th>
                    <th>M</th>
                    <th>F</th>
                    <th>M</th>
                    <th>F</th>
                    <th>M</th>
                    <th>F</th>
                    <th>M</th>
                    <th>F</th>
                    <th>M</th>
                    <th>F</th>
                    <th>M</th>
                    <th>TOTAL</th>
                </tr>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Practicantes del Deporte</td>
                @foreach($practicantes as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$fPracticantes}}</td>
                <td>{{$mPracticantes}}</td>
                <td>{{$tPracticantes}}</td>
            </tr>
            <tr>
                <td>Discapacidad</td>
                @foreach($discapacidad as $item)
                    <td>{{$item}}</td>
                @endforeach
                <td>{{$fDiscapacidad}}</td>
                <td>{{$mDiscapacidad}}</td>
                <td>{{$tDiscapacidad}}</td>
            </tr>
            <tr>
                <td>Master/Veteranos</td>
                @foreach($veteranos as $item)
                <td>{{$item}}</td>
                @endforeach
                <td>{{$fVeteranos}}</td>
                <td>{{$mVeteranos}}</td>
                <td>{{$tVeteranos}}</td>
            </tr>
        </tbody>
    </table>
    <br>
    <table>
        <thead>
            <tr>
                <th rowspan="2">Etapas Deportivas</th>
                <th colspan="4">Formación</th>
                <th colspan="2" rowspan="2">Perfeccionamiento</th>
                <th rowspan="2" colspan="2">Especialización</th>
                <th rowspan="2" colspan="2">Alto Rendimiento</th>
                <th colspan="3" rowspan="2">Total</th>
            </tr>
            <tr>
                <th colspan="2">Iniciación</th>
                <th colspan="2">Desarrollo</th>
            </tr>
            <tr>
                <th colspan="14">ATLETAS EN PROCESO SITEMÁTICO DE ENTRENAMIENTO "DEPORTE ADAPTADO"</th>
            </tr>
            <tr>
                <th>Categorías/Género</th>
                <th>F</th>
                <th>M</th>
                <th>F</th>
                <th>M</th>
                <th>F</th>
                <th>M</th>
                <th>F</th>
                <th>M</th>
                <th>F</th>
                <th>M</th>
                <th>F</th>
                <th>M</th>
                <th>TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Visuales</td>
            </tr>
            <tr>
                <td>Intelectuales</td>
            </tr>
            <tr>
                <td>Síndrome de Down</td>
            </tr>
            <tr>
                <td>Parálisis Cerebral</td>
            </tr>
            <tr>
                <td>Amputados</td>
            </tr>
            <tr>
                <td>Sillas de Ruedas</td>
            </tr>
            <tr>
                <td>Auditivos</td>
            </tr>
        </tbody>
    </table>
</body>
</html>