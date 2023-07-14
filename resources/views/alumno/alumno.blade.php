@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
<div class="header bg-gradient-white py-4 py-lg-8">



    <div class="body pb-8 pt-5 pt-lg-1 d-flex align-items-center">
        <div class="container-fluid">
            <div class="header-body text-center mt-2 mb-2">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-8">
                        <div class="card">
                            <div class="card-header text-bold ">
                                <strong>
                                    <h1> Formulario de inscripción</h1>
                                </strong>
                            </div>
                            <div class="card-body bg-light">
                                @foreach($formularios as $item)
                                <label>
                                    {{$item->titulo_principal}} {{$anio}}
                                </label>
                                <br>
                                <label>{{$item->subtitulo}}</label>
                                <br>
                                <label>{{$item->titulo_ficha}}</label>
                                @endforeach
                            </div>
                            <div class="card-header text-bold ">
                                <livewire:formulario-alumno>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
    </script>
    <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
</div>
@endsection
