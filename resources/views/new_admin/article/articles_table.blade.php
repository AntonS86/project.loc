<div id="paginate-content">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Выбери статью для редактирования</strong>
        </div>
        <div class="card-body">
            @if(isset($articles))
                <div class="table">
                    @foreach($articles as $k => $article)
                        <div class="article-row" data-article_id="{{$article->id}}">
                            <div class="col-md-3">
                                <img
                                    @if (isset($article->images) && isset($article->images[0]))
                                    data-src="{{$article->images[0]->asset_path}}"
                                    @else
                                    src="http://placehold.it/200x100/cccccc&text=no_image"
                                    @endif
                                >
                            </div>
                            <div class="col-md">
                                <p>{{$article->title}}</p>
                            </div>
                            <div class="col-md-3 d-flex flex-column">
                                <div>{{$article->created_at->format('d-m-Y')}}</div>
                                <div class="text-info">{{trans('text.' . $article->status)}}</div>
                                <a class="btn btn-info mb-2"
                                   href="{{route('admin.articles.edit', ['article' => $article->id])}}">
                                    Редактировать
                                </a>
                                <a class="btn btn-info mb-2"
                                   href="{{route('articles.show', ['alias' => $article->alias])}}">Посмотреть</a>

                            </div>
                        </div>
                    @endforeach
                </div>
                @include('components.pagination', ['items' => $articles])
            @endif
        </div>
    </div>
</div>
