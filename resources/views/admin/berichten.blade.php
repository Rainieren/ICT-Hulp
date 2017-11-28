@extends('layouts.admin')

@section('content')
    <div class="row serrat-regular">
        <div class="col-md-6 col-xs-12">
            <h1 class="mb-4">Berichten <span class="text-muted" style="font-size: 18px; font-weight: normal">Beheer alle berichten</span></h1>
        </div>
        <div class="col-md-6 col-xs-12">
            <h3 class="fw-3 float-right">{{ $tijd->toFormattedDateString() }}</h3>
        </div>
    </div>

    @if($allPosts->count() == 0)
        <div class="row serrat-regular">
            <div class="col-md-12">
                <h3 class="text-center">Helaas, Er bestaan nog geen berichten</h3>
            </div>
        </div>
    @else

    <div class="row mb-4">
        <div class="col-md-3">
            <label for="search">Naam</label>
            <input type="search" class="form-control" id="search" placeholder="Zoeken...">
        </div>
        <div class="col-md-3">
            <label for="Datum">Datum</label>
            <select class="form-control" id="Datum">
                <option selected>Kies een</option>
                <option>Van nieuw naar oud</option>
                <option>Van oud naar nieuw</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="Kanaal">Kanaal</label>
            <select class="form-control" id="Kanaal">
                <option selected>Kanaal</option>
                @foreach($channels as $channel)
                <option>{{ $channel->channel_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary btn-user-add float-right" data-toggle="modal" data-target="#kanaalAanmaken">
                Kanaal aanmaken <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card z-depth-1 mb-4">
                <div class="card-body">
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Eigenaar</th>
                            <th>Kanaal</th>
                            <th>Titel</th>
                            <th>Tijd aangemaakt</th>
                            <th class="text-center">Bewerken</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allPosts->sortByDesc('created_at') as $post)
                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td>{{ $post->user->firstname }} {{ $post->user->lastname }}</td>
                                <td>{{ $post->channel->channel_name }}</td>
                                <td>{!! str_limit($post->title, $limit = 50, $end = '...') !!}</td>
                                <td>{{ $post->created_at->toFormattedDateString() }}</td>
                                <td class="text-center">
                                    <a href="{{ $post->adminDelete() }}" class="mr-3"
                                       onclick="event.preventDefault(); document.getElementById('delete-form{{ $post->id }}').submit();">
                                        <i class="fa fa-trash-o fa-font-24" style="color: red;"></i>
                                        <form id="delete-form{{ $post->id }}" action="{{ $post->adminDelete() }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-edit fa-font-24" style="color: limegreen;"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="modal fade" id="kanaalAanmaken" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">Kanaal toevoegen</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute; right: 30px;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('makeChannel') }}">
                                {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="channel_name">Kanaal naam:</label>
                                            <input type="text" class="form-control mb-3" id="channel_name" name="channel_name" placeholder="Kanaal naam">
                                        </div>
                                    </div>
                                <button class="btn btn-primary float-right">Toevoegen</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endif


@endsection