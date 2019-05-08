<section class="main-container">

    <div class="container">
        <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-12">
                <!-- pills start -->
                <!-- ================ -->
                <!-- Nav tabs -->
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item"><a class="nav-link active" href="#pill-1" role="tab" data-toggle="tab"
                                            title="Latest Arrivals"><i class="fa fa-star"></i> Latest Arrivals</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pill-2" role="tab" data-toggle="tab"
                                            title="Featured"><i class="fa fa-heart"></i> Featured</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pill-3" role="tab" data-toggle="tab"
                                            title="Top Sellers"><i class=" fa fa-arrow-up"></i> Top Sellers</a></li>
                </ul>
                <!-- Tab panes -->
            @include('market.ads_content')
            <!-- pagination end -->
            </div>
            <!-- main end -->

        </div>
    </div>
</section>
