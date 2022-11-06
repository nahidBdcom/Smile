@extends('layouts.smile.master')

@section('seo_meta')

        <title>{{ $homeContent["seo_titlle"] }}</title>
        <meta name="description" content="{{ $homeContent["meta_description"] }}">
        <meta name="keywords" content="{{ $homeContent["meta_keyword"] }}">
@endsection     

@section('social_media_meta')
        
        <meta property="og:url"                content="{{url()->current()}}" />
        <meta property="og:title"              content="{{ $homeContent["og_title"] }}" />
        <meta property="og:description"        content="{{ $homeContent["og_description"] }}" />
        <meta property="og:image"              content="{{ asset('storage/'.$homeContent["og_image"]) }}" />
        <meta property="og:type"               content="website" />

        <meta property="twitter:site"          content="{{url()->current()}}" />
        <meta property="twitter:title"         content="{{ $homeContent["og_title"] }}" />
        <meta property="twitter:description"   content="{{ $homeContent["og_description"] }}" />
        <meta property="twitter:image"         content="{{ asset('storage/'.$homeContent["og_image"]) }}" />
        <meta property="twitter:card"          content="summary" />

@endsection     

@section('content')
            <!-- Homepage Slider -->
            @include('partials.homepage_slider_partial') 
            <!-- Homepage Slider End -->

            @include('partials.features_section_partial')

            <!-- Homepage Packages Block -->
            @include('partials.home_package_plans_partial')
            <!-- Homepage Packages Block End -->

            <!-- Homepage Customized Solution Block -->
            @include('partials.customized_solution_partial')
            <!-- Homepage Customized Solution Block End -->

            <!-- Homepage SEO Content Block -->
            @include('partials.home_seo_partial',['seoContent' => $homeContent])
            <!-- Homepage SEO Content Block End -->

@endsection      
