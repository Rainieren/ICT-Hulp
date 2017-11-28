@extends('layouts.admin')

@section('content')



    <div class="row">
        <div class="col-md-12 mb-4">
            <a href="{{ route('showGebruikers') }}"><i class="fa fa-arrow-left"></i> Terug</a>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title serrat-regular mb-0">Gegevens van: {{ $user->firstname }} {{ $user->lastname }}</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('updateUser', ['id' => $user->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="firstname">Voornaam:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="firstname" class="form-control" name="firstname" value="{{ $user->firstname }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="lastname">Achternaam:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="lastname" class="form-control" name="lastname" value="{{ $user->lastname }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="username">Gebruikersnaam:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="username" class="form-control" name="username" value="{{ $user->username }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="email">Email:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="email" class="form-control" name="email" autocomplete="off" value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="Datum">Rol:</label>
                            </div>
                            <div class="col-md-8">
                                <select class="form-control" id="Datum" name="role_name">
                                    <option selected>{{ $user->role->role_name }}</option>
                                    @foreach($roles as $role)
                                        <option>{{ $role->role_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="password">Nieuw wachtwoord:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="password" id="password" class="form-control" name="password" value="{{ $user->password }}">

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="date_created">Datum aangemaakt:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" readonly id="date_created" class="form-control" name="created_at" value="{{ $user->created_at->toFormattedDateString() }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="confirmed">Email bevestigt:</label>
                            </div>
                            <div class="col-md-8">
                                @if($user->confirmed == 1)
                                    <input type="text" readonly id="confirmed" class="form-control" name="confirmed" value="Ja">
                                @elseif($user->confirmed == 0)
                                    <input type="text" readonly id="confirmed" class="form-control" name="confirmed" value="Nee">
                                @endif
                            </div>
                        </div>
                            <button type="submit" class="btn btn-outline-primary float-right" style="border-radius: 50px;">Gegevens opslaan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection