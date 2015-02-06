<?php

class AdminController extends BaseController {

  public function viewAllPeserta() {
    $peserta = Peserta::all();

    return View::make('admin.allPeserta')
      ->withPeserta($peserta);
  }

  public function viewDetailPeserta($id)
  {
    $peserta = Peserta::find($id);

    return View::make('admin.detailPeserta')
      ->withPeserta($peserta);
  }

}