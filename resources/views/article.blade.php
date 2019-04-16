@extends('layouts.site')

@section('header_top')
	@include('header_top')
@endsection

@section('menu')
	@include('menu')
@endsection


@section('page_content')
	@include('articles_content')
@endsection

@section('action_block')
    @include('components.call_to_action')
@endsection

@section('footer')
	@include('footer')
@endsection
