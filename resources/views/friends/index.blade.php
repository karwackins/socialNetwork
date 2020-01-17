@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Lista znajomych: <span>{{ $users->count() }}</span></div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($users as $user)
                                <div class="col-sm-4 col-offset-6 text-center">
                                    <a href="{{ url('/users/'.$user->id) }}">
                                        <div class="img-responsive img-thumbnail">
                                            <img src="{{ url('/user-avatar/'.$user->id.'/250') }}" alt="" class="img-responsive img-thumbnail">
                                            <h5>{{$user->name}}</h5>
                                        </div>
                                    </a>
                                    <br>
                                </div>
                            @endforeach
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
@endsection

