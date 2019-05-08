<div id="paginate-content">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Выбери статью для редактирования</strong>
        </div>
        <div class="card-body">
            @if(isset($articles))
                <div class="table">
                    @foreach($articles as $k => $article)
                        <div class="article-row {{($k%2 == 0) ? 'bg-light' : ''}}" data-article_id="{{$article->id}}">
                            <div class="col-md-1"><span>{{$article->id}}</span></div>
                            <div class="col-md-2">
                                <img
                                    @if (isset($article->images) && isset($article->images[0]))
                                    data-src="{{$article->images[0]->asset_path}}"
                                    @else
                                    src="http://placehold.it/200x100/cccccc&text=no_image"
                                    @endif
                                >
                            </div>
                            <div class="col-md"><p>{{$article->title}}</p></div>
                            <div class="col-md">
                                <span>{{$article->created_at->format('d-m-Y')}}</span><br>
                                <span class="text-info">{{$article->status}}</span>
                            </div>
                            <a href="{{route('admin.articles.edit', ['article' => $article->id])}}" class=""></a>
                        </div>
                    @endforeach
                </div>
                @include('components.pagination', ['items' => $articles])
            @endif
        </div>
    </div>
</div>
