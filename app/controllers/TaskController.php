<?php

class TaskController extends BaseController {
	public function getAdd() {
		return View::make('add_task');
	}
	
	public function postAdd() {
		//criando regras de validação
		$regras = array('titulo' => 'required');
		
		//executando validação
		$validacao = Validator::make(Input::all(), $regras);
		
		//se a validação deu errado
		if ($validacao->fails()) {
			return Redirect::to('task/add')->withErrors($validacao);
		}
		
		//sucesso
		return "sucesso";
	}
}