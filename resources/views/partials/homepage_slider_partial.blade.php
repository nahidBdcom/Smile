<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
     @foreach ($slideshows as $slideshow)
        @if ($loop->first)
        <div class="carousel-item active">
        @else
        <div class="carousel-item ">
        @endif
            <picture class="d-flex justify-content-center">
                <source srcset="{{ asset("/storage/".$slideshow->image_big)}}" media="(min-width: 1281px)">
                <source srcset="{{ asset("/storage/".$slideshow->image_laptop)}}" media="(min-width: 992px)">
                <source srcset="{{ asset("/storage/".$slideshow->image_tab)}}" media="(min-width: 768px)">
                <source srcset="{{ asset("/storage/".$slideshow->image_tab_2)}}" media="(min-width: 575px)">
                <img class="slide-img-h " srcset="{{ asset("/storage/".$slideshow->image_mobile)}}" alt="…">
            </picture>
            @if($slideshow->show_infobox == 1)
            <div class="slide-info-box" style="background-color:rgba({{ App\Helpers\SmileFunctionHelper::rgbFormater($slideshow->infobox_color) }},{{$slideshow->infobox_opacity}})!important;">
              <p class="slide-info-box-heading" style="color:{{$slideshow->title_color}};">{{$slideshow->title}}</p>
              <p class="slide-info-box-body" style="color:{{$slideshow->subtitle_color}};">{{$slideshow->subtitle}}</p>
	      @if($slideshow->has_link == 1)
		<button class="slide-info-box-call-button" style="background-color:rgba({{ App\Helpers\SmileFunctionHelper::rgbFormater($slideshow->button_color) }},{{$slideshow->button_opacity}})!important;"><a href="{{url( ($slideshow->link == null )? "" : $slideshow->link )}}">{{ ($slideshow->button_label == null )? "" : $slideshow->button_label }}</a></button>
              @endif
            </div>
            @endif
        </div>
     @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
