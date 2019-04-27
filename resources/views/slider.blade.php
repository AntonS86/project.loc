@if(! $slider->isEmpty())
    <div class="slideshow">
        <div class="slider-revolution-5-container">
            <div id="slider-banner-fullwidth" class="slider-banner-fullwidth rev_slider" data-version="5.0">
                <ul class="slides">

                @foreach($slider as $sliderItem)
                        <li class="text-center" data-transition="crossfade" data-slotamount="default"
                            data-masterspeed="default" data-title="">

                            <img src="{{ asset('images/slider/' . $sliderItem->img) }}" alt="slidebg1"
                                 data-bgposition="center top" data-bgrepeat="no-repeat" data-bgfit="cover"
                                 class="rev-slidebg">

                            <div class="tp-caption dark-translucent-bg"
                                 data-x="center"
                                 data-y="center"
                                 data-start="0"
                                 data-transform_idle="o:1;"
                                 data-transform_in="o:0;s:600;e:Power2.easeInOut;"
                                 data-transform_out="o:0;s:600;"
                                 data-width="5000"
                                 data-height="5000">
                            </div>

                            <div class="tp-caption large_white"
                                 data-x="center"
                                 data-y="50"
                                 data-start="1000"
                                 data-width="650"
                                 data-transform_idle="o:1;"
                                 data-transform_in="y:[100%];sX:1;sY:1;o:0;s:1150;e:Power4.easeInOut;"
                                 data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;"
                                 data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
                                 data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;">
                                {!! $sliderItem->desc !!}
                            </div>

                            <div class="tp-caption large_white tp-resizeme hidden-xs"
                                 data-x="center"
                                 data-y="150"
                                 data-start="1300"
                                 data-width="500"
                                 data-transform_idle="o:1;"
                                 data-transform_in="o:0;s:2000;e:Power4.easeInOut;">
                                <div class="separator light"></div>
                            </div>

                            <div class="tp-caption medium_white hidden-xs"
                                 data-x="center"
                                 data-y="190"
                                 data-start="1300"
                                 data-width="750"
                                 data-transform_idle="o:1;"
                                 data-transform_in="y:[100%];sX:1;sY:1;s:800;e:Power4.easeInOut;"
                                 data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;"
                                 data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                 data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;">{!! $sliderItem->title !!}
                            </div>

                            <div class="tp-caption small_white text-center"
                                 data-x="center"
                                 data-y="310"
                                 data-start="1600"
                                 data-width="650"
                                 data-transform_idle="o:1;"
                                 data-transform_in="y:[100%];sX:1;sY:1;s:600;e:Power4.easeInOut;"
                                 data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;"
                                 data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
                                 data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;">
                                @if (isset($company->phone))
                                <a href="tel:{{$company->phone}}"
                                   class="btn btn-default btn-sm btn-animated margin-clear">{{ trans('text.call_us') }}
                                    <i
                                        class="fa fa-phone"></i></a>
                                @endif
                            </div>
                        </li>

                    @endforeach
                </ul>
                <div class="tp-bannertimer"></div>
            </div>
        </div>
    </div>
    </div>
@endif

@push('slider-css')
    <link href="{{asset('plugins/rs-plugin-5/css/settings.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/rs-plugin-5/css/layers.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/rs-plugin-5/css/navigation.css')}}" rel="stylesheet">
@endpush

@push('slider')
    <script src="{{asset('plugins/rs-plugin-5/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('plugins/rs-plugin-5/js/jquery.themepunch.revolution.min.js')}}"></script>
@endpush

