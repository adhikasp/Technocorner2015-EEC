@extends('layout.master')

@section('head')
    <title>EEC - Daftar Peserta Baru</title>
@stop

@section('body')
    <h1>Form Pendaftaran Peserta</h1>

    <div id='form-daftar'>
        {{ Form::open(array('url' => 'daftar/proses', 'class' => 'form-horizontal')) }}
        <fieldset>

        <div class="form-group">
            {{ Form::label('nama_tim', 'Nama Tim', array('class' => 'control-label col-sm-2')) }}
            <div class="col-sm-10">
                {{ Form::text('nama_tim', '', array('class' => 'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email', array('class' => 'control-label col-sm-2')) }}
            <div class="col-sm-10">
                {{ Form::text('email', '', array('class' => 'form-control', 'aria-describedby' => 'help-email')) }}
                <span id='help-email' class='help-block'>Email yang akan digunakan sebagai id login.</span>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Password', array('class' => 'control-label col-sm-2')) }}
            <div class="col-sm-10">
                {{ Form::password('password', array('class' => 'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('asal', 'Asal Sekolah', array('class' => 'control-label col-sm-2')) }}
            <div class="col-sm-10">
                {{ Form::text('asal', '', array('class' => 'form-control')) }}
                <span class='help-block'>Contoh format: SMAN 1 Sukamaju</span>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('anggota_1', 'Anggota 1', array('class' => 'control-label col-sm-2')) }}
            <div class="col-sm-10">
                {{ Form::text('anggota_1', '', array('class' => 'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('anggota_2', 'Anggota 2', array('class' => 'control-label col-sm-2')) }}
            <div class="col-sm-10">
                {{ Form::text('anggota_2', '', array('class' => 'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('anggota_3', 'Anggota 3', array('class' => 'control-label col-sm-2')) }}
            <div class="col-sm-10">
                {{ Form::text('anggota_3', '', array('class' => 'form-control')) }}
            </div>
        </div>

        {{ Form::submit('Daftar', array('class' => 'btn btn-primary btn-lg col-sm-offset-2')) }}

        </fieldset>
        {{ Form::close() }}
    </div>

@stop