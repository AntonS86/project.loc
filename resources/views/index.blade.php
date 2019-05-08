@extends('layouts.site')

@section('header')
    @include('header')
@endsection

@section('slider')
    @include('market.search_component')
@endsection


@section('page_content')
    @include('market.content')
@endsection

@section('action_block')
    @include('components.call_to_action')
@endsection

@section('footer')
	@include('footer')
@endsection
