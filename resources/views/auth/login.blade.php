@extends('layouts.layout')

@section('content')
<div class="container first-container">
    <div class="row justify-content-md-center">
        <div class="col-sm-12 col-md-5 col-lg-4">
            <div class="card z-depth-1 login-card" id="showEffect">
                <div class="card-block">
                    <h4 class="card-title">Inloggen</h4>
                    <p class="card-text fw-3">Vul hier uw gegevens in om u aan te melden voor ICT-Hulp</p>

                    <form class="custom" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <i class="fa fa-user-o"></i>
                                    <input id="email" type="email" class="form-control custom-input form-control-login" name="email" value="{{ old('email') }}" placeholder="Email adres" required autofocus>

                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <i class="fa fa-lock"></i>
                                    <input id="password" type="password" class="form-control form-control-login" name="password" placeholder="Wachtwoord" required>

                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="remember" {{ old('remember') ? 'checked' : '' }}> Onthoud mij
                                            <span class="custom-control-indicator"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12 p-0">
                                        <input type="submit" class="btn btn-theme btn-hover" value="Inloggen" style="width: 100%">
                                    </div>
                                    <div class="col-md-6">
                                        <a class="btn btn-link" href="{{ route('password.request') }}" style="text-decoration: none; color: grey; text-align: center">
                                            Wachtwoord vergeten?
                                        </a>
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
