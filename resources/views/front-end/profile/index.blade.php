@extends('layouts.app2')

@section('title')
    {{ ucfirst($user->name) }}
@endsection
@section('content')
    <div class="section profile-content" style="margin-top: 190px">
        <div class="container">
            <div class="owner">
                <div class="avatar">
                    <img src="/frontend/img/faces/avatar.png" alt="Circle Image"
                        class="img-circle img-no-padding img-responsive">
                </div>
                <div class="name">
                    <h4 class="title">{{ ucfirst($user->name) }}
                        <br>
                    </h4>
                    <h6 class="description">
                        {{ strtolower($user->email) }}
                    </h6>
                </div>
                <div class="description">
                    <h5>
                        <b>
                            {{ $user->aboutMe }}
                        </b>
                    </h5>
                </div>
            </div>
            @if (auth()->user() && $user->id == auth()->user()->id)
                <br>
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto text-center">
                        <btn onclick="$('#profileCard').slideToggle(1000)" class="btn btn-outline-default btn-round"><i
                                class="fa fa-cog"></i> Update Profile</btn>
                    </div>
                </div>
                @include('front-end.profile.edit')
            @endif
            <br><br><br>
        </div>
    </div>
@endsection
