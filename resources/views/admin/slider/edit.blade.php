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
<div class="container-fluid pt-2">
    <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12">
                @if (session('status'))
                    <h5 class="alert alert-success">{{session('status')}}</h5>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4> Editar slider
                            <a href="{{ url('slider') }}" class="btn btn-danger btn-sm float-right">Regresar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('slider.update',$slider->id) }}" method="POST" role="form" enctype="multipart/form-data">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <label for="">Encabezado</label>
                                <input type="text" name="heading" value="{{$slider->heading}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Descripción</label>
                                <textarea name="description" value="{{$slider->description}}" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Enlace</label>
                                <input type="text" name="link" value="{{$slider->link}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Nombre del enlace</label>
                                <input type="text" name="link_name" value="{{$slider->link_name}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Imagen</label>
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
</div>

@endsection
