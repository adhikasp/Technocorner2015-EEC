<?php

class UserController extends BaseController {

    public function showDashboard()
    {
        return "Hello User :)";
    }

    public function showDaftar()
    {
        return View::make('user.form_daftar');
    }
}