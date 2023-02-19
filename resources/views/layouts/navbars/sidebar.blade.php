<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-light" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/federacion1.jpg" class="navbar-brand-img img-fluid" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/brand/federacion2.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Bienvenido!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('Mi perfil') }}</span>
                    </a>
                    @can('configuraciones')
                    <a href="{{route('otros')}}" class="dropdown-item">
                        <i class="ni ni-settings"></i>
                        <span>{{ __('Ajustes') }}</span>
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
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/federacion1.jpg" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                            aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended"
                        placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->

            <ul class="navbar-nav">
                @can('SeedAtletas')
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-atleta" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="ni ni-user-run"></i>
                        <span class="nav-link-text text-dark">{{ __('Atleta') }}</span>
                    </a>

                    <div class="collapse show" id="navbar-atleta">
                        <ul class="nav nav-sm flex-column">
                        @can('solicitud-Atletas')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('alumnos.index') }}">
                                    {{ __('Solicitudes') }}
                                </a>
                            </li>
                            @endcan
                            @can('listado-Atletas')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('atletas.index') }}">
                                    {{ __('Atletas') }}
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li>
                @endcan
                @can('seedEntrenador')
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-entrenador" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="fa fa-stopwatch"></i>
                        <span class="nav-link-text text-dark">{{ __('Entrenador') }}</span>
                    </a>
                    <div class="collapse show" id="navbar-entrenador">
                        <ul class="nav nav-sm flex-column">
                            @can('crear-EDG-31-Asistencia')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('asistencias.create') }}">
                                    {{ __('Asistencia') }}
                                </a>
                            </li>
                            @endcan
                            @can('registrar-Entrenadores')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('entrenadores.create') }}">
                                    {{ __('Registrar Entrenador') }}
                                </a>
                            </li>
                            @endcan
                            @can('ver-Entrenadores')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('entrenadores.index') }}">
                                    {{ __('Entrenadores') }}
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li>
                @endcan
                @can('seedPsicologia')
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-psico" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="ni ni-atom text-dark"></i>
                        <span class="nav-link-text text-dark">{{ __('Psicología') }}</span>
                    </a>
                    <div class="collapse show" id="navbar-psico">
                        <ul class="nav nav-sm flex-column">
                            @can('crearTerapias')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('terapias.create') }}">
                                    {{ __('Nueva Terapia') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('terapias.index') }}">
                                    {{ __('Control de Terapias') }}
                                </a>
                            </li>
                            @endcan
                            @can('ver-Psicologos')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('psicologia.create') }}">
                                    {{ __('Registrar Piscólogo') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('psicologia.index') }}">
                                    {{ __('Piscólogos') }}
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li>
                @endcan('can')
                @can('configuraciones')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('conf') }}">
                        <i class="ni ni-settings-gear-65 text-dark"></i>
                        <span class="nav-link-text text-dark">{{ __('Configuraciones') }}</span>
                    </a>
                </li>
                @endcan
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->

            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                @can('ver-EDG-30')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('edg-31.index')}}">
                        <i class="ni ni-bullet-list-67" style="color: #f4645f;"></i> Reporte EGD FOR31
                    </a>
                </li>
                @endcan
                @can('ver-EDG-27')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('edg-27.index') }}">
                        <i class="ni ni-bullet-list-67" style="color: #00c3ff;"></i> Reporte EGD FOR27
                    </a>
                </li>
                @endcan
                @can('ver-EDG-27-2')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('edg-27-2.index') }}">
                        <i class="ni ni-bullet-list-67" style="color: #fea735;"></i> Reporte EGD FOR27.2
                    </a>
                </li>
                @endcan
                @can('ver-EDG-31-Asistencia')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('asistencias.index') }}">
                        <i class="ni ni-bullet-list-67"></i> Reporte EGD FOR 30
                    </a>
                </li>
                @endcan
            </ul>
        </div>
    </div>
</nav>
