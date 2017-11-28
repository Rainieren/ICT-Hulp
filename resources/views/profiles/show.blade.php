@extends('layouts.layout')

@section('content')
    <div class="container normal-container">
        <div class="row">
            <div class="col-md-12">
                <div id="profile-page" class="section">
                    <div id="profile-page-header" class="card z-depth-1">
                        <div class="card-img-top">
                            <img class="banner-img" src="https://wallpapers.wallhaven.cc/wallpapers/full/wallhaven-578057.jpg" alt="">
                        </div>
                        <figure class="card-profile-img">
                            <avatar-form :user="{{ $profileUser }}"></avatar-form>
                            {{--<img src="{{ $profileUser->avatar() }}" class="rounded-circle profile-img" width="125">--}}
                        </figure>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="fw-3">{{ $profileUser->firstname }} {{ $profileUser->lastname }}</h2>
                                    <p>{{ $profileUser->function }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection