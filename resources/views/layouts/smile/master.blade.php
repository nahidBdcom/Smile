<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <link rel="manifest" href="site.webmanifest"> --}}
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

        @yield('seo_meta')

        @yield('social_media_meta')

        @yield('extra_meta')

        @include('layouts.smile.partials.style')

        @yield('additional-style')
        @yield('additional-style-reviews')
        @yield('additional-style-connectivity-form-css')
        @yield('additional-userreview-css')


        <script type="text/javascript">
            function callbackThen(response) {
         
              // read Promise object
              response.json().then(function(data) {
                console.log(data);
                if(data.success && data.score >= 0.6) {
                   console.log('valid recaptcha');
                } else {
                   document.getElementById('connectivity_request_form').addEventListener('submit', function(event) {
                      event.preventDefault();
                      alert('recaptcha error');
                   });
                }
              });
            }
         
            function callbackCatch(error){
               console.error('Error:', error)
            }
            </script>

            {!! htmlScriptTagJsApi([
                'callback_then' => 'callbackThen',
                'callback_catch' => 'callbackCatch',
            ]) !!}


    </head>
    <body>

        {{-- @include('layouts.smile.partials.header') --}}
        @include('menus.update_header')
        @include('menus.update_mobile_header')

        @yield('content')

        <!-- Footer -->
        @include('layouts.smile.partials.footer')
        <!-- Footer End -->


        <!-- Javascript -->
        @include('layouts.smile.partials.javascript')

        @yield('additional-javascripts')
        @yield('additional-javascripts-reviews')
        @yield('additional-style-connectivity-form-js')
        @yield('additional-userreview-js')
        <!-- Javascript End -->


    </body>
</html>








