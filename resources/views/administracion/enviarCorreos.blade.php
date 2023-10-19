@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <h1 class="text-white">Envío de correos</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pt-2">
    <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-5 col-sm-5 mb-2">
                <div class="form-floating">
                    <input type="date" class="form-control" id="fecha" onchange="modificarFecha(this.value)">
                    <label for="fecha">Modificar fecha de mensaje</label>
                </div>
            </div>
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('warning'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('warning') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <form method="POST" action="{{route('enviarCorreo')}}" enctype="multipart/form-data" role="form">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-dark mt-2">
                                <tr>
                                    <th style="text-align:center;">No</th>
                                    <th style="text-align:center;">Fecha</th>
                                    <th style="text-align:center;">Atleta</th>
                                    <th style="text-align:center;">Categoría</th>
                                    <th style="text-align:center;">Todos<input id="todos" type="radio" name="todo"> <br/>Ninguno<input id="cancelar" type="radio" name="todo"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $c = 0;
                                    $contador = 1;
                                    $longitudContador = strlen($contador);
                                @endphp
                                @if(count($atletas)==0)
                                <tr>
                                    <td colspan="9" style="font-weight: bolder;text-align:center;">SIN ATLETAS INSCRITOS</td>
                                </tr>
                                @else
                                @foreach($atletas as $item)
                                <tr class="table-sm">
                                    <td>
                                        <input type="hidden" class="text-white bg-dark" name="atleta_id[]" value="{{encrypt($item->id)}}" style="width: auto;">
                                        <input type="text" value="{{$contador}}" readonly style="text-align:center;width: {{$longitudContador}}em;border: none;">
                                    </td>
                                    <td>
                                        <input type="text" name="fecha[]" value="{{$hoy->format('Y-m-d')}}" id="fecha_registro{{$c}}" readonly style="width: 6em; text-align:center; border: none;" required>
                                    </td>
                                    <td>
                                        @php
                                            if($item->alumno->nombre2==null){
                                                $nombreCompleto = trim($item->alumno->nombre1 . ' ' . $item->alumno->apellido1 . ' ' . $item->alumno->apellido2);
                                            }
                                            elseif($item->alumno->nombre3==null){
                                                $nombreCompleto = trim($item->alumno->nombre1 . ' '. $item->alumno->nombre2 . ' ' . $item->alumno->apellido1 . ' ' . $item->alumno->apellido2);
                                            }
                                            else{
                                                $nombreCompleto = trim($item->alumno->nombre1 . ' ' . $item->alumno->nombre2 . ' ' . $item->alumno->nombre3 . ' ' . $item->alumno->apellido1 . ' ' . $item->alumno->apellido2);
                                            }

                                            $longitudTexto = strlen($nombreCompleto);
                                        @endphp
                                        <input type="text" value="{{ $nombreCompleto }}" readonly style="width: 25em; text-align: center; border: none;">
                                    </td>
                                    <td>
                                        <input type="text" value="{{ $item->categoria->tipo }}" readonly style="width: 7em; text-align: center; border: none;">
                                    </td>
                                    <td>
                                        <label>
                                            <input type="checkbox" id="atletaSeleccionado{{$contador}}" class="{{$item->id}}" name="atletaSeleccionado[]" value="{{encrypt($item->id)}}">
                                        </label>
                                    </td>
                                </tr>
                                @php
                                $c = $c+1;
                                $contador++;
                                $longitudContador = strlen($contador);
                                @endphp
                                @endforeach
                                <input type="hidden" id="controlador" value="{{$contador}}">
                                @endif
                            </tbody>
                        </table>
                        <label for="txtMensaje">Mensaje</label>
                        <textarea name="txtMensaje" id="txtMensaje" placeholder="{{ __('Mensaje') }}" cols="40" rows="5" style="text-align:justify;resize:none;" class="form-control text-dark" aria-describedby="basic-addon2" required>{{ old('txtMensaje', session('txtMensaje')) }}</textarea>
                        @if(count($atletas)==0)
                            <div class="container"><input type="submit" class="next-form btn btn-outline-primary" value="Aceptar" disabled></div>
                        @else
                            <div class="container"><input type="submit" class="next-form btn btn-outline-primary" value="Aceptar"></div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(
        function(){
        $('#todos').on('change', function(){
            for(let i = 1; i<document.getElementById('controlador').value; i++){
                document.getElementById('atletaSeleccionado'+i).checked = true;
            }
        });
        $('#cancelar').on('change', function(){
            for(let i = 1; i<document.getElementById('controlador').value; i++){
                if(document.getElementById('atletaSeleccionado'+i).checked == true){
                    document.getElementById('atletaSeleccionado'+i).checked = false;
                }
            }
            document.getElementById('cancelar').checked = false;
        });
    });
</script>
<script type="text/javascript">
    function modificarFecha(date) {
        var fechaInputs = document.getElementsByName('fecha[]');
        for (var i = 0; i < fechaInputs.length; i++) {
            fechaInputs[i].value = date;
        }
    }
</script>
@endsection