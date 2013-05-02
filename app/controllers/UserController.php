<?php

class UserController extends BaseController {
	public function form() {
		return View::make('cadastro/form');
	}
	
	public function cadastro() {
		$regras = ['email' => 'required|email|unique:users,email',
			   'senha' => 'required',
			   'confirmacao' => 'required|same:senha'];
		
		$validacao = Validator::make(Input::all(), $regras);
		
		if ($validacao->fails())
			return Redirect::to('cadastro')->withErrors($validacao);
		
		//cadastrando um novo usuário
		$usuario = new User;
		$usuario->email = Input::get('email');
		$usuario->password = Hash::make( Input::get('senha') );
		$usuario->save();
		
		return View::make('cadastro/sucesso');
	}
}