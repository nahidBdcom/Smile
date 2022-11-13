@extends('layouts.smile.master')


@section('content')



<div class="breadcrumb_area">
    <div class="container">
       <div class="row">
          <nav aria-label="breadcrumb">
             <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">FAQs</li>
             </ol>
          </nav>
       </div>
    </div>
 </div>
 {{-- <div class="faq_area">
    <div class="container">
       <div class="row">
          <div class="col-lg-12">
             <div class="page-header">
                <h2>Frequently asked questions</h2>
                <p>Our shared connections feel like dedicated ones because we deliver package-wise committed bandwidth to each and every users no matter how many users are active in the network.</p>
             </div>
          </div>
       </div>
    </div>
 </div> --}}

 @include('partials.faq_head')

 <div class="faq_area_content">
    <div class="container">
       <div class="row">
          <div class="col-lg-12">
             <div class="faq_area_content_2">
                <div class="faq_type">
                   <form action="#">
                      <select name="district" id="faq_type">
                         <option value="faq-type-value">FAQ Type</option>
                         <option value="dhaka">General</option>
                         <option value="Khulna">Bill Payment</option>
                         <option value="Cumilla">Service & Support</option>
                      </select>
                   </form>
                </div>
        
            
                <div id="accordion" class="mz-c-faq">
                   <div class="card">
                     <div class="card-header" id="headingOne">
                       <h5 class="mb-0">
                         <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Does Smile Broadband have FTP servers?
                         </button>
                       </h5>
                     </div>
                 
                     <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                       <div class="card-body">
                         Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                       </div>
                     </div>
                   </div>
                   <div class="card">
                     <div class="card-header" id="headingTwo">
                       <h5 class="mb-0">
                         <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            What Are The Bill Payment Options?
                         </button>
                       </h5>
                     </div>
                     <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                       <div class="card-body">
                         Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                       </div>
                     </div>
                   </div>
                   <div class="card">
                     <div class="card-header" id="headingThree">
                       <h5 class="mb-0">
                         <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Is there any installation charge for new connectivity?
                         </button>
                       </h5>
                     </div>
                     <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                       <div class="card-body">
                         Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                       </div>
                     </div>
                   </div>

                   <div class="card">
                      <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                            Is there any Data Cap or Fair Usage Policy (FUP)?
                          </button>
                        </h5>
                      </div>
                      <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                      </div>
                    </div>
                 </div>



             </div>

             
          </div>
       </div>
    </div>
 </div>

 @include('partials.faq_body')



@endsection