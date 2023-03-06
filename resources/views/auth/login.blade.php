@extends('layouts.app', ['class' => 'bg-default'])
@section('content')
@include('layouts.headers.guest')
    <div class="container mt--9 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                @include('components.flash_alerts')
                <div class="card bg-light shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <strong>
                             INICIAR SESIÓN
                            </strong>
                        </div>
                        <form role="form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Correo') }}" type="email" name="email" value="{{ old('email') }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-danger':''}}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Contraseña') }}" type="password"  required>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn" style="background-color:#fba313;">{{ __('Ingresar') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-light">
                                <small>{{ __('¿Olvidaste tu contraseña?') }}</small>
                            </a>
                        @endif
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{ route('register') }}" class="text-light">
                            <small>{{ __('Regístrate') }}</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
