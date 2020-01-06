@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-6 col-md-offset-3">
                <div class="card">
                    <div class="card-header">Edycja użytkownika</div>
                    <div class="card-body">
                        <form action="{{ url('/users/'.$user->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="row">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <div class="form-group">
                                        <label for="name">Imię i nazwisko</label>
                                        <input name="name" type="text" class="form-control" value="{{ $user->name }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input name="email" type="email" class="form-control" value="{{ $user->email }}">
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
