@extends('layouts.site')

@section('header')
    @include('header')
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
