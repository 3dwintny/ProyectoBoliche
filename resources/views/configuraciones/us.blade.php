@extends('layouts.app')
@section('content')
@include('layouts.headers.cards', ['texto' => 'Preferencias'])
@include('configuraciones.varnav')
<div class="container">
    <div>
        <h1 style="text-align: right;">USUARIOS</h1>
        <hr>
    </div>
</div>
<div class="col-8">
    <div class="row container-fluid mb-3">
        <div class="card">
            <div class="card-body justify-content-center">
                <div class="row">
                    <div class="col-md-4 col-xl-5">
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
                    <div class="col-md-4 col-xl-5">
                        <div class="card bg-c-green order-card">
                            <div class="card-block aling-end">
                                <h5 class="text-center">Roles</h5>
                                @php
                                use Spatie\Permission\Models\Role;
                                $cant_roles = Role::count();
                                @endphp
                                <h2 class="text-center"><i class="fa fa-user-lock f-left"></i><span>{{$cant_roles}}</span>
                                </h2>
                                <p class="m-b-0 text-center"><a href="{{ route('roles.index') }}" class="text-dark">Ver más</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection