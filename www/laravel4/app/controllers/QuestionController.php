<?php

class QuestionController extends BaseController {

  public function create()
  {
    return View::make('admin.question.create');
  }

  public function store()
  {
    $imgPath = 'img/soal/';
    $imgPrefix = 'soal-';

    $q = new Question;

    $q->question = Input::get('question');
    $q->chA = Input::get('chA');
    $q->chB = Input::get('chB');
    $q->chC = Input::get('chC');
    $q->chD = Input::get('chD');
    $q->answer = Input::get('answer');
    $q->save();

    // Check the availibilty and validation of uploaded file
    // then save it in `/img/soal` folder with name format soal-{id}.jpg
    // then save the path in DB.
    if (Input::hasFile('image')) {
      if (Input::File('image')->isValid()) {
        $imgSuffix = Input::file('image')->getClientOriginalExtension();
        $imgName = $imgPrefix . $q->id . $imgSuffix;
        Input::file('image')->move($imgPath, $imgName);
        $q->image = $imgPath . $imgName;
      }
    }
    $q->save();

    return Redirect::route('admin.dashboard')
      ->withMessage('quest_add');
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

    return View::make('admin.question.edit')
      ->withQuestion($q);
  }

  public function delete($id)
  {
    $q = Question::find($id);
    $q->delete();

    return Redirect::route('admin.dashboard')
      ->withMessage('quest_delete');
  }

}