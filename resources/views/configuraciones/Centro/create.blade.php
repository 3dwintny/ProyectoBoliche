@extends('layouts.app')

@section('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!--div class="body pb-8 pt-5 pt-lg-1 d-flex align-items-center" style="background-image: url(../argon/img/theme/bol.jpg); background-size: cover; background-position: center top;"!-->
<div class="header bg-dark pb-7 pt-5 pt-md-6">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <h1 class="text-white">Centros de entrenamiento</h1>
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
                            <h2>Registrar nuevo centro de entrenamiento</h2>
                        </strong>

                    </div>
                <form method="post" role="form" enctype="multipart/form-data" action="{{route('centro.store')}}">
                    @csrf
                    <div class="form-group">
                        <div class="col-md-4 mb-10 center">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="fecha_registro" placeholder="Nacionalidad" name="fecha_registro" value="{{$hoy->format('Y-m-d')}}" required>
                                <label for="fecha_registro">Fecha de Registro</label>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body bg-light">
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <!-- Para segir viendo el nombre del placeholder -->
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Nombre') }}" id="nombre" type="text" name="nombre" value="{{ old('Nombre') }}" required>
                                        <!-- Esto es lo que aparece como placeholder, en el fomulario -->
                                        <label for="nombre">Nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <!-- Para segir viendo el nombre del placeholder -->
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Dirección') }}" id="direccion" type="text" name="direccion" value="{{ old('Dirección') }}" required>
                                        <!-- Esto es lo que aparece como placeholder, en el fomulario -->
                                        <label for="direccion">Dirección</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <!-- Para segir viendo el nombre del placeholder -->
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Institución') }}" id="institucion" type="text" name="institucion" value="{{ old('Institución') }}">
                                        <!-- Esto es lo que aparece como placeholder, en el fomulario -->
                                        <label for="institucion">Institución</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <!-- Para segir viendo el nombre del placeholder -->
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Accesibilidad') }}" id="accesibilidad" type="text" name="accesibilidad" value="{{ old('Accesibilidad') }}">
                                        <!-- Esto es lo que aparece como placeholder, en el fomulario -->
                                        <label for="accesibilidad">Accesibilidad</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <!-- Para segir viendo el nombre del placeholder -->
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Implementación') }}" id="implementacion" type="text" name="implementacion" value="{{ old('Implementación') }}">
                                        <!-- Esto es lo que aparece como placeholder, en el fomulario -->
                                        <label for="implementacion">Implementación</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <!-- Para segir viendo el nombre del placeholder -->
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Espacio Físico') }}" id="espacio_fisico" type="text" name="espacio_fisico" value="{{ old('Espacio Físico') }}">
                                        <!-- Esto es lo que aparece como placeholder, en el fomulario -->
                                        <label for="espacio_fisico">Espacio Físico</label>
                                    </div>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-floating">
                                        <select class="form-control" name="departamento_id" id="departamento_id" required>
                                            <option selected disabled></option>
                                            @foreach ($departamento as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}}</option>
                                                @if ($item->id==13)
                                                    <option value="{{$item->id}}" selected>{{$item->nombre}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <!-- Esto es lo que aparece como placeholder, en el fomulario -->
                                        <label for="departamento_id">Departamento</label>
                                    </div>
                                </div>
                            </div>
                            <Label>Horarios</Label>
                            <table class="table table-responsive table-hover" style="border-radius: 5px;">
                                <thead class="table-dark">
                                  <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Hora de inicio</th>
                                    <th>Hora de finalización</th>
                                    <th>Domingo</th>
                                    <th>Lunes</th>
                                    <th>Martes</th>
                                    <th>Miércoles</th>
                                    <th>Jueves</th>
                                    <th>Viernes</th>
                                    <th>Sábado</th>
                                  </tr>
                                </thead>
                                <tbody class="table-hover">
                                  @php
                                      $contador = 1;
                                  @endphp
                                  @foreach ($horario as $item)
                                  @php
                                    $hashid = new Hashids\Hashids();
                                    $idHorario = $hashid->encode($item->id)
                                  @endphp
                                  <tr>
                                    <td>{{$contador}}</td>
                                    <td>{{\Carbon\Carbon::parse($item->hora_inicio)->format('H:i')}}</td>
                                    <td>{{\Carbon\Carbon::parse($item->hora_fin)->format('H:i')}}</td>
                                    <td>{{$item->domingo}}</td>
                                    <td>{{$item->lunes}}</td>
                                    <td>{{$item->martes}}</td>
                                    <td>{{$item->miercoles}}</td>
                                    <td>{{$item->jueves}}</td>
                                    <td>{{$item->viernes}}</td>
                                    <td>{{$item->sabado}}</td>
                                    <td><input type="checkbox" value="{{$item->id}}" name="horario_id[]"  id="horario_id"></td>
                                    @php
                                      $contador++;
                                    @endphp
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            <div class="container">
                                <div class="col-md-4 mb-10 center"><button type="submit" class="btn btn-outline-primary">Registrar</button></div>
                            </div>
                </form>
                <label>Agregar horario</label>
                <form method="post" role="form" enctype="multipart/form-data" action="{{route('horario.store')}}">
                    @csrf
                    <div class="card">
                        <div class="card-body bg-light">
                            <div class="row">
                                <div class="col-md-2 mb-2"></div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <!-- Esto es lo que aparece como placeholder, en el fomulario -->
                                        <input type="time" name="hora_inicio" id="hora_inicio" class="form-control text-dark" value="00:00" required>
                                        <label for="hora_inicio">Hora de inicio</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <!-- Esto es lo que aparece como placeholder, en el fomulario -->
                                        <input type="time" name="hora_fin" id="hora_fin" class="form-control text-dark" value="00:00" required>
                                        <label for="hora_fin">Hora de finalización</label>
                                    </div>
                                </div>
                            </div>
                            <label>Lunes</label>
                            <input type="checkbox" value="X" name="lunes"  id="lunes">
                            <label>Martes</label>
                            <input type="checkbox" value="X" name="martes"  id="martes">
                            <label>Miércoles</label>
                            <input type="checkbox" value="X" name="miercoles"  id="miercoles">
                            <label>Jueves</label>
                            <input type="checkbox" value="X" name="jueves"  id="jueves">
                            <label>Viernes</label>
                            <input type="checkbox" value="X" name="viernes"  id="viernes">
                            <label>Sábado</label>
                            <input type="checkbox" value="X" name="sabado"  id="sabado">
                            <label>Domingo</label>
                            <input type="checkbox" value="X" name="domingo"  id="domingo">
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
@endsection