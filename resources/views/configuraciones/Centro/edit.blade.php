@extends('layouts.app')

@section('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!--div class="body pb-8 pt-5 pt-lg-1 d-flex align-items-center" style="background-image: url(../argon/img/theme/bol.jpg); background-size: cover; background-position: center top;"!-->
<div class="header bg-dark pb-7 pt-5 pt-md-6 mt--5">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <h1 class="text-white">Centros de Entrenamiento</h1>
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
                            <h2>Editar Centro de Entrenamiento </h2>
                        </strong>
                    </div>
                <form method="post" role="form" enctype="multipart/form-data" action="{{route('centro.update',$centro->id)}}">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <div class="col-md-4 mb-10 center">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="fecha_registro" placeholder="Fecha de Registro" name="fecha_registro" value="{{$centro->fecha_registro}}" required>
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
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Nombre') }}" id="nombre" type="text" name="nombre" value="{{$centro->nombre}}" required>
                                        <!-- Esto es lo que aparece como placeholder, en el fomulario -->
                                        <label for="nombre">Nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <!-- Para segir viendo el nombre del placeholder -->
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Dirección') }}" id="direccion" type="text" name="direccion" value="{{$centro->direccion}}" required>
                                        <!-- Esto es lo que aparece como placeholder, en el fomulario -->
                                        <label for="direccion">Dirección</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <!-- Para segir viendo el nombre del placeholder -->
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Institución') }}" id="institucion" type="text" name="institucion" value="{{$centro->institucion}}">
                                        <!-- Esto es lo que aparece como placeholder, en el fomulario -->
                                        <label for="institucion">Institución</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <!-- Para segir viendo el nombre del placeholder -->
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Accesibilidad') }}" id="accesibilidad" type="text" name="accesibilidad" value="{{$centro->accesibilidad}}">
                                        <!-- Esto es lo que aparece como placeholder, en el fomulario -->
                                        <label for="accesibilidad">Accesibilidad</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <!-- Para segir viendo el nombre del placeholder -->
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Implementación') }}" id="implementacion" type="text" name="implementacion" value="{{$centro->implementacion}}">
                                        <!-- Esto es lo que aparece como placeholder, en el fomulario -->
                                        <label for="implementacion">Implementación</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <!-- Para segir viendo el nombre del placeholder -->
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Espacio Físico') }}" id="espacio_fisico" type="text" name="espacio_fisico" value="{{$centro->espacio_fisico}}">
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
                                                @if ($item->id==$centro->departamento_id)
                                                    <option selected value="{{$item->id}}">{{$item->nombre}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <!-- Esto es lo que aparece como placeholder, en el fomulario -->
                                        <label for="departamento_id">Departamento</label>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="col-md-4 mb-10 center"><button type="submit" class="btn btn-outline-primary">Actualizar</button></div>
                            </div>
                </form>


            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection