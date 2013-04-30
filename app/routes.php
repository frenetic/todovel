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

Route::any('/', array("as" => "home",
		      function() { return View::make('hello'); }
		)
);


Route::get('ola/{usuario?}', 'HomeController@ola');


/*    listing tasks    */
Route::any('task', 'TaskController@listar');
Route::any('tasks', 'TaskController@listar');

/*    adding tasks routes    */
Route::get('task/add/{lista_id}', 'TaskController@getAdd');
Route::post('task/add/{lista_id}', 'TaskController@postAdd');

/*    checking tasks    */
Route::post('task/check', 'TaskController@check');



/*    lists    */
Route::get('list/create', 'ListController@getCreate');
Route::post('list/create', 'ListController@postCreate');

Route::get('list', 'ListController@listar');
Route::get('list/{lista_id?}', 'ListController@listarTasks');


/*    login    */
Route::get('login', function() {
	return View::make('login');
});

Route::post('login', function() {
	$regras = array("email" => "required|email",
			"senha" => "required");
	
	$validacao = Validator::make(Input::all(), $regras);
	
	if ($validacao->fails()) {
		return Redirect::to('login')->withErrors($validacao);
	}
	
	//tenta logar o usuário
	if (Auth::attempt( array('email' => Input::get('email'), 'password' => Input::get('senha') ) ) ) {
		return Redirect::to('/');
	}
	else {
		return Redirect::to('login')->withErrors('Usuário ou Senha Inválido');
	}
});