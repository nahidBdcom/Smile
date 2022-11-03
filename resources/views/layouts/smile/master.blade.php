<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" sizes="16x16" href="{{ asset("/favicon.ico") }}">

        @yield('seo_meta')

        @yield('social_media_meta')

        @yield('extra_meta')

        @include('layouts.smile.partials.style')

        @yield('additional-style')

    </head>
    <body class="bg-white">

        @include('layouts.smile.partials.header')

        @yield('content')

        <!-- Footer -->
        @include('layouts.smile.partials.footer')
        <!-- Footer End -->


        <!-- Javascript -->
        @include('layouts.smile.partials.javascript')

        @yield('additional-javascripts')
        <!-- Javascript End -->
        
    </body>
</html>
