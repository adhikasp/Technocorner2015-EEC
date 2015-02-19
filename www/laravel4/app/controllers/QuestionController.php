<?php

class QuestionController extends BaseController {

  public function create()
  {
    $qtypes = QType::lists('name', 'id');
    $qtypes[0] = 'Buat baru';
    // Sort array based on key
    ksort($qtypes);

    return View::make('admin.question.create')
      ->withQtypes($qtypes);
  }

  public function store()
  {
    $imgRelPath = '/question/img/';
    $imgPath = public_path() . $imgRelPath;
    $imgPrefix = 'soal-';

    // Is the question new? Or so old?
    $q = new Question;

    $q->question = Input::get('question');

    $qtype = QType::where('id', '=', Input::get('qtype'))->first();
    $qtype_id = $qtype? $qtype->id : null;
    if (!$qtype_id && Input::get('qtype') == 0) {
      $qtype = new QType;
      $qtype->name = Input::get('qtype_new');
      $qtype->save();

      $qtype_id = $qtype->id;
    } else {
      Log::error('QType is undefined : wrong id.');
    }

    $q->qtype_id = $qtype_id;
    $q->chA = Input::get('chA');
    $q->chB = Input::get('chB');
    $q->chC = Input::get('chC');
    $q->chD = Input::get('chD');
    $q->chE = Input::get('chE');
    $q->randomize = Input::get('randomize')? true : false;
    $q->answer = Input::get('answer');
    $q->save();

    // Check the availibilty and validation of uploaded file
    // then save it in `/img/soal` folder with name format soal-{id}.jpg
    // then save the path in DB.
    if (Input::hasFile('image')) {
      if (Input::File('image')->isValid()) {
        $imgSuffix = Input::file('image')->getClientOriginalExtension();
        $imgName = $imgPrefix . $q->id . '.' . $imgSuffix;
        Input::file('image')->move($imgPath, $imgName);
        $q->image = $imgRelPath . $imgName;
      }
    }
    $q->save();

    return Redirect::route('admin.dashboard')
      ->withMessage('quest_add');
  }

  public function update($id)
  {
    $imgRelPath = '/question/img/';
    $imgPath = public_path() . $imgRelPath;
    $imgPrefix = 'soal-';

    // Is the question new? Or so old?
    $q = Question::find($id);

    $q->question = Input::get('question');

    $qtype = QType::where('id', '=', Input::get('qtype'))->first();
    $qtype_id = $qtype? $qtype->id : null;
    if (!$qtype_id && Input::get('qtype') == 0) {
      $qtype = new QType;
      $qtype->name = Input::get('qtype_new');
      $qtype->save();

      $qtype_id = $qtype->id;
    } else {
      Log::error('QType is undefined : wrong id.');
    }

    $q->qtype_id = $qtype_id;
    $q->chA = Input::get('chA');
    $q->chB = Input::get('chB');
    $q->chC = Input::get('chC');
    $q->chD = Input::get('chD');
    $q->chE = Input::get('chE');
    Log::info('Rand ' . Input::get('randomize'));
    $q->randomize = Input::get('randomize')? true : false;
    $q->answer = Input::get('answer');
    $q->save();

    // Check the availibilty and validation of uploaded file
    // then save it in `/img/soal` folder with name format soal-{id}.jpg
    // then save the path in DB.
    if (Input::hasFile('image')) {
      if (Input::File('image')->isValid()) {
        $imgSuffix = Input::file('image')->getClientOriginalExtension();
        $imgName = $imgPrefix . $q->id . '.' . $imgSuffix;
        Input::file('image')->move($imgPath, $imgName);
        $q->image = $imgRelPath . $imgName;
      }
    }
    $q->save();

    return Redirect::route('admin.dashboard')
      ->withMessage('quest_update');
  }

  public function detail($id)
  {
    $q = Question::find($id);

    return View::make('admin.question.detail')
      ->withQuestion($q);
  }

  public function edit($id)
  {
    $q = Question::find($id);

    $qtypes = QType::lists('name', 'id');
    $qtypes[0] = 'Buat baru';
    // Sort array based on key
    ksort($qtypes);

    return View::make('admin.question.edit')
      ->withQuestion($q)
      ->withQtypes($qtypes);
  }

  public function delete($id)
  {
    $q = Question::find($id);
    // Remove image
    unlink(public_path() . $q->image);
    $q->delete();

    return Redirect::route('admin.dashboard')
      ->withMessage('quest_delete');
  }
}
