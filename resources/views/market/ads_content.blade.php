<div id="paginate-content">
    <div class="tab-content clear-style">
        <div class="tab-pane active" id="pill-1">
            <div class="row grid-space-10">
                @forelse($realestates as $realestate)
                    @include('market.ad', ['realestate' => $realestate])
                @empty
                    <h3>{{trans('text.not_found')}}</h3>
                @endforelse
            </div>
        </div>
        <div class="tab-pane" id="pill-2">
            <div class="row grid-space-10">
                @forelse($realestates_fav as $realestate)
                    @include('market.ad', ['realestate' => $realestate])
                @empty
                    <h3>{{trans('text.not_found')}}</h3>
                @endforelse
            </div>
        </div>
    </div>

    <!-- pills end -->

    <!-- pagination start -->
    @include('components.pagination', ['items' => $realestates])
</div>
