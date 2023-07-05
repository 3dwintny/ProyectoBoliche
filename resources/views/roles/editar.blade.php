@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-10 col-sm-6">
                    <h1 class="text-white">Roles</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@include('configuraciones.varnav')
<div class="container-fluid pt-2">
<div class="text-center">
    <div class="card">
        <div class="card-header">
            <h4> Editar rol
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
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Nombre del Rol</label>
                        {!! Form::text('name', null, array('class' => 'form-control border-bottom')) !!}
                    </div>
                </div>
                <div>
                    <div class="form-group">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 text-left">
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

                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </div>
    @endsection