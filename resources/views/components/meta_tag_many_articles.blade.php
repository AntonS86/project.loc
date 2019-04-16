@push('title'){{$categories->title ?? $keywords->name ?? $search ?? 'Последние новости'}}@endpush

@push('description'){{$categories->title ?? $keywords->name ?? $search ?? 'Последние новости'}}@endpush

@push('og:url'){{url()->current()}}@endpush
@push('og:title'){{$categories->title ?? $keywords->name ?? $search ?? 'Последние новости'}}@endpush
@push('og:description'){{$categories->title ?? $keywords->name ?? $search ?? 'Последние новости'}}@endpush

