<?php

class AdminController extends BaseController {

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