@extends('layouts.admin')

@section('content')
    <div class="row serrat-regular">

        <div class="col-md-8 col-xs-12">
            <h1 class="mb-4">Algemene instellingen <span class="text-muted" style="font-size: 18px; font-weight: normal">Pas alle instellingen op het systeem aan</span></h1>
        </div>
        <div class="col-md-4 col-xs-12">
            <h3 class="fw-3 float-right">{{ $tijd->toFormattedDateString() }}</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <label for="Datum">Kleuren schema</label>
            <select class="form-control" id="Datum">
                <option selected>Kies een</option>
                <option>Licht</option>
                <option>Donker</option>
                <option>Algemeen</option>
            </select>
        </div>
    </div>
@endsection