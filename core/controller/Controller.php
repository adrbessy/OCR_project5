<?php

namespace core\controller;

use core\Database;

class Controller{

	protected $viewPath;
	protected $template;

	protected function render($view,$variables = []){
		ob_start();
		extract($variables);
		require($this->viewPath . str_replace('.', '/', $view) . '.php');
		$content = ob_get_clean();
		require($this->viewPath . 'templates/' . $this->template . '.php');
	}

	protected static function notFound(){
		header("HTTP/1.0 404 Not Found");
		die('Page introuvable');
	}
}
