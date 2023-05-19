@extends('layouts.app2')
@section('title')
    {{$page->name}}
@endsection
@section('meta_description ')
    {{ $page->meta_description }}
@endsection
@section('meta_keywords')
    {{ $page->meta_keywords }}
@endsection
@section('content')
<div class="section section-buttons text-center" style="min-height: 600px" >
    <div class="container">
        <div class="title">
            <h1> {{$page->name}}</h1>
        </div>
        <p>{{$page->description}}</p>

    </div>
</div>
@endsection