<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-ligth bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/blue.jpg" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/brand/blue.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('Mi perfil') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings"></i>
                        <span>{{ __('Ajustes') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-button-power"></i>
                        <span>{{ __('Salir') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">

            <li class="nav-item">
                    <a class="nav-link active" href="#navbar-atleta" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="ni ni-user-run"></i>
                        <span class="nav-link-text text-dark">{{ __('Atleta') }}</span>
                    </a>

                    <div class="collapse show" id="navbar-atleta">
                        <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('alumnos.index') }}">
                                    {{ __('Solicitudes') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('atletas.index') }}">
                                    {{ __('Listado de Atletas') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                <a class="nav-link active" href="#navbar-entrenador" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="ni ni-time-alarm"></i>
                        <span class="nav-link-text text-dark">{{ __('Entrenador') }}</span>
                    </a>
                    <div class="collapse show" id="navbar-entrenador">
                        <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('asistencias.create') }}">
                                    {{ __('Asistencia') }}
                                </a>
                            </li>
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('entrenadores.create') }}">
                                    {{ __('Registrar Entrenador') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('entrenadores.index') }}">
                                    {{ __('Listado de Entrenadores') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                <a class="nav-link active" href="#navbar-psico" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="ni ni-atom text-dark"></i>
                        <span class="nav-link-text text-dark">{{ __('Psicologia') }}</span>
                    </a>
                    <div class="collapse show" id="navbar-psico">
                        <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('terapias.create') }}">
                                    {{ __('Terapias') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('entrenadores.index') }}">
                                    {{ __('Registrar Piscologo') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('conf') }}">
                        <i class="ni ni-settings-gear-65 text-dark"></i>
                        <span class="nav-link-text text-dark">{{ __('Configuraciones') }}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('icons') }}">
                        <i class="ni ni-planet text-blue"></i> {{ __('Icons') }}
                    </a>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->

            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-bullet-list-67"style="color: #f4645f;"></i> Reporte EGD FOR31
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('edg-27.index') }}">
                        <i class="ni ni-bullet-list-67" style="color: #00c3ff;"></i> Reporte EGD FOR27
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('edg-27-2.index') }}">
                        <i class="ni ni-bullet-list-67"style="color: #fea735;"></i> Reporte EGD FOR27.2
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('asistencias.index') }}">
                        <i class="ni ni-bullet-list-67"></i> Reporte EGD FOR 30
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
