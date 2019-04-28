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
                            @include('components.contacts')
                        </ul>
                        <div class="separator-2"></div>
                        @if (isset($company->companyLinks))
                            <ul class="social-links circle margin-clear animated-effect-1">
                                @include('components.social_links')
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer-content">
                        <h2 class="title">{{ trans('text.contact_us') }}</h2>

                        <form class="margin-clear" id="sendmail" method="post" action="{{ route('sendmail.create') }}">
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
