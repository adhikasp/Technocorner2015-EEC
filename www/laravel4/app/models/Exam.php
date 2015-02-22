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

  public function qpackage()
  {
      return $this->hasOne('QPackage');
  }

  public function participant()
  {
    return $this->belongsTo('Participant');
  }

  public function getExamDurationAttribute()
  {
    return $this->exam_duration;
  }

  public function calculateResult()
  {
    $answers = EAnswer::where('exam_id', '=', $this->id)->get();
    // $questionsKey = Question::all()->select(['id', 'answer']);
    dd($this->id);

    $VALUE_CORRECT = 3;
    $VALUE_EMPTY = 0;
    $VALUE_WRONG = -2;

    $score = 0;

    foreach ($answers as $answer) {
      if ($answer->answer == $answer->question->answer)
      {
        $score += $VALUE_CORRECT;
      } else {
        $score += $VALUE_WRONG;
      }
    }

    $this->score = $score;
    $this->session = 3;
    $this->save();
  }
}
