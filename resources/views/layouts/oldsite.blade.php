<!DOCTYPE html>
<html dir="ltr" lang="zxx">

  <head>
    <meta charset="utf-8">
    <title>The Project | Sliders Fullwidth</title>
    <meta name="description" content="The Project a Bootstrap-based, Responsive HTML5 Template">
    <meta name="author" content="author">

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">

    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800,800i" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,700" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="{{asset('fonts/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <!-- Plugins -->
    <link href="{{asset('plugins/magnific-popup/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/rs-plugin-5/css/settings.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/rs-plugin-5/css/layers.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/rs-plugin-5/css/navigation.css')}}" rel="stylesheet">
    <link href="{{asset('css/animations.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/slick/slick.css')}}" rel="stylesheet">
    
    <!-- The Project's core CSS file -->
    <!-- Use css/rtl_style.css for RTL version -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet" >
    <!-- The Project's Typography CSS file, includes used fonts -->
    <!-- Used font for body: Roboto -->
    <!-- Used font for headings: Raleway -->
    <!-- Use css/rtl_typography-default.css for RTL version -->
    <link href="{{asset('css/typography-scheme-3.css')}}" rel="stylesheet" >
    <!-- Color Scheme (In order to change the color scheme, replace the blue.css with the color scheme that you prefer) -->
    <link href="{{asset('css/skins/light_blue.css')}}" rel="stylesheet">

    <!-- Custom css -->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    
  </head>

  <!-- body classes:  -->
  <!-- "boxed": boxed layout mode e.g. <body class="boxed"> -->
  <!-- "pattern-1 ... pattern-9": background patterns for boxed layout mode e.g. <body class="boxed pattern-1"> -->
  <!-- "transparent-header": makes the header transparent and pulls the banner to top -->
  <!-- "gradient-background-header": applies gradient background to header -->
  <!-- "page-loader-1 ... page-loader-6": add a page loader to the page (more info @components-page-loaders.html) -->
  <body class="page-loader-3 pace-done">
    <div class="pace  pace-inactive">
        <div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
          <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
    <!-- scrollToTop -->
    <!-- ================ -->
    <div class="scrollToTop circle"><i class="fa fa-angle-up"></i></div>

    <!-- page wrapper start -->
    <!-- ================ -->
    <div class="page-wrapper">
      <!-- header-container start -->
      <div class="header-container">
        <!-- header-top start -->
        <!-- classes:  -->
        <!-- "dark": dark version of header top e.g. class="header-top dark" -->
        <!-- "colored": colored version of header top e.g. class="header-top colored" -->
        <!-- ================ -->
        @yield('header_top')
        <!-- header-top end -->

        <!-- header start -->
        <!-- classes:  -->
        <!-- "fixed": enables fixed navigation mode (sticky menu) e.g. class="header fixed clearfix" -->
        <!-- "fixed-desktop": enables fixed navigation only for desktop devices e.g. class="header fixed fixed-desktop clearfix" -->
        <!-- "fixed-all": enables fixed navigation only for all devices desktop and mobile e.g. class="header fixed fixed-desktop clearfix" -->
        <!-- "dark": dark version of header e.g. class="header dark clearfix" -->
        <!-- "centered": mandatory class for the centered logo layout -->
        <!-- ================ -->
        <header class="header fixed fixed-desktop clearfix">
          <div class="container">
            <div class="row">
              <div class="col-md-auto hidden-md-down pl-3">
                <!-- header-first start -->
                <!-- ================ -->
                <div class="header-first clearfix">

                  @if(isset($company))
                  <!-- logo -->
                  <div id="logo" class="logo">
                    <a href="{{route('home')}}"><img id="logo_img" src="{{ asset('images/logo/' . $company->img) }}" alt="{{$company->name}}"></a>
                  </div>

                  <!-- name-and-slogan -->
                  <div class="site-slogan">
                    Multipurpose HTML5 Template
                  </div>
                  @endif
                </div>
                <!-- header-first end -->

              </div>
              <div class="col-lg-8 ml-auto">

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
                        <a href="{{route('home')}}"><img id="logo-img-mobile" src="{{ asset('images/logo/' . $company->img) }}" alt="{{$company->name}}"></a>
                      </div>

                      <!-- name-and-slogan -->
                      <div class="site-slogan">
                        Multipurpose HTML5 Template
                      </div>
                    @endif
                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-1" aria-controls="navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                      <!-- main-menu -->
						          @yield('menu')
                      <!-- main-menu end -->
                    </div>
                  </nav>
                </div>
                <!-- main-navigation end -->
                </div>
                <!-- header-second end -->

              </div>
              <div class="col-auto hidden-md-down">
                <!-- header dropdown buttons -->
                <div class="header-dropdown-buttons">
                  <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle dropdown-toggle--no-caret" id="header-drop-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></button>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-animation" aria-labelledby="header-drop-1">
                      <li>
                        <form role="search" class="search-box margin-clear">
                          <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Search">
                            <i class="fa fa-search form-control-feedback"></i>
                          </div>
                        </form>
                      </li>
                    </ul>
                  </div>
                  <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle dropdown-toggle--no-caret" id="header-drop-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-basket"></i><span class="cart-count default-bg">8</span></button>
                    <ul class="dropdown-menu dropdown-menu-right cart dropdown-animation" aria-labelledby="header-drop-2">
                      <li>
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th class="quantity">QTY</th>
                              <th class="product">Product</th>
                              <th class="amount">Subtotal</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="quantity">2 x</td>
                              <td class="product"><a href="shop-product.html">Android 4.4 Smartphone</a><span class="small">4.7" Dual Core 1GB</span></td>
                              <td class="amount">$199.00</td>
                            </tr>
                            <tr>
                              <td class="quantity">3 x</td>
                              <td class="product"><a href="shop-product.html">Android 4.2 Tablet</a><span class="small">7.3" Quad Core 2GB</span></td>
                              <td class="amount">$299.00</td>
                            </tr>
                            <tr>
                              <td class="quantity">3 x</td>
                              <td class="product"><a href="shop-product.html">Desktop PC</a><span class="small">Quad Core 3.2MHz, 8GB RAM, 1TB Hard Disk</span></td>
                              <td class="amount">$1499.00</td>
                            </tr>
                            <tr>
                              <td class="total-quantity" colspan="2">Total 8 Items</td>
                              <td class="total-amount">$1997.00</td>
                            </tr>
                          </tbody>
                        </table>
                        <div class="panel-body text-right">
                          <a href="shop-cart.html" class="btn btn-group btn-gray btn-sm">View Cart</a>
                          <a href="shop-checkout.html" class="btn btn-group btn-gray btn-sm">Checkout</a>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- header dropdown buttons end -->
              </div>
            </div>
          </div>
        </header>
        <!-- header end -->
      </div>
      <!-- header-container end -->
      <!-- banner start -->
	  <!-- ================ -->
	  @yield('slider')
      <!-- banner end -->

      <div id="page-start"></div>

    @yield('page_content')

      <!-- footer top start -->
      <!-- ================ -->
      <div class="dark-bg default-hovered footer-top animated-text">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="call-to-action text-center">
                <div class="row">
                  <div class="col-md-8">
                    <h2 class="mt-4">Powerful Bootstrap Template</h2>
                    <h2 class="mt-4">Waste no more time</h2>
                  </div>
                  <div class="col-md-4">
                    <p class="mt-3"><a href="#" class="btn btn-animated btn-lg btn-gray-transparent">Purchase<i class="fa fa-cart-arrow-down pl-20"></i></a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- footer top end -->

      <!-- footer start (Add "dark" class to #footer in order to enable dark footer) -->
      <!-- ================ -->
		@yield('footer')
      <!-- footer end -->
    </div>
    <!-- page-wrapper end -->

    <!-- JavaScript files placed at the end of the document so the pages load faster -->
    <!-- ================================================== -->
    <!-- Jquery and Bootstap core js files -->
    <script src="{{asset('plugins/jquery.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- jQuery Revolution Slider  -->
    <script src="{{asset('plugins/rs-plugin-5/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('plugins/rs-plugin-5/js/jquery.themepunch.revolution.min.js')}}"></script>
    <!-- Isotope javascript -->
    <script src="{{asset('plugins/isotope/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('plugins/isotope/isotope.pkgd.min.js')}}"></script>
    <!-- Magnific Popup javascript -->
    <script src="{{asset('plugins/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <!-- Appear javascript -->
    <script src="{{asset('plugins/waypoints/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('plugins/waypoints/sticky.min.js')}}"></script>
    <!-- Count To javascript -->
    <script src="{{asset('plugins/countTo/jquery.countTo.js')}}"></script>
    <!-- Slick carousel javascript -->
    <script src="{{asset('plugins/slick/slick.min.js')}}"></script>

    <script src="{{asset('plugins/pace/pace.min.js')}}"></script>
    <!-- Initialization of Plugins -->
    <script src="{{asset('js/template.js')}}"></script>
    <!-- Custom Scripts -->
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{asset('plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/rs-plugin-5/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/rs-plugin-5/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/rs-plugin-5/js/extensions/revolution.extension.navigation.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/test.js')}}"></script>

  </body>
</html>
