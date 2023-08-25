<nav class="navbar navbar-default navbar-expand-lg fixed-top custom-navbar">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="icon ion-md-menu"></span>
    </button>
    @php ($avatarLink = Storage::get(Auth::user()->avatar))
    <img src="{{ $avatarLink }}" alt="Avatar" width="50px">
    <a class="nav-link">
        @auth
            {{Auth::user()->nombre}}
        @endauth
        <i class="icon ion-ios-arrow-forward icon-mobile"></i>
    </a>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <div class="container">

            <ul class="navbar-nav ml-auto nav-right" data-easing="easeInOutExpo" data-speed="1250" data-offset="65">
                <li class="nav-item nav-custom-link">
                    <a class="nav-link" href="{{route('principal')}}">Principal <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
                </li>
                @if(Auth::check() && (Auth::user()->rol === 'Administrador'))
                <li class="nav-item nav-custom-link">
                    <a class="nav-link" href="{{route('Otro')}}">Nosotros</a>
                </li>
                    <li class="nav-item nav-custom-link">
                        <a class="nav-link" href="{{route('Checar')}}">Checar</a>
                    </li>
                <li class="nav-item nav-custom-link">
                    <a class="nav-link" href="{{ route('Carro') }}">Carro <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
                </li>
                @elseif(Auth::check() && (Auth::user()->rol === 'Registrado'))
                    <li class="nav-item nav-custom-link">
                        <a class="nav-link" href="{{route('Otro')}}">Nosotros</a>
                    </li>
                    <li class="nav-item nav-custom-link">
                        <a class="nav-link" href="{{route('Checar')}}">Checar</a>
                    </li>
                @endif
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


