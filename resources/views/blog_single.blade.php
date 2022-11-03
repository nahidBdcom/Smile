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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <style type="text/css">
        #social-links li{
            list-style: none;
            background: #ffffff;
            margin-left: 5px;
            text-align: center;
            border-radius:5px;
        }
        #social-links li span{
            font-size: 30px;
            color:lightgrey;
        }
        #social-links li span:hover{
            color: var(--smile-yellow);
        }
        #social-links ul li{
            display: inline-block;
            padding: 1px 1px 1px;
        }
        #social-links ul{
            display: inline-block;
            margin-bottom: 0px;
            padding-left: 0.5rem;
        }
        #social-links{
            float: left;
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
                <div class="col-12 single-blog-detail-body">
                    {!! $mainContent["body"] !!}

                </div>
                <div class="col-12 col-md-6 single-blog-share">
			@include('partials.social_share')
                </div>
                <div class="col-12 col-md-6 d-md-flex justify-content-md-end single-blog-previous-next">
                    @if (isset($previous))
                    <a class="btn btn-sm btn-outline-dark rounded-pill  me-md-2 d-flex justify-content-center align-items-center my-1" href="{{url("blog/".$previous["slug"])}}">Previous post</a>
                    @endif
                    @if (isset($next))
                    <a class="btn btn-sm btn-outline-dark rounded-pill d-flex justify-content-center align-items-center my-1" href="{{url("blog/".$next["slug"])}}">Next post</a>
                    @endif
                </div>
                
            </div>
        </div>

@endsection      



@section('additional-javascripts')
	<script src="{{ asset('assets/js/share.js') }}"></script>
    <script language="javascript">

    </script>
@endsection      
