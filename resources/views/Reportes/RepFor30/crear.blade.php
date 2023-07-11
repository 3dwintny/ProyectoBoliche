@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-10 col-sm-6">
                    <h1 class="text-white">Toma de asistencia</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid pt-2">
    @include('components.flash_alerts')
    <div class="header-body text-center">
        <div class="justify-content-center">
            <form action="{{route('asistenciaCategoria')}}" method="POST" enctype="multipart/form-data" role="form">
            @csrf
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-5 col-sm-5 mb-2">
                        <div class="form-floating">
                            <input type="date" class="form-control" id="fecha" onchange="modificarFecha(this.value)">
                            <label for="fecha">Modificar fecha de asistencia</label>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
                        <div class="form-floating">
                            <select id="categorias" class="form-control" name="categorias" onchange="this.form.submit()">
                                <option value="" selected disabled>Sin filtros</option>
                                @foreach($categoria as $item)
                                <option value="{{$item->id}}" {{$item->tipo == "N/A" ? 'disabled' : ''}} {{$item->id == $categoria_id ? 'selected' : ''}}>{{$item->tipo}}</option>
                                @endforeach
                            </select>
                            <label for="categorias">Filtrar por categoría</label>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                        <button type="button" class="btn btn-light" onclick="window.location='{{ route('asistencia.create') }}'">Eliminar filtro</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container pt-2">
    <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
            <form method="POST" action="{{route('asis')}}" enctype="multipart/form-data" role="form">
            @csrf
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-dark mt-2">
                                    <tr>
                                        <th style="text-align:center;">No</th>
                                        <th style="text-align:center;">Fecha</th>
                                        <th style="text-align:center;">Atleta</th>
                                        <th style="text-align:center;">Asistencia<br/> <input name="todo" id="asistencia" type="radio"></th>
                                        <th style="text-align:center;">Inasistencia <br/><input name="todo" id="inasistencia" type="radio"></th>
                                        <th style="text-align:center;">Permiso/Descanso <br/><input name="todo" id="permiso" type="radio"></th>
                                        <th style="text-align:center;">Enfermo <br/><input id="enfermo" type="radio" name="todo"></th>
                                        <th style="text-align:center;">Lesión <br/><input id="lesion" type="radio" name="todo"></th>
                                        <th style="text-align:center;">Competencia<input id="cancelar" type="radio" name="todo"> <br/><input id="competencia" type="radio" name="todo"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $c = 0;
                                        $contador = 1;
                                        $longitudContador = strlen($contador);
                                    @endphp
                                    @if(count($atletas)==0)
                                    <tr>
                                        <td colspan="9" style="font-weight: bolder;text-align:center;">SIN ATLETAS ASIGNADOS</td>
                                    </tr>
                                    @else
                                    @foreach($atletas as $item)
                                    @php
                                        $hashid = new Hashids\Hashids();
                                        $idAtleta = $hashid->encode($item->id);
                                    @endphp
                                    <tr class="table-sm">
                                        <td>
                                            <input type="hidden" class="text-white bg-dark" name="atleta_id[]" value="{{$idAtleta}}" style="width: auto;">
                                            <input type="text" value="{{$contador}}" readonly style="text-align:center;width: {{$longitudContador}}em;border: none;">
                                        </td>
                                        <td>
                                            <input type="text" name="fecha[]" value="{{$hoy->format('Y-m-d')}}" id="fecha_registro{{$c}}" readonly style="width: 6em; text-align:center; border: none;">
                                        </td>
                                        <td>
                                            @php
                                                if($item->alumno->nombre2==null){
                                                    $nombreCompleto = trim($item->alumno->nombre1 . ' ' . $item->alumno->apellido1 . ' ' . $item->alumno->apellido2);
                                                }
                                                elseif($item->alumno->nombre3==null){
                                                    $nombreCompleto = trim($item->alumno->nombre1 . ' '. $item->alumno->nombre2 . ' ' . $item->alumno->apellido1 . ' ' . $item->alumno->apellido2);
                                                }
                                                else{
                                                    $nombreCompleto = trim($item->alumno->nombre1 . ' ' . $item->alumno->nombre2 . ' ' . $item->alumno->nombre3 . ' ' . $item->alumno->apellido1 . ' ' . $item->alumno->apellido2);
                                                }

                                                $longitudTexto = strlen($nombreCompleto);
                                            @endphp
                                            <input type="text" value="{{ $nombreCompleto }}" readonly style="width: 25em; text-align: center; border: none;">
                                        </td>
                                        <td>
                                            <label>
                                                <input type="radio" id="estado1{{$contador}}" class="{{$item->id}}" name="estado[]{{$item->id}}" value="X" required>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type="radio" id="estado2{{$contador}}" class="{{$item->id}}" name="estado[]{{$item->id}}" value="O" required>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type="radio" id="estado3{{$contador}}" class="{{$item->id}}" name="estado[]{{$item->id}}" value="P" required>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type="radio" id="estado4{{$contador}}" class="{{$item->id}}" name="estado[]{{$item->id}}" value="E" required>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type="radio" id="estado5{{$contador}}" class="{{$item->id}}" name="estado[]{{$item->id}}" value="L" required>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type="radio" id="estado6{{$contador}}" class="{{$item->id}}" name="estado[]{{$item->id}}" value="C" required>
                                            </label>
                                        </td>
                                    </tr>
                                    @php
                                    $c = $c+1;
                                    $contador++;
                                    $longitudContador = strlen($contador);
                                    @endphp
                                    @endforeach
                                    <input type="hidden" id="controlador" value="{{$contador}}">
                                    @endif
                                </tbody>
                            </table>
                            @if(count($atletas)==0)
                                <div class="container"><input type="submit" class="next-form btn btn-outline-primary" value="Aceptar" disabled></div>
                            @else
                                <div class="container"><input type="submit" class="next-form btn btn-outline-primary" value="Aceptar"></div>
                            @endif
                            <br/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(
        function(){
        $('#asistencia').on('change', function(){
            for(let i = 1; i<document.getElementById('controlador').value; i++){
                document.getElementById('estado1'+i).checked = true;
            }
        });
        $('#inasistencia').on('change', function(){
            for(let i = 1; i<document.getElementById('controlador').value; i++){
                document.getElementById('estado2'+i).checked = true;
            }
        });
        $('#permiso').on('change', function(){
            for(let i = 1; i<document.getElementById('controlador').value; i++){
                document.getElementById('estado3'+i).checked = true;
            }
        });
        $('#enfermo').on('change', function(){
            for(let i = 1; i<document.getElementById('controlador').value; i++){
                document.getElementById('estado4'+i).checked = true;
            }
        });
        $('#lesion').on('change', function(){
            for(let i = 1; i<document.getElementById('controlador').value; i++){
                document.getElementById('estado5'+i).checked = true;
            }
        });
        $('#competencia').on('change', function(){
            for(let i = 1; i<document.getElementById('controlador').value; i++){
                document.getElementById('estado6'+i).checked = true;
            }
        });
        $('#cancelar').on('change', function(){
            for(let i = 1; i<document.getElementById('controlador').value; i++){
                if(document.getElementById('estado1'+i).checked == true){
                    document.getElementById('estado1'+i).checked = false;
                }
                else if(document.getElementById('estado2'+i).checked == true){
                    document.getElementById('estado2'+i).checked = false;
                }
                else if(document.getElementById('estado3'+i).checked == true){
                    document.getElementById('estado3'+i).checked = false;
                }
                else if(document.getElementById('estado4'+i).checked == true){
                    document.getElementById('estado4'+i).checked = false;
                }
                else if(document.getElementById('estado5'+i).checked == true){
                    document.getElementById('estado5'+i).checked = false;
                }
                else{
                    document.getElementById('estado6'+i).checked = false;
                }
            }
            document.getElementById('cancelar').checked = false;
        });
    });
</script>
<script type="text/javascript">
    function modificarFecha(date) {
        var fechaInputs = document.getElementsByName('fecha[]');
        for (var i = 0; i < fechaInputs.length; i++) {
            fechaInputs[i].value = date;
        }
    }
</script>
@endsection