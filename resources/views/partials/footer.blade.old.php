    <footer class="smile-footer">
        <div class="container-fluid smile-footer-content-outer">
            <div class="container smile-footer-content-inner">
                <div class="row">
                    <div class="col-md-4 order-0 order-md-1 smile-footer-menu">
                        <div class="smile-footer-menu-head">
                            Menu
                            <hr>
                        </div>
                        <div class="smile-footer-menu-body">
                            {{menu('footer')}}
                        </div>
                    </div>
                    <div class="col-md-4 order-1  order-md-2 smile-footer-social">
                        <div class="d-none d-md-block smile-footer-social-head">
                            Contact us
                            <hr>
                        </div>
                        <div class="d-none d-md-block smile-footer-social-phone">
                            {!! setting('site.footer_contact_number') !!}
                        </div>
                        <div class="smile-footer-social-media">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="https://www.facebook.com/smile.broadband.internet"><img src="{{ asset("storage/social_media_icons/facebook_32.png") }}" alt="facebook"></a></li>
                                <li class="list-inline-item"><a href="#"><img src="{{ asset("storage/social_media_icons/linkedin_32.png") }}" alt="linkedin"></a></li>
                                <li class="list-inline-item"><a href="#"><img src="{{ asset("storage/social_media_icons/twitter_32.png") }}" alt="twitter"></a></li>
                                <li class="list-inline-item"><a href="#"><img src="{{ asset("storage/social_media_icons/youtube_32.png") }}" alt="youtube_32"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 order-2  order-md-0 smile-footer-address">
                        <div class="smile-footer-address-head">
                            Head office
                            <hr>
                        </div>
                        <div class="smile-footer-address-body">
                            {!! setting('site.footer_head_office_address') !!}
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="container-fluid d-flex justify-content-center align-items-center smile-footer-copyright">
            &copy;&nbsp; <a href="https://www.bdcom.com/" target="_blank" >BDCOM Online Ltd.</a>&nbsp; All rights reserved.
        </div>
        
    </footer>
