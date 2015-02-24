@extends('layout.master')

@section('body')
  <main class="container-fluid">
    <section class="dashboard">
      <h1>Dashboard Admin</h1>
      <h2>Hai {{ Auth::user()->userable->name }} :)</h2>

      <ul class="nav nav-tabs">
        <li><a href="{{ route('admin.dashboard') }}">Daftar Soal</a></li>
        <li class="active"><a href="{{ route('admin.viewAllParticipant') }}">Daftar Peserta</a></li>
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
            <td class="dashboard-action">{{ link_to_route('admin.viewDetailParticipant', 'Detail', $team->id) }}</td>
          </tr>
        @endforeach
      </table>

    </section>

	<hr/>
    <div class="paper-footer">
      <small>(c) Technocorner</small>
    </div>
  </main>
@stop
