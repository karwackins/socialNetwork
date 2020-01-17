<div class="card bg-light mb-3">
    <div class="card-header">
        <div class="float-left" style="margin-right: 5px">
            <img src="{{ url('/user-avatar/'.$post->user->id.'/50') }}" alt="" class="img-responsive img-thumbnail">
        </div>
        <div>
           <strong>{{$post->user->name}}</strong> <br> <small>{{ $post->created_at }}</small>
        </div>
    </div>
    <div class="card-body">
        <p>{{ $post->content }}</p>
    </div>
</div>
