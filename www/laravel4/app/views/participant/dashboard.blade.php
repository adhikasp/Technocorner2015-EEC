@extends('layout.master')

@section('head')
  <title>Technocorner 2015 - Dashboard Peserta</title>
@stop

@section('body')
  <main class="container-fluid">
    <h1>Selamat Datang Peserta EEC 2015</h1>
    <hr/>
    <section class="dashboard">
      <h2>Detail Tim Kamu</h2>
      {{ Form::open(['url' => '#', 'class' => 'form-horizontal']) }}
      <fieldset>
        <legend> {{ $participant->team_name }}</legend>
        <div class="form-group">
          <label for="" class="control-label col-sm-2">Nama Tim</label>
          <div class="col-sm-10">
            <p class="form-control-static">{{ $participant->team_name }}</p>
          </div>
        </div>
        <div class="form-group">
          <label for="" class="control-label col-sm-2">Asal Sekolah</label>
          <div class="col-sm-10">
            <p class="form-control-static">{{ $participant->school }}</p>
          </div>
        </div>
        <div class="form-group">
          <label for="" class="control-label col-sm-2">Anggota 1</label>
          <div class="col-sm-10">
            <p class="form-control-static">{{ $participant->member_1 }}</p>
          </div>
        </div>
        <div class="form-group">
          <label for="" class="control-label col-sm-2">Anggota 2</label>
          <div class="col-sm-10">
            <p class="form-control-static">{{ $participant->member_2 }}</p>
          </div>
        </div>
        <div class="form-group">
          <label for="" class="control-label col-sm-2">Anggota 3</label>
          <div class="col-sm-10">
            <p class="form-control-static">{{ $participant->member_3 }}</p>
          </div>
        </div>
        <div class="form-group">
          <label for="" class="control-label col-sm-2">Email</label>
          <div class="col-sm-10">
            <p class="form-control-static">{{ $participant->user->email }}</p>
          </div>
        </div>
      </fieldset>
      {{ Form::close() }}

      <hr>
      <a href="{{ route('participant.exam.preparation') }}" class="btn-dasar btn-important" >
        <?php
        $x = isset($participant->exam->session) ? $participant->exam->session : 0;
        switch ($x) {
          case 0:
          case 1:
            echo "Bersiap Ujian";
            break;
          case 2:
            echo "Lanjutkan Ujian";
            break;
          case 3:
            echo "Lihat Hasil";
            break;
          default:
            echo "Error!";
        }
        ?>
      </a>
      <hr>

      @if( App::environment() == 'local' )
        <h1>DEVELOP MODE ONLY</h1>
        <h2>Cek Time <small>Pastikan waktu server = waktu lokal</small></h2>
        {{ Carbon::now() }}
        <h2>Exam Model Data</h2>

        <p>
        ID : {{ count($participant->exam) ? $participant->exam->id : 'User belum punya model Exam' }} <br>
        @if (count($participant->exam))
          Here, just read the JSON yourself. <br>
          <pre>{{ json_encode($participant->exam, JSON_PRETTY_PRINT) }}</pre>
        @endif

        </p>

        <a href="{{ route('participant.exam.destroy') }}" class="btn-dasar disabled">DEVELOP ONLY: destroy user Exam</a>
        <hr>
      @endif

      <h2>Petunjuk Teknis Persiapan Ujian</h2>
      <ul>
        <li>Pastikan detail tim kamu benar sebelum memulai ujian.</li>
        <li>Jika terdapat kesalahan pada detail tim kamu, segera laporkan ke admin Technocorner di <strong>technocorner2015@gmail.com</strong> atau melalui nomor yang tertera pada bagian bawah halaman</li>
        <li>Tombol mulai ujian dapat diakses ketika waktu babak penyisihan online (1 Maret 2015)</li>
        <li>Sangat disarankan untuk melakukan Ujian Online dengan menggunakan desktop/PC dan browser modern (IE versi 10 ke atas, Google Chrome, Chromium, atau Firefox)</li>
      </ul>

      <h2>Petunjuk Melakukan Ujian</h2>
      <ul>
        <li>Login pada waktu yang ditentukan oleh panitia (sesuai jadwal).</li>
        <li>Periksa data diri.</li>
        <li>Jika telah siap tekan tombol "Bersiap Ujian"</li>
        <li>Baca dan pahami peraturan pada halaman Persiapan Ujian dengan seksama.</li>
        <li>Berdo'a sebelum memulai ujian.</li>
        <li>Jika telah siap, tekan tombol "Mulai Ujian".</li>
        <li>Baca soal dengan seksama dan pilih jawaban yang paling tepat dengan menekan salah satu jawaban.</li>
        <li>Jika telah selesai, tekan tombol "Selesai".</li>
      </ul>
    </section>
    <hr/>
    <div class="paper-footer">
      <small>(c) Technocorner</small>
    </div>
  </main>
@stop
