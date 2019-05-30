<?php

define('ROOT', dirname(__DIR__));

session_start();

require ROOT .'/core/Autoloader.php';
core\Autoloader::register();

if(isset($_GET['action'])){
    $url = $_GET['action'];
}else{
    $url = 'posts.listAllPosts';
}

$url = explode('.', $url);
$action = $url[1];
$controller = '\app\controller\admin\\' . ucfirst($url[0]) . 'Controller';
$controller = new $controller();
$controller->$action();