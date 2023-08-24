<nav class="navbar navbar-default navbar-expand-lg fixed-top custom-navbar">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="icon ion-md-menu"></span>
    </button>
    <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid nav-logo-mobile" alt="Company Logo">
    <a class="nav-link">
        @auth
            {{Auth::user()->nombre}}
        @endauth
        <i class="icon ion-ios-arrow-forward icon-mobile"></i>
    </a>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <div class="container">
            <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid nav-logo-desktop" alt="Company Logo">
            <ul class="navbar-nav ml-auto nav-right" data-easing="easeInOutExpo" data-speed="1250" data-offset="65">
                <li class="nav-item nav-custom-link">
                    <a class="nav-link" href="{{route('principal')}}">Roles <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
                </li>
                <li class="nav-item nav-custom-link">
                    <a class="nav-link" href="{{route('Editar',['id' => Auth::user()->id])}}">Configuracion <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
                </li>
                <li class="nav-item nav-custom-link">

                </li>
                <li class="nav-item nav-custom-link btn btn-demo-small">

                    <a class="nav-link" href="{{ route('logout') }}">Salir <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
