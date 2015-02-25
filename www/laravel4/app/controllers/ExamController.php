<?php

class ExamController extends BaseController {

  public function showPreparation() {

    $p = Auth::user()->userable;

    // If Participant is opening exam preparation page for the first time,
    // then we create new Exam instance and assign it to them.
    if (!isset($p->exam)) {
      $pkg = new QPackage;
      $pkg->save();
      $pkg->enumerateQuestions();  // Must be called after dB insertion

      $e = new Exam;
      $e->session = 0;
      $e->qpackage_id = $pkg->id;
      $p->exam()->save($e);

      // Assign the exam
      $pkg->exam_id = $e->id;
      $pkg->save();
    }
    // Or if the participant already open the page before but NOT yet taken the exam,
    // then we just reference it.
    // Note: it is impossible for user that ALREADY TAKE EXAM to visit this page
    //       because there is filter in routes to this page.
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
    $e = Auth::user()->userable->exam;

    // Get the current exam type subject from url (GET input)
    // If not present, default to the first subject in Qtype
    // In case of this EEC exam, the order is: Matematika, Fisika, Computer.

    // For better optimization, just hardcode the default : Matematika
    $questionSubject = Input::get('mapel', 'matematika');
    $subjectId = QType::where('name', '=', $questionSubject)->first()->id;

    $qpkg = $e->qpackage;

    // Get ALL the question in requested subject
    // $q = $qpkg->questions()->where('qtype_id', '=', $subjectId)->get();
    $q = $qpkg->scopeQType($subjectId)->get();

    // Get all the QType for pagination
    $subjectList = QType::all()->lists('name');

    // Pass the user's exam id to View for AJAX push saving to Database
    $examId = $e->id;

    return View::make('participant.exam.page')
      ->withQuestions($q)
      ->withSubjectList($subjectList)
      ->withSubjectId($subjectId)
      ->withExamId($examId);
  }

  public function getAnswer()
  {
    $examId = Input::get('exam_id');

    $ea = EAnswer::where('exam_id', '=', $examId)
            ->select(['id', 'exam_id', 'question_id', 'answer'])->get();

    return Response::json([
      'status' => 'sukses',
      'question' => $ea
    ]);
  }

    public function timeSync() {
        $e = Auth::user()->userable->exam;

        $carbon = Carbon::parse($e->end_time);
        $max_time = $carbon->timestamp;
        $now = Carbon::now()->timestamp;
        $remaining = $max_time - $now;

        return Response::json([
            'remaining' => $remaining,
            'max' => $max_time,
            'now' => $now
        ]);
    }

  public function submit()
  {
    if (Input::has('answers')) {
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
    }

    return Response::json([
      'status' => 'success'
    ]);
  }

  public function showConfirmFinish()
  {
    return View::make('participant.exam.confirmFinish');
  }

  public function confirmFinish()
  {
    $e = Auth::user()->userable->exam;

    $e->session = 2;
    $e->calculateResult();

    return Redirect::route('participant.exam.result');
  }

  public function result()
  {
    $p = Auth::user()->userable;
    $e = $p->exam;

    return View::make('participant.exam.result')
      ->withParticipant($p)
      ->withExam($e);
  }
}