@extends('layouts.app2')

@section('title' , 'Home Page')

@section('content')
    @include('front-end.homepage-sections.home-image')
    @include('front-end.homepage-sections.videos')
    @include('front-end.homepage-sections.statics')
    @include('front-end.homepage-sections.contact-us')
@endsection