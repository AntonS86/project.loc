<section class="main-container">

    <div class="container">
        <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-12">
                <!-- pills start -->
                <!-- ================ -->
            @if (isset($realestate))
                @include('market.realestate_content')
            @else
                @include('market.nav_tabs')
                <!-- Tab panes -->
                @include('market.ads_content')
            @endif
            <!-- pagination end -->
            </div>
            <!-- main end -->

        </div>
    </div>
</section>
