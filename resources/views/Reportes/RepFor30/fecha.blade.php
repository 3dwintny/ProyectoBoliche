@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-10 col-sm-6">
                    <h1 class="text-white">Editar asistencia</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-body pt-2">
    <div class="container text-center">
        @include('components.flash_alerts')
        <form class="row g-3 justify-content-center" method="GET" action="{{route('modificarAsistencia')}}" enctype="multipart/form-data" role="form">
            @csrf
            <div class="col-auto">
                <div class="form-floating">
                    <input type="date" class="form-control form-control-sm" id="fecha" name="fecha" placeholder="Fecha" required>
                    <label for="fecha">Fecha</label>
                </div>
            </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary mb-3">Aceptar</button>
            </div>
        </form>      
    </div>
</div>
@endsection