@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
@include('users.partials.header', [
'title' => __('Hola') . ' '. auth()->user()->name,
'description' => __('Bienvenido a la Federacion Nacional de Boliche'),
'class' => 'col-lg-12'

])


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 col-xl-4">
                <div class="card bg-c-blue order-card">
                    <div class="card-block">
                        <h5>Usuarios</h5>
                        @php
                        use App\Models\User;
                        $cant_usuarios = User::count();
                        @endphp
                        <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_usuarios}}</span></h2>
                        <p class="m-b-0 text-right"><a href="{{ route('usuarios.index') }}" class="text-dark">Ver más</a></p>
                    </div>
                </div>
                </div>
                <div class="col-md-4 col-xl-4">
                    <div class="card bg-c-green order-card">
                        <div class="card-block">
                            <h5>Roles</h5>
                            @php
                            use Spatie\Permission\Models\Role;
                            $cant_roles = Role::count();
                            @endphp
                            <h2 class="text-right"><i class="fa fa-user-lock f-left"></i><span>{{$cant_roles}}</span>
                            </h2>
                            <p class="m-b-0 text-right"><a href="{{ route('roles.index') }}" class="text-dark">Ver más</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth')
</div>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
