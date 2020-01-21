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
        <div class="float-left"></div>
        <div class="">

        </div>
    </div>
</div>
