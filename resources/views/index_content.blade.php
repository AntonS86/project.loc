@include('components.meta_tag_index')
<section class="light-gray-bg pv-30 padding-bottom-clear clearfix">
    <div class="container">
        <h3 class="logo-font text-center text-muted">Наши <span class="text-default">Предложения</span></h3>
        <br>
        @if(! $offers->isEmpty())
            @foreach($offers as $offer)
                @if($loop->index % 3 == 0) <div class="row"> @endif
                <div class="col-lg-4">
                    <div class="pv-20 ph-20 hc-item-box-2 boxed hc-shadow-2 hc-element-invisible"
                         data-animation-effect="fadeInDownSmall" data-effect-delay="100">
                        <span class="icon without-bg"><i class="fa {{$offer->icon}}"></i></span>
                        <div class="body">
                            <h4 class="title">{{$offer->title}}</h4>
                            <p>{{$offer->desc}}</p>
                            <a class="stretched-link" href="{{$offer->path}}">{{trans('text.look')}}<i
                                    class="pl-1 fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
                @if($loop->index % 3 == 2) </div> @endif
            @endforeach

        @endif
        <br>
    </div>
</section>
<div class="clearfix"></div>
