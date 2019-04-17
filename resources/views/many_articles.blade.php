@if(! $articles->isEmpty())

    @include('components.meta_tag_many_articles')

    <h1 class="page-title">{{$categories->title ?? $keywords->name ?? $search ?? 'Последние новости'}}</h1>
    <div class="separator-2"></div>
    <div id="articles">
        @foreach($articles as $article)
            <article class="blogpost">
                @if (isset($article->images) && isset($article->images[0]))
                    <div class="row grid-space-10">
                        <div class="col-lg-6">
                            <img data-src="{{$article->images[0]->asset_path}}" alt="{{$article->title}}"
                                 title="{{$article->title}}" class="img-many-articles mx-auto d-block">
                        </div>
                        <div class="col-lg-6">
                            @endif
                            <header>
                                <h2>
                                    <a href="{{ route('articles.show', ['alias' => $article->alias]) }}">{{$article->title}}</a>
                                </h2>
                                <div class="post-info">
							<span class="post-date">
								<i class="fa fa-calendar-o pr-1"></i>
								<span class="day">{{$article->published_at->format('d')}}</span>
								<span
                                    class="month">{{trans('text.month.'.$article->published_at->format('F'))}}  {{$article->published_at->format('Y')}}</span>
							</span>
                                    <span class="post-info">
                                <i class="fa fa-chain"></i> <a
                                            href="{{ route('articlesCategory', ['cat_alias' => $article->category->alias])}}"
                                            class="default">{{$article->category->title}}</a>
                            </span>
                                </div>

                            </header>
                            <div class="blogpost-content">
                                <p>{{$article->desc}}</p>
                            </div>
                            @if (isset($article->images) && isset($article->images[0]))
                        </div>
                    </div>
                @endif
                <footer class="clearfix">
                    @if (isset($article->keywords) && ! $article->keywords->isEmpty())
                        <div class="tags pull-left"><i class="fa fa-tags pr-1"></i>
                            @foreach($article->keywords as $k => $keyword)
                                <a href="{{ route('articlesKeyword', ['keyword_alias' => $keyword->alias])}}">{{ $keyword->name }}</a>
                                &nbsp;
                            @endforeach
                        </div>
                    @endif
                    <div class="link pull-right"><i class="fa fa-link pr-1"></i><a
                            href="{{ route('articles.show', ['alias' => $article->alias]) }}">{{title_case(trans('text.read_more'))}}</a>
                    </div>
                </footer>
            </article>
        @endforeach

        @include('components.pagination', ['items' => $articles])

    </div>
@else

    <h1 class="page-title">Нет статей для отображения</h1>
    <div class="separator-2"></div>
@endif
@push('paginate')
    <script src="{{asset('js/PaginateArticles.js')}}"></script>
@endpush
