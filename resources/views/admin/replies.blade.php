@extends('layouts.admin')

@section('content')
    <div class="row serrat-regular">
        <div class="col-md-6 col-xs-12">
            <h1 class="mb-4">Reacties <span class="text-muted" style="font-size: 18px; font-weight: normal">Beheer alle reacties</span></h1>
        </div>
        <div class="col-md-6 col-xs-12">
            <h3 class="fw-3 float-right">{{ $tijd->toFormattedDateString() }}</h3>
        </div>
    </div>

    @if($replies->count() == 0)
        <div class="row serrat-regular">
            <div class="col-md-12">
                <h3 class="text-center">Helaas, Er bestaan nog geen reacties</h3>
            </div>
        </div>
    @else

    <div class="row mb-4">
        <div class="col-md-4">
            <label for="search">Naam</label>
            <input type="search" class="form-control" id="search" placeholder="Zoeken...">
        </div>
        <div class="col-md-4">
            <label for="Datum">Datum</label>
            <select class="form-control" id="Datum">
                <option selected>Kies een</option>
                <option>Van nieuw naar oud</option>
                <option>Van oud naar nieuw</option>
            </select>
        </div>
        <div class="col-md-4">
            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#replyAanmaken">
                Reactie toevoegen <i class="fa fa-plus"></i>
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
                            <th>Behoort tot</th>
                            <th>Tekst</th>
                            <th>Tijd aangemaakt</th>
                            <th class="text-center">Bewerken</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($replies->sortByDesc('created_at') as $reply)
                            <tr>
                                <th scope="row">{{ $reply->id }}</th>
                                <td>{{ $reply->user->username }}</td>
                                <td>{{ $reply->post->title }}</td>
                                <td>{!! str_limit($reply->text, $limit = 50, $end = '...') !!}</td>
                                <td>{{ $reply->created_at->toFormattedDateString() }}</td>
                                <td class="text-center">
                                    <a href="" class="mr-3">
                                        <i class="fa fa-trash fa-font-24" style="color: red;"></i>
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

    @endif


    <div class="row">
        <div class="col-md-12">
            <div class="modal fade" id="replyAanmaken" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">Gebruiker aanmaken</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute; right: 30px;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="{{ route('makeUser') }}">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="Datum">Titels van berichten</label>
                                            <select class="form-control" id="Datum">
                                                <option selected>Kies een</option>
                                                @foreach($posts as $post)
                                                <option>{{ $post->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-hover float-right">Gebruiker aanmaken</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection