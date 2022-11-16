@extends('layouts.app')

@section('content')

<div class="header bg-gradient-dark py-7 py-lg-5">
    <div class="contaimer mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Roles
                        </h4>
                    </div>
                    <div class="card-body">
                        @can('crear-rol')
                        <a class="btn btn-warning" href="{{ route('roles.create')  }}">Nuevo</a>
                        @endcan
                        <table class="table table-light mt-2">
                            <thead class="table table-dark mt-2">
                                <th style="color:#fff ;">Rol</th>
                                <th style="color:#fff ;">Acciones</th>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @can('editar-rol')
                                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Editar</a>
                                        @endcan

                                        @can('eliminar-rol')
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
            </div>
        </div>
    </div>
</div>

@endsection
