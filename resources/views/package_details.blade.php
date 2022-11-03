@extends('layouts.smile.master')

@section('seo_meta')

        <title>{{ $package["seo_titlle"] }}</title>
        <meta name="description" content="{{ $package["meta_description"] }}">
        <meta name="keywords" content="{{ $package["meta_keyword"] }}">
@endsection     

@section('social_media_meta')
        
        <meta property="og:url"                content="{{url()->current()}}" />
        <meta property="og:title"              content="{{ $package["og_title"] }}" />
        <meta property="og:description"        content="{{ $package["og_description"] }}" />
        <meta property="og:image"              content="{{ asset('storage/'.$package["og_image"]) }}" />
        <meta property="og:type"               content="website" />

        <meta property="twitter:site"          content="{{url()->current()}}" />
        <meta property="twitter:title"         content="{{ $package["og_title"] }}" />
        <meta property="twitter:description"   content="{{ $package["og_description"] }}" />
        <meta property="twitter:image"         content="{{ asset('storage/'.$package["og_image"]) }}" />
        <meta property="twitter:card"          content="summary" />

@endsection     


@section('content')
    <div class="container-fluid smile-content-title d-flex align-items-center justify-content-center">
        <div class="row">
                <div class="col-12">{{ $package["title"] }}</div>
        </div>
    </div>

    <div class="container s-pt-50 smile-package-details ">
        <div class="row d-flex align-items-center package-details-main-info-body">
                <div class="col-12 col-md-4 p-0 d-flex justify-content-center align-items-center">
                        <img src="{{ asset("storage/".$package->logo) }}" class="smile-package-detail-logo">
                </div>
                
                <div class="col-12 col-md-4 smile-package-details-speed">
                        <h2 class="package-attribute">internet</h2>
                        <h1 class="card-title internet-pricing-title">{{ $package->internet_speed }}</h1>
                        <p class="package-attribute-slogan">{{ $package->internet_description }}</p>
                        <h2 class="package-attribute">bdix</h2>
                        <h1 class="card-title internet-pricing-title">{{ $package->bdix_speed }}</h1>
                        <p class="package-attribute-slogan">{{ $package->bdix_description }}</p>
                </div>
                <div class="col-12 col-md-4">
                        <span class="package-detail-price-currency"><sup>৳</sup></span>
                        <span class="package-detail-price-amount">{{ $package->monthly_charges }}</span>
                        <span class="package-detail-price-duration">/Month</span>
                        <P class="package-detail-price-vat">{{ $package->vat_declaration }}</P>
                        <p><a class="btn rounded-pill package-detail-get-package" href="{{ url($package->booking_link) }}">Get it now &blacktriangleright;</a></p>
                        <span class="package-detail-features">{!! $package->features !!}</span>

                </div>
        </div>
    </div>
            

            @include('partials.features_section_partial')

            @if($faqs->count())
            <!-- FAQ 12 Block -->
            @include('partials.faqs_4',['title' => "FREQUENTLY ASKED QUESTIONS"])
            <!-- FAQ 12 Block End -->
            @endif
            <!-- Customized Solution Block -->
            @include('partials.customized_solution_partial')
            <!-- Customized Solution Block End -->

            <!-- SEO Content Block -->
            @include('partials.home_seo_partial',['seoContent' => $package])
            <!-- SEO Content Block End -->

@endsection      
