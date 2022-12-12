<header class="{{Route::currentRouteName()=='home' ? 'transparent-header fixed-top d-lg-none nav-scl' : 'transparent-header navbar fixed-top d-lg-none hedaer-mob-bg'}}">
    <nav class="navbar navbar-expand-lg navbar-light ">

       <div>
       <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('assets/img/logo.png')}}" alt=""></a>
    </div>



       <div class="nav-call">
          <a href="tel:+09666666666">
          <p>Call 24/7</p>
          <h5>09666 666 666</h5>
       </a>
       </div>


       {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="https://www.w3.org/2000/svg">
             <line x1="1.35138" y1="1.49481" x2="19.0053" y2="1.49481" stroke="white" stroke-width="1.95275" stroke-linecap="round"/>
             <line x1="1.35138" y1="7.70429" x2="19.0053" y2="7.70429" stroke="white" stroke-width="1.95275" stroke-linecap="round"/>
             <line x1="1.35138" y1="13.9147" x2="19.0053" y2="13.9147" stroke="white" stroke-width="1.95275" stroke-linecap="round"/>
          </svg>
       </button> --}}

       <a class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
         <!-- these spans become the three lines -->
         <span> </span>
         <span> </span>
         <span> </span>
      </a>
       <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            {{menu('main_menu', 'menus.smile_mobile_topmenu_bootstrap')}}
            

          </ul>
          <div class="menu-social">
             {{-- <a href="#" class="fa fa-facebook"></a>
             <a href="#" class="fa fa-linkedin"></a>
             <a href="#" class="fa fa-youtube"></a>
             <a href="#" class="fa fa-instagram"></a>
             <a href="#" class="fa fa-linkedin"></a> --}}
             {{-- @include('partials.social_media_icons') --}}
             @include('partials.social_media_icons_mobile')
          </div>
          <div class="menu-infoo">
             <h5>Helpdesk 24/7</h5>
             <h4>09666 666 666</h4>
             <h4>helpdesk@smile.com.bd</h4>
          </div>
       </div>


    </nav>
 </header>
