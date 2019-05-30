<?php

namespace app\model\admin;

use app\model\Manager;

class AdminManager extends Manager
{

    public function getAllPosts()
    {
        $db = $this->getDb();
        $allPosts = $db->query(
            'SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr 
             FROM posts 
             ORDER BY creation_date 
             DESC'
             ,'app\Table\Post');
        return $allPosts;
    }

    public function add(){
        $db = $this->getDb();
        if(!empty($_POST)){
            if(!empty($_POST['title']) && !empty($_POST['content'])){
                $msg = "";
                if(isset($_FILES['image'])){
                    $target = ROOT ."/public/img/".basename($_FILES['image']['name']);
                    $add = $db->prepare(
                        'INSERT INTO posts(title, content, creation_date, image) 
                         VALUES(?, ?, NOW(), ?)'
                        ,array(
                            $_POST['title'],
                            $_POST['content'],
                            $_FILES['image']['name']
                            ));
                    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
                        $msg = "l'image a bien été chargée !";
                    }else{
                        $msg = "il y a eu un problème dans le chargement du fichier image !";
                    }
                    // var_dump($msg);
                }else{
                    $add = $db->prepare(
                        'INSERT INTO posts(title, content, creation_date) 
                         VALUES(?, ?, NOW())'
                        ,array(
                            $_POST['title'],
                            $_POST['content']
                            ));
                }
                if($add){
                    header('Location: admin.php?confirmation=added');
                }
            }else{
                return true;
            }
        }
    }

    public function edit(){
        $db = $this->getDb();
        if(!empty($_POST)){
            $update = $db->prepare(
                'UPDATE posts SET title= :title, content= :content 
                 WHERE id= :id'
                 ,array(
                        'title' => $_POST['title'],
                        'content' => $_POST['content'],
                        'id' => $_GET['id']
                        ));
            if($update){
                header('Location: admin.php?confirmation=edited');
            }
        }
    }

    public function remove(){
        if(!empty($_POST)){
            $db = $this->getDb();
            $remove = $db->prepare(
                'DELETE 
                 FROM posts 
                 WHERE id= :id'
                 ,array(
                        'id' => $_POST['id']
                        ));
            if($remove){
                header('Location: admin.php?confirmation=remove');
            }
        }
    }

    public function ignoreComment(){
        $db = $this->getDb();
        if(!empty($_POST)){
            $update = $db->prepare(
                'UPDATE comments SET signalement=0 
                 WHERE id= :id'
                 ,array(
                        'id' => $_POST['id']
                        ));
            if($update){
                header('Location: admin.php');
            }
        }
    }

    public function removeComment(){
        if(!empty($_POST)){
            $db = $this->getDb();
            $remove = $db->prepare(
                'DELETE 
                 FROM comments 
                 WHERE id= :id'
                 ,array(
                        'id' => $_POST['id']
                        ));
            if($remove){
                header('Location: admin.php');
            }
        }
    }

}