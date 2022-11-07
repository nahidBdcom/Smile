
        <!-- Header Ends -->
        {{-- <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark shadow p-0">
            <div class="container-fluid main-menu-header">
                <a class="navbar-brand me-auto" href="{{ url("/") }}">
                    <img src="{{ asset("/storage/".setting('site.logo')) }}" alt="Smile Logo" class="smile-head-logo">
                </a>
                <!-- Phone -->
                <div class="navbar-text px-0 s-py-8 m-0 d-flex d-block d-lg-none smile-phone-div">
                    <a href="tel:{{ setting('site.support_phone_number') }}" class=" p-2 border border-white rounded-pill align-self-center smile-phone-pill"><img src="{{ asset("/assets/images/mobile-phone-icon-white.png") }}" alt="mobile phone icon" height="25px">  {{ sprintf("%s %s %s",substr(setting('site.support_phone_number'), 0, 5),substr(setting('site.support_phone_number'), 5, 3),substr(setting('site.support_phone_number'), 8, 3)) }}</a>
                </div>
                <!-- Phone Ends-->

                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content">
                    <div class="hamburger-toggle">
                        <div class="hamburger">
                            <span class="navbar-toggler-icon"></span>
                        </div>
                    </div>
                </button>
                <div class="collapse navbar-collapse" id="navbar-content">
                    {{menu('main_menu', 'menus.update_header')}}
                </div>
            </div>
        </nav> --}}
        <!-- Header Ends -->


        <header class="header navbar  fixed-top mz-sm-none nav-scl">
            <div class="header-top">
               <div class="menu-area">
                  <div class="container">
                     <div class="row align-items-center ">
                        <div class="col-lg-2">
                           <div class="logo">
                              <a href="index.html">
                                 <img src="{{asset('/storage/'.setting('site.logo'))}}" class="img-fluid" alt="">
                              </a>
                           </div>
                        </div>
                        <div class="col-lg-7  align-items-center border-r p-0">
                           <div class="main-menu f-right">
                              <nav>
               
                    {{menu('main_menu', 'menus.update_header')}}
                
            </nav>
        </div>
        <div class="header-btn f-right"></div>
     </div>
     <div class="col-lg-2 border-r call_h">
        <a href="tel:+09666666666">
        <div class="mobile-call">

              <p class="mobile-text">Call 24/7</p>
              <p class="mobile-number">09666 666 666</p>

        </div>
        </a>
     </div>
     <div class="col-lg-1 p-0">
        <div class="sml-language">
           <div class="switch">
              <input id="language-toggle" class="check-toggle check-toggle-round-flat" type="checkbox">
              <label for="language-toggle"></label>
              <span class="on">EN</span>
              <span class="off">বাং</span>
           </div>
        </div>
     </div>
  </div>
</div>
</div>
</div>
</header>