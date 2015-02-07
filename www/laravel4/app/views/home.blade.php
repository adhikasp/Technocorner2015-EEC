@extends('layout.master')


@section('head')
    <title>Home Page</title>
@stop


@section('body')
  <main class="container-fluid">
    <h1>Website Tes Online EEC Technocorner 2015</h1>

    <div id="form-login">
        <h2>Login</h2>
        @if(Session::has('message'))
            @if(Session::get('message') == 'login_fail')
                <p class="bg-error">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    <strong>Error</strong>: Login gagal, pastikan email dan/atau password Anda sudah benar.
                </p>
            @elseif(Session::get('message') == 'logout_participant')
                <p class="bg-success">
                    <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
                    <strong>Sukses</strong>: Anda sudah logout dari sistem.
                </p>
            @elseif(Session::get('message') == 'unauthorized_access')
                <p class="bg-error">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    <strong>Error</strong>: Maaf, kamu harus login dahulu.
                </p>
            @endif
        @endif

        {{ Form::open(array('route' => 'participant.login')) }}
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
            <div class="form-inline">
                {{ Form::submit('Masuk', array('class' => 'btn btn-dasar'))}}
                <a href="{{ route('participant.create') }}" class="btn btn-dasar btn-important">Daftar Baru</a>
            </div>
        </div>
        </fieldset>
        {{ Form::close() }}
    </div>
  </main>
@stop