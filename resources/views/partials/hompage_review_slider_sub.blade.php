

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
                <span class="date-2 collapse" id="collapse{{$customerReview->id}}"> {!! $customerReview->description_more !!} </span>
                  <a class="sml-rm-text" data-toggle="collapse" href="#collapse{{$customerReview->id}}" aria-expanded="false" aria-controls="collapse{{$customerReview->id}}">Read more</a>


                <p class="date-3">{{$customerReview->customer->name}}</p>
                <p class="date-4">{{$customerReview->customer->district->name}}</p>
            </div>
        </div>
    @endforeach
</div>
<li>
    {{$customerReviews->links()}}
</li>




