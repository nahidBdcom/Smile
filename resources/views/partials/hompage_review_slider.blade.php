@section('additional-style-reviews')
<link href="{{asset('assets/css/update/select2.min.css')}}" rel="stylesheet" />

<style>
    .select2-container .select2-selection--single {
        height: 43px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 42px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 39px;
        position: absolute;
        top: 1px;
        right: 1px;
        width: 20px;
    }

    .select2-container .select2-selection--single .select2-selection__rendered .text-end {
        text-align: left!important;
    }

    {{--  .text-end {
        text-align: right!important;
    }  --}}
</style>
@endsection

<div class="section-5-area">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7 col-md-6">
                <h3>{!! setting('site.user_review_title') !!}</h3>
                <p class="sml-filter-1">{!! setting('site.user_review_description') !!}</p>
            </div>
            <div class="col-lg-5 col-md-6 text-end">
                <p class="sml-filter">Filter</p>

                <form action="#">
                    <div class="todropdown new-cus-test">
                        <select class="form-select cus-sl-fl getDistrict select2" id="filterByColor" style="height:40px" onchange="getDistrictWiseRatedUser();">
                            <option value="" selected >District</option>
                            @foreach ($districts as $district)
                                <option value="{{$district->id}}">{{$district->name}}</option>
                            @endforeach
                        </select>

                        {{--  <input type="text" class="form-control d-none" placeholder="Search cards" aria-label="Search cards" onkeyup="searchFilter()">  --}}
                        <select class="form-select cus-sl-fl ml-15 new-rat getRating" id="" onchange="getDistrictWiseRatedUser();">
                            <option value="" selected >Ratings</option>
                            <option value="5">5 Star</option>
                            <option value="4">4 Star</option>
                            <option value="3">3 Star</option>
                            <option value="2">2 Star</option>
                            <option value="2">1 Star</option>
                        </select>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container sub-section-rating">
        <div class="row test-slider-active">
            @foreach ($customerReviews as $customerReview)
                <div class="col-lg-3 col-sm-12">
                    <img class="test-icon img-fluid" src="{{asset('/storage/'.$customerReview->customer->photo)}}" alt="">
                    <div class="dart-box">
                        @for($i = 1; $i <= $customerReview->ratings; $i++)
                            <i class="fas fa-star" aria-hidden="true"></i>
                        @endfor

                        {{-- <span class="date-2 collapse" id="collapseWidthExample111"> This is some placeholder content for a horizontal collapse. It's hidden by default and shown when triggered. </span> --}}
                        {{-- <a class="sml-rm-text" data-toggle="collapse" href="#collapseWidthExample111" aria-expanded="false" aria-controls="collapseWidthExample">Read more</a> --}}

                        <p class="date">{{$customerReview->review_date}}</p>
                        <span class="date-2">{!! $customerReview->description !!}</span>
                        <span class="date-2 collapse" id="collapseWidthExample{{$customerReview->id}}"> {!! $customerReview->description_more !!} </span>
                        <a class="sml-rm-text" data-toggle="collapse" href="#collapseWidthExample{{$customerReview->id}}" aria-expanded="false" aria-controls="collapseWidthExample{{$customerReview->id}}">Read more</a>


                        <p class="date-3">{{$customerReview->customer->name}}</p>
                        <p class="date-4">{{$customerReview->customer->district->name}}</p>
                    </div>
                </div>
             @endforeach
        </div>
        <a class="btn mt-55" href="#"> Post review
          <i class="fa fa-solid fa-chevron-right btn-icon ml-15"></i>
       </a>
    </div>
</div>

@section('additional-javascripts-reviews')
<script src="{{asset('assets/js/update/select2.min.js')}}"></script>
<script>
   $(document).ready(function() {
       $('.select2').select2();
   });

   function getDistrictWiseRatedUser(){
       let district = $('.getDistrict').val();
       let rating = $('.getRating').val();
       let post_data = {
           district : district,
           rating : rating,
           pagination: false
       }
       let url = "{{route('user_location_rating_wise')}}";
       let token = "{{csrf_token()}}";
       $.post(url,{_token:token, data: post_data}, function(response){

       }).done(function(response) {
            $('.test-slider-active').animate({
                right: '200px',
                //padding: "0px",
                //'margin-left':'-10px',
                //'font-size': "0px"
            }, 1000, function() {

                //$('.test-slider-active').remove();
                //$('.sub-section-rating').html(response);
            //});
           //$('.test-slider-active').css({
               //transition : 'opacity 1s ease-in-out'
                $('.test-slider-active').slick('unslick');
                $('.sub-section-rating').empty();
                //var p = $('.sub-section-rating').bind(response)
                $('.sub-section-rating').html(response);
                $('.test-slider-active').slick({
                    dots: false,
                    infinite: true,
                    autoplay: false,
                    speed: 300,
                    slidesToShow: 3,
                    slidesToScroll: 1,

                    centerMode: false,
                    focusOnSelect: false,
                    responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        autoplay: true,
                        dots: false
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                        slidesToShow: 1,
                        autoplay: true,
                        slidesToScroll: 1,
                        dots: false
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                        slidesToShow: 1,
                        autoplay: true,
                        slidesToScroll: 1,
                        dots: false
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                    ]
                });
           });

       }).fail(function() {
            console.log("Oops! something went wrong.");
       })
   }

</script>
@endsection

