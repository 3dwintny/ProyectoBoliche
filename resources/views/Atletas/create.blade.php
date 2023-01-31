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
                    <h1 class="text-white">Atleta</h1>
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
                            <h3>Inscripcion del Atleta {{ $alumno->nombre1 }}</h3>
                        </strong>

                    </div>
                </div>
                <form method="post" role="form" enctype="multipart/form-data" action="{{route('ac_estado',$alumno->id)}}">
                    @csrf
                    <div class="form-group">
                        <div class="card">
                            <div class="card-body bg-light">
                            <div class="col-12 mb-2"><img src="{{ asset('storage/uploads/'.$alumno->foto) }}" class="img-thumbnail" alt="50" height="50" width="50"></div>
                                <h5 class="mb-2">Informacion Adicional</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Fecha Ingreso</span>
                                            <input type="text" class=" container form-control text-center" name="fecha_ingreso" id="fecha_sistema" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2"><select name="adaptado" class="form-control text-dark" required>
                                            <option selected disabled>Adaptado</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select></div>
                                    <div class="col-md-6 mb-2 form-control">
                                    <label>¿El/La Atleta es Federado ?</label>
                                        <div class="form-check form-check-inline">
                                        <input type="radio" name="federado" id="federado0" value="SISTEMÁTICO" checked>
                                        <label class="form-check-label" for="inlineRadio3">Si</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                        <input type="radio" name="federado" id="federado1" value="1">
                                        <label class="form-check-label" for="inlineRadio3">No</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2"><select name="estado_civil" class="form-control text-dark" required>
                                            <option selected disabled>Estado Civil</option>
                                            <option value="Soltera/o">Soltera/o</option>
                                            <option value="Casada/o">Casada/o</option>
                                            <option value="Unión Libre">Unión Libre</option>
                                            <option value="Unión de Hecho">Unión de Hecho</option>
                                            <option value="Separada/o">Separada/o</option>
                                            <option value="Divorciada/o">Divorciada/o</option>
                                            <option value="Viuda/o">Viuda/o</option>
                                        </select></div>
                                    <div class="col-md-6 mb-2"><select name="etnia" class="form-control text-dark" required>
                                            <option selected disabled>Etnia</option>
                                            <option value="Maya">Maya</option>
                                            <option value="Xinka">Xinka</option>
                                            <option value="Garífuna">Garifuna</option>
                                            <option value="Ladino">Ladino</option>
                                        </select></div>
                                    <div class="col-md-4 mb-2"><select name="escolaridad" class="form-control text-dark" required>
                                            <option selected disabled>Nivel Académico</option>
                                            <option value="Primaria">Primaria</option>
                                            <option value="Básico">Básico</option>
                                            <option value="Diversificado">Diversificado</option>
                                            <option value="Licenciatura">Licenciatura</option>
                                            <option value="Maestría">Maestría</option>
                                            <option value="Doctorado">Doctorado</option>
                                        </select></div>
                                    <div class="col-md-4 mb-2"><select name="centro_id" class="form-control text-dark" required>
                                            <option selected disabled>Centro</option>
                                            @foreach ($centro as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}}</option>
                                            @endforeach
                                        </select></div>
                                        <div class="col-md-2 mb-2"><input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Años" type="text" name="anios"  required></div>
                                        <div class="col-md-2 mb-2"><input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Meses" type="text" name="meses"  required></div>
                                    <div class="col-md-4 mb-2"><select name="entrenador_id" class="form-control text-dark" required>
                                            <option selected disabled>Entrenador</option>
                                            @foreach ($entrenador as $item)
                                            <option value="{{$item->id}}">{{$item->nombre1}} {{$item->apellido1}}</option>
                                            @endforeach
                                        </select></div>
                                    <div class="col-md-4 mb-2"><select name="categoria_id" class="form-control text-dark" required>
                                            <option selected disabled>Categoria</option>
                                            @foreach ($categoria as $item)
                                            <option value="{{$item->id}}">{{$item->tipo}} ({{$item->rango_edades}} años)</option>
                                            @endforeach
                                        </select></div>
                                    <div class="col-md-4 mb-2"><select name="etapa_deportiva_id" class="form-control text-dark" required>
                                            <option selected disabled>Etapa Deportiva</option>
                                            @foreach ($etapa as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}}</option>
                                            @endforeach
                                        </select></div>
                                    <div class="col-md-4 mb-2"><select name="deporte_id" class="form-control text-dark" required>
                                            <option selected disabled>Deporte</option>
                                            @foreach ($deporte as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}}</option>
                                            @endforeach
                                        </select></div>
                                    <div class="col-md-4 mb-2"><select name="deporte_adaptado_id" class="form-control text-dark" required>
                                            <option selected disabled>Deporte Adaptado</option>
                                            @foreach ($deporteadaptado as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}}</option>
                                            @endforeach
                                        </select></div>
                                    <div class="col-md-4 mb-2"><select name="otro_programa_id" id="otro_programa_id" class="form-control text-dark" disabled>
                                            <option selected disabled>Otro Programa</option>
                                            @foreach ($otroprograma as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}}</option>
                                            @endforeach
                                        </select></div>
                                    <div class="col-md-4 mb-2"><select name="linea_desarrollo_id" class="form-control text-dark" required>
                                            <option selected disabled>Linea de Desarrollo</option>
                                            @foreach ($lineadesarrollo as $item)
                                            <option value="{{$item->id}}">{{$item->tipo}}</option>
                                            @endforeach
                                        </select></div>
                                    <div class="col-md-4 mb-2"><select name="modalidad_id" class="form-control text-dark" required>
                                            <option selected disabled>Modalidad</option>
                                            @foreach ($modalidad as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}}</option>
                                            @endforeach
                                        </select></div>
                                    <div class="col-md-4 mb-2"><select name="prt_id" class="form-control text-dark" required>
                                            <option selected disabled>PRT</option>
                                            @foreach ($prt as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}}</option>
                                            @endforeach
                                        </select></div>
                                    <input type="hidden" name="alumno_id" id="" value="{{$alumno->id}}" readonly>
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
    $(document).ready(function() {
        $('#fecha_nacimiento').on('change', function() {
            function calcularEdad(fechas) {
                var hoy = new Date();
                var cumpleanos = new Date(fechas);
                var edad = hoy.getFullYear() - cumpleanos.getFullYear();
                var m = hoy.getMonth() - cumpleanos.getMonth();

                if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                    edad--;
                }

                return edad;
            }
            document.getElementById('_edad').value = calcularEdad(document.getElementById('fecha_nacimiento').value);
        });
    });
    date = new Date();
    year = date.getFullYear();
    month = date.getMonth() + 1;
    day = date.getDate();
    document.getElementById("fecha_sistema").value = year + "/" + month + "/" + day;
    $(document).ready(function () {
        $('#federado0').on('change', function () {
            document.getElementById('otro_programa_id').disabled = true;
        });
        $('#federado1').on('change', function () {
            document.getElementById('otro_programa_id').disabled = false;
        });
    });
</script>
@endsection