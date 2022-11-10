<div class="section-3-area">
    <div class="container">
       <div class="row align-items-center">
          <div class="col-sm-12 col-lg-5">
             <div class="section-3-area-1st">
                <h2> {!! setting('site.description_title') !!} </h2>
                <p> {!! setting('site.description_details') !!}</p>
             </div>
          </div>
          <div class="col-sm-12 col-lg-7">
             <div class="section-3-area-2nd">
                <div class="row align-items-center mob-carosel">
                   <div class="col-lg-6 sect-3-odd">
                      <div class="section-3-grid">
                         <img src="{{asset('/storage/'.$serviceValues[0]-> logo)}}" class="img-fluid" alt="">
                         <h5>{!! $serviceValues[0]-> title !!}</h5>
                         <p>{!! $serviceValues[0]-> description !!}</p>
                      </div>
                   </div>
                   <div class="col-lg-6 sect-3-even">
                      <div class="section-3-grid ">
                         <img src="{{asset('assets/img/2.png')}}" class="img-fluid" alt="">
                         <h5>{!! $serviceValues[1]-> title !!}</h5>
                         <p>{!! $serviceValues[1]-> description !!}</p>
                      </div>
                   </div>
                   <div class="col-lg-6 sect-3-odd">
                      <div class="section-3-grid">
                         <img src="{{asset('assets/img/3.png')}}" class="img-fluid" alt="">
                         <h5>{!! $serviceValues[2]-> title !!}</h5>
                         <p>{!! $serviceValues[2]-> description !!}</p>
                      </div>
                   </div>
                   <div class="col-lg-6 sect-3-even">
                      <div class="section-3-grid">
                         <img src="{{asset('assets/img/4.png')}}" class="img-fluid" alt="">
                         <h5>{!! $serviceValues[3]-> title !!}</h5>
                         <p>{!! $serviceValues[3]-> description !!}</p>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="section-3-bg-img"></div>
 </div>