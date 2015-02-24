@extends('layout.master')

@section('body')

  <main class="container-fluid">
    <h1>Hasil Ujian</h1>
	<hr/>

	<section class="score-board">
	  <div class="col-sm-6">
		<h2>Perhitungan</h2>
		<div class="col-sm-3">Benar</div>
		<div class="col-sm-2"> : </div>
		<div class="col-sm-4" style="font-family: monospace">({{ $exam->score_true }} x 4)</div>
		<div class="col-sm-2">{{ $exam->score_true * 4 }}</div>

		<div class="col-sm-3">Salah</div>
		<div class="col-sm-2"> : </div>
		<div class="col-sm-4" style="font-family: monospace">({{ $exam->score_false }} x -1)</div>
		<div class="col-sm-2">{{ $exam->score_false * -1 }}</div>

		<div class="col-sm-3">Kosong</div>
		<div class="col-sm-2"> : </div>
		<div class="col-sm-4" style="font-family: monospace">({{ $exam->score_null }} x 0)</div>
		<div class="col-sm-2">{{ $exam->score_null * 0 }}</div>

		<hr class="col-sm-10"/>

		<div class="col-sm-3">Total</div>
		<div class="col-sm-6"> : </div>
		<div class="col-sm-2"><strong>{{ $exam->score }}</strong></div>
	  </div>

	  <div class="col-sm-6">
		<h2>Point Akhir</h2>
		<p>Tim kamu, "<strong>{{ $participant->team_name }}</strong>" medapatkan skor : </p>
		<h1><strong>{{ $exam->score }}</strong></h1>
	  </div>
	</section>

	<div style="clear: both"></div>

	<hr/>
    <div class="paper-footer col-sm-12">
      <small>(c) Technocorner</small>
    </div>
  </main>

@stop
