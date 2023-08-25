<!-- hero area -->
<div class="hero-area hero-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-2 text-center">
                <div class="hero-text">
                    <div class="hero-text-tablecell">
                        <p></p>
                        <h2 class="subtitle">Bienvenido</h2>
                        <h1>A Tu espacio</h1>
                        @php ($avatarLink = Storage::get(Auth::user()->avatar))
                        <img src="{{ $avatarLink }}" alt="Avatar" width="100px">
                        <div class="hero-btns">
                            @if(Auth::check() && (Auth::user()->rol === 'Administrador'))
                                <a href="{{ route('Carro') }}" class="boxed-btn"><i class="fas fa-shopping-cart"></i> Carro</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end hero area -->
