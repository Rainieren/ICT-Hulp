@extends('layouts.admin')

@section('content')
    <div class="row serrat-regular">
        <div class="col-md-6 col-xs-12">
            <h1 class="mb-4">Dashboard <span class="text-muted" style="font-size: 18px; font-weight: normal">Beheer hier alles</span></h1>
        </div>
        <div class="col-md-6 col-xs-12">
            <h3 class="fw-3 float-right">{{ $tijd->toFormattedDateString() }}</h3>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-3 col-xs-12">
            <div class="card card-blue z-depth-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <i class="fa fa-desktop fnt-46"></i>
                        </div>
                        <div class="col-md-10">
                            <h2 class="fw-3 text-right">{{ $posts }} Berichten</h2>
                        </div>
                    </div>

                </div>

                <div class="card-footer card-footer-blue">
                    <a href="{{ route('showBerichten') }}" class="text-center"><span>Alle berichten <i class="fa fa-arrow-right"></i></span></a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-xs-12">
            <div class="card card-green z-depth-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <i class="fa fa-comments fnt-46"></i>
                        </div>
                        <div class="col-md-10">
                            <h2 class="fw-3 text-right">{{ $replies }} Reacties</h2>
                        </div>
                    </div>
                </div>
                <div class="card-footer card-footer-green">
                    <a href="{{ route('showReplies') }}" class="text-center"><span>Alle reacties <i class="fa fa-arrow-right"></i> </span></a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-xs-12">
            <div class="card card-purple z-depth-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <i class="fa fa-users fnt-46"></i>
                        </div>
                        <div class="col-md-10">
                            <h2 class="fw-3 text-right">{{ $users }} Gebruikers</h2>
                        </div>
                    </div>
                </div>
                <div class="card-footer card-footer-purple">
                    <a href="{{ route('showGebruikers') }}" class="text-center"><span>Alle gebruikers <i class="fa fa-arrow-right"></i></span></a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-xs-12">
            <div class="card card-yellow z-depth-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <i class="fa fa-television fnt-46"></i>
                        </div>
                        <div class="col-md-10">
                            <h2 class="fw-3 text-right">{{ $channels }} Kanalen</h2>
                        </div>
                    </div>
                </div>
                <div class="card-footer card-footer-yellow">
                    <a href="{{ route('showChannels') }}" class="text-center"><span>Alle kanalen <i class="fa fa-arrow-right"></i></span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7 col-xs-12">
            <div class="card z-depth-1">
                <div class="card-body">
                    <h4 class="card-title">Recente gebruikers <span class="text-muted" style="font-size: 16px;">Laatst geregistreerde gebruikers</span></h4>
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Voornaam</th>
                            <th>Achternaam</th>
                            <th>Email</th>
                            <th>Tijd aangemaakt</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($latestUsers as $latestUser)
                        <tr>
                            <th scope="row">{{ $latestUser->id }}</th>
                            <td>{{ $latestUser->firstname }}</td>
                            <td>{{ $latestUser->lastname }}</td>
                            <td>{{ $latestUser->email }}</td>
                            <td>{{ $latestUser->created_at->diffForHumans() }}</td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



@endsection