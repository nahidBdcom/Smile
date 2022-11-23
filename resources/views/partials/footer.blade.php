<footer>
    <div class="main-footer">
       <div class="container m-0-auto">
          <div class="row">
             <div class="col-lg-6 col-sm-6 or-sm-1">
                <h5 class="footer-title">Helpdesk 24/7</h5>
                <ul>
                   <li>
                       {!! setting('site.footer_contact_number') !!}
                   </li>
                   <li>
                      {!! setting('site.footer_email_address') !!}
                   </li>
                </ul>
                <div class="info-text">
                   {!! setting('site.footer_head_office_address') !!}
                </div>
             </div>
             <div class="col-lg-3 col-sm-6 text-end fot-m or-sm-2">
                <h5 class="footer-title ftc">Collections</h5>
                <ul>
                  

                   {{menu('footer_collection')}}

                </ul>
             </div>

             <div class="col-sm-6 lg-hide-2 or-sm-3 ftc">
                <p class="footer-social-below">Social Media</p>
                <div class="footer-menu-social">
                   @include('partials.social_media_icons')
                </div>
             </div>


             <div class="col-lg-3 col-sm-6 text-end fot-m or-sm-4">
                <h5 class="footer-title">Main Menu</h5>
                <ul>
                   {{menu('main_menu', 'menus.customized_footer')}}
                </ul>
             </div>
          </div>
          <div class="footer-below">
             <div class="row">
                <div class="col-lg-3">
                   <p class="footer-social-below footer-social-below-2">Social Media</p>
                   <div class="footer-menu-social-2">
                      
                      @include('partials.social_media_icons')
                   </div>
                </div>

                {{menu('footer', 'menus.footer')}}
                
                <div class="col-lg-3 foot-g">
                   <p class="footer-copy"> © 2022 <a href="https://www.bdcom.com" style="color:#4D4D4D" target="_blank">BDCOM Online Ltd.</a> All rights reserved. </p>
                </div>
             </div>
          </div>
       </div>
    </div>
 </footer>