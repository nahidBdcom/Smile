
        <!-- Header Ends -->
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark shadow p-0">
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
                    {{menu('main_menu', 'menus.smile_topmenu_bootstrap')}}
                </div>
            </div>
        </nav>
        <!-- Header Ends -->