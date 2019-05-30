<?php 

namespace app\controller;

class PostsController extends AppController{

	public function __construct(){
		parent::__construct();
	}

	public function listPosts()
	{		
		if(isset($_GET['page'])){
			$posts = $this->postManager->getPosts($_GET['page']);
		}else{
			$posts = $this->postManager->getPosts(1);
		}
	    $numberOfEpisodes = $this->postManager->getNumberOfEpisodes();
	    $this->render('index.index',compact('posts','numberOfEpisodes'));
	}

	public function post($error=false)
	{
		if (isset($_GET['id'])){
			$post = $this->postManager->getPost($_GET['id']);
			if($post === false){
				$this->listPosts(1);
			}
	    	$comments = $this->commentManager->getComments($_GET['id']);
	    	$this->render('posts.postView',compact('post','comments','error'));
		}else{
			$this->listPosts(1);
		}
	}

	public function addComment()
	{
		if(empty($_POST['author']) || empty($_POST['comment']) || empty($_GET['id'])){
			return $this->post(true);
		}
	    $affectedLines = $this->commentManager->postComment($_GET['id'], $_POST['author'], $_POST['comment']);
	    if ($affectedLines === false) {
	        throw new Exception('Impossible d\'ajouter le commentaire !');
	    } else {
	        header('Location: index.php?action=posts.post&id=' . $_GET['id']);
	    }
	}

	public function signal()
	{
		$this->commentManager->setSignal();
		header('Location: index.php?action=posts.post&id=' . $_GET['post_id'] . '&signal=confirmation');
	}

}