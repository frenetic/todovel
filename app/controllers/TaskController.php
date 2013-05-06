<?php

class TaskController extends BaseController {
	public function getAdd($lista_id) {
		//verifica se a lista existe
		if ( Lista::findOrFail($lista_id)->usuario->id != Auth::user()->id )
			return Redirect::to('list');
		
		return View::make('add_task')->with('lista_id', $lista_id);
	}
	
	public function postAdd($lista_id) {
		//verifica se a lista existe
		if ( Lista::findOrFail($lista_id)->usuario->id != Auth::user()->id )
			return Redirect::to('list');
		
		
		//criando regras de validação
		$regras = array('titulo' => 'required');
		
		//executando validação
		$validacao = Validator::make(Input::all(), $regras);
		
		//se a validação deu errado
		if ($validacao->fails()) {
			return Redirect::to('task/add/' . $lista_id)->withErrors($validacao);
		}
		//se a validação deu certo
		else {
			$task = new Task;
			$task->titulo = Input::get('titulo');
			$task->list_id = $lista_id;
			$task->save();
			
			return View::make('add_task')->with('sucesso', TRUE)->with('lista_id', $lista_id);
		}
	}
	
	public function listar() {
		return View::make('list_tasks')->with('tasks', Task::all());
	}
	
	
	public function check() {
		//verifica se a request é ajax
		if (Request::ajax()) {
			//criando regras de validação
			$regras = array('task_id' => 'required|integer');
			
			$validacao = Validator::make(Input::all(), $regras);
			
			if ($validacao->fails()) {
				return Response::json( array("status" => FALSE) );
			}
			else {
				//tenta encontrar e atualizar a task
				try {
					$task = Task::findOrFail(Input::get('task_id'));
					
					if ($task->getUsuarioId() != Auth::user()->id)
						throw new Exception("você não é o dono dessa task");
					
					$task->status = TRUE;
					$task->save();
					
					return Response::json( array("status" => TRUE, "titulo" => $task->titulo) );
				}
				//caso não tenha conseguido encontrar a task
				catch(Exception $e) {
					return Response::json( array("status" => FALSE, "mensagem" => $e->getMessage()) );
				}
			}
		}
	}
}