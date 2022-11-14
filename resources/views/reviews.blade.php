@extends('layouts.smile.master')


@section('content')


<div class="breadcrumb_area">
    <div class="container">
       <div class="row">
          <nav aria-label="breadcrumb">
             <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">UserReview</li>
             </ol>
          </nav>
       </div>
    </div>
 </div>


 @include('partials.review_sub')

 {{-- <div class="row align-items-end">
    <div class="col-lg-6 col-md-6">
       <a class="btn mt-55" href="#">
          Post review
          <i class="fa fa-solid fa-chevron-right btn-icon ml-15"></i>
       </a>
    </div>
    <div class="col-lg-6 col-md-6">
       <nav aria-label="Page navigation example">
          <ul class="pagination">
             <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                </a>
             </li>
             <li class="page-item"><a class="page-link" href="#">1</a></li>
             <li class="page-item"><a class="page-link" href="#">2</a></li>
             <li class="page-item"><a class="page-link" href="#">3</a></li>
             <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                </a>
             </li>
          </ul>
       </nav>
    </div>
 </div> --}}


</div>

@endsection