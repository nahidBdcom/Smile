<div class="section-8-area mz-con-page">
    <div class="container section-8-wrap">
       <div class="section-8-wrapper">
          <div class="row">
             <div class="col-lg-6 pr-0 c_br">
                <div class="section-8-wrapper-first pl-160 pr-160">
                   <div class="rect-icon">
                      <img src="{{asset('/storage/'.setting('site.contact_form_icon'))}}" class="img-fluid" alt="">
                   </div>
                   <div class="section-8-content">
                    <h5>{!! setting('site.contact_form_title') !!}</h5>
                    <p>{!! setting('site.contact_form_description') !!}</p>
                   </div>
                   <form method="POST" id="contact_form" action="{{url("contact/get_information_request")}}">
                    {{ csrf_field() }}
                      <input name="info_name" id="name" type="text" required placeholder="Name"/>
                      <div class="invalid-tooltip">Please provide your name.</div>
                      <span class="text-danger error-text info_name_error"></span>
                      <br>
                      <input name="info_phone" id="phone" type="text" required placeholder="Phone Number" pattern="[0][1][3-9][0-9]{8}"/>
                      <div class="invalid-tooltip">Please provide a valid Phone Number.</div>
                      <span class="text-danger error-text info_phone_error"></span>
                      <br>
                      <input name="info_details" id="details" type="text" required placeholder="Anything in mind?"/>
                      <button class="btn btn-2" type="submit">
                         Submit 
                         <svg class="ml-25" width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="https://www.w3.org/2000/svg">
                            <path d="M1.90039 19.1287L10.4196 10.6093L1.90039 2.09009" stroke="#808080" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                         </svg>
                        </button>
                   </form>
                </div>
             </div>
             <div class="col-lg-6 sm-hide">
                <div class="section-8-wrapper-2nd">
                   <div class="sml-email-info">
                      <div class="rect-icon">
                         <img src="{{asset('/storage/'.setting('site.contact_form_icon'))}}" class="img-fluid" alt="">
                      </div>
                      <div class="section-8-content">
                         {!! setting('site.footer_contact_number') !!}
                         {!! setting('site.footer_email_address') !!}
                      </div>
                   </div>
                   <img src="{{asset('/storage/'.setting('site.contact_form_image'))}}" class="img-fluid">
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>