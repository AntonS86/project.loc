<!DOCTYPE html>
<html lang="ru" prefix="http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">

<head>
    {{--@include('components.analytics')--}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@stack('title') {{config('app.name')}}</title>

    <meta name="description" content="@stack('description')">
    <meta name="keywords" content="@stack('keywords')">
    <meta property="og:url" content="@stack('og:url')">
    <meta property="og:site_name" content="{{config('app.name')}}">
    <meta property="og:title" content="@stack('og:title')">
    <meta property="og:description" content="@stack('og:description')">
    <meta property="og:image" content="@stack('og:image')">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="ru_RU">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800,800i" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">

    <link href="{{asset('fonts/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <link href="{{asset('plugins/magnific-popup/magnific-popup.css')}}" rel="stylesheet">

    @stack('slider-css')
    <link href="{{asset('css/animations.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/slick/slick.css')}}" rel="stylesheet">

    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/typography-scheme-3.css')}}" rel="stylesheet">
    <link href="{{asset('css/skins/light_blue.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
</head>

<body class="page-loader-3">

<div class="scrollToTop circle"><i class="fa fa-angle-up"></i></div>

<div class="page-wrapper">


    @yield('header')

    @yield('slider')

    <div id="page-start"></div>

    @yield('page_content')

    @yield('action_block')

    @yield('footer')

</div>

</body>

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>

@stack('slider')
<script src="{{asset('plugins/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<!-- Appear javascript -->
<script src="{{asset('plugins/waypoints/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('plugins/waypoints/sticky.min.js')}}"></script>
<!-- Count To javascript -->
<script src="{{asset('plugins/countTo/jquery.countTo.js')}}"></script>

<script src="{{asset('plugins/pace/pace.min.js')}}"></script>
<!-- Initialization of Plugins -->
<script src="{{asset('js/template.js')}}"></script>
<!-- Custom Scripts -->
<script src="{{asset('js/custom.js')}}"></script>

@stack('workMessage')

</html>
