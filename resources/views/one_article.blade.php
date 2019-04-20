<h1 class="page-title">{{$oneArticle->title ?? 'Последние новости'}}</h1>
<div class="separator-2"></div>

@if(isset($oneArticle))
    @include('components.meta_tag_article', ['article' => $oneArticle])

    <article class="blogpost full">
        <header>
            <div class="post-info mb-4">
        <span class="post-date">
            <i class="fa fa-calendar-o pr-1"></i>
            <span class="day">{{$oneArticle->published_at->format('d')}}</span>
            <span
                class="month">{{trans('text.month.'.$oneArticle->published_at->format('F'))}}  {{$oneArticle->published_at->format('Y')}}</span>
        </span>
                <span>
            <i class="fa fa-chain"></i> <a
                        href="{{$oneArticle->category->path}}"
                        class="default">{{$oneArticle->category->title}}</a>
        </span>
            </div>
        </header>
        <div class="blogpost-content">
            @if (isset($oneArticle->images) && isset($oneArticle->images[0]))
                <div class="mb-5">
                    <img data-src="{{$oneArticle->images[0]->asset_path}}" alt="{{$oneArticle->title}}"
                         alt="{{$oneArticle->title}}" class="img-fluid mx-auto d-block">
                </div>
            @endif
            {{--<h3 class="my-4">{{$oneArticle->title}}</h3>--}}
            <p class="large">{{$oneArticle->desc}}</p>
            {!! $oneArticle->text !!}
        </div>
        <footer class="clearfix">
            @if (isset($oneArticle->keywords) && ! $oneArticle->keywords->isEmpty())
                <div class="tags pull-left"><i class="fa fa-tags pr-1"></i>
                    @foreach($oneArticle->keywords as $k => $keyword)
                        <a href="{{ route('articlesKeyword', ['keyword_alias' => $keyword->alias])}}">{{ $keyword->name }}</a>
                        &nbsp;
                    @endforeach
                </div>
            @endif
            <div class="link pull-right">
                <ul id="share" class="social-links circle colored clearfix margin-clear text-right animated-effect-1">
                    <li class="twitter mx-1"><a href="https://twitter.com/intent/tweet?url={{url()->current()}}"><i
                                class="fa fa-twitter"></i></a></li>
                    <li class="facebook mx-1"><a
                            href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}"><i
                                class="fa fa-facebook"></i></a></li>
                    <li class="instagram mx-1"><a href="https://vk.com/share.php?url={{url()->current()}}"><i
                                class="fa fa-vk"></i></a></li>
                </ul>
            </div>
        </footer>
    </article>
@endif
@push('share')
    <script src="{{asset('js/Share.js')}}"></script>
@endpush
