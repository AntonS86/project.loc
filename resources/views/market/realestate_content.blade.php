<h1 class="page-title">{{$realestate->address}}</h1>
<div class="separator"></div>
<div class="row">
    <div class="col-lg-4 col-xl-5">
        <!-- pills start -->
        <!-- ================ -->
        <!-- Tab panes -->
        @if($realestate->images->isNotEmpty())
            <div class="tab-content clear-style">
                <div class="tab-pane active" id="pill-1">
                    <div class="slick-carousel content-slider-with-thumbs mb-20">
                        @foreach($realestate->images as $key=>$image)
                            <div class="overlay-container overlay-visible">
                                <img src="{{$image->asset_path}}" alt="">
                                <a href="{{$image->asset_path}}" class="slick-carousel--popup-img overlay-link"
                                   title="{{$key+1}}"></a>
                            </div>
                        @endforeach

                    </div>
                    <div class="content-slider-thumbs-container">
                        <div class="slick-carousel content-slider-thumbs">
                            @foreach($realestate->images as $image)
                                <div class="slick-nav-thumb">
                                    <img src="{{$image->asset_thumbs_path}}" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
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

            @if($realestate->room)
                <dt class="col-sm-5">{{trans('text.rooms_count')}}</dt>
                <dd class="col-sm-7">{{$realestate->room}}</dd>
            @endif
            @if($realestate->land_square)
                <dt class="col-sm-5">{{trans('text.land_square')}}</dt>
                <dd class="col-sm-7">{{$realestate->land_square/100}} сот.</dd>
            @endif
            @if($realestate->total_square)
                <dt class="col-sm-5">{{trans('text.total_square')}}</dt>
                <dd class="col-sm-7">{{$realestate->total_square}} м<sup>2</sup></dd>
            @endif
            @if($realestate->floors)
                <dt class="col-sm-5">{{trans('text.floor')}}</dt>
                <dd class="col-sm-7">{{$realestate->floor ? $realestate->floor.'/' : ''}}{{$realestate->floors}}</dd>
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
        </dl>
        @if($realestate->description)
            <h2>{{trans('text.description')}}</h2>
            <p>{{$realestate->description}}</p>
        @endif
        <hr>
        <span class="product price"><i class="fa fa-tag pr-10"></i>{{$realestate->current_price}} <i
                class="fa fa-rub"></i></span>
        <div class="product elements-list pull-right clearfix">
            <input type="submit" value="Add to Cart" class="margin-clear btn btn-default">
        </div>
    </div>
</div>
