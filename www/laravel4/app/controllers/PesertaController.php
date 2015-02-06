<?php

class PesertaController extends BaseController {

    public function showDashboard()
    {
        return "Hello User :)";
    }

    public function create()
    {
        return View::make('user.create');
    }

    public function store()
    {
      $i = Input::all();

      $p = new Peserta;
      $p->nama_tim     = Input::get('nama_tim');
      $p->email        = Input::get('email');
      $p->password     = Hash::make(Input::get('password'));
      $p->anggota_1    = Input::get('anggota_1');
      $p->anggota_2    = Input::get('anggota_2');
      $p->anggota_3    = Input::get('anggota_3');
      $p->asal_sekolah = Input::get('asal_sekolah');
      $p->save();

      return Redirect::route('user.index');
    }

    public function index()
    {
      $peserta = Peserta::all();

      return View::make('user.index')
        ->withPeserta($peserta);
    }
}