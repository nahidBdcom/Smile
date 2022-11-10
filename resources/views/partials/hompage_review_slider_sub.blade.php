

<div class="row test-slider-active">
    @foreach ($customerReviews as $customerReview)
        <div class="col-lg-3 col-sm-12">
            <img class="test-icon img-fluid" src="{{asset('/storage/'.$customerReview->customer->photo)}}" alt="">
            <div class="dart-box">


                @for($i = 1; $i <= $customerReview->ratings; $i++)
                    <i class="fas fa-star" aria-hidden="true"></i>
                @endfor

                <p class="date">{{$customerReview->review_date}}</p>
                <span class="date-2">{!! $customerReview->description !!}</span>


                <p class="date-3">{{$customerReview->customer->name}}</p>
                <p class="date-4">{{$customerReview->customer->district->name}}</p>
            </div>
        </div>
    @endforeach
</div>




