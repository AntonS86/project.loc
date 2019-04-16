@if (isset($popularKeywords))
    <div class="block clearfix">
        <h3 class="title">{{title_case(trans('text.popular_tags'))}}</h3>
        <div class="separator-2"></div>
        <div class="tags-cloud">
            @foreach($popularKeywords as $tag)
                <div class="tag">
                    <a href="{{route('articlesKeyword', ['keyword_alias' => $tag->alias])}}">{{$tag->name}}</a>
                </div>
            @endforeach
        </div>
    </div>
@endif
