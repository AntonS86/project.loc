<div class="col-lg-3 col-md-6">
    <div class="listing-item white-bg bordered mb-20">
        @if($ad->images->isNotEmpty())
            <div class="slider-images" style="background-image: url({{$ad->images[0]->asset_thumbs_path}})">
                <ul>
                    @foreach($ad->images as $image)
                        <li class="slider-li-item" data-img="{{$ad->images[0]->asset_thumbs_path . 'sdf'}}"></li>
                    @endforeach
                    <li class="slider-li-item" data-img="{{$ad->images[0]->asset_thumbs_path . 'fdggf'}}"></li>
                    <li class="slider-li-item" data-img="{{$ad->images[0]->asset_thumbs_path . '345'}}"></li>
                    <li class="slider-li-item" data-img="{{$ad->images[0]->asset_thumbs_path . '456'}}"></li>
                </ul>
            </div>
        @endif
        <div class="body position-relative">
            <div class="address">
                <h3>{{$ad->address}}</h3>
            </div>
            <div class="d-flex default-bg my-2">
                @if (isset($ad->room))
                    <div class="small border p-1 flex-fill text-center">{{$ad->room}}-к</div>
                @endif
                @if (isset($ad->floors))
                    <div class="small border p-1 flex-fill text-center">
                        эт. {{$ad->floor ? $ad->floor .'/' : ''}}{{$ad->floors}}</div>
                @endif
                @if (isset($ad->total_square))
                    <div class="small border p-1 flex-fill text-center">{{$ad->total_square}} м<sup>2</sup></div>
                @endif
                @if (isset($ad->land_square))
                    <div class="small border p-1 flex-fill text-center">{{$ad->land_square / 100}} сот.</div>
                @endif
            </div>
            <div class="elements-list clearfix">
                <span class="price">{{$ad->current_price}} <i class="fa fa-rub"></i></span>
                <a href="#"
                   class="stretched-link"></a>
            </div>
        </div>
    </div>
</div>
