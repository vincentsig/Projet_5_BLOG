<?php

namespace App\Controller;

use Core\Controller\Controller;
use Core\HTML\BootstrapForm;


class PostsController extends AppController
{

    public function __construct()
        {
            parent::__construct();
            $this->loadModel('Post');
            $this->loadModel('Category');
            $this->loadModel('Comment');
            $this->loadModel('User');
        }


    public function index()
    {
        $posts = $this->Post->last();
        $categories = $this->Category->all();
        $this->render('posts.index',compact('posts', 'categories'));
    }

    public function categories()
    {
        $category = $this->Category->find($_GET['id']);
        if($category===false)
        {
            $this->notFound();
        }
        $posts = $this->Post->lastByCategory($_GET['id']);
        $categories = $this->Category->all();
        $this->render('posts.category', compact('posts', 'categories','category'));
    }

    public function singlePost()
    {
        $post = $this->Post->findWithCategory($_GET['id']);
        if($post ==false)
        {
            $this->notFound();
        }
         if(!empty($_POST) && isset($_POST))
        {
            $result = $this->Comment->create([
                'content' => $_POST['content'],
                'date_created' => date('Y-m-d H:i:s'),
                'status' => NULL,
                'user_id' => $_SESSION['auth']->id,
                'blogpost_id' =>$_GET['id']  
            ]);
            
        }
        $comments = $this->Comment->findWithComment($_GET['id']);
        $count = $this->Comment->count($_GET['id']);
        $form = new BootstrapForm($_POST);
        $this->render('posts.singlePost', compact('post','comments','count','form'));

    }

  


    
}