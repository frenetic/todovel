<?php

class HomeController extends BaseController {
	public function ola($usuario = "fulano")
	{
		$usuario = ucwords($usuario);
		return View::make('ola')->with('usuario', $usuario);
	}
}