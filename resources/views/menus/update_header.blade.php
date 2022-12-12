<header class="{{Route::currentRouteName()=='home' ? 'header navbar fixed-top mz-sm-none nav-scl' : 'fixed-top mz-sm-none transparent-header-lg-faq'}}">
    <div class="header-top">
       <div class="menu-area">
          <div class="container">
             <div class="row align-items-center ">
                <div class="col-lg-2">
                   <div class="logo">
                      <a href="{{ url("/") }}">
                         <img src="{{asset('/storage/'.setting('site.logo'))}}" class="img-fluid" alt="">
                      </a>
                   </div>
                </div>
                <div class="{{setting('site.show_biling_button_menu') ? 'col-lg-7  align-items-center border-r p-0' : 'col-lg-8  align-items-center border-r p-0'}}">
                   <div class="main-menu f-right">
                      <nav>
                         
                            {{menu('main_menu', 'menus.smile_topmenu_bootstrap')}}
                         
                      </nav>
                   </div>
                   <div class="header-btn f-right"></div>
                </div>
                <div class="{{setting('site.show_biling_button_menu') ? 'col-lg-2 border-r call_h' : 'col-lg-2 call_h'}}">
                   <a href="tel:+09666666666">
                   <div class="mobile-call">

                         <p class="mobile-text">Call 24/7</p>
                         <p class="mobile-number">09666 666 666</p>

                   </div>
                   </a>
                </div>
                {{-- <div class="col-lg-1 p-0">
                   <div class="sml-language">
                      <div class="switch">
                         <input id="language-toggle" class="check-toggle check-toggle-round-flat" type="checkbox">
                         <label for="language-toggle"></label>
                         <span class="on">EN</span>
                         <span class="off">বাং</span>
                      </div>
                   </div>
                </div> --}}

                @if(setting('site.show_biling_button_menu'))
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
                @endif
             </div>
          </div>
       </div>
    </div>
 </header>




