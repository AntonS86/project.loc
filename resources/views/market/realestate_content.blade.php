@include('components.meta_tag_realestate', ['realestate' => $realestate])
<h1 class="page-title">{{$realestate->address}}</h1>
<div class="separator"></div>
<div class="row">
    <div class="col-lg-4 col-xl-5">
        <!-- pills start -->
        <!-- ================ -->
        <!-- Tab panes -->
        @if($realestate->images->isNotEmpty())
            <div class="tab-content clear-style">
                <div class="fotorama" data-nav="thumbs" data-loop="true">
                    @foreach($realestate->images as $key=>$image)
                        <a href="{{$image->asset_path}}"><img src="{{$image->asset_thumbs_path}}"></a>
                    @endforeach
                </div>
            </div>
    @endif
    <!-- pills end -->
        <hr class="mb-10">
        <div class="clearfix mb-20">
            <a href="{{route('realestate.fav_toggle', ['realestate' => $realestate->id])}}"
               data-id="{{$realestate->id}}" data-text="{{trans('text.to_favorites')}}" class="wishlist"><i
                    class="fa {{in_array($realestate->id, $rs_fav_id) ? 'fa-heart' : 'fa-heart-o'}} pl-10 pr-1"></i><span>{{in_array($realestate->id, $rs_fav_id) ? '' : trans('text.to_favorites')}}</span></a>
            <ul id="share"
                class="pl-20 pull-right social-links colored circle small clearfix margin-clear animated-effect-1">
                @include('components.share_links')
            </ul>
        </div>
    </div>
    <div class="col-lg-8 col-xl-7 pb-30">
        <h2>{{trans('text.details')}}</h2>
        <dl class="row" id="details">
            <dt class="col-sm-5">{{trans('text.rubric')}}</dt>
            <dd class="col-sm-7">{{$realestate->rubric->name}}</dd>

            <dt class="col-sm-5">{{trans('text.category')}}</dt>
            <dd class="col-sm-7">{{$realestate->type->name}}</dd>

            @if($realestate->rooms_view)
                <dt class="col-sm-5">{{trans('text.rooms_count')}}</dt>
                <dd class="col-sm-7">{{$realestate->rooms_view}}</dd>
            @endif
            @if($realestate->land_square_view)
                <dt class="col-sm-5">{{trans('text.land_square')}}</dt>
                <dd class="col-sm-7">{{$realestate->land_square_view}}</dd>
            @endif
            @if($realestate->total_square_view)
                <dt class="col-sm-5">{{trans('text.total_square')}}</dt>
                <dd class="col-sm-7">{{$realestate->total_square_view}}</dd>
            @endif
            @if($realestate->floors_view)
                <dt class="col-sm-5">{{trans('text.floor')}}</dt>
                <dd class="col-sm-7">{{$realestate->floors_view}}</dd>
            @endif
            @if($realestate->balcony)
                <dt class="col-sm-5">{{trans('text.balcony')}}</dt>
                <dd class="col-sm-7">{{$realestate->balcony}}</dd>
            @endif
            @if($realestate->loggia)
                <dt class="col-sm-5">{{trans('text.loggia')}}</dt>
                <dd class="col-sm-7">{{$realestate->loggia}}</dd>
            @endif
            @if($realestate->year)
                <dt class="col-sm-5">{{trans('text.construction_year')}}</dt>
                <dd class="col-sm-7">{{$realestate->year}}</dd>
            @endif
            @if($realestate->cadastral_number)
                <dt class="col-sm-5">{{trans('text.cadastral_number')}}</dt>
                <dd class="col-sm-7">{{$realestate->cadastral_number}}</dd>
            @endif
            <dt class="col-sm-5">{{trans('text.added')}}</dt>
            <dd class="col-sm-7">{{$realestate->date_view_at}}</dd>
        </dl>
        @if($realestate->description)
            <h2>{{trans('text.description')}}</h2>
            <p>{{$realestate->description}}</p>
        @endif
        <hr>
        <span class="product price"><i class="fa fa-tag pr-10"></i>{{$realestate->current_price}} <i
                class="fa fa-rub"></i></span>
        @if(isset($company->phone))
            <div class="product elements-list pull-right clearfix">
                <a href="tel:{{$company->phone}}" class="margin-clear btn btn-animated btn-default">{{$company->phone}}
                    <i class="fa fa-phone"></i>
                </a>
            </div>
        @endif
    </div>
</div>

@push('fotorama.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
@endpush
@push('fotorama.js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
@endpush
