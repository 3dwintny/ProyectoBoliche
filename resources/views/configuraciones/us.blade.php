@extends('layouts.app')
@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-10 col-sm-6">
                    <h1 class="text-white">Preferencias</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@include('configuraciones.varnav')
<div class="container">
    <div>
        <h1 style="text-align: right;">USUARIOS</h1>
        <hr>
    </div>
</div>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row container-fluid mb-3">
        <div class="card">
            <div class="card-body justify-content-center">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <div class="card bg-c-blue order-card">
                            <div class="card-block">
                                <h5 class="text-center">Usuarios</h5>
                                @php
                                use App\Models\User;
                                $cant_usuarios = User::count();
                                @endphp
                                <h2 class="text-center"><i class="fa fa-users f-left"></i><span>{{$cant_usuarios}}</span></h2>
                                <p class="m-b-0 text-center"><a href="{{ route('usuarios.index') }}" class="text-dark">Ver más</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <div class="card bg-c-green order-card">
                            <div class="card-block aling-end">
                                <h5 class="text-center">Roles</h5>
                                @php
                                    use Spatie\Permission\Models\Role;
                                    $cant_roles = Role::count();
                                    try{
                                        $roles = Role::all();
                                    }
                                    catch(\Exception $e){
                                        return back()->with('error', 'Se produjo un error al procesar la solicitud');
                                    }
                                @endphp
                                <h2 class="text-center"><i class="fa fa-user-lock f-left"></i><span>{{$cant_roles}}</span>
                                </h2>
                                <p class="m-b-0 text-center">
                                    <button type="button" class="btn btn-link" style="color: rgba(2, 0, 28, 0.806);" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Ver más
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Roles</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
                <div class="header-body text-center">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-8">
                            <table class="table table-responsive">
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
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            @can('crear-rol')
                <a class="btn btn-warning" href="{{ route('roles.create') }}">Nuevo</a>
            @endcan
        </div>
      </div>
    </div>
</div>
@endsection