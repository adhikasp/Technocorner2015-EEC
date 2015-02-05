@extends('layout.base')


@section('head')
    <title>Home Page</title>
@stop


@section('body')
    <h1>Selamat Datang di Website Tes Online EEC Technocorner 2015!</h1>

    <div id="form-login">
        <h2>Login</h2>
        {{ Form::open(array('url' => 'login/masuk')) }}
        <fieldset>
        {{ Form::token() }}

        <div class="form-group">
            {{ Form::label('email', 'E-mail') }}
            {{ Form::text('email', '', array('placeholder' => 'seseorang@suatutempat.com', 'class' => 'form-control' )) }}
        </div>


        <div class="form-group">
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password', array('placeholder' => '**********', 'class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Masuk', array('class' => 'btn'))}}
            <a href="daftar" class="btn btn-primary">Daftar Baru</a>
        </div>


        </fieldset>
        {{ Form::close() }}
    </div>

@stop