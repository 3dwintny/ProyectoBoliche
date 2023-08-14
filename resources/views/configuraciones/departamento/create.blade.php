@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-10 col-sm-6">
                    <h1 class="text-white">Departamentos</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@include('configuraciones.varnav')
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
                            <h2>Nuevo</h2>
                        </strong>
                    </div>
                    <form method="post" role="form" enctype="multipart/form-data" action="{{route('departamentos.store')}}">
                        @csrf
                        <div class="card">
                            <div class="card-body bg-light">
                                <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                                    <div class="form-floating mb-3">
                                        <input class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }} text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Departamento') }}" id="nombre" type="text" name="nombre" value="{{ old('nombre') }}" required>
                                        <label for="nombre">Departamento</label>
                                    </div>
                                        
                                    @if ($errors->has('nombre'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('nombre') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="container">
                                    <div class="col-md-4 mb-10 center"><button type="submit" class="btn btn-outline-primary">Registrar</button></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection