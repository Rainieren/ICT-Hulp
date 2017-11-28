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
                                <td></td>
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


@endsection