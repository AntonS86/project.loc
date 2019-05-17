<div id="paginate-content">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Выбери объявление для редактирования</strong>
        </div>
        <div class="card-body">
            @if(isset($realestates))
                <div class="row">
                    @foreach($realestates as $realestate)
                        @include('new_admin.realestate.ad', ['realestate' => $realestate])
                    @endforeach
                </div>
                @include('components.pagination', ['items' => $realestates])
            @endif
        </div>
    </div>
</div>
