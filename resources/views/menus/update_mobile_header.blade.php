<header class="transparent-header fixed-top d-lg-none nav-scl">
    <nav class="navbar navbar-expand-lg navbar-light ">

       <div>
       <a class="navbar-brand" href="index.html"><img src="{{asset('assets/img/logo.png')}}" alt=""></a>
    </div>



       <div class="nav-call">
          <a href="tel:+09666666666">
          <p>Call 24/7</p>
          <h5>09666 666 666</h5>
       </a>
       </div>


       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="https://www.w3.org/2000/svg">
             <line x1="1.35138" y1="1.49481" x2="19.0053" y2="1.49481" stroke="white" stroke-width="1.95275" stroke-linecap="round"/>
             <line x1="1.35138" y1="7.70429" x2="19.0053" y2="7.70429" stroke="white" stroke-width="1.95275" stroke-linecap="round"/>
             <line x1="1.35138" y1="13.9147" x2="19.0053" y2="13.9147" stroke="white" stroke-width="1.95275" stroke-linecap="round"/>
          </svg>
       </button>
       <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Packages
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                   <a class="dropdown-item" href="standard-package.html">Standard</a>
                   <a class="dropdown-item" href="ek-desh-ek-rate.html">Ek Desh Ek Rate</a>
                </div>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="faq.html">FAQs</a>
                <span class="cus-bor"></span>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="about.html">About</a>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact</a>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="self-care.html">Self Care</a>
             </li>
             {{-- <li> {{menu('main_menu', 'menus.smile_topmenu_bootstrap')}} </li> --}}
             {{-- <li> {{menu('main_menu')}} </li> --}}
             
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