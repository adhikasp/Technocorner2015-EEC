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
      @foreach($peserta as $tim)
        <tr>
          <td>{{ $tim->id }}</td>
          <td>{{ $tim->nama_tim }}</td>
          <td>{{ $tim->user->email }}</td>
          <td>{{ $tim->asal_sekolah }}</td>
          <td>{{ link_to_route('admin.viewDetailPeserta', 'Detail', $tim->id) }}</td>
        </tr>
      @endforeach
    </table>
  </main>
@stop