<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		return Redirect::route('home');
	}
});

Route::filter('participant', function()
{
	if (Auth::user()->userable_type != 'Participant')
	{
		return Redirect::route('home');
	}
});

Route::filter('admin', function()
{
	if (Auth::user()->userable_type != 'Admin')
	{
		return Redirect::route('home');
	}
});

Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::route('home.dashboard');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() !== Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});


/*
|--------------------------------------------------------------------------
| Exam Related Filter
|--------------------------------------------------------------------------
|
|
|
*/

Route::filter('haveExam', function() {
	$e = Auth::user()->userable->exam;
	if (!count($e))
	{
		return Redirect::route('participant.exam.preparation');
	}
});

Route::filter('examPreparation', function()
{
	$e = Auth::user()->userable->exam;

	if (count($e) and $e->session != 0)
	{
		return Redirect::route('participant.exam.page');
	}
});

Route::filter('inExam', function() {
	$e = Auth::user()->userable->exam;

	if (!count($e) or $e->session == 0)
	{
		return Redirect::route('participant.exam.preparation');
	}
	elseif (in_array($e->session, [2, 3]))
	{
		Redirect::route('participant.exam.result');
	}
});

Route::filter('examResultCalculated', function() {
	$e = Auth::user()->userable->exam;

	if ($e->session != 3)
	{
		return Redirect::route('participant.exam.page');
	}
});