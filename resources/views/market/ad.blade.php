<div class="col-lg-3 col-md-6">
    <div class="listing-item white-bg bordered mb-20">
        @if($realestate->images->isNotEmpty())
            <div class="slider-images"
                 style="background-image: url({{$realestate->images[0]->asset_path}})">
                <ul>
                    @foreach($realestate->images as $image)
                        <li class="slider-li-item">
                            <div style="background-image: url({{$image->asset_path}})"></div>
                        </li>
                    @endforeach
                </ul>
                <a href="{{route('realestate.fav_toggle', ['realestate' => $realestate->id])}}"
                   title="{{trans('text.favorite')}}" data-id="{{$realestate->id}}" class="wishlist"><i
                        class="fa {{in_array($realestate->id, $rs_fav_id) ? 'fa-heart' : 'fa-heart-o'}}"></i></a>
            </div>
        @endif
        <div class="body position-relative">
            <div class="address">
                <h3>{{$realestate->address}}</h3>
            </div>
            <div class="d-flex default-bg my-2">
                @if (isset($realestate->rooms_view))
                    <div class="small border p-1 flex-fill text-center">{{$realestate->rooms_view}}</div>
                @endif
                @if (isset($realestate->floors_view))
                    <div class="small border p-1 flex-fill text-center">
                        эт. {{$realestate->floors_view}}</div>
                @endif
                @if (isset($realestate->total_square_view))
                    <div class="small border p-1 flex-fill text-center">{{$realestate->total_square_view}}</div>
                @endif
                @if (isset($realestate->land_square_view))
                    <div class="small border p-1 flex-fill text-center">{{$realestate->land_square_view}}</div>
                @endif
            </div>
            <div class="elements-list clearfix">
                <span class="price">{{$realestate->current_price}} <i class="fa fa-rub"></i></span>
                <a href="{{route('realestates.show', ['realestate' => $realestate->id])}}" target="_blank"
                   class="stretched-link"></a>
            </div>
        </div>
    </div>
</div>
