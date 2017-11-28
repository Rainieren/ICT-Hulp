@extends('layouts.admin')

@section('content')
    <div class="row serrat-regular">

        <div class="col-md-6 col-xs-12">
            <h1 class="mb-4">Gebruikers <span class="text-muted" style="font-size: 18px; font-weight: normal">Beheer alle gebruikers</span></h1>
        </div>
        <div class="col-md-6 col-xs-12">
            <h3 class="fw-3 float-right">{{ $tijd->toFormattedDateString() }}</h3>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-4 col-">
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
        <div class="col-md-4 col-xs-12">
            <button class="btn btn-primary float-right btn-user-add" data-toggle="modal" data-target="#userAanmaken">
                Gebruiker toevoegen <i class="fa fa-plus"></i>
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
                            <th>Voornaam</th>
                            <th>Achternaam</th>
                            <th>Email</th>
                            <th>Gebruikersnaam</th>
                            <th>Tijd aangemaakt</th>
                            <th>Laatst bewerkt</th>
                            <th class="text-center">Bewerken</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users->sortByDesc('created_at') as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td><a href="{{ route('editUsers', ['id' => $user->id]) }}">{{ $user->firstname }}</a></td>
                                <td>{{ $user->lastname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->created_at->toFormattedDateString() }}</td>
                                <td>{{ $user->updated_at->toFormattedDateString() }}</td>
                                <td class="text-center">
                                    <a href="{{ route('deleteUser', ['id' => $user->id]) }}" class="mr-3"
                                        onclick="event.preventDefault(); document.getElementById('delete-form{{ $user->id }}').submit();">
                                        <i class="fa fa-trash-o fa-font-24" style="color: red;"></i>
                                        <form id="delete-form{{ $user->id }}" action="{{ route('deleteUser', ['id' => $user->id]) }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                    </a>
                                    <a href="{{ route('editUsers', ['id' => $user->id]) }}">
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
            <div class="modal fade" id="userAanmaken" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Voornaam">Voornaam</label>
                                        <input type="text" class="form-control" id="Voornaam" placeholder="Voornaam" name="firstname">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Achternaam">Achternaam</label>
                                        <input type="text" class="form-control" id="Achternaam" placeholder="Achternaam" name="lastname">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Gebruikersnaam">Gebruikersnaam</label>
                                        <input type="text" class="form-control" id="Gebruikersnaam" placeholder="Gebruikersnaam" name="username">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Email">Email</label>
                                        <input type="text" class="form-control" id="Email" placeholder="Email adress" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Date">Geboortedatum</label>
                                        <input type="date" id="Date" class="form-control" name="date_of_birth">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Password">Password</label>
                                        <input type="password" id="Password" class="form-control" placeholder="Wachtwoord" name="password">
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