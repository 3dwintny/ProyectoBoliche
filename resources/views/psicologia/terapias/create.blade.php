@extends('layouts.app')

@section('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!--div class="body pb-8 pt-5 pt-lg-1 d-flex align-items-center" style="background-image: url(../argon/img/theme/bol.jpg); background-size: cover; background-position: center top;"!-->
<div class="header bg-dark pb-9 pt-5 pt-md-5">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <h1 class="text-white">Psicologia</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--8">
    <div class="header-body text-center  mb-2 container">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-md-10">
                <form method="POST" action="{{route('terapias.store')}}" enctype="multipart/form-data" role="form">
                    @csrf
                    <div class="card">
                        <div class="card-header bg-light mb-2">
                            <div class="row justify-content-center">
                                <div class="col-md-10 mb-3">
                                    <h3 class="card-title text-dark">Nota evolutiva</h3>
                                </div>
                                <div class="col-md-2 mb-2"><input type="text" class="form-control text-dark" name="numero_terapia" placeholder="No. Sesion" id=""></div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-4 mb-4"><select name="psicologia_id" class="form-control text-dark" required>
                                    <option selected disabled>Psicologa(o)</option>
                                    @foreach ($psicologos as $item)
                                    <option value="{{$item->id}}">{{$item->nombre1}} {{$item->nombre2}} {{$item->apellido1}}
                                        {{$item->apellido2}} {{$item->apellido_casada}}
                                    </option>
                                    @endforeach
                                </select></div>
                            <div class="col-md-4 mb-4"><select name="atleta_id" class="form-control text-dark">
                                    <option selected disabled>Atleta</option>
                                    @foreach ($atletas as $item)
                                    <option value="{{$item->id}}">{{$item->alumno->nombre1}} {{$item->alumno->nombre2}}
                                        {{$item->alumno->apellido1}} {{$item->alumno->apellido2}}
                                    </option>
                                    @endforeach
                                </select></div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-4 mb-13"><input type="text" class="form-control text-center" name="fecha_registro" id="fecha_sistema" readonly></div>
                            <div class="col-md-4 mb-4"><input type="time" class="form-control text-dark" name="hora_inicio" id="hora_inicio"></div>
                        </div>


                        <div class="card-body bg-light">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingOne">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                    Impresión Clínica
                                                </button>
                                            </h2>
                                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body"> <textarea class="form-control" name="impresion_clinica" placeholder="Observaciones" id="floatingTextarea"></textarea></div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingTwo">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                    Análisis Semiológico (Signos y Síntomas)
                                                </button>
                                            </h2>
                                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body"><textarea class="form-control" name="analisis_semiologico" placeholder="Observaciones" id="floatingTextarea"></textarea></div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingThree">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                                    Desarrollo
                                                </button>
                                            </h2>
                                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body"><textarea class="form-control" name="desarrollo" placeholder="Observaciones" id="floatingTextarea"></textarea></div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-heading4">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">
                                                    Observaciones
                                                </button>
                                            </h2>
                                            <div id="flush-collapse4" class="accordion-collapse collapse" aria-labelledby="flush-heading4" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body"> <textarea class="form-control" name="observaciones" placeholder="Observaciones" id="floatingTextarea"></textarea></div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-heading5">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapse5">
                                                    Tarea
                                                </button>
                                            </h2>
                                            <div id="flush-collapse5" class="accordion-collapse collapse" aria-labelledby="flush-heading5" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body"> <textarea class="form-control" name="tarea" placeholder="Observaciones" id="floatingTextarea"></textarea></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="table-dark">
                                            <tr>
                                                <th scope="col">Rubro</th>
                                                <th scope="col">Valor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Conciencia Corporal</td>
                                                <td><select aria-label=".form-select-sm example" name="conciencia_corporal" id="">
                                                        <option class="form-control" selected disabled>Conciencia Corporal</option>
                                                        @for($i=1;$i<=10;$i++) <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td> Dominio Corporal</td>
                                                <td><select name="dominio_corporal" id="">
                                                        <option selected disabled>Dominio Corporal</option>
                                                        @for($i=1;$i<=10;$i++) <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td>Dominio de Respiración</td>
                                                <td><select name="dominio_respiracion" id="">
                                                        <option selected disabled>Dominio de Respiración</option>
                                                        @for($i=1;$i<=10;$i++) <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td>Diálogo Interno</td>
                                                <td><select name="dialogo_interno" id="">
                                                        <option selected disabled>Diálogo Interno</option>
                                                        @for($i=1;$i<=10;$i++) <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td>Atención</td>
                                                <td><select name="atencion" id="">
                                                        <option selected disabled>Atención</option>
                                                        @for($i=1;$i<=10;$i++) <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td>Concentración</td>
                                                <td><select name="concentracion" id="">
                                                        <option selected disabled>Concentración</option>
                                                        @for($i=1;$i<=10;$i++) <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td>Motivación</td>
                                                <td><select name="motivacion" id="">
                                                        <option selected disabled>Motivación</option>
                                                        @for($i=1;$i<=10;$i++) <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td>Confianza</td>
                                                <td><select name="confianza" id="">
                                                        <option selected disabled>Confianza</option>
                                                        @for($i=1;$i<=10;$i++) <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td>Activación</td>
                                                <td><select name="activacion" id="">
                                                        <option selected disabled>Activación</option>
                                                        @for($i=1;$i<=10;$i++) <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                    </select></td>
                                            </tr>
                                            <td>Relajación</td>
                                            <td><select name="relajacion" id="">
                                                    <option selected disabled>Relajación</option>
                                                    @for($i=1;$i<=10;$i++) <option value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                </select></td>
                                            </tr>
                                            <tr>
                                                <td>Estrés</td>
                                                <td><select name="estres" id="">
                                                        <option selected disabled>Estrés</option>
                                                        @for($i=1;$i<=10;$i++) <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td>Ansiedad Cognitiva</td>
                                                <td><select name="ansiedad_cognitiva" id="">
                                                        <option selected disabled>Ansiedad Cognitiva</option>
                                                        @for($i=1;$i<=10;$i++) <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                    </select>
                                            </tr>
                                            </td>
                                            <tr>
                                                <td>Ansiedad Física</td>
                                                <td><select name="ansiedad_fisica" id="">
                                                        <option selected disabled>Ansiedad Física</option>
                                                        @for($i=1;$i<=10;$i++) <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td>Miedo</td>
                                                <td><select name="miedo" id="">
                                                        <option selected disabled>Miedo</option>
                                                        @for($i=1;$i<=10;$i++) <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td>Frustración</td>
                                                <td><select name="frustracion" id="">
                                                        <option selected disabled>Frustración</option>
                                                        @for($i=1;$i<=10;$i++) <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                    </select></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <input class="btn btn-outline-primary" type="submit" value="Guardar">
                        </div>
                    </div>
            </div>
            </form>


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
            document.getElementById('_edad').value = calcularEdad(document.getElementById(
                'fecha_nacimiento').value);
        });
    });
    date = new Date();
    year = date.getFullYear();
    month = date.getMonth() + 1;
    day = date.getDate();
    document.getElementById("fecha_sistema").value = year + "/" + month + "/" + day;
</script>
@endsection