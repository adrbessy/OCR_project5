<?php 

namespace app\controller\admin;

class PostsController extends AppController{

	public function __construct(){
		parent::__construct();
	}

	public function listAllPosts()
	{
		$allPosts = $this->postManager->getAllPosts();
		$commentsWithSignal = $this->commentManager->getCommentsWithSignal();
	   	$this->render('admin.posts.listPostsView',compact('allPosts','commentsWithSignal'));
	}

	public function read($error=false)
	{
		if (isset($_GET['id'])){
			$post = $this->postManager->getPost($_GET['id']);
		    $comments = $this->commentManager->getComments($_GET['id']);
		    $this->render('posts.postView',compact('post','comments','error'));
		}
    	else{
			$this->listAllPosts();
		}
	}

	public function ignoreSignal()
	{
	    $comments = $this->adminManager->ignoreComment();
	}
	public function removeComment()
	{
	    $comments = $this->adminManager->removeComment();
	}

	public function edit()
	{
		if (isset($_GET['id'])){
			$this->adminManager->edit();
			$post = $this->postManager->getPost($_GET['id']);
			$this->render('admin.posts.edit',compact('post'));
		}
		else{
			$this->listAllPosts();
		}
	}

	public function add()
	{
		$error = false;
		$error = $this->adminManager->add();
		$this->render('admin.posts.add',compact('error'));
	}

	public function remove()
	{
		$this->adminManager->remove();
	}

}