@extends('layouts.smile.master')

@section('content')


<div class="about_area">
    <div class="container-fluid">
       <div class="row">
          <div class="col-lg-6 col-md-6 pl-per pt-45">
             <nav aria-label="breadcrumb" class="sm-hide">
                <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                   <li class="breadcrumb-item active" aria-current="page">About</li>
                </ol>
             </nav>
             {{-- <div class="our_mission pt-125 pb-250">
                <h3>Our Mission</h3>
                <p>To bring out 64 districts, 492 upazilas and 4554 unions under our broadband network coverage and deliver most cost effective broadband solutions based on market demand.</p>
             </div> --}}

             @include('partials.mission')
          </div>
          <div class="col-lg-6 col-md-6 abt-bg-clr">
             {{-- <div class="our_vission pt-250 pb-250">
                <h3>Our Vision</h3>
                <p>To make the internet available and affordable to every household around the country.</p>
             </div> --}}
             @include('partials.vision')
          </div>
       </div>
    </div>
 </div>

 @include('partials.story')

 @include('partials.brands')
 




@endsection