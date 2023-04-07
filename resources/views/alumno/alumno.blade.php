@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
<!-- <script type="text/javascript" src="https:cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script> -->
<!-- <script>
    $(function(){
        /* Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla */
        $("#adicional").on('click', function(){
            $("#tabla tbody tr:eq(0)").clone().removeClass('filas-fija').appendTo("#tabla")
                });
                /*  Evento que selecciona la fila y la elimina */
                $(document).on("click",".eliminar",function(){
                    var parent = $(this).parents().get(0);
                    $(parent).remove();
                })
    })
</script> -->

<div class="header bg-gradient-white py-4 py-lg-8">



    <div class="body pb-8 pt-5 pt-lg-1 d-flex align-items-center">
        <!--div class="body pb-8 pt-5 pt-lg-1 d-flex align-items-center" style="background-image: url(../argon/img/theme/bol.jpg); background-size: cover; background-position: center top;"!-->
        <div class="container-fluid">
            <div class="header-body text-center mt-2 mb-2">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-8">
                        <div class="card">
                            <div class="card-header text-bold ">
                                <strong>
                                    <h1> Formulario de Inscripción</h1>
                                </strong>
                                {{-- <div class="progress">
                                    <div class="progress-bar progress-bar-striped active"
                                        style="background-color: primary ;" role="progressbar" aria-valuemin="0"
                                        aria-valuemax="100">
                                    </div>
                                </div> --}}
                            </div>
                            <div class="card-body bg-light">
                                @foreach($formularios as $item)
                                <label>
                                    {{$item->titulo_principal}} {{$item->año_logo}}
                                </label>
                                <br>
                                <label>{{$item->subtitulo}}</label>
                                <br>
                                <label>{{$item->titulo_ficha}}</label>
                                @endforeach
                                <!-- <input type="text" class="form-control text-center" name="fecha_registro" id="fecha_sistema" readonly> -->
                            </div>
                                 {{-- Ingreso del formulario que se usara para la generacino de los
                            de datos para la inscripcion de los alumnos --}}
                            <div class="card-header text-bold ">
                                @livewire('formulario')

                            </div>
                            {{-- <div class="card-header text-bold">
                                @livewire('edwin')
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
    </script>
    <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
            xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
</div>
@endsection
