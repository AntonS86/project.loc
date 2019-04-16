@push('title')Eos quis similique architecto. @endpush

@push('description')Aperiam doloremque hic hic dolore voluptas magni labore recusandae sed dolores exercitationem optio.@endpush


@push('keywords')Eos quis similique architecto.@endpush


@push('og:url'){{url()->current()}}@endpush
@push('og:title')Eos quis similique architecto.@endpush
@push('og:description')Aperiam doloremque hic hic dolore voluptas magni labore recusandae sed dolores exercitationem optio.@endpush

@if ($slider[0] || $slider[0]->img))
    @push('og:image'){{ asset('images/slider/' . $slider[0]->img) }}@endpush
@endif

