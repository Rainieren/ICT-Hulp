@extends('layouts.layout')

@section('content')
    <div class="container first-container">
        <div class="row" id="showEffect">
            <div class="col-md-9 col-sm-12" style="border-right: 1px solid #f1f0f0">
                <h2 class="fw-3">Alle Aanbieders</h2><br>
                <div class="row">
                    @foreach($companyPosts as $companyPost)
                        <div class="card" style="border: 0; border-bottom: 1px solid #f1f0f0">
                            <div class="card-body">
                                <div class="col-md-12 col-sm-12">
                                    <a href="{{ $companyPost->path() }}">
                                        <h5 class="mb-0">{{ $companyPost->title }}</h5>
                                    </a>
                                    <p>Company - Place</p>
                                    <small>{{ $companyPost->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3">
                test
            </div>

        </div>


    </div>
@endsection