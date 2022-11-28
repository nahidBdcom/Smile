<div class="container lg-hide">
    <div class="mobile_contact">
    <div class="row">
       <div class="col-lg-6">
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
             <div class="text-end">
             <img src="{{asset('/storage/'.setting('site.contact_form_image'))}}" class="img-fluid mobile-con-img" alt="">
             </div>
          </div>
       </div>
    </div>
 </div>
 </div>


 <div class="container lg-hide">
    <div class="row">
       <div class="col-sm-12 mobt-30">
          <div class="office_label_content">
             <div class="rect-icon-office">
                <img src="{{asset('/storage/'.setting('site.contact_form_icon'))}}" class="img-fluid" alt="">
             </div>
             <div class="sml-branch sml-tag">
                <h5>Head Office</h5>
                
                {!! setting('site.head_office_card_contact') !!}
                  
                
             </div>
          </div>
       </div>
    </div>
 </div>