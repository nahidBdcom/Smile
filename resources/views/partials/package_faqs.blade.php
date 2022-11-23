<div class="section-7-area std_pack_faq">
    <div class="container">
       <div class="row">
          <div class="col-lg-6 section-7-wrapper text-center">
             <div class="faq-heading">
                <img src="{{asset('/storage/'.setting('site.faq_logo'))}}" class="img-fluid" alt="">
             </div>
          </div>
          <div class="col-lg-6">
             <div id="accordion" class="mz-c-faq">
                @foreach ($faqs as $faq)
                <div class="card">
                    <div class="card-header" id="{{$faq->id}}">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{$faq->id}}" aria-expanded="false" aria-controls="collapse{{$faq->id}}">
                             {{$faq->title}}
                          </button>
                        </h5>
                      </div>
                    
                      <div id="collapse{{$faq->id}}" class="collapse" aria-labelledby="{{$faq->id}}" data-parent="#accordion">
                        <div class="card-body">
                          {!! $faq->description !!}
                        </div>
                      </div>   
                    </div> 
                @endforeach
                
          </div>
       </div>
    </div>
 </div>