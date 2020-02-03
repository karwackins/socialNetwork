@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card" style="padding-bottom: 10px">
            <div class="col-md-12">
                <div class="card-body">
                    <form action="{{url('/comments/'.$comment->id)}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <textarea class="form-control{{ $errors->has('comment_content') ? ' is-invalid' : '' }}" name="comment_content" id="comment_content" cols="30" rows="5" placeholder="Skomentuj to...?">{{$comment->content}}</textarea>
                        @if ($errors->has('comment_content'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('comment_content') }}</strong>
                            </span>
                        @endif
                        <button class="btn float-right" style="margin-top: 10px">Edytuj komentarz</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
