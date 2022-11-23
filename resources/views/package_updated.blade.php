@extends("layouts.smile.master")

@section('content')


<div class="breadcrumb_area">
    <div class="container">
           <div class="row">
           <nav aria-label="breadcrumb">
             <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">{{$packages->title}}</li>
             </ol>
           </nav>
         </div>
     </div>
 </div>






 @include("partials.feature_1")

 @include("partials.package_info")

 @include("partials.package_faqs")

 @include("partials.feature_2")


@endsection
