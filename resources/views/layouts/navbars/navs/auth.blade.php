
<nav class="navbar navbar-top navbar-expand-md navbar-dark mt--2" id="navbar-main">

    <div class="container-fluid">
        <!-- Brand -->
        <a class="h6 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('home') }}">{{ __('INICIO') }}</a>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('uploads') }}/alumnos/{{ auth()->user()->avatar }}" style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                        </span>
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Bienvenido!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="fa fa-key"></i>
                        <span>{{ __('Cambiar contraseña') }}</span>
                    </a>
                    @can('configuraciones')
                    <a href="{{route('otros')}}" class="dropdown-item">
                        <i class="ni ni-settings"></i>
                        <span>{{ __('Ajustes') }}</span>
                    </a>
                    @endcan
                    @can('administracion')
                    <a href="{{route('administradores.index')}}" class="dropdown-item">
                        <i class="fa fa-magic" aria-hidden="true"></i>
                        <span>{{ __('Administración') }}</span>
                    </a>
                    @endcan
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-button-power"></i>
                        <span>{{ __('Salir') }}</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>