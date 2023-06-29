@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="header bg-dark pb-4 pt-5 pt-md-6 mt--5">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <h1 class="text-white">Editar asistencia del {{$fechaAsistencia}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-body pb-4 pt-5 pt-md-3">
    <div class="container">
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form method="POST" action="{{route('actualizarAsistencia')}}" enctype="multipart/form-data" role="form">
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
                                            <input type="hidden" class="text-white bg-dark" name="asistenciaId[]" value="{{encrypt($asistencia[$c]->id)}}" style="width: 100%;">
                                            <input type="text" value="{{$contador}}" readonly style="width: 100%; text-align:center;">
                                        </td>
                                        <td>
                                            @foreach($asistencia as $asis)
                                            @endforeach
                                            <input type="text" name="fecha[]" value="{{$hoy}}" id="fecha_registro{{$c}}" readonly style="width: 100%; text-align:center;">
                                        </td>
                                        <td class="col-xs-4 col-sm-4 col-md-4">
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
                                            @endphp
                                            <input type="text" value="{{ $nombreCompleto }}" readonly style="width: 100%;text-align:center;">
                                        </td>
                                        <td>
                                            <label style="margin-left: 50%;">
                                                <input type="radio" id="estado1{{$contador}}" class="{{$item->id}}" name="estado[]{{$item->id}}" {{$asistencia[$c]->estado=='X' ? 'checked':''}} value="X" required> <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label style="margin-left: 50%;">
                                                <input type="radio" id="estado2{{$contador}}" class="{{$item->id}}" name="estado[]{{$item->id}}" {{$asistencia[$c]->estado=='O' ? 'checked':''}} value="O" required> <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label style="margin-left: 50%;">
                                                <input type="radio" id="estado3{{$contador}}" class="{{$item->id}}" name="estado[]{{$item->id}}" {{$asistencia[$c]->estado=='P' ? 'checked':''}} value="P" required> <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label style="margin-left: 50%;">
                                                <input type="radio" id="estado4{{$contador}}" class="{{$item->id}}" name="estado[]{{$item->id}}" {{$asistencia[$c]->estado=='E' ? 'checked':''}} value="E" required> <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label style="margin-left: 50%;">
                                                <input type="radio" id="estado5{{$contador}}" class="{{$item->id}}" name="estado[]{{$item->id}}" {{$asistencia[$c]->estado=='L' ? 'checked':''}} value="L" required> <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label style="margin-left: 50%;">
                                                <input type="radio" id="estado6{{$contador}}" class="{{$item->id}}" name="estado[]{{$item->id}}" {{$asistencia[$c]->estado=='C' ? 'checked':''}} value="C" required> <span></span>
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
                                <div class="container"><input type="submit" class="next-form btn btn-outline-primary" value="Actualizar asistencia" disabled></div>
                            @else
                                <div class="container"><input type="submit" class="next-form btn btn-outline-primary" value="Actualizar asistencia"></div>
                            @endif
                            <br/>
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