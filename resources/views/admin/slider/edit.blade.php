@extends('layouts.app')

@section('content')

<div class="contaimer mt-5">
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <h5 class="alert alert-success">{{session('status')}}</h5>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4> Editar Slider
                        <a href="{{ url('slider') }}" class="btn btn-danger btn-sm float-right">Regresar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('slider.update',$slider->id) }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <label for="">Heading</label>
                            <input type="text" name="heading" value="{{$slider->heading}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" value="{{$slider->description}}" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Link</label>
                            <input type="text" name="link" value="{{$slider->link}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Link Nombre</label>
                            <input type="text" name="link_name" value="{{$slider->link_name}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Subir imagen</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ asset('uploads/slider/'.$slider->image) }}" width="100px" alt="Slider Image">
                        </div>
                        <div class="form-group">
                            <label for="">Estado</label>
                            <input type="checkbox"  name="status" value="{{$slider->status == '1' ? 'checked':''}}"> 0=visible, 1 hidden
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
