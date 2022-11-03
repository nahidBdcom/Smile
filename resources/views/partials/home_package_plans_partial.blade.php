<div class="container-fluid s-py-50 smile-main-bg-dark">
    <div class="container text-center home-package-container">
        <h1 class="font-weight-light s-pb-50 m-0 package-container-header">Package Plans</h1>
        <div class="row mx-auto my-auto justify-content-center">
            <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    @foreach ($packages as $package)
                        @if ($loop->first)
                    <div class="carousel-item smile-package active">
                        @else
                    <div class="carousel-item smile-package">        
                        @endif  
                        <div class="col-md-6 col-lg-4">
                            <div class="card smile-card">
                                <div class="card shadow-sm border-light">
                                    <div class="card-header py-3 smile-package-card-head border-primary">
                                        <h4 class="my-0 fw-bolder">{{ $package->title }}</h4>
                                    </div>
                                    <div class="card-body container-fluid home-package-main-info-body">
                                        <div class="row p-0 m-0 home-package-main-info-row">
                                            <div class="col-7 p-0">
                                                <h2 class="package-attribute">internet</h2>
                                                <h1 class="card-title internet-pricing-title">{{ $package->internet_speed }}</h1>
                                                <p class="package-attribute-slogan">{{ $package->internet_description }}</p>
                                                <h2 class="package-attribute">bdix</h2>
                                                <h1 class="card-title internet-pricing-title">{{ $package->bdix_speed }}</h1>
                                                <p class="package-attribute-slogan">{{ $package->bdix_description }}</p>
                                            </div>
                                            <div class="col-5 p-0 d-flex justify-content-center align-items-center">
                                                <img src="{{ asset("storage/".$package->home_logo) }}" class="home-smile-package-logo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body home-package-features-card">
                                        {!! $package->features !!}                                    
                                    </div>
                                    <div class="card-footer container-fluid home-package-footer">
                                        <div class="row align-middle">
                                            <div class="col-6 p-0 d-flex justify-content-center align-items-center">
                                                <span class="card-footer-big-taka-up"><sup>৳</sup></span>
                                                <span class="card-footer-big-taka-amount">{{ $package->monthly_charges }}</span>
                                                <span class="card-footer-big-taka-others">/Month</span>
                                            </div>
                                            <div class="col-6 p-0 d-flex justify-content-center align-items-center">
                                                <a class="btn rounded-pill get-package" href="{{ url($package->booking_link) }}">Get it now </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>
</div>
