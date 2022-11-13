<div class="section-4-area">
    <div class="container">
       <div class="row">
          <div class="col-sm-12">
             <h2>{{ $packageCategory[0]->title}} Packages</h2>
          </div>
       </div>
       <div class="row mob-carosel-1">
          
            @foreach ($packages as $package)
            <div class="col-lg-3 col-md-6">
            <div class="package">
               <h5>{{ $package->title }}</h5>
               <span class="pk-1">{{ $package->internet_speed }}</span>
               <span class="pk-2">Mbps</span>
               <br>
               <span class="pk-3"><sup>৳</sup> {{ $package->monthly_charges }}</span>
               <span class="pk-4">per month</span>
               <span class="pk-5">({{$package->vat_declaration}})</span>
               <hr>
               {{-- <span class="pk-6">Dynamic Real-IP</span>
               <span class="pk-7">Bufferless Facebook & Youtube</span> --}}
               <span class="pk-6">{!! $package->features_1 !!}</span>
               <span class="pk-7">{!! $package->features_2 !!}</span>
               <div class="moz-value">
                  {{-- <span class="pk-8">Internet: 25 Mbps</span>
                  <span class="pk-8">BDIX 30 Mbps</span>
                  <span class="pk-8">Fiber Optic Connection</span>
                  <span class="pk-8">No Data-Cap & FUP</span>
                  <span class="pk-8">24/7 HelpDesk Support</span> --}}
                  <span class="pk-8">{!! $package->features !!}</span>
               </div>
               <div class="pk-btn">
                  <a class="btn" href="{{route('connectivity')}}"> Get Connectivity </a>
               </div>
            </div>
         </div>
            @endforeach
             
          
          
       </div>
    </div>
 </div>