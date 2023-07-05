@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-10 col-sm-6">
                    <h1 class="text-white">Categorías</h1>
                </div>
            </div>
        </div>
    </div>
  </div>
<div class="container-fluid pt-2">
    <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-xl-6 col-lg-6 col-md-10 col-sm-8">
                <div class="card">
                    <div class="card-header text-bold ">
                        <strong>
                            <h2>Registrar nueva categoría</h2>
                        </strong>
                    </div>
                    <form method="post" role="form" enctype="multipart/form-data" action="{{route('categoria.store')}}">
                        @csrf
                        <div class="form-group">
                            <div>Fecha <input type="text" class=" container form-control text-center" name="fecha_registro" id="fecha_sistema" value="{{\Carbon\Carbon::parse($hoy)->format('d-m-Y')}}" readonly>
                        </div>
                        <div class="card">
                            <div class="card-body bg-light">
                                <div class="form-group{{ $errors->has('tipo') ? ' has-danger' : '' }}">
                                    <div class="form-floating mb-3">
                                        <input class="form-control {{ $errors->has('tipo') ? ' is-invalid' : '' }} text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Categoría') }}" id="tipo" type="text" name="tipo" value="{{ old('tipo') }}" required>
                                        <label for="tipo">Categoría</label>
                                    </div>
                                        
                                    @if ($errors->has('tipo'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('tipo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="rango_edades" placeholder="Rango de edades" name="rango_edades" value="{{old('rango_edades')}}">
                                    <label for="rango_edades">Rango de edades</label>
                                </div>
                                <div class="container">
                                    <div class="col-md-4 mb-10 center"><button type="submit" class="btn btn-outline-primary">Registrar</button></div>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection