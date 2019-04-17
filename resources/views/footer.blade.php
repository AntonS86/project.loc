{{--для отправки формы использую файл js/custom/ClientLetter.js--}}
<footer id="footer" class="clearfix">
@if (isset($company))
<!-- .footer start -->
<!-- ================ -->
<div class="footer">
    <div class="container">
        <div class="footer-inner">
            <div class="row">
                <div class="col-lg-6">
                    <div class="footer-content">
                        <div class="logo-footer"><img id="logo-footer" src="{{ asset('images/logo/' . $company->img) }}" width="150" alt="{{$company->name}}"></div>
                        <p>{{$company->title}}</p>
                        <ul class="list-inline mb-20">
                            <li class="list-inline-item"><i class="text-default fa fa-map-marker pr-1"></i>{{$company->address}}</li>
                            <li class="list-inline-item"><a href="tel:{{$company->phone}}" class="link-dark"><i class="text-default fa fa-phone pr-1"></i>{{$company->phone}}</a></li>
                            <li class="list-inline-item"><a href="mailto:{{$company->email}}?subject=Вопрос по Продажам" class="link-dark"><i class="text-default fa fa-envelope-o pr-1"></i>{{$company->email}}</a></li>
                        </ul>
                        <div class="separator-2"></div>
                        @if (isset($company->companyLinks))
                            <ul class="social-links circle margin-clear animated-effect-1">

                                @foreach($company->companyLinks as $socialLink)
                                    <li class="{{$socialLink->name}}"><a href="{{$socialLink->link}}"><i class="fa {{$socialLink->icon}}"></i></a></li>
                                @endforeach

                            </ul>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer-content">
                        <h2 class="title">{{ trans('text.contact_us') }}</h2>

                        <form class="margin-clear" id="sendmail" method="post" action="{{ route('sendMail') }}">
                            {{ csrf_field() }}
                            <div class="form-group has-feedback mb-10">
                                <label class="sr-only" for="name">{{ trans('text.name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="{{ trans('text.name') }}" required>
                                <i class="fa fa-user form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback mb-10">
                                <label class="sr-only" for="phone">{{ trans('text.email_phone') }}</label>
                                <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{5,11}" placeholder="{{ trans('text.enter_phone') }}" required>
                                <i class="fa fa-phone form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback mb-10">
                                <label class="sr-only" for="message">{{ trans('text.message') }}</label>
                                <textarea class="form-control" rows="4" id="message" name="message" placeholder="{{ trans('text.message') }}" required></textarea>
                                <i class="fa fa-pencil form-control-feedback"></i>
                            </div>
                            <input type="submit" value="{{ trans('text.send') }}" class="margin-clear submit-button btn btn-default">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .footer end -->
@endif
@include('partials.sub_footer')
</footer>
