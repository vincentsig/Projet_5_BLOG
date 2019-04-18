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
        $form = new BootstrapForm(filter_input(INPUT_POST, '$_POST', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
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
        if (!empty($_POST)|| isset($_POST)) {
            $this->Comment->update((filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT)), [
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
        if (!empty($_POST) || isset($_POST)) {
            $this->Comment->delete((filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT)));
            {
                return $this->index();
            }
        }
    }
}
