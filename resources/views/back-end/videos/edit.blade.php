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
        @component('back-end.shared.edit', ['PageTitle' => $PageTitle, 'pageDesciption' => $pageDesciption])
            @include('back-end.videos.form-edit', ['routeName' => $routeName])
            @slot('md4')
                @php
                    
                    $url = getYoutubeId($row->youtube);
                @endphp
                @if ($url)
                    <iframe width="300" src="https://www.youtube.com/embed/{{ $url }}" title="YouTube video player"
                        frameborder="0" allowfullscreen></iframe>
                @endif
                <img src="{{ asset('Upload/Images/' . $row->name . '/' . $row->image) }}" width="250" height="250">
            @endslot
        @endcomponent
        @component('back-end.shared.edit', ['PageTitle' => 'Comment', 'pageDesciption' => 'Here You Can Add,Edit or Delete Comment'])
        @include('back-end.comments.index')
            @slot('md4')
                @include('back-end.comments.create')
            @endslot
        @endcomponent
@endsection
