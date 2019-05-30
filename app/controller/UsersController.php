<?php

namespace app\controller;

class UsersController extends AppController{

	public function login(){
		$error = false;
		if(!empty($_POST)){
			if($this->auth->login($_POST['username'],$_POST['password'])){
				header('Location: admin.php');
			} else{
				$error = true;
			}
		}
		$this->render('users.login',compact('error'));

	}

	public function accessToAdmin(){
        if(!$this->auth->logged()){
        	$this->login();
        }else{
            header('Location: admin.php');
        }
	}
}