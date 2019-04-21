@extends('layouts.site')

@section('header')
    @include('header')
@endsection

@section('page_content')
    @include('contacts.contacts_content')
@endsection

@section('action_block')
    @include('components.enter_phone_action')
@endsection

@section('footer')
    @include('partials.footer_mini')
@endsection
