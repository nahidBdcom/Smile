{{-- <div class="story_area_content">
    
    <h2>Our Story</h2>
    <p>Smile broadband is one of the pioneers of home broadband service in Bangladesh. In 2009, BDCOM Online Ltd. officially acquired the business of Smile and started to provide home broadband service under the brand. After the successful business acquisition of Smile, BDCOM Online Ltd. upgraded it’s packages to meet the primary internet requirements of broadband internet users in Bangladesh, in the sense of price and bandwidth speed.</p>
    <br>
    <p> Since its inception, Smile Broadband is focused to empower its Internet users with the freedom to access Infotainment content and to surf with no limitations. Within 2016, Smile broadband became the most recognized service brand of BDCOM Online Ltd. for it’s cost effective single price model and exceptional customer service. </p>

    
 </div> --}}


 <div class="story_area">
    <div class="container">
       <div class="row">
          <div class="col-lg-12">
             <div class="story-bg text-center"> <img src="{{asset('/storage/'.$story->description_image)}}" class="img-fluid" alt=""> </div>
             <div class="story_area_content">
                <h5>{{$story->title}}</h5>
                {!! $story->description_more !!}
             </div>
             
          </div>
       </div>
    </div>
 </div>