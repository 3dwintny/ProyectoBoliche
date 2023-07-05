@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-10 col-sm-6">
                    <h1 class="text-white">Preferencias</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@include('configuraciones.varnav')
<div class="container">
    <div class="row ">
        <div class="col-12">
            @if (session('status'))
            <h5 class="alert alert-success">{{session('status')}}</h5>
            @endif
            <form action="{{ route('slider.store') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div class="row container">
                    <div class="col-12 text-end">
                        <h4>Agregar elementos al slider</h4>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7">
                        <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Encabezado" name="heading">
                        <label for="floatingInput">Encabezado</label>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7">
                        <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Descripción" name="description">
                        <label for="floatingInput">Descripción</label>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Enlace" name="link">
                        <label for="floatingInput">Enlace</label>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7">
                        <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Nombre del enlace" name="link_name">
                        <label for="floatingInput">Nombre del enlace</label>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <div class="form-group">
                            <input type="file" name="image" class="form-control" placeholder="Subir Imagen">
                        </div>   
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                        <div class="form-group">
                            <label for="">Estado</label>
                            <input type="checkbox" name="status">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    
</div>

@endsection