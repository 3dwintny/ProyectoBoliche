@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="header bg-dark pb-4 pt-5 pt-md-6">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <h1 class="text-white">Toma de asistencia</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-body pb-4 pt-5 pt-md-3">
    @include('components.flash_alerts')
    <div class="container">
        <form action="{{route('asistenciaCategoria')}}" method="POST" enctype="multipart/form-data" role="form">
            @csrf
            <div class="row">
                <div class="col-md-3 mb-2">
                    <!-- Para segir viendo el nombre del placeholder -->
                    <div class="form-floating">
                        <input type="date" class="form-control" id="fecha">
                        <!-- Esto es lo que aparece como placeholder, en el fomulario -->
                        <label for="fecha">Modificar fecha de asistencia</label>
                    </div>
                </div>
                <div class="col-md-3 mb-2">
                    <!-- Para segir viendo el nombre del placeholder -->
                    <div class="form-floating">
                        <select id="categorias" class="form-control" name="categorias" onchange="this.form.submit()">
                            <option value="" selected disabled>Sin filtros</option>
                            @foreach($categoria as $item)
                            <option value="{{$item->id}}" {{$item->tipo == "N/A" ? 'disabled' : ''}}>{{$item->tipo}}</option>
                            @endforeach
                        </select>
                        <!-- Esto es lo que aparece como placeholder, en el fomulario -->
                        <label for="categorias">Filtrar por categoría</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-light" onclick="window.location='{{ route('asistencias.create') }}'">Eliminar filtro</button>
                </div>
            </div>
        </form>
    </div>
    
    
    <div class="container">
        <form method="POST" action="{{route('asis')}}" enctype="multipart/form-data" role="form">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table table-dark mt-2">
                                    <tr>
                                        <th style="width: 3.5%; text-align:center;">No</th>
                                        <th style="width:10%; text-align:center;">Fecha</th>
                                        <th style="width:21.7%; text-align:center;">Atleta</th>
                                        <th style="width:8%; text-align:center;"><input name="todo" id="asistencia" type="radio"> Asistencia</th>
                                        <th style="width:8%; text-align:center;"><input name="todo" id="inasistencia" type="radio"> Inasistencia</th>
                                        <th style="width:8%; text-align:center;"><input name="todo" id="permiso" type="radio"> Permiso/Descanso</th>
                                        <th style="width:8%; text-align:center;"><input id="enfermo" type="radio" name="todo"> Enfermo</th>
                                        <th style="width:8%; text-align:center;"><input id="lesion" type="radio" name="todo"> Lesión</th>
                                        <th style="width:8%; text-align:center;"><input id="competencia" type="radio" name="todo"> Competencia <input id="cancelar" type="radio" name="todo"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $c = 0;
                                    $contador = 1;
                                    @endphp
                                    @if(count($atletas)==0)
                                    <tr>
                                        <td colspan="9" style="font-weight: bolder;text-align:center;">SIN ATLETAS ASIGNADOS</td>
                                    </tr>
                                    @else
                                    @foreach($atletas as $item)
                                    <tr class="table-sm">
                                        <td>
                                            <input type="hidden" class="text-white bg-dark" name="atleta_id[]" value="{{$item->id}}" style="width: 100%;">
                                            <input type="text" value="{{$contador}}" readonly style="width: 100%; text-align:center;">
                                        </td>
                                        <td>
                                            <input type="text" name="fecha[]" value="{{$hoy->format('Y-m-d')}}" id="fecha_registro{{$c}}" readonly style="width: 100%; text-align:center;">
                                        </td>
                                        <td>
                                            <input type="text" value="{{$item->alumno->nombre1}} {{$item->alumno->nombre2}} {{$item->alumno->nombre3}} {{$item->alumno->apellido1}} {{$item->alumno->apellido2}}" readonly style="width: 100%;text-align:center;">
                                        </td>
                                        <td>
                                            <label style="margin-left: 50%;">
                                                <input type="radio" id="estado1{{$contador}}" class="{{$item->id}}" name="estado[]{{$item->id}}" value="X" required> <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label style="margin-left: 50%;">
                                                <input type="radio" id="estado2{{$contador}}" class="{{$item->id}}" name="estado[]{{$item->id}}" value="O" required> <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label style="margin-left: 50%;">
                                                <input type="radio" id="estado3{{$contador}}" class="{{$item->id}}" name="estado[]{{$item->id}}" value="P" required> <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label style="margin-left: 50%;">
                                                <input type="radio" id="estado4{{$contador}}" class="{{$item->id}}" name="estado[]{{$item->id}}" value="E" required> <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label style="margin-left: 50%;">
                                                <input type="radio" id="estado5{{$contador}}" class="{{$item->id}}" name="estado[]{{$item->id}}" value="L" required> <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label style="margin-left: 50%;">
                                                <input type="radio" id="estado6{{$contador}}" class="{{$item->id}}" name="estado[]{{$item->id}}" value="C" required> <span></span>
                                            </label>
                                        </td>
                                    </tr>
                                    @php
                                    $c = $c+1;
                                    $contador++;
                                    @endphp
                                    @endforeach
                                    <input type="hidden" id="controlador" value="{{$contador}}">
                                    @endif
                                </tbody>
                            </table>
                            @if(count($atletas)==0)
                                <div class="container"><input type="submit" class="next-form btn btn-outline-primary" value="Registrar Asistencia" disabled></div>
                            @else
                                <div class="container"><input type="submit" class="next-form btn btn-outline-primary" value="Registrar Asistencia"></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
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
@endsection