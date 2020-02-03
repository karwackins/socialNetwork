<div class="card" style="margin-bottom: 15px">
    <div class="card-body">
        <form action="{{url('/comments')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <input class="form-control{{ $errors->has('comment_content') ? ' is-invalid' : '' }}" name="comment_content" id="comment_content" placeholder="Skomentuj to...">
            @if ($errors->has('comment_content'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('comment_content') }}</strong>
                </span>
            @endif
            <button class="btn float-right" style="margin-top: 10px">Opublikuj</button>
        </form>
    </div>
</div>
