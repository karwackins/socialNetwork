
@if ( ! $loop->first)
    <hr style="margin: 10px 0;">
@endif

@if(belongs_to_auth(Auth::id()) || is_admin())
    @include('comments.include.dropdown_menu')
@endif

<div id="comment_{{ $comment->id }}" class="{{($comment->trashed()) ? 'trashed' : ''}}">
    <div class="float-left">
        <img src="{{ url('user-avatar/'. $comment->user->id. '/35') }}" alt="" class="img-responsive pull-left">
    </div>

    <div style="padding-left: 10px; overflow: hidden;">
        <a href="{{ url('/users/' . $comment->user->id) }}"><strong>{{ $comment->user->name }}</strong></a><br>
        {{ $comment->content }}
    </div>
</div>
