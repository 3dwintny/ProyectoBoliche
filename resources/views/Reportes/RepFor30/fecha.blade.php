@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="header bg-dark pb-4 pt-5 pt-md-6 mt--5">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <h1 class="text-white">Editar asistencia</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-body pb-4 pt-5 pt-md-3">
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