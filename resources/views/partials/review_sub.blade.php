

@section('additional-userreview-css')
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
    </style>
@endsection
<div class="section-5-area user-review user_review_page">
    <div class="container">
       <div class="row align-items-end">
          <div class="col-lg-7">
             <h3>User Review</h3>
             <p class="sml-filter-1">It’s easy for anyone to post a comment on social media to spread disinformation. Here you can find the authentic feedbacks from the real users regarding their experience on Smile Broadband.</p>
          </div>
          <div class="col-lg-5 text-end">
             <p class="sml-filter">Filter</p>
             <form action="#">
                <div class="todropdown">
                    <select class="form-select cus-sl-fl getDistrict selectSearch" id="filterByColor" style="height:40px" onchange="getDistrictWiseRatedUser();">
                        <option value="" selected >District</option>
                        @foreach ($districts as $district)
                            <option value="{{$district->id}}">{{$district->name}}</option>
                        @endforeach
                    </select>

                 </div>







                <div class="dropdown sl-snd f-rt">
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
       <div class="row appendReview">

          @foreach ($customerReviews as $customerReview)
          <div class="col-lg-4">
              <img class="test-icon img-fluid" src="{{asset('/storage/'.$customerReview->customer->photo)}}" alt="">
              <div class="dart-box">
                  @for($i = 1; $i <= $customerReview->ratings; $i++)
                      <i class="fas fa-star" aria-hidden="true"></i>
                  @endfor

                  

                  <p class="date">{{$customerReview->review_date}}</p>
                  <span class="date-2">{!! $customerReview->description !!}</span>
                  {{-- <span class="date-2 collapse" id="collapseWidthExample111"> This is some placeholder content for a horizontal collapse. It's hidden by default and shown when triggered. </span> --}}
                  <a class="sml-rm-text" data-toggle="collapse" href="#collapseWidthExample111" aria-expanded="false" aria-controls="collapseWidthExample">Read more</a>

                  <p class="date-3">{{$customerReview->customer->name}}</p>
                  <p class="date-4">{{$customerReview->customer->district->name}}</p>
              </div>
          </div>

       @endforeach

       </div>
       <div class="row align-items-end">
          <div class="col-lg-6 col-md-6">
             <a class="btn mt-55" href="#">
                Post review
                <i class="fa fa-solid fa-chevron-right btn-icon ml-15"></i>
             </a>
          </div>
          <div class="col-lg-6 col-md-6">
             <nav aria-label="Page navigation example">
                <ul class="pagination">

                   <li class="page-item pageination">
                        {{$customerReviews->links()}}
                    </li>

                </ul>
             </nav>
          </div>

       </div>
    </div>
 </div>

@section('additional-userreview-js')
    <script src="{{asset('assets/js/update/select2.min.js')}}"></script>
    <script>

        $(document).ready(function() {
            $('.selectSearch').select2();

            $(document).on('click', '.pagination a', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
               });

               function fetch_data(page)
               {

                    let district = $('.getDistrict').val();
                    let rating = $('.getRating').val();
                    let post_data = {
                        district : district,
                        rating : rating,
                        pagination: true
                    }
                    let url = "{{route('user_location_rating_wise')}}?page="+page;
                    let token = "{{csrf_token()}}";
                    $.post(url,{_token:token, data: post_data}, function(response){
                        $(".appendReview").fadeOut(500, function(){
                            $(".appendReview").empty();
                            $(".appendReview").html(response);
                        });
                    }).done(function() {
                        $(".appendReview").fadeIn(500, function(){
                        });
                        setTimeout(function(){
                            let links = $('.links_').html();
                            $('.pageination').empty();
                            $('.pageination').html(links);
                        },600)
                    }).fail(function() {
                        return "Something went wrong!";
                    });
               }
        });


        function getDistrictWiseRatedUser(){
            let district = $('.getDistrict').val();
            let rating = $('.getRating').val();
            let post_data = {
                district : district,
                rating : rating,
                pagination: true
            }
            let url = "{{route('user_location_rating_wise')}}";
            let token = "{{csrf_token()}}";
            $.post(url,{_token:token, data: post_data}, function(response){
                $(".appendReview").fadeOut(500, function(){
                    $(".appendReview").empty();
                    $(".appendReview").html(response);
                });
            }).done(function() {
                $(".appendReview").fadeIn(500, function(){
                });
                setTimeout(function(){
                    let links = $('.links_').html();
                    $('.pageination').empty();
                    $('.pageination').html(links);
                },600)
            }).fail(function() {
                return "Something went wrong!";
            });;
        }
    </script>
@endsection
