@extends('layout.master')

@section('body')

  <main class="container-fluid">
    <h1>Persiapan Ujian</h1>
    <hr>

    <h2>Rincian Soal</h2>
    <ul>
      <li>Ada 120 soal pilihan ganda, terdiri dari 45 soal Matematika, 40 soal Fisika, dan 35 soal Komputer</li>
      <li>Waktu ujian dibatasi selama 2 jam, peserta diperbolehkan mengakhiri ujian sebelum batas waktu.</li>
    </ul>

    <h2>Tata tertib</h2>
    <ul>
      <li>Blabalbla</li>
      <li>Segala peraturan mengenai persiapan ujian</li>
    </ul>

    @if ( App::environment() == 'local' )
      {{ link_to_route('participant.dashboard', 'DEVELOP : back to dashboard', null, ['class' => 'btn btn-dasar']) }}
    @endif
	<br/>
    <a href="{{ route('participant.exam.start') }}" class="btn btn-dasar btn-important btn-lg"><strong>MULAI UJIAN</strong></a>

	<hr/>
    <div class="paper-footer col-sm-12">
      <small>(c) Technocorner</small>
    </div>
  </main>

@stop
