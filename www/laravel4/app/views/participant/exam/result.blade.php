@extends('layout.master')

@section('body')

  <main class="container-fluid">
    <h1>Hasil Ujian</h1>
    <p>Tim {{ $participant->team_name }}</p>
    <p>Skor : {{ $exam->score }}</p>
  </main>

@stop