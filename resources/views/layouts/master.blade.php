<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
        <meta name="description" content="Mer System is a web protal to track farmers activities">

        <meta property="og:type" content="website">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@naksoid">
        <meta name="twitter:creator" content="@naksoid">
        <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
        <link rel="icon" type="image/png" href="../img/favicon.ico" sizes="32x32">
        <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="manifest.json">
        <link rel="mask-icon" href="safari-pinned-tab.svg" color="#27ae60">
        <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
        <link rel="stylesheet" href="{{ asset('css/vendor.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/elephant.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/application.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/demo.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/custom.css')}}">

    </head>
    <body class="layout layout-header-fixed">
        @include('layouts.header')


        <div class="layout-main">
            @include('layouts.nav')

            <div class="layout-content">
                @yield('content')

            </div>

            @include('layouts.footer')



        </div>

        @yield('customjs')

    </body>
</html>