@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-5 pt-md-5">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 col-lg-8 col-md-12 col-sm-12">
                    <h1 class="text-white">Editar código de correo</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-body pb-4 pt-5 pt-md-3">
    <div class="container text-center">
        @include('components.flash_alerts')
        <form class="row g-3 justify-content-center" method="POST" action="{{route('actualizarCodigoCorreo')}}" enctype="multipart/form-data" role="form">
            @csrf
            <div class="col-auto">
                <div class="form-floating">
                    <input type="text" value="{{$codigo}}" class="form-control form-control-sm" id="codigo_correo" name="codigo_correo" placeholder="Código de correo" required>
                    <label for="codigo_correo">Código de correo</label>
                </div>
            </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary mb-3">Aceptar</button>
            </div>
        </form>      
    </div>
</div>
@endsection