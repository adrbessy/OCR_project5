<?php
namespace core\Auth;

use core\Database;   

class DBAuth {

    private $db;

    public function __construct(Database $db){
        $this->db = $db;
    }

    /**
    * @param $username
    * @param $password
    * @return boolean
    */
    public function login($username,$password){
        $user = $this->db->prepare('SELECT * FROM users WHERE username = ?',[$username],null,true);
        if ($user){
            if($user->password === $password){
                $_SESSION['auth'] = $user->id;
                return true;
            }
        } 
        return false;
    }

    public function logged(){
        return isset($_SESSION['auth']);
    }

    public function forbidden(){
        header('HTTP/1.0 403 Forbidden');
        die('Accès interdit');
    }

     public function getUserId(){
        if ($this->logged()){
            return $_SESSION['auth'];
        }
        return false;
    }

}