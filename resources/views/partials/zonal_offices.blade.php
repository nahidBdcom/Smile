<div class="office_area-2">
    <div class="container">
       <h2>Zonal Office</h2>
       <div class="row mob-carosel">
        @foreach ($zoneOffices as $zoneOffice)
            <div class="col-lg-3 col-md-6 col-sm-12 mt-30">
                <div class="sml-branch sml-branch-bg">
                <h5>{{$zoneOffice->title}}</h5>
                <p>{!! $zoneOffice->address !!}<br><br>
                    {{$zoneOffice->contact_number}}<br>
                    {{$zoneOffice->email}}
                </p>
                </div>
            </div>            
        @endforeach
         
       </div>
    </div>
 </div>