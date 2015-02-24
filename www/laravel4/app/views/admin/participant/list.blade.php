@extends('layout.master')

@section('body')
  <main class="container-fluid">
    <h1>Dashboard Admin</h1>
	<hr/>

    <section class="dashboard">
      <ul class="nav nav-tabs">
        <li><a href="{{ route('admin.dashboard') }}">Daftar Soal</a></li>
        <li class="active"><a href="{{ route('admin.participant.list') }}">Daftar Peserta</a></li>
      </ul>
      <h2>Daftar Peserta EEC Technocorner</h2>

      <table class="table">
        <tr>
          <th>ID</th>
          <th>Nama Tim</th>
          <th>Email</th>
          <th>Asal Sekolah</th>
          <th>Aksi</th>
        </tr>
        @foreach($participant as $team)
          <tr>
            <td>{{ $team->id }}</td>
            <td>{{ $team->team_name }}</td>
            <td>{{ $team->user->email }}</td>
            <td>{{ $team->school }}</td>
            <td class="dashboard-action">
			  <a href="{{route('admin.participant.detail', $team->id)}}"><span class="glyphicon glyphicon-eye-open"></span> Detail</a> |
			  <a href="{{route('admin.participant.edit', $team->id)}}"><span class="glyphicon glyphicon-pencil"></span> Edit</a> |
			  <a href="{{route('admin.participant.delete', $team->id)}}" class="need-confirmation"><span class="glyphicon glyphicon-trash"></span> HAPUS</a>
			</td>
          </tr>
        @endforeach
      </table>

      <a href="{{ route('admin.participant.create') }}" class="btn-dasar btn-primary">Tambah Peserta</a>
    </section>

	<hr/>
    <div class="paper-footer">
      <small>(c) Technocorner</small>
    </div>
  </main>
@stop
