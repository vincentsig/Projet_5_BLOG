<?php

namespace App\Controller\Admin;

use \Core\HTML\BootstrapForm;
use \Core\Auth\Session;
use App;

class CommentsController extends AppController
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
     * index of the comments managment
     * @return void
     */
    public function index()
    {
        $comments = $this->Comment->all();
        $this->render('admin.comments.index', compact('comments'));
    }
   

    /**
     * validation
     * show all the comments not validated
     * @return void
     */
    public function validation()
    {
        $flashs = Session::getInstance();
        if ($flashs->hasFlashes()) {
            $flashs =$flashs->getFlashes();
        }
        $comments = $this->Comment->waitingList();
        $form = new BootstrapForm($_POST);
        $this->render('admin.comments.validation', compact('comments', 'form', 'flashs'));
    }


    /**
     * valid
     * valid a comment and publish it on the website
     * @return void
     */
    public function valid()
    {
        $flashs = Session::getInstance();
        if (!empty($_POST)) {
            $this->Comment->update($_POST['id'], [
                'status' => date('Y-m-d H:i:s')], true);
            {
                $flashs->setFlash('success', 'Le commentaire à bien été publié');
                return App::redirect('index.php?page=admin.comments.validation');
            }
        }
    }

    /**
     * delete
     * delete a comment
     * @return void
     */
    public function delete()
    {
        if (!empty($_POST)) {
            $this->Comment->delete($_POST['id']);
            {
                return $this->index();
            }
        }
    }
}
