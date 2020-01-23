@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card bg-light mb-3">
            <div class="card-header">
                <div class="float-left" style="margin-right: 5px">
                    <img src="{{ url('/user-avatar/'.$post->user->id.'/50') }}" alt="" class="img-responsive img-thumbnail">
                </div>
                <div>
                    <strong>{{$post->user->name}}</strong> <br> <small><a href="{{ url('/posts/'.$post->id) }}">{{ $post->created_at }}</a></small>
                </div>
            </div>
            <div class="card-body">
                <p>{{ $post->content }}</p>
            </div>
            <div class="card-footer bg-transparent border-grey">
{{--                <div class="float-left"><a href="{{ url('posts/'.$post->id.'/edit') }}">Edytuj</a></div>--}}
{{--                <div class="">Usuń</div>--}}
                <div class="card-footer bg-transparent border-grey">
                    <div style="margin: auto; width: 100%">
                        <div class="float-left"><strong>Komentarze:</strong></div>
                        <div class="float-right"><a href="{{ url('/posts/'.$post->id) }}">Zobacz wszystkie</a></div>
                    </div>
                    <br>
                    <hr>
                    <div>
                        @foreach($comments as $comment)
                            <img src="{{ url('/user-avatar/'.$comment->user->id.'/25') }}" alt="" class="img-responsive img-thumbnail">
                            <b>{{ $comment->user->name }}</b><br>
                            {{$comment->content}}<br>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
