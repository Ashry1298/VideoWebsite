@extends('back-end.layout.app')
@section('title')
    {{ $PageTitle }}
@endsection
@section('content')
    @component('back-end.shared.create', ['PageTitle' => $PageTitle, 'pageDesciption' => $pageDesciption])
        <div class="card-body">
            <form action="{{ route($routeName . '.store') }}" method="POST">
                @include('back-end.users.form')
                <button type="submit" class="btn btn-primary pull-right">{{ $PageTitle }}</button>
                <div class="clearfix"></div>
            </form>
        </div>
    @endcomponent
@endsection
