<?php

class PesertaController extends BaseController {

    public function dashboard()
    {
        return "Hello User :)";
    }

    public function create()
    {
        return View::make('peserta.create');
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

      return Redirect::route('peserta.index');
    }

    public function index()
    {
      $peserta = Peserta::all();

      return View::make('peserta.index')
        ->withPeserta($peserta);
    }

    public function login()
    {
      if (Auth::attempt(['email' => Input::get('email'), 'password' => Hash::make(Input::get('password'))])) {
        return Redirect::intended('peserta.index');
      }

      return View::make('Home')
        ->withPesan('gagal_login');
    }
}