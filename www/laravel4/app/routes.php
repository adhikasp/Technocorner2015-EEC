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

// Participant related Route

Route::get('user/daftar', array(
  'as'  => 'participant.create',
  'uses' => 'ParticipantController@create'
));

Route::post('user/simpan', array(
  'as'  => 'participant.store',
  'uses' => 'ParticipantController@store'
));

Route::get('user', [
  'before' => 'auth.participant',
  'as' => 'participant.dashboard',
  'uses' => 'ParticipantController@dashboard'
]);

Route::post('user/login', [
  'as' => 'participant.login',
  'uses' => 'ParticipantController@login'
]);

Route::get('user/logout', [
  // 'before' => 'auth.participant',
  'as' => 'participant.logout',
  'uses' => 'ParticipantController@logout'
]);


// Ranah Admin

Route::get('admin-tc', [
  'as' => 'admin.home',
  'uses' => 'AdminController@home'
]);

Route::post('admin-tc/login', [
  'as' => 'admin.login',
  'uses' => 'AdminController@login'
]);

Route::get('admin-tc/daftar', [
  'as' => 'admin.create',
  'uses' => 'AdminController@create'
]);

Route::post('admin-tc/store', [
  'as' => 'admin.store',
  'uses' => 'AdminController@store'
]);

Route::get('admin-tc/dashboard', [
  'as' => 'admin.dashboard',
  'uses' => 'AdminController@dashboard'
]);

Route::get('admin-tc/dashboard/peserta', [
  'as' => 'admin.viewAllParticipant',
  'uses' => 'AdminController@viewAllParticipant'
]);

Route::get('admin-tc/dashboard/peserta/{id}', [
  'as' => 'admin.viewDetailParticipant',
  'uses' => 'AdminController@viewDetailParticipant'
])->where('id', '[0-9]+');

Route::get('admin-tc/dashboard/soal/tambah', [
  'as' => 'admin.question.create',
  'uses' => 'QuestionController@create'
]);

Route::post('admin-tc/dashboard/soal/simpan', [
  'as' => 'admin.question.store',
  'uses' => 'QuestionController@store'
]);

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