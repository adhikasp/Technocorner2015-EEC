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
      return View::make('user.index');
    }

    public function index()
    {
      $peserta = Peserta::all();

      return View::make('user.index')
        ->withPeserta($peserta);
    }
}