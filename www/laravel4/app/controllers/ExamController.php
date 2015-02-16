<?php

class ExamController extends BaseController {

  public function showPreparation() {

    $e = new Exam;

    return View::make('participant.exam.preparation');
  }

}