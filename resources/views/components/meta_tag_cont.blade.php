@push('title'){{$company->name}}@endpush

@push('description'){{$company->title}}@endpush

@push('og:url'){{url()->current()}}@endpush
@push('og:title'){{$company->name}}@endpush
@push('og:description'){{$company->title}}@endpush


@push('og:image'){{asset('images/contacts/image_contacts.jpeg')}}@endpush


