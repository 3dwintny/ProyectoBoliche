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
<<<<<<< HEAD
                    <h1 class="text-white">Informacion </h1>
=======
                    <h1 class="text-white">Encabezado de formulario de inscripción</h1>
>>>>>>> eaf69b7400c01f6a788b78abbe4e34be537fb130
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
                            <h2>Editar encabezado</h2>
                        </strong>

                    </div>
                <form method="post" role="form" enctype="multipart/form-data" action="{{route('formulario-inscripcion.update',$formulario->id)}}">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="card">
                        <div class="card-body bg-light">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <!-- Para segir viendo el nombre del placeholder -->
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Título principal') }}" id="titulo_principal" type="text" name="titulo_principal" value="{{$formulario->titulo_principal}}">
                                        <!-- Esto es lo que aparece como placeholder, en el fomulario -->
                                        <label for="titulo_principal">Título principal</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <!-- Para segir viendo el nombre del placeholder -->
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Título ficha') }}" id="titulo_ficha" type="text" name="titulo_ficha" value="{{$formulario->titulo_ficha}}">
                                        <!-- Esto es lo que aparece como placeholder, en el fomulario -->
                                        <label for="titulo_ficha">Título ficha</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <!-- Para segir viendo el nombre del placeholder -->
                                    <div class="form-floating">
                                        <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Subtítulo') }}" id="subtitulo" type="text" name="subtitulo" value="{{$formulario->subtitulo}}">
                                        <!-- Esto es lo que aparece como placeholder, en el fomulario -->
                                        <label for="subtitulo">Subtítulo</label>
                                    </div>
                                </div>
                                <label for="titulo_ficha">Declaración</label>
                                <div class="col-md-12 mb-2">
                                    <textarea class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Declaración') }}" id="declaracion" type="text" name="declaracion" style="text-align:justify;resize:none;" rows="8">{{$formulario->declaracion}}</textarea>
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