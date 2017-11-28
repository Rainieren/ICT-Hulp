@extends('layouts.layout')

@section('content')
<div class="container register-container">
    <div class="row justify-content-md-center">
        <div class="col-sm-12 col-md-5 col-lg-5">
            <div class="card z-depth-1 register-card" id="showEffect">
                <div class="card-block" style="padding-bottom: 0px;">
                    <h4 class="card-title">Aanmelden</h4>
                    <p class="card-text fw-3">Vul hier uw gegevens in om uw avontuur te starten!</p>
                    <form class="justify-content-center" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                    <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" placeholder="Voornaam" required autofocus>

                                    @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                    <input id="lastname" type="text" class="form-control" name="lastname" placeholder="Achternaam" value="{{ old('lastname') }}" required autofocus>

                                    @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <input id="username" type="text" class="form-control" name="username" placeholder="Gebruikersnaam" value="{{ old('username') }}" required autofocus>

                                    @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email adres" required>

                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                                    <label for="date_of_birth">Geboortedatum</label> <button class="btn btn-sm btn-popover" type="button" data-toggle="popover" data-trigger="focus" title="Hoe werkt dit?" data-content="U kunt op de dag klikken en vervolgens uw dag in getallen invullen. Dit kan zowel bij maand als bij jaar. Als u dit onhandig vindt kunt u ook de pijl ernaast gebruiken"><i class="fa fa-info-circle"></i></button>
                                    <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}" placeholder="Geboortedatum" required>

                                    @if ($errors->has('date_of_birth'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Wachtwoord" required>

                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Bevestig wachtwoord" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <small class="text-muted">Bij het klikken van Account aanmaken, gaat u akkoort met onze
                                    <a href="" data-toggle="modal" data-target="#termsModal">termen</a> en geeft aan dat u onze <a href="">policy</a> gelezen heeft</small>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-theme" value="Account aanmaken" style="width: 100%;">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Termen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Onze termen</p>
                    <ul>
                        <li>Don't be a dick</li>
                        <li>Don't be a douche</li>
                        <li>Always watch memes</li>
                        <li>Visit a therapist</li>
                        <li>Repeat</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-theme btn-hover" data-dismiss="modal">Sluiten</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
