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
    if( strtolower(Input::get('secretOne')) != 'reza' && strtolower(Input::get('secretTwo')) != 'fdk' )
    {
      return Redirect::route('home')
        ->withMessage('unauthorized_create');
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

  public function logout()
  {
    Auth::logout();
    return Redirect::route('admin.home')
      ->withMessage('logout_participant');
  }

  public function dashboard()
  {
    // eager loading optimization
    // http://laravel.com/docs/4.2/eloquent#eager-loading
    $questions = Question::with('qtype')->get();

    return View::make('admin.dashboard')
      ->withQuestions($questions);
  }

  public function viewAllParticipant() {
    $participant = Participant::all();

    return View::make('admin.participant.list')
      ->withParticipant($participant);
  }

  public function viewDetailParticipant($id)
  {
    $participant = Participant::find($id);

    return View::make('admin.participant.detail')
      ->withParticipant($participant);
  }

}