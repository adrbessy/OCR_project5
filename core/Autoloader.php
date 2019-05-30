<?php

namespace core;

class Autoloader{

	static function register(){
		spl_autoload_register(array(__CLASS__,'autoload'));
	}

	/**
	* inclut le fichier correspondra à notre classe
	* @param $class_name string le nom de la classe à charger
	*/
	static function autoload($class_name)
	{
		$class_name = str_replace('\\', '/', $class_name);
		require '../' .$class_name . '.php';
	}
}