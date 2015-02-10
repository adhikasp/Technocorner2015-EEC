@extends('layout.master')

@section('body')
  <main class="container-fluid">
    <h1>Buat Soal Baru</h1>
    {{ Form::open(['route' => 'admin.question.store', 'class' => 'form-horizontal', 'files' => true]) }}
    <fieldset>
      <div class="form-group">
        {{ Form::label('question', 'Pertanyaan', ['class' => 'control-label col-sm-2']) }}
        <div class="col-sm-10">
          {{ Form::textarea('question', Input::old('question'), ['class' => 'form-control', 'rows' => 5, 'required' => true]) }}
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('image', 'Gambar', ['class' => 'control-label col-sm-2']) }}
        <div class="col-sm-10">
          {{ Form::file('image', Input::old('image'), ['class' => 'form-control', 'required' => true]) }}
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('chA', 'Pilihan A', ['class' => 'control-label col-sm-2']) }}
        <div class="col-sm-10">
          {{ Form::textarea('chA', Input::old('chA'), ['class' => 'form-control', 'rows' => 1, 'required' => true]) }}
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('chB', 'Pilihan B', ['class' => 'control-label col-sm-2']) }}
        <div class="col-sm-10">
          {{ Form::textarea('chB', Input::old('chB'), ['class' => 'form-control', 'rows' => 1, 'required' => true]) }}
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('chC', 'Pilihan C', ['class' => 'control-label col-sm-2']) }}
        <div class="col-sm-10">
          {{ Form::textarea('chC', Input::old('chC'), ['class' => 'form-control', 'rows' => 1, 'required' => true]) }}
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('chD', 'Pilihan D', ['class' => 'control-label col-sm-2']) }}
        <div class="col-sm-10">
          {{ Form::textarea('chD', Input::old('chD'), ['class' => 'form-control', 'rows' => 1, 'required' => true]) }}
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('answer', 'Kunci Jawaban', ['class' => 'control-label col-sm-2'])}}
        <div class="col-sm-10">
          <div class="radio">
            <label>
              {{ Form::radio('answer', 'A') }}
              A
            </label>
          </div>
          <div class="radio">
            <label>
              {{ Form::radio('answer', 'B') }}
              B
            </label>
          </div>
          <div class="radio">
            <label>
              {{ Form::radio('answer', 'C') }}
              C
            </label>
          </div>
          <div class="radio">
            <label>
              {{ Form::radio('answer', 'D') }}
              D
            </label>
          </div>
        </div>
      </div>

      {{ link_to_route('admin.dashboard', 'Kembali', null, ['class' => 'btn-dasar col-sm-offset-2']) }}
      {{ Form::submit('Simpan', ['class' => 'btn-dasar btn-primary']) }}

    </fieldset>
    {{ Form::close() }}
  </main>
@stop