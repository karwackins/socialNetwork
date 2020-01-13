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
                <form action="{{ url('/friends/'.$user->id) }}" method="POST">
                    {{ csrf_field() }}
                    <button class="btn btn-success">Zaproś do znajomych</button>
                </form>

            @endif

        </div>
    </div>
</div>
