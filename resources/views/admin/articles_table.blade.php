<div id="articles">
	<div class="row">
		<div class="col-md"><h4>Выбери статью для редактирования</h4></div>
        <div class="text-right text-alert">{{(session('status') ?? '')}}</div>
	</div>
	@if(isset($articles))

    @foreach($articles as $k => $article)

	<div class="table-row article-preview row {{($k%2 == 0) ? 'light-gray-bg' : ''}} my-3 py-3 rounded" data-article_id="{{$article->id}}">
		<div class="col-md-1 text-center p-1"><p>№ {{$article->id}}</p></div>
		<div class="col-md-3 p-1">
			<div class="overlay-container">
				<img class="img-table mx-auto d-block"
                     @if (isset($article->images) && isset($article->images[0]))
                     src="{{$article->images[0]->asset_path}}"
                     @else
                     src="http://placehold.it/200x100/cccccc&text=no_image"
                     @endif
                >
				<a href="{{route('admin.articles.edit', ['article' => $article->id])}}" class="overlay-link"></a>
			</div>
		</div>
		<div class="col-md text-center text-wrap p-1"><p><a href="{{route('admin.articles.edit', ['article' => $article->id])}}" class="link-dark">{{$article->title}}</a></p></div>
		<div class="col-md text-center text-wrap p-1">
            <p>{{$article->category->title}}</p>
            <p>{{$article->created_at->format('d-m-Y')}}</p>
            <p class="text-info">{{$article->status}}</p>
        </div>
	</div>
	@endforeach

        @include('components.pagination', ['items' => $articles])
	@else

	@endif
</div>

