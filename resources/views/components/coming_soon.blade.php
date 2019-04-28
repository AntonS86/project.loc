<div class="fullscreen-bg"></div>

<!-- banner start -->
<!-- ================ -->
<div class="pv-40 dark-translucent-bg">
    <div class="container">
        <div class="row justify-content-lg-center">
            <div class="col-lg-8 text-center pv-20">
                <div class="hc-element-invisible" data-animation-effect="fadeIn" data-effect-delay="100">
                    <!-- logo -->
                    <div id="logo" class="logo text-center">
                        <h3 class="margin-clear"><a href="index.html" class="logo-font link-light">The <span
                                    class="text-default">Project</span></a></h3>
                    </div>
                    <!-- name-and-slogan -->
                    <p class="small">Multipurpose HTML5 Template</p>
                    <h1 class="page-title text-center">{{trans('text.coming_soon')}}</h1>
                    <div class="separator"></div>
                    <p>{{$company->title}}</p>
                    <ul class="list-inline mb-20 text-center">
                        @include('components.contacts')
                    </ul>
                    <!-- countdown start -->
                    <div class="countdown clearfix"></div>
                    <!-- countdown end -->
                    <ul class="social-links circle animated-effect-1 text-center">
                        @include('components.social_links')
                    </ul>
                </div>
            </div>
        </div>
        <!-- .subfooter start -->
        <!-- ================ -->
        <p class="text-center hc-element-invisible" data-animation-effect="fadeIn" data-effect-delay="100">Copyright
            © {{ date('Y') }}. Все права защищены.</p>
        <!-- .subfooter end -->
    </div>
</div>
@push('comingsoon')
    <script src="plugins/countdown/jquery.countdown.min.js"></script>
    <script src="js/coming.soon.config.js"></script>
@endpush
