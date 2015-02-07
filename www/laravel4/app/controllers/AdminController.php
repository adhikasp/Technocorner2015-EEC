<?php

class AdminController extends BaseController {

  public function home()
  {
    return View::make('admin.home');
  }

  public function create()
  {
    return View::make('admin.create');
  }

  public function store()
  {
    if( strtolower(Input::get('secret')) != 'reza')
    {
      return Redirect::route('home');
    }

    $u = new User;
    $u->email = Input::get('email');
    $u->password = Hash::make(Input::get('password'));
    $u->save();

    $a = new Admin;
    $a->name = Input::get('name');
    $a->save();

    // Polymorph magic
    $a->user()->save($u);

    // Automatic login after creating new Admin
    Auth::login($u);

    return View::make('admin.dashboard');
  }

  public function login()
  {
    if(Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')])) {
      return Redirect::route('admin.dashboard');
    }

    return Redirect::route('admin.home')
      ->withMessage('login_fail');
  }

  public function dashboard()
  {
    $questions = Question::all();

    return View::make('admin.dashboard')
      ->withQuestions($questions);
  }

  public function viewAllParticipant() {
    $participant = Participant::all();

    return View::make('admin.allParticipant')
      ->withParticipant($participant);
  }

  public function viewDetailParticipant($id)
  {
    $participant = Participant::find($id);

    return View::make('admin.detailParticipant')
      ->withParticipant($participant);
  }

}