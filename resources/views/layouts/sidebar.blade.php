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
                <img src="{{ url('/user-avatar/'.$user->id.'/200') }}" alt="" class="img-responsive img-thumbnail">
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

            @if(Auth::check() && Auth::id() !== $user->id)

                @if(!friendship($user->id)->exists && !check_invite($user->id))
                <form action="{{ url('/friends/'.$user->id) }}" method="POST">
                    {{ csrf_field() }}
                    <button class="btn btn-success">Zaproś do znajomych</button>
                </form>

                @elseif(check_invite($user->id))
                    <form action="{{ url('/friends/'.$user->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <button class="btn btn-primary">Przyjmij zaproszenie</button>
                    </form>

                @elseif(friendship($user->id)->exists && !friendship($user->id)->accepted)
                    <button class="btn btn-success disabled">Wysłano zaproszenie</button>

                @elseif(friendship($user->id)->exists && friendship($user->id)->accepted)
                <form action="{{ url('/friends/'.$user->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger">Usuń ze znajomych</button>
                </form>
                @endif
            @endif

        </div>
    </div>
</div>
