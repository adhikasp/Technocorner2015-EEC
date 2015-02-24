@extends('admin.participant.editable')

@section("form_open")
  {{ Form::open(array('route' => 'admin.participant.store', 'class' => 'form-horizontal form-daftar')) }}
@stop

@section('form_legend')
  <legend>Buat Data Peserta</legend>
@stop

@section('form_teamname')
  {{ Form::text('team_name', Input::old('team_name'), array('class' => 'form-control')) }}
@stop

@section('form_email')
  {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
@stop

@section('form_password')
  {{ Form::text('password', '', array('class' => 'form-control')) }}
@stop

@section('form_member1')
  {{ Form::text('member_1', Input::old('member_1'), array('class' => 'form-control')) }}
@stop

@section('form_member2')
  {{ Form::text('member_2', Input::old('member_2'), array('class' => 'form-control')) }}
@stop

@section('form_member3')
  {{ Form::text('member_3', Input::old('member_3'), array('class' => 'form-control')) }}
@stop

@section('form_school')
  {{ Form::text('school', Input::old('school'), array('class' => 'form-control')) }}
@stop