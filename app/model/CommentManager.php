<?php

namespace app\model;

class CommentManager extends Manager
{

    public function getComments($postId)
    {
        $db = $this->getDb();
        $comments = $db->prepare('
            SELECT post_id, id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr 
            FROM comments 
            WHERE post_id = ? 
            ORDER BY comment_date 
            DESC'
            ,[$_GET['id']]);
        return $comments;
    }

     public function getCommentsWithSignal()
    {
        $db = $this->getDb();
        $comments = $db->query('
            SELECT post_id, id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr 
            FROM comments 
            WHERE signalement = 1 
            ORDER BY comment_date 
            DESC');
        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->getDb();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())',array(
                $postId,
                $author,
                $comment
                ));
        return $comments;
    }

    public function setSignal(){
        $db = $this->getDb();
        $update = $db->prepare(
            'UPDATE comments SET signalement= 1
             WHERE id=:id AND post_id=:post_id'
             ,array(
                    'id' => $_GET['id'],
                    'post_id' => $_GET['post_id']
                    ));
    }

}