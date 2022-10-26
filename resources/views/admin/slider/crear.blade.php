@extends('layouts.app')

@section('content')

<div class="content">
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
                            <input type="checkbox" name="status">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                        
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection