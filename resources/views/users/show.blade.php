@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.sidebar')
            <div class="col-md-8">
                @if(Auth::check())
                    @include('posts.create')
                @endif

                    @foreach($posts as $post)
                        @include('posts.show')
                    @endforeach
            </div>
        </div>
    </div>
@endsection
