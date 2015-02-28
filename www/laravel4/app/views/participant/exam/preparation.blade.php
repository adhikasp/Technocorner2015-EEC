@extends('layout.master')

@section('body')

  <main class="container-fluid">
    <h1>Persiapan Ujian</h1>
    <hr>

    <h2>Petunjuk Umum Seleksi Online EEC</h2>
    <ul>
	  <li>Soal terdiri dari 120 nomor soal pilihan ganda dengan 45 nomor soal matematika, 40 nomor soal fisika dan 35 nomor soal komputer.</li>
	  <li>Bacalah dengan cermat setiap soal dan pilihlah jawaban yang menurut Anda benar.</li>
	  <li>Ujian ini bersifat buku terbuka dan Anda diperkenankan menggunakan alat hitung.</li>
	  <li>Anda tidak diperkenankan untuk berdiskusi selain dengan sesama anggota tim sendiri.</li>
	  <li>Waktu ujian yang disediakan adalah 120 menit terhitung setelah tombol “bersiap ujian” ditekan.</li>
	  <li>Anda diberikan toleransi waktu untuk login (termasuk menekan tombol “bersiap ujian”) selama 30 menit:</li>
	  <ul>
		<li>Kloter 1: (pukul 09.00 – 09.30 WIB). Setelah pukul 09.30 WIB, Anda sudah tidak bisa login.</li>
		<li>Kloter 2: (pukul 13.30 – 14.00 WIB). Setelah pukul 14.00 WIB, Anda sudah tidak bisa login.</li>
	  </ul>
	  <li>Jawaban yang benar akan diberi skor +4, jawaban yang kosong diberi skor 0, dan jawaban yang salah diberi skor -1.</li>
	  <li>Salin jawaban Anda ke secarik kertas untuk mengantisipasi hal-hal yang tidak dikehendaki.</li>
    </ul>

	<br/>
	<br/>

	<p><center><i>Cheating brings you to the top for a moment before bringing you down to the bottom <br/>
	  and making you bear the burden of cheating forever, <br/>while<br/>
	  Hardwork leads you to the top forever after letting you down and making you bear <br/>
	  the burden of Hardwork for a moment</i></center></p>

	<br/>

    @if ( App::environment() == 'local' )
      {{ link_to_route('participant.dashboard', 'DEVELOP : back to dashboard', null, ['class' => 'btn btn-dasar']) }}
	  <br/>
	  <br/>
    @endif
    <a href="{{ route('participant.exam.start') }}" class="btn btn-dasar btn-important btn-lg"><strong>MULAI UJIAN</strong></a>

	<hr/>
    <div class="paper-footer col-sm-12">
      <small>(c) Technocorner</small>
    </div>
  </main>

@stop
