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

Route::any('/', function()
{
	return View::make('hello');
});


Route::any('ola/{usuario?}', function($usuario = null)
{
	return View::make('ola')->with('usuario', $usuario);
});