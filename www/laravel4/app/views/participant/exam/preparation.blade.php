@extends('layout.master')

@section('body')

  <main class="container-fluid">
    <h1>Persiapan Ujian</h1>
    <hr>

    <h2>Teknis Soal</h2>
    <ul>
      <li>Ada 10000 soal</li>
      <li>Durasi 5 menit</li>
    </ul>

    <h2>Tata tertib</h2>
    <ul>
      <li>Blabalbla</li>
      <li>Segala peraturan mengenai persiapan ujian</li>
    </ul>

    {{ $exam->id }}<hr>

    <a href="#" class="btn btn-dasar">MULAI UJIAN</a> <-- Nanti dibuat besar dan gede

  </main>

@stop