@extends('admin.question.editable')

@section('field_question')
  {{ Form::textarea('question', $question->question, ['class' => 'form-control', 'rows' => 5, 'required' => true]) }}
@stop

@section('field_img')
  {{ Form::file('image', $question->image, ['class' => 'form-control', 'required' => true]) }}
@stop

@section('field_chA')
  {{ Form::textarea('chA', $question->chA, ['class' => 'form-control', 'rows' => 1, 'required' => true]) }}
@stop

@section('field_chB')
  {{ Form::textarea('chB', $question->chB, ['class' => 'form-control', 'rows' => 1, 'required' => true]) }}
@stop

@section('field_chC')
  {{ Form::textarea('chC', $question->chC, ['class' => 'form-control', 'rows' => 1, 'required' => true]) }}
@stop

@section('field_chD')
  {{ Form::textarea('chD', $question->chD, ['class' => 'form-control', 'rows' => 1, 'required' => true]) }}
@stop

@section('field_chE')
  {{ Form::textarea('chE', $question->chE, ['class' => 'form-control', 'rows' => 1, 'required' => true]) }}
@stop

@section('field_answerA')
  {{ Form::radio('answer', 'A') }}
@stop

@section('field_answerB')
  {{ Form::radio('answer', 'B') }}
@stop

@section('field_answerC')
  {{ Form::radio('answer', 'C') }}
@stop

@section('field_answerD')
  {{ Form::radio('answer', 'D') }}
@stop

@section('field_answerE')
  {{ Form::radio('answer', 'E') }}
@stop
