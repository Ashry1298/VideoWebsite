@extends('layouts.app2')
@section('title')
    {{ $cat->name }}
@endsection
@section('meta_description ')
    {{ $cat->meta_description }}
@endsection
@section('meta_keywords')
    {{ $cat->meta_keywords }}
@endsection

@section('content')
    <div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h1> {{ $cat->name }}</h1>
            </div>
            @include('front-end.shared.video-row')

        </div>
    </div>
@endsection
