<?php 

namespace app\controller;

use core\controller\Controller;
use app\model\PostManager;
use app\model\CommentManager;
use app\model\admin\AdminManager;
use app\model\Manager;
use core\Auth\DBAuth;

class AppController extends Controller{

	public $postManager;
	public $commentManager;
	public $adminManager;
	public $auth;
	protected $template = 'template';

	public function __construct(){
		$this->viewPath = ROOT . '/app/views/';
		$this->postManager = new PostManager();
		$this->commentManager = new CommentManager();
		$this->adminManager = new AdminManager();
		$this->manager = new Manager();
		$this->auth = new DBAuth($this->manager->getDB());
	}

}