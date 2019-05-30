<?php

namespace app\model;

use core\Database;

class Manager
{
	protected $db_instance;

    public function getDb(){
		$config = require(ROOT . '/config/config.php');
		if (is_null($this->db_instance)){
			$this->db_instance = new Database($config['db_name'],$config['db_user'],$config['db_pass'],$config['db_host']);
		}
		return $this->db_instance;
	}
}