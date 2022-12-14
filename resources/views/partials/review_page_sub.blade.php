

 <div class="row test-slider-active"> 
    @foreach ($customerReviews as $customerReview)
    <div class="col-lg-4">
        <img class="test-icon img-fluid" src="{{$customerReview->customer->photo != null ? asset('/storage/'.$customerReview->customer->photo) : asset('/storage/customers/happy_customer.png')}}" alt="">
        <div class="dart-box">
           {{-- @for($i = 1; $i <= $customerReview->ratings; $i++)
                <i class="fas fa-star" aria-hidden="true"></i>
            @endfor --}}

            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= $customerReview->ratings)
                    <i class="fas fa-star" aria-hidden="true"></i>
                @else
                    <i class="far fa-star" aria-hidden="false"></i>
                @endif

            @endfor

            {{-- <span class="date-2 collapse" id="collapseWidthExample111"> This is some placeholder content for a horizontal collapse. It's hidden by default and shown when triggered. </span> --}}
            {{-- <a class="sml-rm-text" data-toggle="collapse" href="#collapseWidthExample111" aria-expanded="false" aria-controls="collapseWidthExample">Read more</a> --}}

            <p class="date">{{$customerReview->review_date}}</p>
            <span class="date-2">{!! $customerReview->description !!}</span>
            <span class="date-2 collapse" id="collapse{{$customerReview->cr_id}}"> {!! $customerReview->description_more !!} </span>
                  <a class="sml-rm-text read" data-toggle="collapse" href="#collapse{{$customerReview->cr_id}}" aria-expanded="false" aria-controls="collapse{{$customerReview->cr_id}}">Read more</a>


            <p class="date-3">{{$customerReview->customer->name}}</p>
            <p class="date-4">{{$customerReview->customer->district->name}}</p>
        </div>
    </div>
    @endforeach
    <li class="links_" hidden>
        {{$customerReviews->links()}}
    </li>
 </div> 


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





