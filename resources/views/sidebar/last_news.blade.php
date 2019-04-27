@if (isset($lastArticles) && !$lastArticles->isEmpty())
    <div id="last-articles" class="block clearfix">
        <h3 class="title">{{title_case(trans('text.last_news'))}}</h3>
        <div class="separator-2"></div>
        @foreach($lastArticles as $lastArticle)
            <div class="media margin-clear">

                @if (isset($lastArticle->images) && isset($lastArticle->images[0]))
                    <div class="d-flex pr-2">
                        <div class="overlay-container">
                            <img class="media-object" data-src="{{$lastArticle->images[0]->asset_path}}"
                                 alt="{{$lastArticle->title}}" title="{{$lastArticle->title}}">
                            <a href="{{route('articles.show', ['alias' => $lastArticle->alias])}}"
                               class="overlay-link small"></a>
                        </div>
                    </div>
                @endif

                <div class="media-body">
                    <h6 class="media-heading"><a
                            href="{{route('articles.show', ['alias' => $lastArticle->alias])}}">{{$lastArticle->title}}</a>
                    </h6>
                    <p class="small margin-clear text-right"><i
                            class="fa fa-calendar pr-10"></i>{{$lastArticle->published_at->format('d')}} {{trans('text.month.'.$lastArticle->published_at->format('F'))}}  {{$lastArticle->published_at->format('Y')}}
                    </p>
                </div>

            </div>
            @if (! $loop->last)
                <hr>
            @endif
        @endforeach

        <div class="text-right space-top">
            <a href="{{route('articles.index')}}"><i
                    class="fa fa-angle-double-right pl-1 pr-1"></i>{{title_case(trans('text.more'))}}</a>
        </div>
    </div>
@endif
