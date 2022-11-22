<div class="std_pack_area">
    <div class="section-4-area std_pack_area_container">
        <div class="container">

            <div class="row justify-content-center mob-carosel-1">
                @foreach ($packages->packages as $package)
                    <div class="col-lg-3 col-md-6">
                        <div class="package">
                            <h5>{{ $package->title }}</h5>
                            <span class="pk-1">{{$package->internet_speed}}</span>
                            <span class="pk-2">Mbps</span><br>
                            <span class="pk-3"> ৳ {{$package->monthly_charges}}</span>
                            <span class="pk-4">per month</span>
                            <span class="pk-5">{{$package->vat_declaration}}</span>
                            <hr>
                            <span class="pk-6">{!! $package->features_1 !!}</span>
                            <span class="pk-7">{!! $package->features_2 !!}</span>
                            <div class="moz-value">
                                <span class="pk-8">{!! $package->features !!}</span>
                               
                            </div>
                            <div class="pk-btn">
                                <a class="btn" href="{{route('connectivity')}}">
                                Get Connectivity
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </div>

</div>
