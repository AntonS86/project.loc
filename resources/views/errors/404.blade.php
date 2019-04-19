@extends('layouts.site')

@section('header_top')
    @include('header_top')
@endsection

@section('menu')
    @include('menu')
@endsection

@section('page_content')
<section class="main-container light-gray-bg text-center margin-clear">

    <div class="container">
        <div class="row justify-content-lg-center">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-lg-6 pv-40">
                <h1 class="page-title extra-large"><span class="text-default">404</span></h1>
                <h3 class="mt-4">Ooops! Страничка не найдена</h3>
                <p class="lead">Запрашиваемый URL не найден на этом сервере. Убедитесь, что адрес веб-сайта, отображаемый в адресной строке вашего браузера, написан и отформатирован правильно.</p>
                <form role="search" method="get" action="{{route('articles.search')}}">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="search" placeholder="{{trans('text.search')}}">
                        <i class="fa fa-search form-control-feedback"></i>
                    </div>
                </form>
                <a href="{{route('home')}}" class="btn btn-default btn-animated btn-lg">Домой <i class="fa fa-home"></i></a>
            </div>
            <!-- main end -->

        </div>
    </div>
</section>
@endsection

@section('footer')
    @include('footer')
@endsection
