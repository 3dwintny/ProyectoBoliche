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
                    <h1 class="text-white">Etapa Deportiva</h1>
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
                            <h2> Registrar Nueva Etapa Deportiva </h2>
                        </strong>

                    </div>
                <form method="post" role="form" enctype="multipart/form-data" action="{{route('etapadeps.store')}}">
                    @csrf
                    <div class="form-group">
                        <div>Fecha <input type="text" class=" container form-control text-center" name="fecha_registro" id="fecha_sistema" value="{{$hoy}}" readonly>
                    </div>
                    <div class="card">
                        <div class="card-body bg-light">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nombre" placeholder="Etapa Deportiva" name="nombre" required>
                                <label for="nombre">Descripcion</label>
                            </div>
                            <div class="container">
                                <div class="col-md-4 mb-10 center"><button type="submit" class="btn btn-outline-primary">Registar</button></div>
                            </div>
                </form>


            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection