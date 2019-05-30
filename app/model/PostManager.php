<?php

namespace app\model;

class PostManager extends Manager
{
    public function getPosts($page)
    {
        $page = ($page-1)*5;
        $db = $this->getDb();
        $posts = $db->query(
            'SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr, image 
             FROM posts 
             ORDER BY id 
             DESC LIMIT ' . $page . ',5'
             ,'app\Table\Post');
        return $posts;
    }

    public function getNumberOfEpisodes()
    {
        $db = $this->getDb();
        $nbEpisodes = $db->query('
            SELECT COUNT(*) AS nb_episodes 
            FROM posts'
            ,'app\Table\Post',true);
        return $nbEpisodes;
    }

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

    public function getPost($postId)
    {
        $db = $this->getDb();
        $post = $db->prepare(
            'SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr 
             FROM posts 
             WHERE id = ?'
             ,[$_GET['id']], 'app\Table\Post', true);
        return $post;
    }

}