<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array(
    'as' => 'home',
    'uses' => 'HomeController@showHome'
));

Route::get('home', function() {
    return Redirect::route('home');
});

Route::post('login/masuk', function() {
    return 'Hello world!';
});

// Ranah Peserta

Route::any('user/daftar', array(
  'as'  => 'peserta.create',
  'uses' => 'PesertaController@create'
));

Route::post('user/buat', array(
  'as'  => 'peserta.store',
  'uses' => 'PesertaController@store'
));

Route::get('user', [
  'before' => 'auth.peserta',
  'as' => 'peserta.dashboard',
  'uses' => 'PesertaController@dashboard'
]);

Route::post('user/login', [
  'as' => 'peserta.login',
  'uses' => 'PesertaController@login'
]);


// Ranah Admin

Route::get('admin-tc/peserta', [
  'as' => 'admin.viewAllPeserta',
  'uses' => 'AdminController@viewAllPeserta'
]);

Route::get('admin-tc/peserta/{id}', [
  'as' => 'admin.viewDetailPeserta',
  'uses' => 'AdminController@viewDetailPeserta'
])->where('id', '[0-9]+');

// Testing

Route::get('/tutor/markdown', function () {
    $res = Response::make('### Ini adalah Markdown');
    $res->headers->set('Content-Type', 'text/x-markdown');
    return $res;
});

Route::get('/tutor/{namaku}', function($namaku) {
    $data['nama'] = $namaku;
    return View::make('tutor.home', $data);
});