<?php

namespace App\Controller\Admin;

use \Core\HTML\BootstrapForm;


class PostsController extends AppController
{

    public function __construct()
    {
        parent:: __construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }


    public function index()
    {
        $posts = $this->Post->all();
        $this->render('admin.posts.index', compact('posts'));
    }
   
    public function add()
    {
       
        if(!empty($_POST))
        {
            $result = $this->Post-> create([
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'category_id' => $_POST['category_id']
            ]);
         
            if($result)
            {
                return $this->index(); 
            }
        }
       
        $categories = $this->Category->getList('id','title');
        $form = new BootstrapForm($_POST);  
        $this->render('admin.posts.edit',compact('categories', 'form'));
    }




    

    public function edit()
    {
       
        
        if(!empty($_POST))
        {
            $result = $this->Post->update($_GET['id'],[
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'category_id' => $_POST['category_id']
            ]);
            if($result)
            {
               return $this->index();        
            }
        }
        $post = $this->Post->find($_GET['id']);
        $categories = $this->Category->getList('id', 'title');
        $form = new BootstrapForm($post);
        $this->render('admin.posts.edit',compact('categories', 'form','post'));
    }
    
    public function delete()
    {
        if(!empty($_POST))
        {
            $result = $this->Post->delete($_POST['id']);
            {
                return $this->index();
            }
            
        }       
    }




}