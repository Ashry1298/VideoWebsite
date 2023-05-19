@extends('layouts.app2')

@section('title')
    Home
@endsection
@section('content')
    <div class="section section-buttons">
        <div class="container">
            <div class="title">

                @if (request()->has('search') && request()->get('search') != '')
                    <h5>
                        You are search on
                        <b>
                            {{ request()->get('search') }}
                        </b>
                        <a href="{{ route('frontend.home') }}" class="btn btn-link btn-default"
                            style="font-size: 15px">Reset</a>
                    </h5>
                @else
                    <h2>Latest Videos</h2>
                @endif
            </div>
            @include('front-end.shared.video-row')

        </div>
    </div>
@endsection
