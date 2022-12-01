@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!--div class="body pb-8 pt-5 pt-lg-1 d-flex align-items-center" style="background-image: url(../argon/img/theme/bol.jpg); background-size: cover; background-position: center top;"!-->
<div class="header bg-dark pb-3 pt-5 pt-md-5">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-5 col-lg-5">
                    <h2 class="text-white"> Asistencia del {{$hoy->format('d/m/Y')}}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="">
    <div class="header-body mb-7">
        <div class="">
            <div class="col-lg-12 col-md-8">
                <div class="card">
                </div>
                <form method="POST" action="{{route('asis')}}" enctype="multipart/form-data" role="form">
                    @csrf
                    <div class="pb-5 pt-5 pt-md-2 table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Atleta</th>
                                    <th>Asistencia</th>
                                    <th>Inasistencia</th>
                                    <th>Permiso/Descanso</th>
                                    <th>Enfermo</th>
                                    <th>Lesión</th>
                                    <th>Competencia</th>
                                </tr>
                            </thead>
                            <tbody class="table-dark">
                                @foreach($atletas as $item)
                                <tr>
                                    <td>
                                        <input type="text" class="text-white bg-dark" name="atleta_id[]" value="{{$item->id}}" disabled readonly>
                                    </td>
                                    <td>
                                        <input type="text" class="text-white bg-dark" value="{{$item->alumno->nombre1}} {{$item->alumno->nombre2}} {{$item->alumno->nombre3}} {{$item->alumno->apellido1}} {{$item->alumno->apellido2}}" disabled readonly>
                                    </td>
                                        <td>
                                        <div class="form-check">
                                            <input type="radio" id="defaultCheck1" class="form-check-input" name="estado[]" value="X">
                                            </div>
                                        </td>
                                        <td>
                                        <div class="form-check">
                                            <input type="radio" id="defaultCheck2" class="form-check-input" name="estado[]" value="O">
                                            </div>
                                        </td>
                                        <td>
                                        <div class="form-check">
                                            <input type="radio" id="estado" class="form-check-input" name="estado[]" value="P">
                                            </div>
                                        </td>
                                        <td>
                                        <div class="form-check">
                                            <input type="radio" id="estado" class="form-check-input" name="estado[]" value="E">
                                            </div>
                                        </td>
                                        <td>
                                        <div class="form-check">
                                            <input type="radio" id="estado" class="form-check-input" name="estado[]" value="L">
                                            </div>
                                        </td>
                                        <td>
                                        <div class="form-check">
                                            <input type="radio" id="estado" class="form-check-input" name="estado[]" value="C">
                                            </div>
                                        </td>
                                </tr>
                                <input type="hidden" name="fecha[]" id="" value="{{$hoy->format('Y-m-d')}}" readonly>
                                @endforeach
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-outline-primary">Guardar Asistencia</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection