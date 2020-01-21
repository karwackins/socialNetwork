<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            Użytkownik
            @if($user->id === Auth::id())
                <a  href="{{ url('/users/'. $user->id .'/edit') }}" class="float-right">Edytuj</a>
            @endif
        </div>

        <div class="card-body text-center">
            <div class="form-group">
            @if(!$user->avatar)
                    <img src="{{ url('/user-avatar/'.$user->id.'/250') }}" alt="" class="img-responsive img-thumbnail">
            @else
                <img src="{{ url('/user-avatar/'.$user->id.'/250') }}" alt="" class="img-responsive img-thumbnail">
            @endif
            </div>
            <h2><a href="{{ url('/users/' .$user->id) }}">{{ $user->name }}</a></h2>
            <p>
                @if($user->sex == 'm')
                    Mężczyzna
                @else
                    Kobieta
                @endif
            </p>
            <p>{{ $user->email }}</p>
            <div class="form-group">
                <a href="{{ url('/users/'.$user->id.'/friend') }}">Znajomi </a><span class="badge badge-primary">{{ $user->friends()->count() }}</span>
            </div>
            <div class="form-group">
                <a href="{{ url('/posts') }}">Moje posty </a><span class="badge badge-primary">{{ $posts->count() }}</span>
            </div>

            @if(Auth::check() && Auth::id() !== $user->id)

                @if(!friendship($user->id)->exists && !check_invite($user->id))
                    <div class="form-group">
                        <form action="{{ url('/friends/'.$user->id) }}" method="POST">
                            {{ csrf_field() }}
                            <button class="btn btn-success">Zaproś do znajomych</button>
                        </form>
                    </div>
                @elseif(check_invite($user->id))
                    <div class="form-group">
                        <form action="{{ url('/friends/'.$user->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <button class="btn btn-primary">Przyjmij zaproszenie</button>
                        </form>
                    </div>
                @elseif(friendship($user->id)->exists && !friendship($user->id)->accepted)
                    <div class="form-group">
                        <button class="btn btn-success disabled">Wysłano zaproszenie</button>
                    </div>

                @elseif(friendship($user->id)->exists && friendship($user->id)->accepted)
                    <div class="form-group">
                        <form action="{{ url('/friends/'.$user->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger">Usuń ze znajomych</button>
                        </form>
                    </div>

                @endif
            @endif

        </div>
    </div>
</div>
