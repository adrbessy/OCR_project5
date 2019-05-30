<?php 

namespace app\controller\admin;

class AppController extends \app\controller\AppController{

	protected $template = 'admin_template';

	public function __construct(){
		parent::__construct();
		
		if(!$this->auth->logged()){
		    $this->auth->forbidden();
		}
	}
}