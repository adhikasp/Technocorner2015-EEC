@extends('layout.master')

@section('body')
  <main class="container-fluid">
    <h1>Daftar Peserta EEC Technocorner</h1>

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
          <td>{{ link_to_route('admin.viewDetailParticipant', 'Detail', $team->id) }}</td>
        </tr>
      @endforeach
    </table>
  </main>
@stop