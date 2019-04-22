<?php

namespace App\Controller\Admin;

use \Core\HTML\BootstrapForm;
use \Core\Auth\Session;
use App;

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
        $flashs = Session::getInstance();
        if($flashs->hasFlashes())
        {
            $flashs =$flashs->getFlashes();
        }
        $posts = $this->Post->allPosts();
        $this->render('admin.posts.index', compact('posts', 'flashs'));
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
    
    public function archived()
    {
        $posts = $this->Post->archived();
        $this->render('admin.posts.archived', compact('posts'));
    }



    /**
     * delete
     * delete permanently a blogpost
     * @return void
     */
    /*
    public function delete()
    {
        if (!empty($_POST)) {
            $this->Post->delete(filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT));
            {
                return $this->index();
            }
        }
    }*/

    public function delete()
    {  
        $flashs = Session::getInstance();
        if (!empty($_POST)) {
            $this->Post->update(filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT), [
                'archive' =>  date('Y-m-d H:i:s')]);
                $flashs->setFlash('success', "Le commentaire n'est plus visible sur le site, il est maintenant classé comme 'archive' en base de données");
            {
                return App::redirect('index.php?page=admin.posts.index');;
            }
        }
        
    }

    public function publish()
    {
        $flashs = Session::getInstance();
        if (!empty($_POST)) {
            $this->Post->update(filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT), [
                'archive' =>  NULL]);
                $flashs->setFlash('success', "Le commentaire est de nouveau visible sur le site");
            {
                return App::redirect('index.php?page=admin.posts.index');
            }
        }
        
    }

}
