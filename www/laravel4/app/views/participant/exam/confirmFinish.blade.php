@extends('layout.master')

@section('body')

  <main class="container-fluid">
    <h1>Apakah kamu yakin ingin menyelesaikan ujian?</h1>
    {{ Form::open(['route' => 'participant.exam.confirmFinish']) }}

    {{ Form::submit('Ya, saya sangat yakin.') }}
    {{ link_to_route('participant.exam.page', 'Tidak, saya masih ingin mengerjakan ujian!') }}

    {{ Form::close() }}
  </main>

@stop