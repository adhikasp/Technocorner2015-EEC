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
  'before' => 'guest',
  'as' => 'home',
  'uses' => 'HomeController@showHome'
));

Route::get('home', function() {
    return Redirect::route('home');
});

// Route used to prevent already logged that try to access home/login page
// They wil be redirected to their respected dashboard (Admin or Participant alike)
Route::get('dashboard', [
  'as' => 'home.dashboard',
  'uses' => 'HomeController@noLoggedUser'
]);



/*
|--------------------------------------------------------------------------
| Participan Routes
|--------------------------------------------------------------------------
|
| Here all the routes for Participant Model
|
*/

Route::group(['before' => 'guest'], function()
{

  Route::get('user/daftar', array(
    'as'  => 'participant.create',
    'uses' => 'ParticipantController@create'
  ));

  Route::post('user/simpan', array(
    'as'  => 'participant.store',
    'uses' => 'ParticipantController@store'
  ));

  Route::post('user/login', [
    'as' => 'participant.login',
    'uses' => 'ParticipantController@login'
  ]);

});

// Login participant
Route::group(['before' => 'auth|participant'], function() {

  Route::get('user', [
    'as' => 'participant.dashboard',
    'uses' => 'ParticipantController@dashboard'
  ]);

  Route::get('user/logout', [
    'as' => 'participant.logout',
    'uses' => 'ParticipantController@logout'
  ]);

  Route::get('user/exam/preparation', [
    'as' => 'participant.exam.preparation',
    'uses' => 'ExamController@showPreparation'
  ]);

});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here all the routes for Admin Model
|
*/

Route::group(['before' => 'guest'], function()
{

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

  Route::post('admin-tc/daftar/simpan', [
    'as' => 'admin.store',
    'uses' => 'AdminController@store'
  ]);

});

Route::group(['before' => 'auth|admin'], function()
{

  Route::get('admin-tc/logout', [
    'as' => 'admin.logout',
    'uses' => 'AdminController@logout'
  ]);

  Route::get('admin-tc/dashboard', [
    'as' => 'admin.dashboard',
    'uses' => 'AdminController@dashboard'
  ]);

  // Participant related routes

  Route::get('admin-tc/dashboard/peserta', [
    'as' => 'admin.viewAllParticipant',
    'uses' => 'AdminController@viewAllParticipant'
  ]);

  Route::get('admin-tc/dashboard/peserta/{id}', [
    'as' => 'admin.viewDetailParticipant',
    'uses' => 'AdminController@viewDetailParticipant'
  ])->where('id', '[0-9]+');

  // Question CRUD related routes

  Route::get('admin-tc/dashboard/soal/tambah', [
    'as' => 'admin.question.create',
    'uses' => 'QuestionController@create'
  ]);

  Route::post('admin-tc/dashboard/soal/simpan', [
    'as' => 'admin.question.store',
    'uses' => 'QuestionController@store'
  ]);

  Route::get('admin-tc/dashboard/soal/{id}', [
    'as' => 'admin.question.detail',
    'uses' => 'QuestionController@detail'
  ])->where('id', '[0-9]+');

  Route::get('admin-tc/dashboard/soal/{id}/edit', [
    'as' => 'admin.question.edit',
    'uses' => 'QuestionController@edit'
  ])->where('id', '[0-9]+');

  Route::get('admin-tc/dashboard/soal/{id}/hapus', [
    'as' => 'admin.question.delete',
    'uses' => 'QuestionController@delete'
  ])->where('id', '[0-9]+');

});

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