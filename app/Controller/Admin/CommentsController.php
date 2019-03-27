<?php

namespace App\Controller\Admin;

use \Core\HTML\BootstrapForm;


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
   
    
    



}