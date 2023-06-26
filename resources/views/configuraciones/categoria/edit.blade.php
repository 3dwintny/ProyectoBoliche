@extends('layouts.app')

@section('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!--div class="body pb-8 pt-5 pt-lg-1 d-flex align-items-center" style="background-image: url(../argon/img/theme/bol.jpg); background-size: cover; background-position: center top;"!-->
@include('layouts.headers.cards', ['texto' => 'Categorias'])
<div class="container-fluid mt--5">
    <div class="header-body text-center  mb-7">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8">
                <div class="card">
                    <div class="card-header text-bold ">
                        <strong>
                            <h2>Editar Categoría </h2>
                        </strong>
                    </div>
                <form method="post" role="form" enctype="multipart/form-data" action="{{route('categoria.update',encrypt($categoria->id))}}">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="card">
                        <div class="card-body bg-light">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="tipo" placeholder="Categoría" name="tipo" value="{{$categoria->tipo}}" required>
                                <label for="tipo">Categoría</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="rango_edades" placeholder="Rango de Edades" name="rango_edades" value="{{$categoria->rango_edades}}">
                                <label for="tipo">Rango de Edades</label>
                            </div>
                            <div class="container">
                                <div class="col-md-4 mb-10 center"><button type="submit" class="btn btn-outline-primary">Actualizar</button></div>
                            </div>
                </form>


            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection