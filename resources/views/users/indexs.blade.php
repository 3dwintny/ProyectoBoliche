@extends('layouts.app')

@section('content')

<div class="header bg-gradient-dark py-7 py-lg-5">
    <div class="contaimer mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Usuarios
                        </h4>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-warning" href="{{ route('usuarios.create') }}">Nuevo</a>

                        <table class="table table-light mt-2">
                            <thead class="table table-dark mt-2">
                                <th style="display: none;">ID</th>
                                <th style="color:#fff;">Nombre</th>
                                <th style="color:#fff;">E-mail</th>
                                <th style="color:#fff;">Rol</th>
                                <th style="color:#fff;">Acciones</th>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                <tr>
                                    <td style="display: none;">{{ $usuario->id }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>
                                        @if(!empty($usuario->getRoleNames()))
                                        @foreach($usuario->getRoleNames() as $rolNombre)
                                        <h5><span class="badge badge-dark">{{ $rolNombre }}</span></h5>
                                        @endforeach
                                        @endif
                                    </td>

                                    <td>
                                        <a class="btn btn-info"
                                            href="{{ route('usuarios.edit',$usuario->id) }}">Editar</a>

                                        {!! Form::open(['method' => 'DELETE','route' => ['user.destroy',
                                        $usuario->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Centramos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $usuarios->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
