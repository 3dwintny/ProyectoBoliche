<h1>Reporte EDG-27.2 de {{$mostrarMes}} de {{$capturarAnio}}</h1>
<table>
    @php
        $contador = 1;   
        $control=0;
    @endphp
    <thead>
        <tr>
            <th>No.</th>
            <th>Nombre(s) Apellido(s) completos</th>
            <th>Fecha de Nacimiento</th>
            <th>Edad</th>
            <th>Género</th>
            <th>Categoría</th>
        </tr>
    </thead>
    <tbody >
        @foreach ($atletas as $item)
        <tr>
            <td>{{$contador}}</td>
            <td>
                {{$item->alumno->nombre1}} {{$item->alumno->nombre2}} {{$item->alumno->nombre3}}
                {{$item->alumno->apellido1}} {{$item->alumno->apellido2}}
            </td>
            <td>{{$fechasNacimiento[$control]}}</td>
            <td>{{$item->alumno->edad}}</td>
            <td>{{$item->alumno->genero}}</td>
            <td>{{$item->categoria->tipo}}</td>
            @php
                $contador++;
                $control++;
            @endphp
        </tr>
        @endforeach
    </tbody>
</table>