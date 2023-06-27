@extends('layouts.app')

@section('content')

@include('layouts.headers.cards', ['texto' => 'Usuarios'])

<div class="card container-fluid mt-2">
    <div class="card-header">
        <h4> Crear nuevo usuario
        </h4>
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

        {!! Form::open(array('route' => 'usuarios.store','method'=>'POST')) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    {!! Form::text('name', null, array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    {!! Form::email('email', null, array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="password">Password</label>
                    {!! Form::password('password', array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="confirm-password">Confirmar Password</label>
                    {!! Form::password('confirm-password', array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="">Roles</label>
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