@extends('layouts.smile.master')

@section('seo_meta')

        <title>{{ $mainContent["seo_titlle"] }}</title>
        <meta name="description" content="{{ $mainContent["meta_description"] }}">
        <meta name="keywords" content="{{ $mainContent["meta_keyword"] }}">
@endsection     

@section('social_media_meta')
        
        <meta property="og:url"                content="{{url()->current()}}" />
        <meta property="og:title"              content="{{ $mainContent["og_title"] }}" />
        <meta property="og:description"        content="{{ $mainContent["og_description"] }}" />
        <meta property="og:image"              content="{{ asset('storage/'.$mainContent["og_image"]) }}" />
        <meta property="og:type"               content="website" />

        <meta property="twitter:site"          content="{{url()->current()}}" />
        <meta property="twitter:title"         content="{{ $mainContent["og_title"] }}" />
        <meta property="twitter:description"   content="{{ $mainContent["og_description"] }}" />
        <meta property="twitter:image"         content="{{ asset('storage/'.$mainContent["og_image"]) }}" />
        <meta property="twitter:card"          content="summary" />

@endsection     

@section('content')
        {{-- <div class="container-fluid smile-content-title d-flex align-items-center justify-content-center">
                <div class="row">
                        <div class="col-12">{{ $mainContent["title"] }}</div>
                </div>
        </div>
        <div class="container s-p-50">
                <div class="row">
                        <div class="col-12 col-md-6 smile-get-info-form-block s-pb-sm-50">
                                <p class="d-flex justify-content-center smile-info-form-head">Get Information</p>
                                @include('partials.contact_us_form')
                        </div>
                        <div class="col-12 col-md-6 smile-contact-address">
                                <p class="d-flex justify-content-center smile-con-HO ">Head office</p>
                                {!! $mainContent["description_excerpt"] !!}
                        </div>
                </div>
                <div class="row s-pt-50 zone-offices">
                        <div class="col-12 d-flex justify-content-center zone-office-top-head">
                                zone office
                        </div>
                        @foreach ($zoneOffices as $zoneOffice)
                        <div class="col-12 col-md-6 col-lg-4 zone office">
                                <p class="s-p-4 zone-office-name">{{ $zoneOffice["title"] }}</p>
                                <p class="s-p-4 zone-office-address">{{ $zoneOffice["address"] }}</p>
                        </div>        
                        @endforeach
                </div>
        </div> --}}

        <div class="breadcrumb_area">
                <div class="container">
                   <div class="row">
                      <nav aria-label="breadcrumb">
                         <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                         </ol>
                      </nav>
                   </div>
                </div>
             </div>

        {{-- @include("partials.homepage_contact_form") --}}
         
        @include("partials.contact_info")
        
        @include("partials.mobile_contact_info")

        @include("partials.dhaka_offices")

@endsection      
