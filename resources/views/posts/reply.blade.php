<reply :attributes="{{ $reply }}" inline-template v-cloak>
    <div id="reply-{{ $reply->id }}" class="card mb-3">
        <div class="card-header">
            <div class="card-title mb-0"><a href="">{{ $reply->owner->username }}</a> zei {{ $reply->created_at->diffForHumans() }}...</div>
        </div>
        <div class="card-body">
            <div v-if="bewerken">
                <div class="form-group">
                    <textarea class="form-control" v-model="text" required></textarea>
                </div>

                <button class="btn btn-sm btn-primary" @click="update">Bewerken</button>
                <button class="btn btn-sm btn-link" @click="bewerken = false">Sluiten</button>
            </div>
            <div v-else v-text="text">
                {!! $reply->text !!}
            </div>
        </div>
        <div class="card-footer level">

            <like :reply="{{ $reply }}"></like>


            {{--@can('update', $reply)--}}
                {{--<button class="btn btn-sm btn-secondary ml-2" @click="bewerken = true">Bewerk</button>--}}
                {{--<button class="btn btn-sm btn-danger ml-2" @click="destroy">Verwijder</button>--}}

                {{--<form method="POST" action="/replies/{{ $reply->id }}">--}}
                    {{--{{ csrf_field() }}--}}
                    {{--{{ method_field('DELETE') }}--}}
                    {{--<button type="submit" class="btn btn-sm btn-danger ml-2">Verwijder</button>--}}
                {{--</form>--}}
            {{--@endcan--}}
        </div>
    </div>
</reply>