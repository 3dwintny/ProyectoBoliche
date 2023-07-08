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
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-xl-6 col-lg-8 col-md-12 col-sm-10">
                <div class="card">
                    <div class="card-header text-bold ">
                        <strong>
                            <h2>Editar horario de entrenamiento</h2>
                        </strong>
                    </div>
                    <form method="post" role="form" enctype="multipart/form-data" action="{{route('horario.update',encrypt($horario->id))}}">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="card">
                            <div class="card-body bg-light">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-2">
                                        <div class="form-floating">
                                            <input type="time" name="hora_inicio" id="hora_inicio" class="form-control text-dark" value="{{$horario->hora_inicio}}" required>
                                            <label for="hora_inicio">Hora de inicio</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-2">
                                        <div class="form-floating">
                                            <input type="time" name="hora_fin" id="hora_fin" class="form-control text-dark" value="{{$horario->hora_fin}}" required>
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
                                                    @if($horario->lunes=="X")
                                                        <input type="radio" value="X" name="lunes"  id="lunes" checked>
                                                    @else
                                                        <input type="radio" value="X" name="lunes"  id="lunes">
                                                    @endif
                                                </td>
                                                <td>
                                                    <input type="radio" value=" " name="lunes"  id="lunes">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Martes</td>
                                                <td>
                                                    @if($horario->martes=="X")
                                                        <input type="radio" value="X" name="martes"  id="martes" checked>
                                                    @else
                                                        <input type="radio" value="X" name="martes"  id="martes">
                                                    @endif
                                                </td>
                                                <td>
                                                    <input type="radio" value=" " name="martes"  id="martes">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Miércoles</td>
                                                <td>
                                                    @if($horario->miercoles=="X")
                                                        <input type="radio" value="X" name="miercoles"  id="miercoles" checked>
                                                    @else
                                                        <input type="radio" value="X" name="miercoles"  id="miercoles">
                                                    @endif
                                                </td>
                                                <td>
                                                    <input type="radio" value=" " name="miercoles"  id="miercoles">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jueves</td>
                                                <td>
                                                    @if($horario->jueves=="X")
                                                        <input type="radio" value="X" name="jueves"  id="jueves" checked>
                                                    @else
                                                        <input type="radio" value="X" name="jueves"  id="jueves">
                                                    @endif
                                                </td>
                                                <td>
                                                    <input type="radio" value=" " name="jueves"  id="jueves">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Viernes</td>
                                                <td>
                                                    @if($horario->viernes=="X")
                                                        <input type="radio" value="X" name="viernes"  id="viernes" checked>
                                                    @else
                                                        <input type="radio" value="X" name="viernes"  id="viernes">
                                                    @endif
                                                </td>
                                                <td>
                                                    <input type="radio" value=" " name="viernes"  id="viernes">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sábado</td>
                                                <td>
                                                    @if($horario->sabado=="X")
                                                        <input type="radio" value="X" name="sabado"  id="sabado" checked>
                                                    @else
                                                        <input type="radio" value="X" name="sabado"  id="sabado">
                                                    @endif
                                                </td>
                                                <td>
                                                    <input type="radio" value=" " name="sabado"  id="sabado">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Domingo</td>
                                                <td>
                                                    @if($horario->domingo=="X")
                                                        <input type="radio" value="X" name="domingo"  id="domingo" checked>
                                                    @else
                                                        <input type="radio" value="X" name="domingo"  id="domingo">
                                                    @endif
                                                </td>
                                                <td>
                                                    <input type="radio" value=" " name="domingo"  id="domingo">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <div class="container">
                                    <div class="col-md-4 mb-10 center"><button type="submit" class="btn btn-outline-primary">Actualizar</button></div>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection