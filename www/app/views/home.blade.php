@extends('layout.base')


@section('head')
    <link rel="stylesheet" href="css/home.css">
    <title>Home Page</title>
@stop


@section('body')
    <h1>Welcome To EEC Online Test Site!</h1>

    <div id="login-form">
        <h2>Login</h2>
        {{ Form::open(array('url' => 'login/masuk', 'class' => 'pure-form pure-form-stacked')) }}
        <fieldset>
        {{ Form::token() }}

        <div class="my-form-group">
            {{ Form::label('email', 'E-mail') }}
            {{ Form::text('email', '', array('placeholder' => 'seseorang@suatutempat.com', 'class' => 'pure-input-1')) }}
        </div>


        <div class="my-form-group">
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password', array('placeholder' => '**********', 'class' => 'pure-input-1')) }}
        </div>

        <div class="my-form-group">
            {{ Form::submit('Masuk', array('class' => 'pure-button pure-button-primary'))}}
        </div>
        </fieldset>
        {{ Form::close() }}
    </div>

@stop