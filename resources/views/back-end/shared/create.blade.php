@extends('back-end.layout.app')
@section('title')
    {{ $PageTitle }}
@endsection
@section('content')
    @component('back-end.layout.header')
        @slot('nav_title')
            {{ $PageTitle }}
        @endslot
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ $PageTitle }}</h4>
                        <p class="card-category">{{ $pageDesciption }}</p>
                    </div>
                    {{$slot}}
                
                </div>
            </div>
        @endsection
