@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-6 col-md-offset-3">
                <div class="card">
                    <div class="card-header">Edycja użytkownika</div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <img src="{{ url('/user-avatar/'.$user->id.'/200') }}" alt="" class="img-responsive img-thumbnail">
                                </div>
                            </div>
                        </div>
                        <form action="{{ url('/users/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="row">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <div class="form-group">
                                        <label for="">Avatar</label>
                                        <input name="avatar" type="file" class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}">
                                        @if ($errors->has('avatar'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('avatar') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <div class="form-group">
                                        <label for="name">Imię i nazwisko</label>
                                        <input name="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $user->name }}">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $user->email }}">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <div class="form-group">
                                        <label for="sex">Płeć</label>
                                            <select id="sex" class="form-control" name="sex">
                                                <option value="f" @if($user->sex == 'f') selected @endif> Kobieta</option>
                                                <option value="m" @if($user->sex == 'm') selected @endif> Mężczyzna</option>
                                            </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-sm float-right">Zapisz zmiany</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
        </div>
    </div>
    </div>
@endsection
