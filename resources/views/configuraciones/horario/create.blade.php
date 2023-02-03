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
                    <h1 class="text-white">Horarios de entrenamiento</h1>
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
                            <h2>Registrar nuevo horario de entrenamiento</h2>
                        </strong>

                    </div>
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
                            <input type="radio" value="X" name="lunes"  id="lunes">
                            <label>Martes</label>
                            <input type="radio" value="X" name="martes"  id="martes">
                            <label>Miércoles</label>
                            <input type="radio" value="X" name="miercoles"  id="miercoles">
                            <label>Jueves</label>
                            <input type="radio" value="X" name="jueves"  id="jueves">
                            <label>Viernes</label>
                            <input type="radio" value="X" name="viernes"  id="viernes">
                            <label>Sábado</label>
                            <input type="radio" value="X" name="sabado"  id="sabado">
                            <label>Domingo</label>
                            <input type="radio" value="X" name="domingo"  id="domingo">
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