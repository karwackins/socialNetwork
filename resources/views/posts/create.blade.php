<div class="card" style="margin-bottom: 15px">
    <div class="card-body">
        <form action="{{url('/posts')}}" method="POST">
            {{ csrf_field() }}
            <textarea class="form-control{{ $errors->has('post_content') ? ' is-invalid' : '' }}" name="post_content" id="post_content" cols="30" rows="5" placeholder="Co tam słychać?">{{ old('post_content') }}</textarea>
            @if ($errors->has('post_content'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('post_content') }}</strong>
                </span>
            @endif
            <button class="btn float-right" style="margin-top: 10px">Opublikuj</button>
        </form>
    </div>
</div>
