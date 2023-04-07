@extends('layouts.app', ['class' => 'bg-default'])
@section('content')
@include('layouts.headers.guest')

<div class="container mt--9 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
            <div class="card bg-light shadow border-0">
                <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-center text-muted mb-4">
                        <strong>
                         RECUPERAR CONTRASEÑA
                        </strong>
                    </div>
                    <div class="mb-4 text-sm text-gray-600" style="text-align: justify;">
                        {{ __('¿Olvidaste tu contraseña? No hay problema. Ingresa tu correo electrónico y te enviaremos un link que te permitirá restablecerla.') }}
                    </div>
            
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
            
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
            
                        <!-- Email Address -->
                        <div class="text-center">
                            <x-input-label for="email" :value="__('Correo')" />
            
                            <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus>
            
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
            
                        <div class="text-center">
                            <button type="submit" class="btn btn" style="background-color:#fba313;">{{ __('Enviar link') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
