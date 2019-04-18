@if (isset($company))
    @include('components.meta_tag_cont')
<div class="banner dark-translucent-bg" style="background-image:url('{{asset('images/contacts/image_contacts.jpeg')}}'); background-position: 50% 30%;">

    <div class="container">
        <div class="row justify-content-lg-center">
            <div class="col-lg-8 text-center pv-20">
                <h1 class="page-title text-center">{{ trans('text.contact_us') }}</h1>
                <div class="separator"></div>
                <p class="lead text-center">It would be great to hear from you! Just drop us a line and ask for anything with which you think we could be helpful. We are looking forward to hearing from you!</p>
                <ul class="list-inline mb-20 text-center">
                    <li class="list-inline-item"><i class="text-default fa fa-map-marker pr-2"></i>{{$company->address}}</li>
                    <li class="list-inline-item"><a href="#" class="link-dark"><i class="text-default fa fa-phone pl-10 pr-2"></i>{{$company->phone}}</a></li>
                    <li class="list-inline-item"><a href="#" class="link-dark"><i class="text-default fa fa-envelope-o pl-10 pr-2"></i>{{$company->email}}</a></li>
                </ul>
                <div class="separator"></div>
                <ul class="social-links circle animated-effect-1 margin-clear text-center space-bottom">
                    @foreach($company->companyLinks as $socialLink)
                        <li class="{{$socialLink->name}}"><a href="{{$socialLink->link}}"><i class="fa {{$socialLink->icon}}"></i></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endif

<section class="main-container">

    <div class="container">
        <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-12 space-bottom">
                <h2 class="title">{{ trans('text.contact_us') }}</h2>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-form">
                            <form class="margin-clear" id="sendmail" method="post"
                                  action="{{ route('sendmail.create') }}">
                                <div class="form-group has-feedback">
                                    <label for="name">{{ trans('text.name') }}</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="{{ trans('text.name') }}" required>
                                    <i class="fa fa-user form-control-feedback"></i>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="phone">{{ trans('text.your_phone') }}</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{5,11}" placeholder="{{ trans('text.enter_phone') }}" required>
                                    <i class="fa fa-phone form-control-feedback"></i>
                                </div>

                                <div class="form-group has-feedback">
                                    <label for="message">{{ trans('text.message') }}</label>
                                    <textarea class="form-control" rows="7" id="message" name="message" placeholder="{{ trans('text.message') }}" required></textarea>
                                    <i class="fa fa-pencil form-control-feedback"></i>
                                </div>
                                <input type="submit" value="{{ trans('text.send') }}" class="submit-button btn btn-lg btn-default">
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div id="map-canvas" class="embed-responsive">
                            <iframe class="embed-responsive-item" src="https://yandex.ru/map-widget/v1/?um=constructor%3A217b4cb86659f3c3d5874dd26741fac25e29b4314846109eafb21b2bea94257a&amp;source=constructor" width="438" height="348" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main end -->
        </div>
    </div>
</section>

@push('clientLetter')
    <script src="{{asset('js/ClientLetter.js')}}"></script>
@endpush
