@push('title'){{$realestate->rubric->name}} {{$realestate->rooms_view ?? ''}} {{$realestate->type->name}},
{{$realestate->total_square_view ?? ''}} {{$realestate->land_square_view ?? ''}}@endpush

@push('description'){{$realestate->description}}@endpush


@push('keywords'){{$realestate->rubric->name}} {{$realestate->rooms_view ?? ''}} {{$realestate->type->name}},
{{$realestate->total_square_view ?? ''}} {{$realestate->land_square_view ?? ''}} {{$realestate->address}}@endpush


@push('og:url'){{url()->current()}}@endpush
@push('og:title'){{$realestate->rubric->name}} {{$realestate->rooms_view ?? ''}} {{$realestate->type->name}},
{{$realestate->total_square_view ?? ''}} {{$realestate->land_square_view ?? ''}}@endpush
@push('og:description'){{$realestate->address}}@endpush

@if (isset($realestate->images) && isset($realestate->images[0]))
    @push('og:image'){{$realestate->images[0]->asset_path}}@endpush
@endif

