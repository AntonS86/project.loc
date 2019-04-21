<div class="header-container">
    @include('header_top')
    <header class="header fixed fixed-desktop clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-auto hidden-md-down pl-3">
                    <div class="header-first clearfix">

                        @if(isset($company))

                            <div id="logo" class="logo">
                                <a href="{{route('home')}}"><img id="logo_img"
                                                                 src="{{ asset('images/logo/' . $company->img) }}"
                                                                 alt="{{$company->name}}"></a>
                            </div>
                            <div class="site-slogan">
                                Multipurpose HTML5 Template
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-8 ml-auto">

                    <div class="header-second clearfix">

                        <div class="main-navigation main-navigation--mega-menu  animated">
                            <nav class="navbar navbar-expand-lg navbar-light p-0">

                                <div class="navbar-brand clearfix hidden-lg-up">

                                    @if(isset($company))

                                        <div id="logo-mobile" class="logo">
                                            <a href="{{route('home')}}"><img id="logo-img-mobile"
                                                                             src="{{ asset('images/logo/' . $company->img) }}"
                                                                             alt="{{$company->name}}"></a>
                                        </div>
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
                                    @include('menu')
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-auto hidden-md-down">
                    <div class="header-dropdown-buttons">
                        <div class="btn-group">
                            <button type="button" class="btn dropdown-toggle dropdown-toggle--no-caret"
                                    id="header-drop-1" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"><i class="fa fa-search"></i></button>
                            <ul id="search-list" class="dropdown-menu dropdown-menu-right dropdown-animation"
                                aria-labelledby="header-drop-1">
                                <li>
                                    <form role="search" method="get" action="{{route('articles.search')}}"
                                          data-action="{{route('search.articles_ajax')}}"
                                          class="search-box margin-clear">
                                        <div class="form-group has-feedback">
                                            <input type="text" class="form-control"
                                                   placeholder="{{trans('text.search')}}">
                                            <i class="fa fa-search form-control-feedback"></i>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

</div>
