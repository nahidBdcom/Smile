<!-- Features section START -->
<div class="container-fluid serviceFluid">
    <section class="container py-5 py-md-6 py-lg-7">
        <div class="row pt-2">
        @foreach ($serviceValues as $serviceValue)    
            <div class="col-sm-4 mb-grid-gutter pb-1 service_value">
                <div class="mx-auto text-center service_value_content" style="max-width: 278px;">
                    <img class="d-inline-block service_value_img" src="{{ asset("/storage/".$serviceValue->logo)}}" alt="Simple" width="70px" height="70px">
                    <h3 class="h5 service_value_title">{{$serviceValue->title}}</h3>
                    <hr class="bordered-devider" />
                    <p class="fs-sm mb-0 desc service_value_body">{{$serviceValue->description}}</p>
                </div>
            </div>
        @endforeach
        </div>
    </section>
</div>

  <!-- Features section END -->
