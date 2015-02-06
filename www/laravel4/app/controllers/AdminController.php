<?php

class AdminController extends BaseController {

  public function viewAllPeserta() {
    $peserta = Peserta::all();

    return View::make('admin.allPeserta')
      ->withPeserta($peserta);
  }

}