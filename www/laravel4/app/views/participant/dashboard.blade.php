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
        <legend> {{ Auth::user()->userable->team_name }}</legend>
        <div class="form-group">
          <label for="" class="control-label col-sm-2">Nama Tim</label>
          <div class="col-sm-10">
            <p class="form-control-static">{{ Auth::user()->userable->team_name }}</p>
          </div>
        </div>
        <div class="form-group">
          <label for="" class="control-label col-sm-2">Asal Sekolah</label>
          <div class="col-sm-10">
            <p class="form-control-static">{{ Auth::user()->userable->school }}</p>
          </div>
        </div>
        <div class="form-group">
          <label for="" class="control-label col-sm-2">Anggota 1</label>
          <div class="col-sm-10">
            <p class="form-control-static">{{ Auth::user()->userable->member_1 }}</p>
          </div>
        </div>
        <div class="form-group">
          <label for="" class="control-label col-sm-2">Anggota 2</label>
          <div class="col-sm-10">
            <p class="form-control-static">{{ Auth::user()->userable->member_2 }}</p>
          </div>
        </div>
        <div class="form-group">
          <label for="" class="control-label col-sm-2">Anggota 3</label>
          <div class="col-sm-10">
            <p class="form-control-static">{{ Auth::user()->userable->member_3 }}</p>
          </div>
        </div>
        <div class="form-group">
          <label for="" class="control-label col-sm-2">Email</label>
          <div class="col-sm-10">
            <p class="form-control-static">{{ Auth::user()->email }}</p>
          </div>
        </div>
      </fieldset>
      {{ Form::close() }}

      <a href="#" class="btn-dasar btn-important" >Mulai Ujian</a>
      <a href="#" class="btn-dasar disabled">Lihat Hasil</a>
      <hr/>

      <h2>Petunjuk Persiapan Ujian</h2>
      <ul>
        <li>Pastikan detail tim kamu benar sebelum memulai ujian.</li>
        <li>Jika terdapat kesalahan pada detail tim kamu, segera laporkan ke admin Technocorner di ~alamat email admin~</li>
        <li>Tombol mulai ujian dapat diakses ketika waktu babak penyisihan online (1 Maret 2015)</li>
        <li>Sangat disarankan untuk melakukan Ujian Online dengan menggunakan desktop/PC dan browser modern (IE versi 10, Chrome versi xx, atau Firefox versi xx keatas)</li>
      </ul>

      <h2>Petunjuk Melakukan Ujian</h2>
      <ul>
        <li>Berdoa</li>
        <li>Login pada hari ujian</li>
      </ul>
    </section>
    <hr/>
    <div class="paper-footer">
      <small>(c) Technocorner</small>
    </div>
  </main>
@stop
