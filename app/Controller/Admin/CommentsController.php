<?php

namespace App\Controller\Admin;

use \Core\HTML\BootstrapForm;
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


    public function index()
    {
        $comments = $this->Comment->all();
        $this->render('admin.comments.index', compact('comments'));
    }
   
    
    public function show()
    {

        $comments = $this->Comment->find($_GET['id']);
        $this->render('admin.comments.show', compact('comments'));
    }


    public function validation()
    {
        $comments = $this->Comment->waitingList();
        $form = new BootstrapForm($_POST);
        $this->render('admin.comments.validation', compact('comments', 'form'));
    }


    public function valid()
    {
        if(!empty($_POST))
        {
            $result = $this->Comment->update($_POST['id'],[
                'status' => date('Y-m-d H:i:s')],true);
            {
                return App::redirect('index.php?page=admin.comments.validation');
            }
        }
    }

    public function delete()
    {
        if(!empty($_POST))
        {
            $result = $this->Comment->delete($_POST['id']);
            {
                return $this->index();
            }
            
        }       
    }

} 