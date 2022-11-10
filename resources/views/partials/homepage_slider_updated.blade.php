<div class="hero-area">
    <div class="container-fluid p-0">
       <div class="slider-active">
         @foreach ($slideshows as $slideshow)
         <div class="single-slider">
            <div class="row align-items-center no-gutters">
               <div class="col-lg-12">
                  <img src="{{ asset("/storage/".$slideshow->image_big)}}" class="img-fluid sm-hide" alt="">
                  <img src="{{ asset("/storage/".$slideshow->image_mobile)}}" class="img-fluid lg-hide" alt="">
                  <div class="section-1-area-wrapper text-left">
                     <h2>{!! $slideshow->title !!} </h2>
                     <p> {!! $slideshow->excerpt !!} </p>
                     <a class="btn" href="{{url( ($slideshow->link == null )? "/" : $slideshow->link )}}"> Packages
                        <i class="fa fa-solid fa-chevron-right btn-icon ml-15"></i>
                     </a>
                  </div>
               </div>

               <div class="sm-hero-text text-center">
                 <div class="col-sm-12">
                    <div class="section-2-area-wrapper text-center">
                       <h2>{!! setting('site.home_slider_title') !!}</h2>
                       <p>{!! setting('site.home_slider_description') !!}</p>
                       <a class="btn" href="{{url( ($slideshow->link == null )? "/" : $slideshow->link )}}"> Packages
                          <i class="fa fa-solid fa-chevron-right btn-icon ml-15"></i>
                       </a>
                    </div>
                 </div>
               </div>

            </div>
         </div>
         @endforeach
         
       </div>
    </div>
 </div>