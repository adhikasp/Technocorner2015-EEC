<?php

class Exam extends Eloquent {


  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'exams';
  public $timestamps = false;

  protected $appends = ['exam_duration'];


  // Hardcode exam duration 2 hours.
  protected $exam_duration = 7200;

  public function participant()
  {
    return $this->belongsTo('Participant');
  }

  public function getExamDurationAttribute()
  {
    return $this->exam_duration;
  }

}
