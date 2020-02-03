@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-10 col-md-offset-5">
                @include('posts.include.single')
            </div>

        </div>
    </div>
@endsection
