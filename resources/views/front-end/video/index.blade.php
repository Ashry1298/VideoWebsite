@extends('layouts.app2')
@section('title')
    {{ $video->name }}
@endsection
@section('meta_description ')
    {{ $video->meta_description }}
@endsection
@section('meta_keywords')
    {{ $video->meta_keywords }}
@endsection
@section('content')
    <div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h1> {{ $video->name }}</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @php
                        
                        $url = getYoutubeId($video->youtube);
                    @endphp
                    @if ($url)
                        <iframe width="100%" height="500" src="https://www.youtube.com/embed/{{ $url }}"
                            title="YouTube video player" frameborder="0" allowfullscreen></iframe>
                    @endif
                    <div class="row">
                        @include('front-end.video.details')
                    </div>
                    @include('front-end.video.comments')
                    @if (auth()->user())
                        @include('front-end.video.add-comment')
                    @endif

                </div>
            </div>
        @endsection
