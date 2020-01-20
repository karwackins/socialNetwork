@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card" style="padding-bottom: 10px">
            <div class="col-md-12">
                <div class="card-body">
                    <form action="{{url('/posts/'.$post->id)}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <textarea class="form-control{{ $errors->has('post_content') ? ' is-invalid' : '' }}" name="post_content" id="post_content" cols="30" rows="5" placeholder="Co tam słychać?">{{$post->content}}</textarea>
                        @if ($errors->has('post_content'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('post_content') }}</strong>
                            </span>
                        @endif
                        <button class="btn float-right" style="margin-top: 10px">Edytuj post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
