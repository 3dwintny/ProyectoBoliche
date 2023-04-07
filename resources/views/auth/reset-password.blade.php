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
                         RESTABLECER CONTRASEÑA
                        </strong>
                    </div>
            
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
            
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
            
                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
            
                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Correo')" />
            
                            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
            
                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />
            
                            <x-text-input id="password" class="form-control" type="password" name="password" required />
            
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
            
                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            
                            <x-text-input id="password_confirmation" class="form-control"
                                                type="password"
                                                name="password_confirmation" required />
            
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
            
                        <div class="text-center">
                            <button class="btn btn-warning" type="submit">{{ __('Reset Password') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        
        @endsection
