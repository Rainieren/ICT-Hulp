@extends('layouts.layout')

@section('content')
    <div class="container normal-container" id="showEffect">

        <h2 class="fw-3">Alle vragen</h2><br>
        <div class="row">
            <div class="col-md-9 col-sm-12" style="border-right: 1px solid #f1f0f0">
                @foreach($posts->sortByDesc('created_at') as $post)
                <div class="card" style="border: 0; border-bottom: 1px solid #f1f0f0">
                    <div class="row card-body">
                        <div class="col-md-1 col-sm-2">
                            <a href="">
                                <img src="{{ $post->user->avatar() }}" class="rounded-circle" width="40" height="40">
                            </a>
                        </div>
                        <div class="col-md-11 col-sm-10">
                            <a href="{{ $post->path() }}" style="text-decoration-color: #222222!important">
                                <h5 class="mb-0 title">{{ $post->title }}</h5>
                            </a>
                            <small class="text-muted">
                                <span style="font-weight: bold; color: red">{{ $post->channel->channel_name }}</span> • {{ $post->created_at->diffForHumans() }} door
                                <a href="">
                                    <span class="name-tag">{{ $post->user->username }}</span>
                                </a>
                            </small>
                            <p class="mb-0 mt-2" style="color: #888888;">{!! str_limit($post->text, $limit = 100, $end = '...') !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="col-md-3">
                @if(Auth::guest())

                @elseif(Auth::user()->confirmed == 0)
                    <button class="btn btn-theme btn-hover mb-4" style="width: 100%; display: none;" data-toggle="modal" data-target="#berichtAanmaken">Bericht aanmaken</button>
                @else
                    <button class="btn btn-theme btn-hover mb-4" style="width: 100%" data-toggle="modal" data-target="#berichtAanmaken">Bericht aanmaken</button>
                @endif
                <h3 class="fw-3 mb-4">Populaire vragen</h3>

                <div class="card" style="border: none; border-bottom: 1px solid #f1f0f0">
                    <div class="card-body" style="padding: 0; padding-bottom: 10px">
                        <a href=""><p class="m-0">Dit is even gauw een titel</p></a>
                        <small class="text-muted">Dit is gewoon een test voor de vraag want dat is hoe het werkt...</small>
                        <br>
                        <small>2 dagen geleden door <a href=""><span class="name-tag" style="font-weight: bold">Rainier laan</span></a></small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- Modal -->
                <div class="modal fade" id="berichtAanmaken" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Bericht aanmaken</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute; right: 30px;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="{{ route('makePost') }}" class="container" id="needs-validation">
                                <div class="modal-body">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="form_channel">Kanaal</label> <small class="text-muted"> Waar gaat uw vraag over?</small>
                                                <select id="channel_id" class="form-control" name="channel_id" required>
                                                    <option value="">Kies een kanaal...</option>

                                                    @foreach(App\Channel::all() as $channel)
                                                        <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>
                                                            {{ $channel->channel_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_name">Titel invoeren</label><small class="text-muted"> (Vermijd titels zoals, Probleem C# of CSS margin problem. Wees specifiek)</small>
                                                <input id="form_name" type="text" name="title" class="form-control" placeholder="Titel invoeren" required="required">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide a valid city.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="message-body">Bericht</label>
                                                <textarea id="" class="form-control textareabericht" rows="10" name="text" placeholder="Druk op shift+enter om een directe volgende regel te beginnen" required></textarea>
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide a valid city.
                                            </div>
                                        </div>
                                    </div>

                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-12">--}}
                                            {{--<div class="form-group">--}}
                                                {{--<div class="g-recaptcha" data-sitekey="6LfNVjgUAAAAAFgYN0ZMJGOOg5qpuYNop-iEhw-S"></div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-theme btn-hover float-right">Bericht aanmaken</button>
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
    </div>
@endsection