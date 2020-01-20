<div class="card bg-light mb-3">
    <div class="card-header">
        <div class="float-left" style="margin-right: 5px">
            <img src="{{ url('/user-avatar/'.$post->user->id.'/50') }}" alt="" class="img-responsive img-thumbnail">
        </div>
        <div class="float-left">
           <strong>{{$post->user->name}}</strong> <br> <small><a href="{{ url('/posts/'.$post->id) }}">{{ $post->created_at }}</a></small>
        </div>

        <div class="dropdown float-right">
            <button class="btn btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ url('posts/'.$post->id.'/edit') }}">Edytuj</a>
                <form action="{{ url('posts/'.$post->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" onclick="return confirm('Czy na pewno chcesz usunąć wpis?')">Usuń</button>
                </form>
            </div>
        </div>

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
