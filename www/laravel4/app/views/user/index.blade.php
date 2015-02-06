@extends('layout.master')

@section('body')
  <h1>Daftar Peserta EEC Technocorner</h1>

  <table class="table">
    <tr>
      <th>ID</th>
      <th>Nama Tim</th>
      <th>Email</th>
    </tr>
    @foreach($peserta as $tim)
      <tr>
        <td>{{ $tim->id }}</td>
        <td>{{ $tim->nama_tim }}</td>
        <td>{{ $tim->email }}</td>
      </tr>
    @endforeach
  </table>
@stop