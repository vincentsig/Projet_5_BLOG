<?php

namespace App\Controller\Admin;

use \Core\HTML\BootstrapForm;


class UsersController extends AppController
{

    public function __construct()
    {
        parent:: __construct();
        $this->loadModel('User');
    }


    public function index()
    {
        $users = $this->User->all();
        $this->render('admin.users.index', compact('users'));
    }

    public function edit()
    {       
        if(!empty($_POST))
        {
            $result = $this->User->update($_GET['id'],[
                'role' => $_POST['role']
            ]);
            if($result)
            {
               return $this->index();        
            }
        }
        $user = $this->User->find($_GET['id']);
        $roles = $this->User->getList('id', 'role');
        $form = new BootstrapForm($user);
        $this->render('admin.users.edit',compact('roles', 'form','user'));
    }


}