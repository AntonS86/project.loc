<div id="paginate-content">
    <div class="tab-content clear-style">
        <div class="tab-pane active" id="pill-1">
            <div class="row grid-space-10">
                @foreach($ads as $ad)
                    @include('market.ad', ['ad' => $ad])
                @endforeach
            </div>
        </div>
    </div>
    <!-- pills end -->

    <!-- pagination start -->
    @include('components.pagination', ['items' => $ads])
</div>
