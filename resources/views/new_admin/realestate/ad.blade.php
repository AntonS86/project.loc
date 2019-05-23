<div class="col-lg-4 mb-5">
    <div class="listing-item">
        @if($realestate->images->isNotEmpty())
            <div id="carousel-{{$realestate->id}}" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($realestate->images as $k=>$image)
                        <li data-target="#carousel-{{$realestate->id}}" data-slide-to="{{$k}}" class="active"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach($realestate->images as $image)
                        <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                            <div style="background-image: url('{{$image->asset_thumbs_path}}');" class="w-100"></div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carousel-{{$realestate->id}}" role="button"
                   data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-{{$realestate->id}}" role="button"
                   data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        @endif
        <div class="body position-relative">
            <div class="address">{{$realestate->address}}</div>
            <div class="d-flex bg-instagram text-white my-2">
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
            <div class="my-2 d-flex justify-content-between">
                <div class="flex-fill">{{$realestate->current_price}} <i class="fa fa-rub"></i></div>
                <div class="flex-fill text-right">{{trans('text.'.$realestate->status)}}</div>
                <a href="{{route('admin.realestates.edit', ['realestate' => $realestate->id])}}" target="_blank"
                   class="stretched-link"></a>
            </div>
            <div>Дата создания: {{$realestate->created_at_view}}</div>
        </div>
    </div>
</div>
