@extends('layouts.smile.master')

@section('content')


<div class="sml_success">
    <div class="sml_success_bg">
       <div class="container text-center">
          <div class="row">
             <div class="col-lg-12">
                <h2>Form submission <span class="sml-green">Successful</span></h2>
                <p>Thanks for considering "SMILE Broadband" as your new broadband <br>internet service provider.</p>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="con-scrol-btn-2">
    <div class="container">
       <div class="row">
          <div class="col-md-12 text-center">
             <svg width="41" height="66" viewBox="0 0 41 66" fill="none" xmlns="https://www.w3.org/2000/svg">
                <rect x="0.599121" y="1.22266" width="39.1582" height="64.5005" rx="19.5791" stroke="#03314B" stroke-width="0.5"></rect>
                <path d="M20.179 21.3027V45.6438M20.179 45.6438L12.2495 37.7143M20.179 45.6438L28.1085 37.7143" stroke="#03314B"></path>
             </svg>
          </div>
       </div>
    </div>
 </div>
 <div class="success_next">
    <div class="container">
       <div class="row">
          <div class="col-lg-6 text-center">
             <h3>What next?</h3>
             <img src="{{asset('assets/img/success-next.png')}}" alt="" class="img-fluid">
          </div>
          <div class="col-lg-6">
             <p>1. Our representative will contact you over phone from 
                09666 333 555 or 09666 666 666 number between 9.30am to 7.00pm within 1 to 2 working days..
             </p>
             <p> 2. If you fail to receive our phone call, Please call us on 
                09666 666 666 number anytime 24/7. If you fail to receive 
                our calls three days in a row,
                your application will be 
                canceled automatically. 
             </p>
             <p> 3.	After verifying your contact details and location over phone call, our team will survey the location to confirm and inform you the possibility of the connectivity. </p>
             <p>4. It generally takes 1 to 3 working days to deliver the connectivity to client premises. It may take a little longer in cases of bad weather, govt. restriction and infrastructural limitations. </p>
             <p>5. If you need any further information or in a hurry, just give us a call right now on 09666 666 666.</p>
          </div>
       </div>
    </div>
 </div>



@endsection