<div class="section-8-area hom-con-2">
    <div class="container">
       <div class="section-8-wrapper">
          <div class="row">
             <div class="col-sm-12  col-lg-6 c_br">
                <div class="section-8-wrapper-first pl-160 pr-160">
                   <div class="rect-icon">
                      <img src="{{asset('/storage/'.setting('site.contact_form_icon'))}}" class="img-fluid" alt="">
                   </div>
                   <div class="section-8-content">
                      <h5>{!! setting('site.contact_form_title') !!}</h5>
                      <p>{!! setting('site.contact_form_description') !!}</p>
                   </div>
                   <form method="POST" id="contact_form" action="{{url("contact/get_information_request")}}">
                      <input name="info_name" id="name" type="text" required placeholder="Name" />
                      <br>
                      <input name="info_phone" id="phone" type="text" required placeholder="Phone Number" />
                      <br>
                      <input name="info_details" id="details" type="text" required placeholder="Anything in mind?" />
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
                         <h5 class="h5"><a href="tel:+09666666666">{!! setting('site.footer_contact_number') !!}</a></h5>
                         <h5 class="h5"><a href="mailto:helpdesk@smile.com.bd">{!! setting('site.footer_email_address') !!}</a></h5>
                      </div>
                   </div>
                   <img src="{{asset('/storage/'.setting('site.contact_form_image'))}}" class="img-fluid" alt="">
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>