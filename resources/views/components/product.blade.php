<!-- product section -->
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Our</span> Products</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <img src="assets2/img/products/product-img-1.jpg" alt="">
                    </div>
                    <h3>Strawberry</h3>
                    <p class="product-price"><span>Per Kg</span> 85$ </p>
                    @if(Auth::user() && Auth::user()->rol === 'Administrador')
                        <a href="{{ route('Carro') }}" class="boxed-btn"><i class="fas fa-shopping-cart"></i>Carro</a>
                    @endif

                </div>
            </div>
            <div class="col-lg-4 col-md-6 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <img src="assets2/img/products/product-img-2.jpg" alt="">
                    </div>
                    <h3>Berry</h3>
                    <p class="product-price"><span>Per Kg</span> 70$ </p>
                    @if(Auth::user() && Auth::user()->rol === 'Administrador')
                        <a href="{{ route('Carro') }}" class="boxed-btn"><i class="fas fa-shopping-cart"></i>Carro</a>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <img src="assets2/img/products/product-img-3.jpg" alt="">
                    </div>
                    <h3>Lemon</h3>
                    <p class="product-price"><span>Per Kg</span> 35$ </p>
                    @if(Auth::user() && Auth::user()->rol === 'Administrador')
                        <a href="{{ route('Carro') }}" class="boxed-btn"><i class="fas fa-shopping-cart"></i>Carro</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end product section -->
