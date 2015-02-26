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
    if( strtolower(Input::get('secretOne')) != 'ahmad' && strtolower(Input::get('secretTwo')) != 'fdk' )
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

    Auth::login($u);

    return Redirect::route('admin.dashboard');
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
    $questions = Question::with('qtype')->orderBy('qtype_id')->get();

    $qtype = QType::all();

    return View::make('admin.dashboard')
      ->withQuestions($questions)
      ->withType($qtype);
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

    public function createParticipant() {
        return View::make('admin.participant.create');
    }

    public function storeParticipant() {
        $p            = new Participant;
        $p->team_name = Input::get('team_name');
        $p->member_1  = Input::get('member_1');
        $p->member_2  = Input::get('member_2');
        $p->member_3  = Input::get('member_3');
        $p->school    = Input::get('school');
        $p->save();

        $u            = new User;
        $u->email     = Input::get('email');
        $u->password  = Hash::make(Input::get('password'));
        $u->save();

        // Polymorph magic
        $p->user()->save($u);

        return Redirect::route('admin.participant.list')
          ->withParticipant($p);
    }

    public function editParticipant($id) {
        $p = Participant::find($id);

        return View::make('admin.participant.edit')->withParticipant($p);
    }

    public function updateParticipant($id) {
        $p            = Participant::find($id);
        $p->team_name = Input::get('team_name');
        $p->member_1  = Input::get('member_1');
        $p->member_2  = Input::get('member_2');
        $p->member_3  = Input::get('member_3');
        $p->school    = Input::get('school');
        $p->save();

        $u            = User::find($p->user->id);
        $u->email     = Input::get('email');
        if (Input::get('password') != '') {
            $u->password  = Hash::make(Input::get('password'));
        }
        $u->save();

        // Polymorph magic
        $p->user()->save($u);

        return Redirect::route('admin.participant.list');
    }

    public function deleteParticipant($id) {
        Participant::find($id)->delete();

        return Redirect::route('admin.participant.list');
    }

    public function deleteExamParticipant($id) {
      $e = Participant::find($id)->exam;

      if (count($e)) {
        $e->delete();
      }

      return Redirect::route('admin.viewDetailParticipant', $id);
    }

}