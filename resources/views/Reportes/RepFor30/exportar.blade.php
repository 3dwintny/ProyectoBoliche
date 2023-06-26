<h1>Reporte de Asistencia de {{$mostrarMes}} de {{$capturarAnio}}</h1>

<table>
    @php
        $contador = 1;   
    @endphp
    <thead>
        <tr>
            <th>No</th>
            <th>Atleta</th>
            <th>Edad</th>
            <th>Género</th>
            <th>Categoría</th>
            <th>Modalidad</th>
            @for ($i=0;$i<count($fechas);$i++)
                <th>{{Carbon\Carbon::parse($fechas[$i])->format('d')}}</th>
            @endfor
            <th>Días Entrenados</th>
            <th>% de Asistencia</th>
            <th>Etapa Deportiva</th>
        </tr>
    </thead>
    <tbody>
        @php
        $s=0;
        $c=0;
        @endphp
        @foreach($atleta as $item)
            <tr id="{{$c}}">
                <td>{{$contador}}</td>
                <td>
                    {{$item->alumno->nombre1}} {{$item->alumno->nombre2}}
                    {{$item->alumno->nombre3}}
                    {{$item->alumno->apellido1}} {{$item->alumno->apellido2}}
                </td>
                <td>{{$item->alumno->edad}}</td>
                <td>{{$item->alumno->genero}}</td>
                <td>{{$item->categoria->tipo}}</td>
                <td>{{$item->modalidad->nombre}}</td>
                @for($i=$s;$i<count($fechas)+$s;$i++) <td>{{$estado[$i]}}</td>
                    @endfor
                <td>{{$contarDias[$c]}}</td>
                <td>{{$promedio[$c]}}%</td>
                <td>{{$item->etapa_deportiva->nombre}}</td>
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