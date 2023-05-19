@extends('back-end.layout.app')
@section('title')
    Home Page
@endsection


@section('content')
    @component('back-end.layout.header',['nav_title'=>'Home Page'])
    @endcomponent
@include('back-end.home-sections.staticts')
@include('back-end.home-sections.comments')
@include('back-end.home-sections.userstatus')

     
@endsection


