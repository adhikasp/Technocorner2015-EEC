<?php

class AdminController extends BaseController {

  public function home()
  {
    return View::make('admin.home');
  }

  public function create()
  {
    return View::make('admin.home');
  }

  public function login()
  {
    return View::make('admin.home');
  }

  public function dashboard()
  {
    return View::make('admin.home');
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