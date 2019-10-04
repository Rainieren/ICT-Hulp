@extends('layouts.layout')

@section('content')
    <post-view  inline-template>
        <div class="container normal-container" id="showEffect">
            <div class="row">
                <div class="col-md-9 mb-5">
                    <div class="card mb-5 z-depth-1">
                        <div class="card-header">
                            <div class="level">
                                <img src="{{ $post->user->avatar() }}" class="rounded-circle mr-2" width="40" height="40">
                                <span><a class="name-tag" href="{{ route('showProfile', $post->user) }}">{{ $post->user->username }}</a> <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></span>
                            </div>


                        </div>
                        <div class="card-body">
                            <h4 class="card-title fw-3">{{ $post->title }}</h4>
                            {{ $post->text }}
                        </div>


                        @if(Auth::guest())

                        @elseif(Auth::user()->id == $post->user_id)
                            <div class="card-footer">
                                <form action="{{ $post->path() }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-link p-0">Verwijder post</button>
                                </form>
                            </div>

                        @endif

                    </div>

                    @if(Auth::guest())

                        <p class="text-center">U moet <a href="{{ route('login') }}">inloggen</a> om mee te doen met deze discussie</p>

                    @elseif(Auth::user()->confirmed == 0)

                        <p class="text-center">U moet uw account actieveren om mee te kunnen doen met deze discussie</p>

                    @else
                    <replies :data="{{ $post->replies }}" @removed="repliesCount--"></replies>

                    @endif

                    {{--{{ $replies->links() }}--}}


                </div>
                <div class="col-md-3">
                    <div class="card z-depth-1">
                        <div class="card-body">
                            Dit heeft nu <span v-text="repliesCount"></span> {{ $post->replies()->count() }} reacties enzo
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </post-view>

@endsection