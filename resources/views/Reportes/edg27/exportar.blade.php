<h1>Reporte EDG-27 de {{$mostrarMes}} de {{$capturarAnio}}</h1>
<table>
    @php
        $contador = 1;
    @endphp
    <thead>
        <tr>
            <th>No</th>
            <th>Tipo de Atleta</th>
            <th>Nombre(s) Apellido(s)</th>
            <th>Edad</th>
            <th>Género</th>
            <th>Modalidad</th>
            <th>Categoría</th>
            <th>Etapa Deportiva</th>
            <th>Experiencia Deportiva</th>
        </tr>
        <tr>
            <th>Años</th>
            <th>Meses</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($atletas as $item)
        <tr>
            <td>{{$contador}}</td>
            <td>{{$item->federado}}</td>
            <td>
                {{$item->alumno->nombre1}} {{$item->alumno->nombre2}} {{$item->alumno->nombre3}}
                {{$item->alumno->apellido1}} {{$item->alumno->apellido2}}
            </td>
            <td>{{$item->alumno->edad}}</td>
            <td>{{$item->alumno->genero}}</td>
            <td>{{$item->modalidad->nombre}}</td>
            <td>{{$item->categoria->tipo}}</td>
            <td>{{$item->etapa_deportiva->nombre}}</td>
            <td>{{$item->anios}}</td>
            <td>{{$item->meses}}</td>
            @php
                $contador++;
            @endphp
        </tr>
        @endforeach
    </tbody>
</table>