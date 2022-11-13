<div class="trust_area">
    <div class="container">
       <div class="row">
          <div class="col-lg-12 text-center">
             <h2>{{ $trust->title }}</h2>
             <svg width="88" height="8" viewBox="0 0 88 8" fill="none" xmlns="https://www.w3.org/2000/svg">
                <path d="M0.10498 0.619141H87.6621V7.91555H0.10498V0.619141Z" fill="#FFC215" />
             </svg>
          </div>
       </div>
       <div class="trust_image text-center">
            <div class="row">
                @foreach ($brands as $brand)
                
                

                    <div class="col-lg-3 col-md-3"> <img src="{{asset('/storage/'.$brand->logo)}}" class="img-fluid" alt=""> </div>
                
                @endforeach
            </div>
          
       </div>
    </div>
 </div>