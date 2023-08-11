<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-3">
        <div class="container">
            <a class="nav-link nav-link-icon" href="{{ route('conf') }}">
                <h3 class="text-dark">
                    Configuraciones
                    <small class="text-muted">Sistema</small>
                </h3>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav navbar-nav-hover ms-auto">
                    @can('Listar roles')
                    <div class="row">
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="{{ route('us') }}">
                                <i class="ni ni-circle-08"></i>
                                <span class="nav-link-inner--text">{{ __('Usuarios') }}</span>
                            </a>
                        </li>
                    </div>
                    @endcan

                    <div class="row">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('slider.index') }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ni ni-ui-04"></i>
                                <span class="nav-link-inner--text">{{ __('Slider') }}</span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('slider.index') }}">Ver</a></li>
                                <li><a class="dropdown-item" href="{{ route('slider.create') }}">Crear</a></li>
                            </ul>
                        </li>
                    </div>
                    <div class="row">
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="{{ route('otros') }}">
                                <i class="ni ni-world-2"></i>
                                <span class="nav-link-inner--text">{{ __('Otros') }}</span>
                            </a>
                        </li>
                    </div>
                    <div class="row">
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="{{ route('seguridad') }}">
                                <i class="fa fa-lock"></i>
                                <span class="nav-link-inner--text">{{ __('Seguridad') }}</span>
                            </a>
                        </li>
                    </div>
                    <div class="row">
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="{{ route('restaurar') }}">
                                <i class="fa fa-history" aria-hidden="true"></i>
                                <span class="nav-link-inner--text">{{ __('Restaurar') }}</span>
                            </a>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
</div>
