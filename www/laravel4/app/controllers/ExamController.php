<?php

class ExamController extends BaseController {

  public function showPreparation() {

    $p = Auth::user()->userable;

    if (!isset($p->exam)) {
      $e = new Exam;
      $e->session = 0;
      Auth::user()->userable->exam()->save($e);
    }
    else {
      $e = $p->exam;
    }

    return View::make('participant.exam.preparation')
      ->withExam($e);
  }

  public function startExam()
  {
    $e = Auth::user()->userable->exam;

    $e->session = 1;
    $e->start_time = new DateTime();
    $e->end_time = $e->start_time + $e->exam_duration;

    Redirect::route('participant.exam.page');
  }

  public function exam()
  {
    $e = Auth::user()->userable->exam;

    View::make('participant.exam.page');
  }

  public function destroy()
  {
    if (count(Auth::user()->userable->exam)) {
      Auth::user()->userable->exam->delete();
    }

    return Redirect::route('participant.dashboard');
  }

}