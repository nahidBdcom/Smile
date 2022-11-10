@extends('layouts.smile.master')

@section('seo_meta')

        <title>{{ $mainContent["seo_titlle"] }}</title>
        <meta name="description" content="{{ $mainContent["meta_description"] }}">
        <meta name="keywords" content="{{ $mainContent["meta_keyword"] }}">
@endsection     

@section('social_media_meta')

        @include('partials.social_media_meta')
@endsection     



@section('additional-style')
    <style>
        .accordion-button::after {
            background-image: none !important;
        }

        .accordion-button:not(.collapsed) {
            color:#212529; 
            background-color: #fff;
            box-shadow: inset 0 -1px 0 rgb(255 240 0 / 75%);
        }
        
        .accordion-item {
            border: 0;
            border-bottom: 1px solid rgba(255,240,0,.75);
        }

        .accordion-button{
            padding:5px 0 5px 0;
        }
    </style>
@endsection



@section('content')
        <div class="container-fluid smile-content-title d-flex align-items-center justify-content-center">
                <div class="row">
                        <div class="col-12">{{ $mainContent["title"] }}</div>
                </div>
        </div>
        <div class="container s-pt-50">
            <div class="row">
                
                    {!! $mainContent["description_excerpt"] !!}
                
            </div>
        </div>

        <div class="container s-pt-50 s-pb-50">
            <h3>BROADBAND NETWORK COVERAGE</h3>
            <div class="accordion" id="accordionNetworkCoverages">
                @foreach ($networkCoverages as $item)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading{{ $item->id }}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $item->id }}" aria-expanded="true" aria-controls="collapse{{ $item->id }}">
                        {{ $item->title }}
                    </button>
                  </h2>
                  <div id="collapse{{ $item->id }}" class="accordion-collapse collapse " aria-labelledby="heading{{ $item->id }}" data-bs-parent="#accordionNetworkCoverages">
                    <div class="accordion-body">
                        {!! $item->description !!}
                    </div>
                  </div>
                </div>
                @endforeach
                
            </div>
        </div>
@endsection      



@section('additional-javascripts')

@endsection      

