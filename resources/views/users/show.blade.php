@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Użytkownik
                        @if($user->id === Auth::id())
                            <a  href="{{ url('/users/'. $user->id .'/edit') }}" class="float-right">Edytuj</a>
                        @endif
                    </div>

                    <div class="card-body">
                        <div class="form-group text-center">
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
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                    </div>
                </div>
        </div>
    </div>
@endsection
