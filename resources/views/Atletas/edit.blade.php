@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-10 col-sm-6">
                    <h1 class="text-white">Atletas</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pt-2">
    <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-xl-9 col-lg-11 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-header text-bold ">
                        <strong>
                            <h3>Editar información</h3>
                        </strong>
                    </div>
                </div>
                <form method="POST" role="form" enctype="multipart/form-data" action="{{route('atletas.update',encrypt($atleta->id))}}">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <div class="card">
                            <div class="card-body bg-light">
                                <h5 class="mb-2">Información</h5>
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-8 col-sm-6 col-xs-6 mb-2">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Fecha de ingreso</span>
                                            <input type="text" class=" container form-control text-center" name="fecha_ingreso" value="{{$atleta->fecha_ingreso}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-4 col-sm-6 col-xs-12 mb-2">
                                        <select name="adaptado" id="adaptado" class="form-control text-dark" required>
                                            <option value="Si" disabled {{$atleta->adaptado == "Si" ? 'selected' :  ''}}>Si</option>
                                            <option value="No" disabled {{$atleta->adaptado == "No" ? 'selected' :  ''}}>No</option>
                                        </select>
                                        <input type="hidden" name="adaptado" id="adaptadoText" value="{{$atleta->adaptado}}">
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>¿Atleta federado?</label>
                                                    @if($atleta->federado == "SISTEMÁTICO")
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="federado" id="federado0" value="SISTEMÁTICO" checked>
                                                            <label class="form-check-label" for="federado0">Si</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="federado" id="federado1" value="1">
                                                            <label class="form-check-label" for="federado1">No</label>
                                                        </div>
                                                    @else
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="federado" id="federado0" value="SISTEMÁTICO" checked>
                                                            <label class="form-check-label" for="federado0">Si</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="federado" id="federado1" value="1">
                                                            <label class="form-check-label" for="federado1">No</label>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-7 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>¿Deporte adaptado?</label>
                                                    @if($atleta->adaptado == "Si")
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="adaptado" id="deporteAdaptado" value="Si" checked>
                                                        <label class="form-check-label" for="deporteAdaptado">Si</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="adaptado" id="cancelarAdaptado" value="No">
                                                        <label class="form-check-label" for="cancelarAdaptado">No</label>
                                                    </div>
                                                    @else
                                                        @if($atleta->otro_programa_id == 1)
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" name="adaptado" id="deporteAdaptado" value="Si">
                                                                <label class="form-check-label" for="deporteAdaptado">Si</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" name="adaptado" id="cancelarAdaptado" value="No" checked>
                                                                <label class="form-check-label" for="cancelarAdaptado">No</label>
                                                            </div> 
                                                        @else
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" name="adaptado" id="deporteAdaptado" value="Si" disabled>
                                                                <label class="form-check-label" for="deporteAdaptado">Si</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" name="adaptado" id="cancelarAdaptado" value="No" disabled>
                                                                <label class="form-check-label" for="cancelarAdaptado">No</label>
                                                            </div> 
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 mb-2 form-control">
                                        <div class="form-check form-check-inline">
                                            @if($atleta->otro_programa_id != 1)
                                                <input type="radio" name="otro" id="otroPrograma" checked>
                                                <label class="form-check-label" for="inlineRadio3">Otro programa de atención</label>
                                            @else
                                                <input type="radio" name="otro" id="otroPrograma" disabled>
                                                <label class="form-check-label" for="inlineRadio3">Otro programa de atención</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-4 col-xs-4 mb-2">
                                        <div class="form-floating">
                                            <select name="estado_civil" id="estado_civil" class="form-control text-dark" required>
                                                <option selected disabled>Estado Civil</option>
                                                <option value="Soltera/o" {{$atleta->estado_civil == "Soltera/o" ? 'selected' :  ''}}>Soltera/o</option>
                                                <option value="Casada/o"  {{$atleta->estado_civil == "Casada/o" ? 'selected' :  ''}}>Casada/o</option>
                                                <option value="Unión Libre"  {{$atleta->estado_civil == "Unión Libre" ? 'selected' :  ''}}>Unión Libre</option>
                                                <option value="Unión de Hecho"  {{$atleta->estado_civil == "Unión de Hecho" ? 'selected' :  ''}}>Unión de Hecho</option>
                                                <option value="Separada/o"  {{$atleta->estado_civil == "Separada/o" ? 'selected' :  ''}}>Separada/o</option>
                                                <option value="Divorciada/o"  {{$atleta->estado_civil == "Divorciada/o" ? 'selected' :  ''}}>Divorciada/o</option>
                                                <option value="Viuda/o"  {{$atleta->estado_civil == "Viuda/o" ? 'selected' :  ''}}>Viuda/o</option>
                                            </select>
                                            <label for="estado_civil">Estado civil</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-4 col-xs-4 mb-2">
                                        <div class="form-floating">
                                            <select name="etnia" id="estado_civil" class="form-control text-dark" required>
                                                <option selected disabled>Etnia</option>
                                                <option value="Maya" {{$atleta->etnia == "Maya" ? 'selected' : ''}}>Maya</option>
                                                <option value="Xinka" {{$atleta->etnia == "Xinka" ? 'selected' : ''}}>Xinka</option>
                                                <option value="Garífuna" {{$atleta->etnia == "Garífuna" ? 'selected' : ''}}>Garifuna</option>
                                                <option value="Ladino" {{$atleta->etnia == "Ladino" ? 'selected' : ''}}>Ladino</option>
                                            </select>
                                            <label for="estado_civil">Estado civil</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-4 col-xs-4 mb-2">
                                        <div class="form-floating">
                                            <select name="escolaridad" id="escolaridad" class="form-control text-dark" required>
                                                <option selected disabled>Nivel Académico</option>
                                                <option value="Primaria" {{$atleta->escolaridad == "Primaria" ? 'selected':''}}>Primaria</option>
                                                <option value="Básico" {{$atleta->escolaridad == "Básico" ? 'selected':''}}>Básico</option>
                                                <option value="Diversificado" {{$atleta->escolaridad == "Diversificado" ? 'selected':''}}>Diversificado</option>
                                                <option value="Licenciatura" {{$atleta->escolaridad == "Licenciatura" ? 'selected':''}}>Licenciatura</option>
                                                <option value="Maestría" {{$atleta->escolaridad == "Maestría" ? 'selected':''}}>Maestría</option>
                                                <option value="Doctorado" {{$atleta->escolaridad == "Doctorado" ? 'selected':''}}>Doctorado</option>
                                            </select>
                                            <label for="escolaridad">Nivel académico</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-4 col-xs-4 mb-2">
                                        <div class="form-floating">
                                            <select name="centro_id" id="centro_id" class="form-control text-dark" required>
                                                <option selected disabled>Centro</option>
                                                @foreach ($centro as $item)
                                                    <option value="{{encrypt($item->id)}}" {{$atleta->centro_id == $item->id ? 'selected':''}}>{{$item->nombre}}</option>
                                                @endforeach
                                            </select>
                                            <label for="centro">Centro de entrenamiento</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-2 col-xs-2 mb-2">
                                        <div class="form-floating">
                                            <input id="anios" class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Años" type="text" name="anios"  required value="{{$atleta->anios}}">
                                            <label for="anios">Años</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-2 col-xs-2 mb-2">
                                        <div class="form-floating">
                                            <input id="meses" class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Meses" type="text" name="meses"  required value="{{$atleta->meses}}">
                                            <label for="meses">Meses</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-4 col-xs-4 mb-2">
                                        <div class="form-floating">
                                            <select id="entrenador_id" name="entrenador_id" class="form-control text-dark" required>
                                                <option selected disabled>Entrenador</option>
                                                @foreach ($entrenador as $item)
                                                    <option value="{{encrypt($item->id)}}" {{$atleta->entrenador_id == $item->id ? 'selected':''}}>{{$item->nombre1}} {{$item->apellido1}}</option>
                                                @endforeach
                                            </select>
                                            <label for="entrenador_id">Entrenador</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 mb-2">
                                        <div class="form-floating">
                                            <select name="categoria_id" id="categoria_id" class="form-control text-dark" required>
                                                <option selected disabled>Categoria</option>
                                                @foreach ($categoria as $item)
                                                <option value="{{encrypt($item->id)}}" {{$atleta->categoria_id == $item->id ? 'selected':''}}>{{$item->tipo}} ({{$item->rango_edades}} años)</option>
                                                @endforeach
                                            </select>
                                            <label for="categoria_id">Categoría</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 mb-2">
                                        <div class="form-floating">
                                            <select name="etapa_deportiva_id" id="etapa_deportiva_id" class="form-control text-dark" required>
                                                <option selected disabled>Etapa Deportiva</option>
                                                @foreach ($etapa as $item)
                                                <option value="{{encrypt($item->id)}}" {{$atleta->etapa_deportiva_id == $item->id ? 'selected':''}}>{{$item->nombre}}</option>
                                                @endforeach
                                            </select>
                                            <label for="etapa_deportiva_id">Etapa deportiva</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 mb-2">
                                        <div class="form-floating">
                                            <select name="deporte_id" id="deporte_id" class="form-control text-dark" required>
                                                @foreach ($deporte as $item)
                                                    <option value="{{encrypt($item->id)}}" {{$atleta->deporte_id == $item->id ? 'selected':''}}>{{$item->nombre}}</option>f
                                                @endforeach
                                            </select>
                                            <label for="deporte_id">Deporte</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 mb-2">
                                        <div class="form-floating">
                                            <select name="deporte_adaptado_id" id="deporte_adaptado_id" class="form-control text-dark">
                                                @foreach ($deporteadaptado as $item)
                                                    @if($atleta->adaptado == "Si")
                                                        @if($item->id == $atleta->deporte_adaptado_id)
                                                            <option value="{{encrypt($item->id)}}" selected>{{$item->nombre}}</option>
                                                        @else
                                                            <option value="{{encrypt($item->id)}}">{{$item->nombre}}</option>
                                                        @endif
                                                    @else
                                                        @if($item->id == 1)
                                                            <option value="{{encrypt($item->id)}}" selected disabled>{{$item->nombre}}</option>
                                                        @else
                                                            <option value="{{encrypt($item->id)}}" disabled>{{$item->nombre}}</option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </select>
                                            @if($atleta->adaptado == "Si")
                                                <input type="hidden" value="1" name="deporte_adaptado_id" id="deporte_adaptado_id_text" disabled>
                                            @else
                                                <input type="hidden" value="1" name="deporte_adaptado_id" id="deporte_adaptado_id_text">
                                            @endif
                                            <label for="deporte_adaptado_id">Deporte adaptado</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 mb-2">
                                        <div class="form-floating">
                                            <select name="otro_programa_id" id="otro_programa_id" class="form-control text-dark">
                                                @foreach ($otroprograma as $item)
                                                    @if($atleta->federado == 1)
                                                        @if($item->id == $atleta->otro_programa_id)
                                                            <option value="{{encrypt($item->id)}}" selected>{{$item->nombre}}</option>
                                                        @else
                                                            <option value="{{encrypt($item->id)}}">{{$item->nombre}}</option>
                                                        @endif
                                                    @else
                                                        @if($item->id == 1)
                                                            <option value="{{encrypt($item->id)}}" selected disabled>{{$item->nombre}}</option>
                                                        @else
                                                            <option value="{{encrypt($item->id)}}" disabled>{{$item->nombre}}</option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </select>
                                            @if($atleta->federado == 1)
                                                <input type="hidden" value="1" name="otro_programa_id" id="otro_programa_id_text" disabled>
                                            @else
                                                <input type="hidden" value="1" name="otro_programa_id" id="otro_programa_id_text">
                                            @endif
                                            <label for="otro_programa_id">Otro programa</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 mb-2">
                                        <div class="form-floating">
                                            <select name="linea_desarrollo_id" id="linea_desarrollo_id" class="form-control text-dark" required>
                                                <option selected disabled>Linea de Desarrollo</option>
                                                @foreach ($lineadesarrollo as $item)
                                                    <option value="{{encrypt($item->id)}}" {{$atleta->linea_desarrollo_id == $item->id ? 'selected':''}}>{{$item->tipo}}</option>
                                                @endforeach
                                            </select>
                                            <label for="linea_desarrollo_id">Línea de desarrollo</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 mb-2">
                                        <div class="form-floating">
                                            <select name="modalidad_id" id="modalidad_id" class="form-control text-dark" required>
                                                <option selected disabled>Modalidad</option>
                                                @foreach ($modalidad as $item)
                                                <option value="{{encrypt($item->id)}}" {{$atleta->modalidad_id == $item->id ? 'selected' :''}} >{{$item->nombre}}</option>
                                                @endforeach
                                            </select>
                                            <label for="modalidad_id">Modalidad</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 mb-2">
                                        <div class="form-floating">
                                            <select name="prt_id" id="prt_id" class="form-control text-dark" required>
                                                <option selected disabled>PRT</option>
                                                @foreach ($prt as $item)
                                                    <option value="{{encrypt($item->id)}}" {{$atleta->prt_id == $item->id ? 'selected' : ''}}>{{$item->nombre}}</option>
                                                @endforeach
                                            </select>
                                            <label for="prt_id">PRT</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 center">
                                        <button type="submit" class="btn btn-outline-primary">Actualizar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#federado0').on('change', function () {
            document.getElementById('otroPrograma').disabled = true;
            document.getElementById('deporteAdaptado').disabled = false;
            document.getElementById('cancelarAdaptado').disabled = false;
            document.getElementById('cancelarAdaptado').checked = true;
            document.getElementById('otroPrograma').checked = false;
            document.getElementById('deporteAdaptado').checked = false;
            document.getElementById('otro_programa_id').options[0].selected = true;
            document.getElementById('deporte_adaptado_id').options[0].selected = true;
            for(let i = 0; i<document.getElementById('otro_programa_id').length; i++) {
                document.getElementById('otro_programa_id').options[i].disabled=true;
            }
            for(let i = 0; i<document.getElementById('deporte_adaptado_id').length; i++) {
                document.getElementById('deporte_adaptado_id').options[i].disabled=true;
            }
            document.getElementById('adaptado').value="No";
            document.getElementById('adaptadoText').value="No";
            document.getElementById('deporte_adaptado_id_text').disabled = false;
            document.getElementById('otro_programa_id_text').disabled = false;
        });

        $('#federado1').on('change', function () {
            document.getElementById('deporte_adaptado_id').options[0].selected = true;
            document.getElementById('otroPrograma').disabled = false;
            document.getElementById('deporteAdaptado').disabled = true;
            document.getElementById('cancelarAdaptado').disabled = true;
            document.getElementById('cancelarAdaptado').checked = false;
            document.getElementById('deporteAdaptado').checked = false;
            document.getElementById('otroPrograma').required = true;
            document.getElementById('deporte_adaptado_id_text').disabled = true;
            document.getElementById('otro_programa_id_text').disabled = true;
            document.getElementById('adaptado').value="No";
            document.getElementById('adaptadoText').value="No";
        });

        $('#otroPrograma').on('change', function () {
            for(let i = 0; i<document.getElementById('otro_programa_id').length; i++) {
                document.getElementById('otro_programa_id').options[i].disabled=false;
            }
            for(let i = 0; i<document.getElementById('deporte_adaptado_id').length; i++) {
                document.getElementById('deporte_adaptado_id').options[i].disabled=true;
            }
            document.getElementById('adaptado').value="No";
            document.getElementById('adaptadoText').value="No"; 
            document.getElementById('deporte_adaptado_id').options[0].selected = true;
            document.getElementById('deporte_adaptado_id_text').disabled = false;
            document.getElementById('otro_programa_id_text').disabled = true;
        });

        $('#deporteAdaptado').on('change', function () {
            for(let i = 0; i<document.getElementById('otro_programa_id').length; i++) {
                document.getElementById('otro_programa_id').options[i].disabled=true;
            }
            for(let i = 0; i<document.getElementById('deporte_adaptado_id').length; i++) {
                document.getElementById('deporte_adaptado_id').options[i].disabled=false;
            }
            document.getElementById('otro_programa_id').options[0].selected = true;
            document.getElementById('adaptado').value="Si";
            document.getElementById('adaptadoText').value=document.getElementById('adaptado').value;
            document.getElementById('otro_programa_id_text').disabled = false;
            document.getElementById('deporte_adaptado_id_text').disabled = true;
            document.getElementById('deporteAdaptado').required = true;
        });

        $('#cancelarAdaptado').on('change',function(){
            document.getElementById('adaptado').value="No";
            document.getElementById('adaptadoText').value="No";
            document.getElementById('deporte_adaptado_id_text').disabled = false;
            document.getElementById('deporte_adaptado_id').options[0].selected = true;
            for(let i = 0; i<document.getElementById('deporte_adaptado_id').length; i++) {
                document.getElementById('deporte_adaptado_id').options[i].disabled=true;
            }
        });
    });
</script>
@endsection