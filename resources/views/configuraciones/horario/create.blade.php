@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-10 col-sm-6">
                    <h1 class="text-white">Horarios de entreno</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pt-2">
    <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-10">
                <div class="card">
                    <div class="card-header text-bold ">
                        <strong>
                            <h2>Registrar nuevo horario de entrenamiento</h2>
                        </strong>
                    </div>
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form method="post" role="form" enctype="multipart/form-data" action="{{route('horario.store')}}">
                        @csrf
                        <div class="card">
                            <div class="card-body bg-light">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-2">
                                        <div class="form-floating">
                                            <input type="time" name="hora_inicio" id="hora_inicio" class="form-control text-dark" value="00:00" required>
                                            <label for="hora_inicio">Hora de inicio</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-2">
                                        <div class="form-floating">
                                            <input type="time" name="hora_fin" id="hora_fin" class="form-control text-dark" value="00:00" required>
                                            <label for="hora_fin">Hora de finalización</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th></td>
                                                <th>Seleccionar</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Lunes</td>
                                                <td>
                                                    <input type="radio" value="X" name="lunes"  id="lunes">
                                                </td>
                                                <td>
                                                    <input type="radio" value="" name="lunes"  id="lunes" checked>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Martes</td>
                                                <td>
                                                    <input type="radio" value="X" name="martes"  id="martes">
                                                </td>
                                                <td>
                                                    <input type="radio" value="" name="martes"  id="martes" checked>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Miércoles</td>
                                                <td>
                                                    <input type="radio" value="X" name="miercoles"  id="miercoles">
                                                </td>
                                                <td>
                                                    <input type="radio" value="" name="miercoles"  id="miercoles" checked>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jueves</td>
                                                <td>
                                                    <input type="radio" value="X" name="jueves"  id="jueves">
                                                </td>
                                                <td>
                                                    <input type="radio" value="" name="jueves"  id="jueves" checked>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Viernes</td>
                                                <td>
                                                    <input type="radio" value="X" name="viernes"  id="viernes">
                                                </td>
                                                <td>
                                                    <input type="radio" value="" name="viernes"  id="viernes" checked>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sábado</td>
                                                <td>
                                                    <input type="radio" value="X" name="sabado"  id="sabado">
                                                </td>
                                                <td>
                                                    <input type="radio" value="" name="sabado"  id="sabado" checked>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Domingo</td>
                                                <td>
                                                    <input type="radio" value="X" name="domingo"  id="domingo">
                                                </td>
                                                <td>
                                                    <input type="radio" value="" name="domingo"  id="domingo" checked>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <button type="submit" class="btn btn-primary">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection