<div class="hero-area">
    <div class="container-fluid p-0">
       <div class="slider-active">
         @foreach ($slideshows as $slideshow)
         <div class="single-slider">
            <div class="row align-items-center no-gutters">
               <div class="col-lg-12">
                  <img src="{{asset('assets/img/slider-d-1.jpg')}}" class="img-fluid sm-hide" alt="">
                  <img src="{{asset('assets/img/slider-m-1.jpg')}}" class="img-fluid lg-hide" alt="">
                  <div class="section-1-area-wrapper text-left">
                     <h2>{!! setting('site.home_slider_title') !!} </h2>
                     <p> {!! setting('site.home_slider_description') !!} </p>
                     <a class="btn" href="{{url( ($slideshow->link == null )? "" : $slideshow->link )}}"> Packages
                        <i class="fa fa-solid fa-chevron-right btn-icon ml-15"></i>
                     </a>
                  </div>
               </div>

               <div class="sm-hero-text text-center">
                 <div class="col-sm-12">
                    <div class="section-2-area-wrapper text-center">
                       <h2>{!! setting('site.home_slider_title') !!}</h2>
                       <p>{!! setting('site.home_slider_description') !!}</p>
                       <a class="btn" href="{{url( ($slideshow->link == null )? "" : $slideshow->link )}}"> Packages
                          <i class="fa fa-solid fa-chevron-right btn-icon ml-15"></i>
                       </a>
                    </div>
                 </div>
               </div>

            </div>
         </div>
         @endforeach
          {{-- <div class="single-slider">
             <div class="row align-items-center no-gutters">
                <div class="col-lg-12">
                   <img src="{{asset('assets/img/slider-d-1.jpg')}}" class="img-fluid sm-hide" alt="">
                   <img src="{{asset('assets/img/slider-m-1.jpg')}}" class="img-fluid lg-hide" alt="">
                   <div class="section-1-area-wrapper text-left">
                      <h2>{!! setting('site.home_slider_title') !!} </h2>
                      <p> {!! setting('site.home_slider_description') !!} </p>
                      <a class="btn" href="{{url( ($slideshow->link == null )? "" : $slideshow->link )}}"> Packages
                         <i class="fa fa-solid fa-chevron-right btn-icon ml-15"></i>
                      </a>
                   </div>
                </div>

                <div class="sm-hero-text text-center">
                  <div class="col-sm-12">
                     <div class="section-2-area-wrapper text-center">
                        <h2>Enjoy Accurate <br> Internet Speed 24/7 1</h2>
                        <p>Slow internet speed can trouble you in your daily internet usage. So, we don’t compromise in delivering the committed speed anytime day or night. Choose any of Smile’s Standard Packages to enjoy package-wise accurate speed 24/7.</p>
                        <a class="btn" href="{{route('package_updated','standard')}}"> Packages
                           <i class="fa fa-solid fa-chevron-right btn-icon ml-15"></i>
                        </a>
                     </div>
                  </div>
                </div>

             </div>
          </div> --}}
          {{-- {{url( ($slideshow->link == null )? "" : $slideshow->link )}} --}}
          {{-- <div class="single-slider">
             <div class="row align-items-center no-gutters">
                <div class="col-lg-12">
                   <img src="{{asset('assets/img/slider-d-2.jpg')}}" class="img-fluid sm-hide" alt="">
                   <img src="{{asset('assets/img/slider-m-2.jpg')}}" class="img-fluid lg-hide" alt="">
                   <div class="section-1-area-wrapper text-left">
                      <h2>Enjoy Accurate <br> Internet Speed 24/7 </h2>
                      <p>Slow internet speed can trouble you in your daily internet usage. So, we don’t compromise in delivering the committed speed anytime day or night. Choose any of Smile’s Standard Packages to enjoy package-wise accurate speed 24/7.</p>
                      <a class="btn" href="{{route('package_updated','standard')}}"> Packages
                         <i class="fa fa-solid fa-chevron-right btn-icon ml-15"></i>
                   </a>
                   </div>
                </div>

                <div class="sm-hero-text text-center">
                   <div class="col-sm-12">
                      <div class="section-2-area-wrapper text-center">
                         <h2>Enjoy Accurate <br> Internet Speed 24/7 2</h2>
                         <p>Slow internet speed can trouble you in your daily internet usage. So, we don’t compromise in delivering the committed speed anytime day or night. Choose any of Smile’s Standard Packages to enjoy package-wise accurate speed 24/7.</p>
                         <a class="btn" href="{{route('package_updated','standard')}}"> Packages
                            <i class="fa fa-solid fa-chevron-right btn-icon ml-15"></i>
                         </a>
                      </div>
                   </div>
                   </div>

             </div>
          </div>
          <div class="single-slider">
             <div class="row align-items-center no-gutters">
                <div class="col-lg-12">
                   <img src="{{asset('assets/img/slider-d-3.jpg')}}" class="img-fluid sm-hide" alt="">
                   <img src="{{asset('assets/img/slider-m-3.jpg')}}" class="img-fluid lg-hide" alt="">
                   <div class="section-1-area-wrapper text-left">
                      <h2>Enjoy Accurate <br> Internet Speed 24/7 </h2>
                      <p>Slow internet speed can trouble you in your daily internet usage. So, we don’t compromise in delivering the committed speed anytime day or night. Choose any of Smile’s Standard Packages to enjoy package-wise accurate speed 24/7.</p>
                      <a class="btn" href="{{route('package_updated','standard')}}"> Packages
                         <i class="fa fa-solid fa-chevron-right btn-icon ml-15"></i>
                   </a>
                   </div>
                </div>

                <div class="sm-hero-text text-center">
                   <div class="col-sm-12">
                      <div class="section-2-area-wrapper text-center">
                         <h2>Enjoy Accurate <br> Internet Speed 24/7 3</h2>
                         <p>Slow internet speed can trouble you in your daily internet usage. So, we don’t compromise in delivering the committed speed anytime day or night. Choose any of Smile’s Standard Packages to enjoy package-wise accurate speed 24/7.</p>
                         <a class="btn" href="{{route('package_updated','standard')}}"> Packages
                            <i class="fa fa-solid fa-chevron-right btn-icon ml-15"></i>
                         </a>
                      </div>
                   </div>
                   </div>

             </div>
          </div> --}}

       </div>
    </div>
 </div>