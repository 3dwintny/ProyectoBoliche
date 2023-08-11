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
<div class="card-body">
    <div class="container pt-2">
        @can('Crear roles')
            <a class="btn btn-warning" href="{{ route('roles.create')  }}">Nuevo</a>
        @endcan
    </div>
    <div class="container">
        <table class="table table-responsive mt-2">
            <thead class="table table-dark mt-2">
                <th style="color:#fff ;">Rol</th>
                <th style="color:#fff ;">Acciones</th>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>
                        @can('Editar roles')
                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Editar</a>
                        @endcan

                        @can('Eliminar roles')
                        {!! Form::open(['method'=> 'DELETE', 'route' => ['roles.destroy', $role->id], 'style'=>'display:inline'])!!}
                        {!! Form::submit('Eliminar', ['class' => 'btn btn-danger'])!!}
                        {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection