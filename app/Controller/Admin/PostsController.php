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
        $this->loadModel('Comment');
    }


    /**
     * index
     * list all the blogposts
     * @return void
     */
    public function index()
    {
        $posts = $this->Post->all();
        $this->render('admin.posts.index', compact('posts'));
    }
   
    
    /**
     * add
     * add a blogpost
     * @return void
     */
    public function add()
    {
        if (!empty($_POST)) {
            $result = $this->Post-> create([
                'title' => filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'lead_in'=> filter_input(INPUT_POST, 'lead_in', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'content' => filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'category_id' => filter_input(INPUT_POST,'category_id',FILTER_SANITIZE_NUMBER_INT),
                'date_created' => date('Y-m-d H:i:s'),
                'user_id' => $_SESSION['auth']->id
            ]);
         
            if ($result) {
                return $this->index();
            }
        }
       
        $categories = $this->Category->getList('id', 'title');
        $form = new BootstrapForm(filter_input(INPUT_POST, '$_POST', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $this->render('admin.posts.edit', compact('categories', 'form'));
    }

    /**
     * edit
     * edit a blogpost
     * @return void
     */
    public function edit()
    {
        if (!empty($_POST)) {
            $result = $this->Post->update(filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT), [
                'title' =>filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'lead_in'=> filter_input(INPUT_POST, 'lead_in', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'content' => filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'category_id' => filter_input(INPUT_POST,'category_id',FILTER_SANITIZE_NUMBER_INT),
                'last_update' => date('Y-m-d H:i:s'),
                'user_id' => $_SESSION['auth']->id
            ]);
            if ($result) {
                return $this->index();
            }
        }
        $post = $this->Post->find(filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));
        $categories = $this->Category->getList('id', 'title');
        $form = new BootstrapForm($post);
        $this->render('admin.posts.edit', compact('categories', 'form', 'post'));
    }
    
    /**
     * delete
     * delete permanently a blogpost
     * @return void
     */
    public function delete()
    {
        if (!empty($_POST)) {
            $this->Post->delete(filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT));
            {
                return $this->index();
            }
        }
    }
}
