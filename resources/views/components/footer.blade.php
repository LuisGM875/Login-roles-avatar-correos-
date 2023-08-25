<!-- footer -->
<div class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-box about-widget">
                    <h2 class="widget-title">About us</h2>
                    <p>Ut enim ad minim veniam perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box get-in-touch">
                    <h2 class="widget-title">Get in Touch</h2>
                    <ul>
                        <li>34/8, East Hukupara, Gifirtok, Sadan.</li>
                        <li>support@fruitkha.com</li>
                        <li>+00 111 222 3333</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box pages">
                    <h2 class="widget-title">Pages</h2>
                    <ul>
                        <li><a href="{{route('principal')}}">Principal</a></li>
                        @if(Auth::check() && (Auth::user()->rol === 'Administrador'))
                        <li><a href="{{route('Otro')}}">Nosotros</a></li>
                            <li><a href="{{route('Checar')}}">Checar</a></li>
                        <li><a href="{{ route('Carro') }}">Carro</a></li>
                        @elseif(Auth::check() && (Auth::user()->rol === 'Registrado'))
                            <li><a href="{{route('Otro')}}">Nosotros</a></li>
                            <li><a href="{{route('Checar')}}">Checar</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box subscribe">
                    <h2 class="widget-title">Subscribe</h2>
                    <p>Subscribe to our mailing list to get the latest updates.</p>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end footer -->
