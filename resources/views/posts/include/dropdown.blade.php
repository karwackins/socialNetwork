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
