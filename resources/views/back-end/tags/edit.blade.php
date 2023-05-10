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
        @include('back-end.' . $pluralModelName . '.form-edit', ['routeName' => $routeName])
    @endcomponent
@endsection
