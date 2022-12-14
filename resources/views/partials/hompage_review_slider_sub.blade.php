

<div class="row test-slider-active">
    @foreach ($customerReviews as $customerReview)
        <div class="col-lg-3 col-sm-12">
             <img class="test-icon img-fluid" src="{{$customerReview->customer->photo != null ? asset('/storage/'.$customerReview->customer->photo) : asset('/storage/customers/happy_customer.png')}}" alt="">
            <div class="dart-box">


            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= $customerReview->ratings)
                    <i class="fas fa-star" aria-hidden="true"></i>
                @else
                    <i class="far fa-star" aria-hidden="false"></i>
                @endif

            @endfor

                <p class="date">{{$customerReview->review_date}}</p>
                <span class="date-2">{!! $customerReview->description !!}</span>
                <span class="date-2 collapse" id="collapse{{$customerReview->id}}"> {!! $customerReview->description_more !!} </span>
                  <a class="sml-rm-text read" data-toggle="collapse" href="#collapse{{$customerReview->id}}" aria-expanded="false" aria-controls="collapse{{$customerReview->id}}">Read more</a>


                <p class="date-3">{{$customerReview->customer->name}}</p>
                <p class="date-4">{{$customerReview->customer->district->name}}</p>
            </div>
        </div>
    @endforeach
</div>
<a class="btn mt-55" href="https://portal.smile.com.bd/customer/login"> Post review
    <i class="fa fa-solid fa-chevron-right btn-icon ml-15"></i>
</a>
{{--  <li>
    {{$customerReviews->links()}}
</li>  --}}

<script>

$(document).ready(function(){
	$(".read").click(function(){
		$(this).prev().toggle();
		$(this).siblings('.dots').toggle();
		if($(this).text()=='Read more'){
			$(this).text('Read less');
		}
		else{
			$(this).text('Read more');
		}
	});
});

</script>





