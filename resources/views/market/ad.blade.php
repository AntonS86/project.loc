<div class="col-lg-3 col-md-6">
    <div class="listing-item white-bg bordered mb-20">
        @if($realestate->images->isNotEmpty())
            <div class="slider-images overlay-container"
                 style="background-image: url({{$realestate->images[0]->asset_thumbs_path}})">
                <ul>
                    @foreach($realestate->images as $image)
                        <li class="slider-li-item">
                            <div style="background-image: url({{$image->asset_thumbs_path. '123'}})"></div>
                        </li>
                    @endforeach
                    <li class="slider-li-item">
                        <div style="background-image: url({{$image->asset_thumbs_path. '12ew3'}})"></div>
                    </li>
                    <li class="slider-li-item">
                        <div style="background-image: url({{$image->asset_thumbs_path. 'wer'}})"></div>
                    </li>
                    <li class="slider-li-item">
                        <div style="background-image: url({{$image->asset_thumbs_path. '1we3'}})"></div>
                    </li>
                </ul>
                {{--<div class="overlay-to-top links">
                            <span class="small">
                              <a href="{{route('realestate.fav_toggle', ['realestate' => $realestate->id])}}" data-id="{{$realestate->id}}" data-text="{{trans('text.to_favorites')}}" class="wishlist"><i class="fa {{in_array($realestate->id, $rs_fav_id) ? 'fa-heart' : 'fa-heart-o'}} pr-10"></i><span>{{in_array($realestate->id, $rs_fav_id) ? '' : trans('text.to_favorites')}}</span></a>
                              <a href="#" class="btn-sm-link"><i class="fa fa-link pr-1"></i>View Details</a>
                            </span>
                </div>--}}
                {{--
                                <a href="{{route('realestate.fav_toggle', ['realestate' => $realestate->id])}}" data-id="{{$realestate->id}}" class="wishlist"><i class="fa {{in_array($realestate->id, $rs_fav_id) ? 'fa-heart' : 'fa-heart-o'}}"></i></a>
                --}}
            </div>
        @endif
        <div class="body position-relative">
            <div class="address">
                <h3>{{$realestate->address}}</h3>
            </div>
            <div class="d-flex default-bg my-2">
                @if (isset($realestate->room))
                    <div class="small border p-1 flex-fill text-center">{{$realestate->room}}-к</div>
                @endif
                @if (isset($realestate->floors))
                    <div class="small border p-1 flex-fill text-center">
                        эт. {{$realestate->floor ? $realestate->floor .'/' : ''}}{{$realestate->floors}}</div>
                @endif
                @if (isset($realestate->total_square))
                    <div class="small border p-1 flex-fill text-center">{{$realestate->total_square}} м<sup>2</sup>
                    </div>
                @endif
                @if (isset($realestate->land_square))
                    <div class="small border p-1 flex-fill text-center">{{$realestate->land_square / 100}} сот.</div>
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
