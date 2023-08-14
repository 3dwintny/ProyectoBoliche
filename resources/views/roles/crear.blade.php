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
    <div class="card">
        <div class="card-header text-center">
            <h4>Nuevo</h4>
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


            {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Nombre del rol</label>
                        {!! Form::text('name', null, array('class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-4 col-sm-12 col-md-4 text-left mt--3">

                        <label class="badge text-bg-warning">Permisos para este rol</label>
                    </div>
                    <div class="row">
                        @foreach($permission as $value)

                        <div class="col-md-5 col-lg-3 col-sm-12">
                            <label class="form-check">
                                {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                {{ $value->name }}
                            </label>
                        </div>

                        @endforeach
                    </div>

                </div>





            </div>
            <div class="container">

                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection