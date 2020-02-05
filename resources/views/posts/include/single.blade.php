
    <div class="container {{($post->trashed()) ? 'trashed' : ''}}">
        <div class="card bg-light mb-3">
            <div class="card-header">
                @if(belongs_to_auth(Auth::id()) || is_admin())
                    @include('posts.include.dropdown')
                @endif
                <div class="float-left" style="margin-right: 5px">
                    <img src="{{ url('/user-avatar/'.$post->user->id.'/50') }}" alt="" class="img-responsive img-thumbnail">
                </div>
                <div>
                    <strong>{{$post->user->name}}</strong> <br> <small><a href="{{ url('/posts/'.$post->id) }}">{{ $post->created_at }}</a></small>
                </div>
            </div>
            <div class="card-body">
                <p>{{ $post->content }}</p>
                    @include('posts.include.likes')
            </div>

            <div class="card-footer bg-transparent border-grey">
                @if (Auth::check())
                    @include('comments.create')
                @endif

                @foreach($post->comments as $comment)
                    @include('comments.include.single')
                @endforeach
            </div>
        </div>
    </div>

