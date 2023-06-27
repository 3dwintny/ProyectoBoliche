@extends('layouts.app')
@section('content')

@include('layouts.headers.cards', ['texto' => 'Roles'])
    <div class="card-body">
        @can('crear-rol')
        <a class="btn btn-warning" href="{{ route('roles.create')  }}">Nuevo</a>
        @endcan
        <div class="container">
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
@endsection