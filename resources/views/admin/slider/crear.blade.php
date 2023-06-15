@extends('layouts.app')

@section('content')
@include('layouts.headers.cards', ['texto' => 'Preferencias'])
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