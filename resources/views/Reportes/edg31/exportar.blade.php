<h1>Reporte EDG-31 de {{$mostrarMes}} de {{$capturarAnio}}</h1>
<table>
    <thead>
        <tr>
            <td>Resumen</td>
            <td></td>
            <td>F</td>
            <td>M</td>
            <td>TOTAL</td>
            <td></td>
            <td>F</td>
            <td>M</td>
            <td>TOTAL</td>
            <td></td>
            <td>F</td>
            <td>M</td>
            <td>TOTAL</td>
            <td></td>
            <td>F</td>
            <td>M</td>
            <td>TOTAL</td>
        </tr>
        <tr>
            <td>Matricular</td>
            <td>Sistem.</td>
            <td>{{$atletasFederados[8][10]}}</td>
            <td>{{$atletasFederados[8][11]}}</td>
            <td>{{$atletasFederados[8][12]}}</td>
            <td>Pract.</td>
            <td>{{$atletasOtrosProgramasAtenction[3][12]}}</td>
            <td>{{$atletasOtrosProgramasAtenction[3][13]}}</td>
            <td>{{$atletasOtrosProgramasAtenction[3][14]}}</td>
            <td>Dep. Ad.</td>
            <td>{{$atletasDeporteAdaptado[7][10]}}</td>
            <td>{{$atletasDeporteAdaptado[7][11]}}</td>
            <td>{{$atletasDeporteAdaptado[7][12]}}</td>
            <td>TOTAL</td>
            <td>{{$totalFemeninas}}</td>
            <td>{{$totalMasculinos}}</td>
            <td>{{$totalAtletas}}</td>
        </tr>     
    </thead>
    <tbody>
        <tr></tr>
        <tr>
            <th rowspan="2">Etapas Deportivas</th>
            <th colspan="4">Formación</th>
            <th colspan="2" rowspan="2">Perfeccionamiento</th>
            <th colspan="2" rowspan="2">Especialización</th>
            <th colspan="2" rowspan="2">Alto Rendimiento</th>
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
        @for($i=0;$i<9;$i++)
            <tr>
                @for($j=0;$j<14;$j++)
                    @if($j==0)
                        @switch($i)
                            @case (0)
                                <td>Sub 09</td>
                                @break
                            @case (1)
                                <td>Sub 11</td>
                                @break
                            @case (2)
                                <td>Sub 13</td>
                                @break
                            @case (3)
                                <td>Sub 16</td>
                                @break
                            @case (4)
                                <td>Sub 18</td>
                                @break
                            @case (5)
                                <td>Sub 21</td>
                                @break
                            @case (6)
                                <td>Segunda Fuerza</td>
                                @break
                            @case (7)
                                <td>Mayores</td>
                                @break
                            @case (8)
                                <td>TOTAL</td>
                                @break
                        @endswitch
                    @else
                        <td>{{$atletasFederados[$i][$j-1]}}</td>
                    @endif
                @endfor
            </tr>
        @endfor
        <tr></tr>
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
        @for($i=0;$i<4;$i++)
            <tr>
                @for($j=0;$j<16;$j++)
                    @if($j==0)
                        @switch($i)
                            @case (0)
                                <td>Practicantes del Deporte</td>
                                @break
                            @case (1)
                                <td>Discapacidad</td>
                                @break
                            @case (2)
                                <td>Master/Veteranos</td>
                                @break
                            @case (3)
                                <td>TOTAL</td>
                                @break
                        @endswitch
                    @else
                        @if($i==2 && ($j>=0 && $j<=6))
                            <td>{{$atletasOtrosProgramasAtenction[$i][$j-1]}}</td>
                        @else
                            <td>{{$atletasOtrosProgramasAtenction[$i][$j-1]}}</td>    
                        @endif()
                    @endif
                @endfor
            </tr>
        @endfor
        <tr></tr>
        <tr>
            <th rowspan="2">Etapas Deportivas</th>
            <th colspan="4">Formación</th>
            <th colspan="2" rowspan="2">Perfeccionamiento</th>
            <th colspan="2" rowspan="2">Especialización</th>
            <th colspan="2" rowspan="2">Alto Rendimiento</th>
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
            <th></th>
            <th></th>
        </tr>
        @for($i=0;$i<8;$i++)
            <tr>
                @for($j=0;$j<14;$j++)
                    @if($j==0)
                        @switch($i)
                            @case (0)
                                <td>Visuales</td>
                                @break
                            @case (1)
                                <td>Intelectuales</td>
                                @break
                            @case (2)
                                <td>Síndrome de Down</td>
                                @break
                            @case (3)
                                <td>Parálisis Cerebral</td>
                                @break
                            @case (4)
                                <td>Amputados</td>
                                @break
                            @case (5)
                                <td>Sillas de Ruedas</td>
                                @break
                            @case (6)
                                <td>Auditivos</td>
                                @break
                            @case (7)
                                <td style="text-align: right;">TOTAL</td>
                                @break
                        @endswitch
                    @else
                        <td>{{$atletasDeporteAdaptado[$i][$j-1]}}</td>
                    @endif
                @endfor
            </tr>
        @endfor
    </tbody>
</table>