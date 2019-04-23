@extends('layouts.site')

@section('page_content')
    <div class="fullscreen-bg"></div>

    <!-- banner start -->
    <!-- ================ -->
    <div class="pv-40">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-auto">
                    <div class="hc-element-invisible" data-animation-effect="fadeInDownSmall" data-effect-delay="100">
                        <!-- logo -->
                        <div id="logo" class="logo text-center">
                            <h3 class="margin-clear"><a href="index.html" class="logo-font link-light">The <span
                                        class="text-default">Project</span></a></h3>
                        </div>
                        <!-- name-and-slogan -->
                        <p class="small text-center">Multipurpose HTML5 Template</p>
                        <div class="form-block center-block p-30 light-gray-bg border-clear">
                            <h2 class="title">{{ trans('text.login') }}</h2>
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group has-feedback row">
                                    <label for="inputEmail"
                                           class="col-md-3 text-md-right control-label col-form-label">{{ __('text.email_address') }}</label>
                                    <div class="col-md-8">
                                        <input type="email" name="email"
                                               class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                               id="inputEmail" placeholder="{{__('text.email_address')}}"
                                               value="{{ old('email') }}" required autofocus>
                                        <i class="fa fa-user form-control-feedback pr-4"></i>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group has-feedback row">
                                    <label for="inputPassword"
                                           class="col-md-3 text-md-right control-label col-form-label">{{__('text.password')}}</label>
                                    <div class="col-md-8">
                                        <input type="password" name="password"
                                               class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                               id="inputPassword" placeholder="{{__('text.password')}}" required>
                                        <i class="fa fa-lock form-control-feedback pr-4"></i>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="ml-md-auto col-md-9">
                                        <div class="checkbox form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                {{ title_case(__('text.remember_me')) }}
                                            </label>
                                        </div>
                                        <button type="submit"
                                                class="btn btn-group btn-default btn-animated">{{ title_case(__('text.login')) }}
                                            <i
                                                class="fa fa-user"></i></button>
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('text.forgot_your_password') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- .subfooter start -->
                        <!-- ================ -->
                        <p class="mt-20 text-center">Copyright © {{ date('Y') }}. Все права защищены.</p>
                        <!-- .subfooter end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
