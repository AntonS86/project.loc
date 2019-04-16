<footer id="footer" class="clearfix">
    <div class="footer">
        <div class="container">
            <div class="footer-inner">
                <div class="row justify-content-lg-center">
                    <div class="col-lg-6">
                        <div class="footer-content text-center padding-ver-clear">
                            @if (isset($company))

                            <div class="logo-footer"><img id="logo-footer" class="mx-auto" src="{{ asset('images/logo/' . $company->img) }}" alt=""></div>
                            <p>{{$company->title}}</p>
                            <ul class="list-inline mb-20">
                                <li class="list-inline-item"><i class="text-default fa fa-map-marker pr-1"></i>{{$company->address}}</li>
                                <li class="list-inline-item"><a href="#" class="link-dark"><i class="text-default fa fa-phone pl-10 pr-1"></i>{{$company->phone}}</a></li>
                                <li class="list-inline-item"><a href="#" class="link-dark"><i class="text-default fa fa-envelope-o pl-10 pr-1"></i>{{$company->email}}</a></li>
                            </ul>
                            <ul class="social-links circle animated-effect-1 margin-clear">
                                @foreach($company->companyLinks as $socialLink)
                                    <li class="{{$socialLink->name}}"><a href="{{$socialLink->link}}"><i class="fa {{$socialLink->icon}}"></i></a></li>
                                @endforeach
                            </ul>
                            @endif
                            <div class="separator"></div>
                            <p class="text-center margin-clear">Copyright © {{ date('Y') }}. Все права защищены.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
