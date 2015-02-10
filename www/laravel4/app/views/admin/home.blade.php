@extends('layout.master')

@section('body')

  <main class="container-fluid">
    <h1>Website Tes Online EEC Technocorner 2015</h1>

    <div id="form-login">
      <h2>Login Khusus Admin</h2>
      @if(Session::has('message'))
          @if(Session::get('message') == 'login_fail')
              <p class="bg-error">
                  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                  <strong>Error</strong>: Login gagal, pastikan email dan/atau password Anda sudah benar.
              </p>
          @elseif(Session::get('message') == 'unauthorized_access')
              <p class="bg-error">
                  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                  <strong>Error</strong>: Maaf, kamu harus login dahulu.
              </p>
          @endif
      @endif

      {{ Form::open(array('route' => 'admin.login')) }}
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
              {{ Form::submit('Masuk', array('class' => 'btn-dasar'))}}
              <a href="{{ route('admin.create') }}" class="btn-dasar btn-important">Daftar Baru</a>
          </div>
      </div>

      </fieldset>
      {{ Form::close() }}
    </div>

  </main>

@stop