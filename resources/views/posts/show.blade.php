<div class="card bg-light mb-3">
    <div class="card-header">
        <div class="float-left" style="margin-right: 5px">
            <img src="{{ url('/user-avatar/'.$post->user->id.'/50') }}" alt="" class="img-responsive img-thumbnail">
        </div>
        <div class="float-left">
            <strong><a href="{{ url('/users/'.$post->user->id) }}">{{$post->user->name}}</a></strong> <br> <small><a href="{{ url('/posts/'.$post->id) }}">{{ $post->created_at }}</a></small>
        </div>
        @if(Auth::check() && $post->user->id == Auth::id())
            @include('posts.include.dropdown')
        @endif
    </div>
    <div class="card-body">
        <p>{{ $post->content }}</p>
    </div>

    <div class="card-footer bg-transparent border-grey">
        <div style="margin: auto; width: 100%">
            <div class="float-left"><strong>Komentarze:</strong></div>
            <div class="float-right"><a href="{{ url('/posts/'.$post->id) }}">Zobacz wszystkie</a></div>
        </div>
        <br>
        <hr>
        <div class="form-group">

                @foreach($comments as $comment)
                    @if($comment->post_id == $post->id)
                        <img src="{{ url('/user-avatar/'.$comment->user->id.'/25') }}" alt="" class="img-responsive img-thumbnail">
                        <b>{{ $comment->user->name }}</b><br>
                        {{$comment->content}}<br>
                        <hr>
                    @endif
                @endforeach

        </div>
    @if(Auth::check())
        <div class="form-group">
            <form action="{{ url('/comments/'.$post->id) }}" method="POST">
                {{ csrf_field() }}
                <input name="comment" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Skomentuj to ... ">
                <button type="submit" class="float-right btn">Dodaj</button>
            </form>
        </div>
    @endif
</div>
</div>
