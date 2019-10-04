@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('updatePost', ['id' => $post->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="Kanaal">Kanaal:</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" id="Kanaal" name="channel_id">
                                    <option selected>{{ $post->channel->id }}</option>

                                    @foreach($channels as $channel)
                                        <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>
                                            {{ $channel->channel_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="titel">Titel:</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" id="titel" class="form-control" name="title" value="{{ $post->title }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="text">Text bericht:</label>
                            </div>
                            <div class="col-md-12">
                                <textarea type="text" id="text" class="form-control" name="text" rows="10" required>{{ $post->text }}</textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary float-right">Bewerken</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="username">Eigenaar:</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" id="username" class="form-control" disabled name="username" value="{{ $post->user->firstname }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="created_at">Tijd aangemaakt:</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" id="username" class="form-control" disabled name="created_at" value="{{ $post->created_at->toFormattedDateString() }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection