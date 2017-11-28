@extends('layouts.layout')

@section('content')
<div class="container first-container">
    <div class="row justify-content-md-center">
        <div class="col-sm-12 col-md-5 col-lg-5">
            <div class="card z-depth-1" id="showEffect" style="display: none;">
                <div class="card-block">
                    <h4 class="card-title">Wachtwoord opnieuw instellen</h4>
                    <p class="card-text fw-3">Vul hier uw email in om uw wachtwoord opnieuw aan te vragen</p>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email adress" required>
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">

                                    <input type="submit" class="btn btn-theme btn-hover" value="Wachtwoord opnieuw aanvragen " style="width: 100%;">

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
