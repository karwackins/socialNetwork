<form action="{{ url('/likes') }}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
    <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-thumbs-up">Polub <span class="label">{{ $comment->likes->count() }}</span></span></button>
</form>
