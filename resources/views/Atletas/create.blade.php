@extends('layouts.app')

@section('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!--div class="body pb-8 pt-5 pt-lg-1 d-flex align-items-center" style="background-image: url(../argon/img/theme/bol.jpg); background-size: cover; background-position: center top;"!-->
<div class="header bg-dark pb-6 pt-5 pt-md-6">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <h1 class="text-white">Atletas</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="header-body text-center  mb-7">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8">
                <div class="card">
                    <div class="card-header text-bold ">
                        <strong>
                            <h3>Inscripción del atleta {{ $alumno->nombre1 }}</h3>
                        </strong>
                    </div>
                </div>
                <form method="post" role="form" enctype="multipart/form-data" action="{{route('ac_estado',encrypt($alumno->id))}}">
                    @csrf
                    <div class="form-group">
                        <div class="card">
                            <div class="card-body bg-light">
                            <div class="col-12 mb-2"><img src="{{ asset('storage/uploads/'.$alumno->foto) }}" class="img-thumbnail" alt="50" height="50" width="50"></div>
                                <h5 class="mb-2">Información adicional</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Fecha de ingreso</span>
                                            <input type="text" class=" container form-control text-center" name="fecha_ingreso" value="{{Carbon\Carbon::parse($hoy)->format('Y-m-d')}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <select name="adaptado" id="adaptado" class="form-control text-dark" required>
                                            <option value="Si" disabled>Si</option>
                                            <option value="No" disabled selected>No</option>
                                        </select>
                                        <input type="hidden" name="adaptado" id="adaptadoText" value="No">
                                    </div>
                                    <div class="col-md-6 mb-2 form-control">
                                        <label>¿El/La atleta es federado/a?</label>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="federado" id="federado0" value="SISTEMÁTICO" checked>
                                            <label class="form-check-label" for="inlineRadio3">Si</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="federado" id="federado1" value="No">
                                            <label class="form-check-label" for="inlineRadio3">No</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2 form-control">
                                        <label>¿Deporte adaptado?</label>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="adaptado" id="deporteAdaptado">
                                            <label class="form-check-label" for="inlineRadio3">Si</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="adaptado" id="cancelarAdaptado" checked>
                                            <label class="form-check-label" for="inlineRadio3">No</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2 form-control">
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="otro" id="otroPrograma" disabled>
                                            <label class="form-check-label" for="inlineRadio3">Otro programa de atención</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <select name="estado_civil" id="estado_civil" class="form-control text-dark" required>
                                                <option selected value=""></option>
                                                <option value="Soltera/o">Soltera/o</option>
                                                <option value="Casada/o">Casada/o</option>
                                                <option value="Unión Libre">Unión libre</option>
                                                <option value="Unión de Hecho">Unión de hecho</option>
                                                <option value="Separada/o">Separada/o</option>
                                                <option value="Divorciada/o">Divorciada/o</option>
                                                <option value="Viuda/o">Viuda/o</option>
                                            </select>
                                            <label for="estado_civil">Estado civil</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <select name="etnia" class="form-control text-dark" id="etnia" required>
                                                <option selected value=""></option>
                                                <option value="Maya">Maya</option>
                                                <option value="Xinka">Xinka</option>
                                                <option value="Garífuna">Garifuna</option>
                                                <option value="Ladino">Ladino</option>
                                            </select>
                                            <label for="etnia">Etnia</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <select name="escolaridad" class="form-control text-dark" id="escolaridad" required>
                                                <option selected value=""></option>
                                                <option value="Primaria">Primaria</option>
                                                <option value="Básico">Básico</option>
                                                <option value="Diversificado">Diversificado</option>
                                                <option value="Licenciatura">Licenciatura</option>
                                                <option value="Maestría">Maestría</option>
                                                <option value="Doctorado">Doctorado</option>
                                            </select>
                                            <label for="escolaridad">Nivel académico</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <select name="centro_id" class="form-control text-dark" id="centro_id" required>
                                                <option selected value=""></option>
                                                @foreach ($centro as $item)
                                                <option value="{{encrypt($item->id)}}">{{$item->nombre}}</option>
                                                @endforeach
                                            </select>
                                            <label for="centro">Centro de entrenamiento</label>
                                        </div>
                                    </div>
                                        <div class="col-md-2 mb-2">
                                            <div class="form-floating">
                                                <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Años" type="text" name="anios"  required>
                                                <label for="anios">Años</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <div class="form-floating">
                                                <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Meses" type="text" name="meses"  required>
                                                <label for="meses">Meses</label>
                                            </div>
                                        </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <select name="entrenador_id" id="entrenador_id" class="form-control text-dark" required>
                                                <option selected value=""></option>
                                                @foreach ($entrenador as $item)
                                                <option value="{{encrypt($item->id)}}">{{$item->nombre1}} {{$item->apellido1}}</option>
                                                @endforeach
                                            </select>
                                            <label for="entrenador_id">Entrenador</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <select name="categoria_id" id="categoria_id" class="form-control text-dark" required>
                                                <option selected value=""></option>
                                                @foreach ($categoria as $item)
                                                <option value="{{encrypt($item->id)}}">{{$item->tipo}} ({{$item->rango_edades}} años)</option>
                                                @endforeach
                                            </select>
                                            <label for="categoria_id">Categoría</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <select name="etapa_deportiva_id" id="etapa_deportiva_id" class="form-control text-dark" required>
                                                <option selected value=""></option>
                                                @foreach ($etapa as $item)
                                                <option value="{{encrypt($item->id)}}">{{$item->nombre}}</option>
                                                @endforeach
                                            </select>
                                            <label for="etapa_deportiva_id">Etapa deportiva</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <select name="deporte_id" class="form-control text-dark" id="deporte_id" required>
                                                @foreach ($deporte as $item)
                                                <option value="{{encrypt($item->id)}}" {{ $item->nombre == 'Boliche' ? 'selected' : ''}}>{{$item->nombre}}</option>
                                                @endforeach
                                            </select>
                                            <label for="deporte_id">Deporte</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <select name="deporte_adaptado_id" id="deporte_adaptado_id" class="form-control text-dark">
                                                @foreach ($deporteadaptado as $item)
                                                <option value="{{encrypt($item->id)}}" {{ $item->nombre == 'N/A' ? 'selected' : ''}} disabled>{{$item->nombre}}</option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" value="1" name="deporte_adaptado_id" id="deporte_adaptado_id_text">
                                            <label for="deporte_adaptado_id">Deporte adaptado</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <select name="otro_programa_id" id="otro_programa_id" class="form-control text-dark">
                                                @foreach ($otroprograma as $item)
                                                <option value="{{encrypt($item->id)}}" {{ $item->nombre == 'N/A' ? 'selected' : ''}} disabled>{{$item->nombre}}</option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" value="1" name="otro_programa_id" id="otro_programa_id_text">
                                            <label for="otro_programa_id">Otro programa</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <select name="linea_desarrollo_id" id="linea_desarrollo_id" class="form-control text-dark" required>
                                                <option selected value=""></option>
                                                @foreach ($lineadesarrollo as $item)
                                                <option value="{{encrypt($item->id)}}">{{$item->tipo}}</option>
                                                @endforeach
                                            </select>
                                            <label for="linea_desarrollo_id">Línea de desarrollo</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <select name="modalidad_id" class="form-control text-dark" id="modalidad_id" required>
                                                <option selected value=""></option>
                                                @foreach ($modalidad as $item)
                                                <option value="{{encrypt($item->id)}}">{{$item->nombre}}</option>
                                                @endforeach
                                            </select>
                                            <label for="modalidad_id">Modalidad</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-floating">
                                            <select name="prt_id" id="prt_id" class="form-control text-dark" required>
                                                <option selected value=""></option>
                                                @foreach ($prt as $item)
                                                <option value="{{encrypt($item->id)}}">{{$item->nombre}}</option>
                                                @endforeach
                                            </select>
                                            <label for="prt_id">PRT</label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="alumno_id" id="" value="{{encrypt($item->id)}}" readonly>
                                </div>
                                <div class="container">
                                    <div class="col-md-4 mb-10 center"><button type="submit" class="btn btn-outline-primary">Registrar</button></div>
                                </div>
                </form>
            </div>
        </div>
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
            document.getElementById('adaptadoText').value="Si";
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