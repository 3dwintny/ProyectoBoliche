@extends('layouts.app')

@section('content')
@include('layouts.headers.cards', ['texto' => 'Roles'])
<div class="container-fluid mt--4">
<div class="text-center">
    <div class="card">
        <div class="card-header">
            <h4> Crear Roles
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

            {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Nombre del Rol</label>
                        {!! Form::text('name', null, array('class' => 'form-control border-bottom')) !!}
                    </div>
                </div>
                <div>
                    <div class="form-group">
                        <div class="col-xs-4 col-sm-12 col-md-4 text-left mt--3">

                            <label class="badge text-bg-warning">Permisos para este rol</label>
                        </div>
                            <div class="row">
                            @foreach($permission as $value)

                                <div class="col-md-3">
                                    <label class="form-check">
                                        {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                        {{ $value->name }}
                                    </label>
                                </div>

                            @endforeach
                            </div>

                    </div>
                    <div class="container">

                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </div>
    @endsection