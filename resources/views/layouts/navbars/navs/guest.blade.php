<nav class="navbar navbar-expand-lg" style="background-color: #f7f7f7;">
    <div class="container px-4">
        <!-- <a class=" navbar-brand" href="{{ route('index') }}">
            <img class="navbar-brand-img img-fluid" src="{{ asset('argon') }}/img/brand/federacion3.jpg" alt="logo">
        </a> -->
        <div class="col-2 collapse-brand">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img class="navbar-brand-img img-fluid" src="{{ asset('argon') }}/img/brand/federacion1.jpg" />
        </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('index') }}">
                            <img  class="navbar-brand-img img-fluid" src="{{ asset('argon') }}/img/brand/federacion1.jpg">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navbar items -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="{{ route('alumnos.create') }}">
                        <i class="ni ni-bullet-list-67"></i>
                        <span class="nav-link-inner--text">{{ __('Formulario de Inscripción') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="{{ route('register') }}">
                        <i class="ni ni-circle-08"></i>
                        <span class="nav-link-inner--text">{{ __('Registrar') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="{{ route('login') }}">
                        <i class="ni ni-key-25"></i>
                        <span class="nav-link-inner--text">{{ __('Ingresar') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
