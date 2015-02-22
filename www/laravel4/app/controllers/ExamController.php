<?php

class ExamController extends BaseController {

  public function showPreparation() {

    $p = Auth::user()->userable;

    if (!isset($p->exam)) {
      $pkg = new QPackage;
      $pkg->save();
      $pkg->enumerateQuestions();  // Must be called after dB insertion

      $e = new Exam;
      $e->session = 0;
      $e->qpackage_id = $pkg->id;
      Auth::user()->userable->exam()->save($e);

      // Assign the exam
      $pkg->exam_id = $e->id;
      $pkg->save();
    } else {
      $e = $p->exam;
    }

    return View::make('participant.exam.preparation')
      ->withExam($e);
  }

  public function startExam()
  {
    $e = Auth::user()->userable->exam;

    $e->session = 1;

    // Carbon DateTime extension
    // github.com/briannesbitt/Carbon
    $e->start_time = Carbon::now();
    $e->end_time = (Carbon::now()->addSeconds(7200));
    $e->save();

    return Redirect::route('participant.exam.page');
  }

  // DEVELOPER MODE : destroy user related Exam instance
  //
  public function destroy()
  {
    if (count(Auth::user()->userable->exam)) {
      Auth::user()->userable->exam->delete();
    }

    return Redirect::route('participant.dashboard');
  }

  public function exam()
  {
    // Get the current exam type subject from url (GET input)
    // If not present, default to the first subject in Qtype
    // In case of this EEC exam, the order is: Matematika, Fisika, Computer.

    // For better optimization, just hardcode the default : Matematika
    $questionSubject = Input::get('mapel', 'matematika');
    $subjectId = QType::where('name', '=', $questionSubject)->first()->id;

    $qpkg = Auth::user()->userable->exam->qpackage;

    // Get ALL the question in requested subject
    // $q = $qpkg->questions()->where('qtype_id', '=', $subjectId)->get();
    $q = $qpkg->scopeQType($subjectId)->get();

    // Get all the QType for pagination
    $subjectList = QType::all()->lists('name');

    $examId = Auth::user()->userable->exam->id;

    return View::make('participant.exam.page')
      ->withQuestions($q)
      ->withSubjectList($subjectList)
      ->withExamId($examId);
  }

  public function submit ()
  {
    $answers = Input::get('answers');
    $examId = Input::get('exam_id');

    foreach ($answers as $answer) {
      // First we check if there is already an answer with
      // matching exam_id and question_id in our database.
      // If there is no match then create new EAnswer model.
      $ea = EAnswer::alreadyAnswer($examId, $answer['id'])->first();
      if ( $ea == null ) {
        $ea = New EAnswer;
        $ea->exam_id = $examId;
        $ea->question_id = $answer['id'];
      }
      $ea->answer = $answer['answer'];
      $ea->save();
    }

    return Response::json([
      'status' => 'success'
    ]);
  }

  public function confirmFinish()
  {
    return View::make('participant.exam.confirmFinish');
  }
}