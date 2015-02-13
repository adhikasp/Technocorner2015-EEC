@extends('layout.master')

@section('body')
  <main class="container-fluid">
    <h1>Dashboard Admin</h1>
    <hr/>
    <section class="dashboard">
      <h2>Hai {{ Auth::user()->userable->name }} :)</h2>

      <ul class="nav nav-tabs">
        <li class="active"><a href="#daftar-soal">Daftar Soal</a></li>
        <li><a href="{{ route('admin.viewAllParticipant') }}">Daftar Peserta</a></li>
      </ul>

      <h2>Daftar Soal</h2>

      @if(Session::has('message'))
        @if(Session::get('message') == 'quest_add')
          <div class="bg-success">
            <span class="glyphicon glypichon-check"></span>
            <strong>Sukses</strong>: Soal berhasil ditambahkan ke DataBase.
          </div>
        @elseif(Session::get('message') == 'quest_delete')
          <div class="bg-success">
            <span class="glyphicon glypichon-check"></span>
            <strong>Sukses</strong>: Soal berhasil dihapus.
          </div>
        @endif
      @endif

      <table class="table dashboard-table" id="daftar-soal">
        <tr>
          <th>ID</th>
          <th>Pertanyaan (cuplikan)</th>
          <th>Gambar (ada/tidak)</th>
          <th>Aksi</th>
        </tr>

        @foreach ($questions as $q)
          <tr>
            <td>{{ $q->id }}</td>
            <td>{{ substr($q->question, 0, 50)}}</td>
            <td>{{ isset($q->image) ? 'ada' : 'tidak' }}</td>
            <td class="dashboard-action">
              <a href="{{route('admin.question.detail', $q->id)}}"><span class="glyphicon glyphicon-eye-open"></span> Lihat</a> |
              <a href="{{route('admin.question.edit', $q->id)}}"><span class="glyphicon glyphicon-pencil"></span> Edit</a> |
              <a href="{{route('admin.question.delete', $q->id)}}" class="need-confirmation"><span class="glyphicon glyphicon-trash"></span> HAPUS</a>
            </td>
          </tr>
        @endforeach

      </table>

      <a href="{{ route('admin.question.create') }}" class="btn-dasar btn-primary">Tambah Soal</a>
    </section>
  </main>
@stop

@section('script')
@stop

