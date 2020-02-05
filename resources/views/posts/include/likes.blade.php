<form action="{{ url('/likes') }}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-thumbs-up">Polub <span class="label">{{ $post->likes->count() }}</span></span></button>
</form>
