@extends('layouts.app')
@section('content')
<<<<<<< HEAD
<div class="header bg-dark pb-3 pt-5 pt-md-10">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <h2 class="text-white">Preferencias</h2>
=======

<div class="contaimer mt-5">
    <div class="row">
    <div class="col-md-12">
            @if (session('status'))
                <h5 class="alert alert-success">{{session('status')}}</h5>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4> Agregar Slider
                        <a href="{{ url('slider') }}" class="btn btn-danger btn-sm float-right">Regresar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('slider.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Heading</label>
                            <input type="text" name="heading" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id="" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Link</label>
                            <input type="text" name="link" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Link Nombre</label>
                            <input type="text" name="link_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Subir imagen</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Estado</label>
                            <input type="checkbox" name="status"> 0=visible, 1=hidden
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
>>>>>>> 7c9b408d4b9e3bef3a707cbf861bb6c90ecbf07f
                </div>
            </div>
        </div>
    </div>
</div>
@include('configuraciones.varnav')
<div class="container mt--2">
    <div class="row ">
        <div class="col-md-12">
            @if (session('status'))
            <h5 class="alert alert-success">{{session('status')}}</h5>
            @endif
            <form action="{{ route('slider.store') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div class="row container">
                <div class="col-3">
                    <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Heading" name="heading">
                    <label for="floatingInput">Heading</label>
                    </div>
                </div>
                <div class="col-9 text-end"><h4>Agregar elementos al slider</h4></div>
                </div>
                
                <div class="col-7">
                    <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Description" name="description">
                    <label for="floatingInput">Description</label>
                    </div>
                </div>
                <div class="col-7">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Description" name="link">
                    <label for="floatingInput">Link</label>
                    </div>
                </div>
                <div class="col-7">
                    <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Link Nombre" name="link_name">
                    <label for="floatingInput">Link Nombre</label>
                    </div>
                </div>
                <div class="col-7">
                    <div class="form-group">
                        <input type="file" name="image" class="form-control" placeholder="Subir Imagen">
                    </div>
                    
                </div>
                <div class="col-7">
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
            </form>

        </div>
    </div>
    
</div>

@endsection