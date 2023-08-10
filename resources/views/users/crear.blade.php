@extends('layouts.app')

@section('content')

<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-10 col-sm-6">
                    <h1 class="text-white">Usuarios</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@include('configuraciones.varnav')
<div class="card container-fluid mt-2">
    <div class="card-header">
        <h4>Nuevo </h4>
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-dark alert-dismissible fade show" role="alert">
            <strong>¡Revise los campos!</strong>
            @foreach ($errors->all() as $error)
            <span class="badge badge-danger">{{ $error }}</span>
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {!! Form::open(array('route' => 'usuarios.store','method'=>'POST')) !!}
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    {!! Form::text('name', null, array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="email">Correo</label>
                    {!! Form::email('email', null, array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    {!! Form::password('password', array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="confirm-password">Confirmar contraseña</label>
                    {!! Form::password('confirm-password', array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="">Rol</label>
                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>


@endsection