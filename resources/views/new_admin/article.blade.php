@extends('layouts.new_admin')

@section('left_bar')
    @include('new_admin.components.left_bar')
@endsection

@section('header')
    @include('new_admin.header.header')
@endsection

@section('page_content')
    @include('new_admin.article.article_content')
@endsection

@section('footer')
    @include('new_admin.components.footer')
@endsection
