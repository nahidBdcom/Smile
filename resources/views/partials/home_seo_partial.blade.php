<div class="container-fluid s-py-50 smile-main-bg-dark">
    <div class="container home-seo-container">
        <p class="seo-content-title s-pb-50 m-0">{{$seoContent["description_title"]}}</p>
        <div class="row mx-auto my-auto justify-content-center">
            <div class="col-12 px-0">
                <img src="{{asset('storage/'.$seoContent["description_image"])}}" class="rounded mx-auto d-block float-md-end s-p-8 smile-seo-image" alt="" srcset="">
                {!! $seoContent["description_excerpt"] !!}
                <span id="seoMoreContentBlock" class="d-none">
                    {!! $seoContent["description_more"] !!}
                </span>
                <span type="button" class="btn btn-link btn-seo-read-more" onclick="funcSeoShowHide(this)"></span>
            </div>
            
        </div>
    </div>
</div>
