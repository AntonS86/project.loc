<!DOCTYPE html>
<html dir="ltr" lang="zxx">

<head>
    <meta charset="utf-8">
    <title>Админка</title>

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">

    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800,800i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">


    <!-- Font Awesome CSS -->
    <link href="{{asset('fonts/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <!-- Plugins -->
    {{--<link href="{{asset('plugins/magnific-popup/magnific-popup.css')}}" rel="stylesheet">--}}

    <link href="{{asset('css/animations.css')}}" rel="stylesheet">
    {{--<link href="{{asset('plugins/slick/slick.css')}}" rel="stylesheet">--}}


    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <link href="{{asset('css/typography-scheme-3.css')}}" rel="stylesheet">
    <!-- Color Scheme (In order to change the color scheme, replace the blue.css with the color scheme that you prefer) -->
    <link href="{{asset('css/skins/light_blue.css')}}" rel="stylesheet">

    <!-- Custom css -->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">

</head>

<body class=" ">

<div class="scrollToTop circle"><i class="fa fa-angle-up"></i></div>

<div class="page-wrapper">

    <div class="header-container">
        <header class="header clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 hidden-md-down">
                        <!-- header-first start -->
                        <!-- ================ -->
                        <div class="header-first clearfix">
                        @if(isset($company))
                            <!-- logo -->
                                <div id="logo" class="logo">
                                    <a href="{{route('home')}}"><img id="logo_img"
                                                                     src="{{ asset('images/logo/' . $company->img) }}"
                                                                     alt="{{$company->name}}"></a>
                                </div>

                                <!-- name-and-slogan -->
                                <div class="site-slogan">
                                    Multipurpose HTML5 Template
                                </div>
                            @endif

                        </div>
                        <!-- header-first end -->

                    </div>
                    <div class="col-lg-9">

                        <!-- header-second start -->
                        <!-- ================ -->
                        <div class="header-second clearfix">

                            <!-- main-navigation start -->
                            <!-- classes: -->
                            <!-- "onclick": Makes the dropdowns open on click, this the default bootstrap behavior e.g. class="main-navigation onclick" -->
                            <!-- "animated": Enables animations on dropdowns opening e.g. class="main-navigation animated" -->
                            <!-- ================ -->
                            <div class="main-navigation main-navigation--mega-menu  animated">
                                <nav class="navbar navbar-expand-lg navbar-light p-0">
                                    <div class="navbar-brand clearfix hidden-lg-up">
                                    @if(isset($company))
                                        <!-- logo -->
                                            <div id="logo-mobile" class="logo">
                                                <a href="{{route('home')}}"><img id="logo-img-mobile"
                                                                                 src="{{ asset('images/logo/' . $company->img) }}"
                                                                                 alt="{{$company->name}}"></a>
                                            </div>

                                            <!-- name-and-slogan -->
                                            <div class="site-slogan">
                                                Multipurpose HTML5 Template
                                            </div>
                                        @endif
                                    </div>

                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                            data-target="#navbar-collapse-1" aria-controls="navbar-collapse-1"
                                            aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>

                                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                                        @yield('menu')
                                    </div>
                                </nav>
                            </div>
                            <!-- main-navigation end -->
                        </div>
                        <!-- header-second end -->

                    </div>
                </div>
            </div>
        </header>
    </div>

    <div id="page-start"></div>

    @yield('page_content')

    @yield('footer')
</div>
<!-- page-wrapper end -->

<!-- JavaScript files placed at the end of the document so the pages load faster -->
<!-- ================================================== -->
<!-- Jquery and Bootstap core js files -->
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>

<script src="{{asset('plugins/waypoints/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('plugins/waypoints/sticky.min.js')}}"></script>
<!-- Count To javascript -->
<script src="{{asset('plugins/countTo/jquery.countTo.js')}}"></script>
<!-- Slick carousel javascript -->

<!-- Initialization of Plugins -->
<script src="{{asset('js/template.js')}}"></script>
<!-- Custom Scripts -->
<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('plugins/pace/pace.min.js')}}"></script>


@stack('textredactor')
@stack('paginate')

</body>
</html>
