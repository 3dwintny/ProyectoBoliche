@extends('layouts.app')

@section('content')

<div class="header bg-dark pb-4 pt-5 pt-md-6">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <h1 class="text-white">Usuarios</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card container">
  <div class="table-responsive container">
  <a class="btn btn-light" href="{{ route('usuarios.create') }}">Nuevo</a>
    <table class="table align-items-center mb-0" >
      <thead class="container">
        <tr>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Usuario</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Rol</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acciones</th>
          <th class="text-secondary opacity-7"></th>
        </tr>
      </thead>
      <tbody>
      @foreach ($usuarios as $usuario)
        <tr>
        <td class="align-middle text-left text-sm">
            <span class="">{{ $usuario->id }}</span>
          </td>
          <td>
            <div class="d-flex px-2 py-1">
              <div>
                <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-2.jpg" class="avatar avatar-sm me-3">
              </div>
              <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-xs">{{ $usuario->name }}</h6>
                <p class="text-xs text-secondary mb-0">{{ $usuario->email }}</p>
              </div>
            </div>
          </td>
          <td class="text-left">
          @if(!empty($usuario->getRoleNames()))
                @foreach($usuario->getRoleNames() as $rolNombre)
            <p class="text-xs font-weight-bold mb-0">{{ $rolNombre }}</p>
            @endforeach
            @endif 
            <p class="text-xs text-secondary mb-0">Federeacion de boliche</p>
          </td>
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-normal">23/04/18</span>
          </td>
          <td class="align-middle">
            <a href="{{ route('usuarios.edit',$usuario->id) }}" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Edit user">
              Edit
            </a>
            {!! Form::open(['method' => 'DELETE','route' => ['user.destroy',
                                        $usuario->id],'style'=>'display:inline']) !!}
          </td>
        </tr>

        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
