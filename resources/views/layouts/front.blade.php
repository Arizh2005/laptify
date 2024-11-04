<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale=1">
        <meta name="crsf-token" content="{{csrf_token()}}">

        @yield('meta')

        {{--Tittle--}}
        @yield('tittle')

        {{--Style--}}
        @yield('style')
        <!--Fonts-->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display">

        <!--Scripts-->

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans bg-gray-100 text-gray-900 antialiased" >
        {{--Content--}}
        @include('layouts/nav')
        @yield('content')
        @include('layouts/recent')
        @include('layouts/slogan')

        {{--Script--}}
        @yield('script')

        @include('layouts/footer')
    </body>
</html>