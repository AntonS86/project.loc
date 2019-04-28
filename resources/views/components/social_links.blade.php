@foreach($company->companyLinks as $socialLink)
    <li class="{{$socialLink->name}}"><a href="{{$socialLink->link}}"><i class="fa {{$socialLink->icon}}"></i></a></li>
@endforeach
