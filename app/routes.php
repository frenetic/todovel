<?php

Route::group(array('before' => 'auth'), function()
{	
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
});




/*    login    */
Route::get('login', ['as'=>'login', function() {
	return View::make('login');
}]);

Route::post('login', array('before' => 'csrf', function() {
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
}));


/*    cadastro de novos usuários    */
Route::group(["before"=>'guest'], function() {
	Route::get('cadastro', 'UserController@form');
	Route::post('cadastro',  ['before' => 'csrf', 'uses' => 'UserController@cadastro']);
});




/*    página inicial    */
Route::any('/', ["as" => "home",
		 function() {
			if (Auth::guest())
				return View::make('hello');
			
			return Redirect::to('list');
		}]
);
/*    about    */
Route::any('about', function() {
	return View::make('about');
});