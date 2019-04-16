@push('title'){{$article->title}}@endpush

@push('description'){{$article->meta_desc}}@endpush

@if (isset($oneArticle->keywords) && ! $oneArticle->keywords->isEmpty())
@push('keywords') @foreach($article->keywords as $keyword){{$keyword->name}} @endforeach @endpush
@else
    @push('keywords'){{$article->category->title}}@endpush
@endif

@push('og:url'){{url()->current()}}@endpush
@push('og:title'){{$article->title}}@endpush
@push('og:description'){{$article->meta_desc}}@endpush

@if (isset($article->images) && isset($article->images[0]))
    @push('og:image'){{$article->images[0]->asset_path}}@endpush
@endif

